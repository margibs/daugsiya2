<?php namespace App\CustomClass\Instagram;

require_once 'Constants.php';
require_once 'InstagramException.php';

class Instagram {

  protected $username;            // Instagram username
  protected $password;            // Instagram password
  protected $debug;               // Debug

  protected $uuid;                // UUID
  protected $device_id;           // Device ID
  protected $username_id;         // Username ID
  protected $token;               // _csrftoken
  protected $isLoggedIn = false;  // Session status
  protected $rank_token;          // Rank token
  protected $IGDataPath;          // Data storage path

  /**
    * Default class constructor.
    *
    * @param string $username
    *   Your Instagram username.
    * @param string $password
    *   Your Instagram password.
    * @param $debug
    *   Debug on or off, false by default.
    * @param $IGDataPath
    *  Default folder to store data, you can change it.
    */
  public function __construct($username, $password, $debug = false, $IGDataPath = null)
  {
    $this->username = $username;
    $this->password = $password;
    $this->debug    = $debug;

    $this->uuid      = $this->generateUUID(true);
    $this->device_id = 'android-' . str_split(md5(rand(1000, 9999)), 16)[rand(0, 1)];

    if (!is_null($IGDataPath))
      $this->IGDataPath = $IGDataPath;
    else
      $this->IGDataPath = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR;

    if ((file_exists($this->IGDataPath . "$this->username-cookies.dat")) && (file_exists($this->IGDataPath . "$this->username-userId.dat"))
    && (file_exists($this->IGDataPath . "$this->username-token.dat")))
    {
      $this->isLoggedIn = true;
      $this->username_id = trim(file_get_contents($this->IGDataPath . "$username-userId.dat"));
      $this->rank_token = $this->username_id . "_" . $this->uuid;
      $this->token = trim(file_get_contents($this->IGDataPath . "$username-token.dat"));
    }
  }

  /**
  * Login to Instagram
  *
  * @return array
  *    Login data
  */
  public function login()
  {
    if (!$this->isLoggedIn)
    {
      $fetch = $this->request('si/fetch_headers/?challenge_type=signup&guid=' . $this->generateUUID(false), null, true);
      preg_match('#Set-Cookie: csrftoken=([^;]+)#', $fetch[0], $token);

      $data = array(
          'device_id' => $this->device_id,
          'guid'      => $this->uuid,
          'phone_id'  => $this->generateUUID(true),
          'username'  => $this->username,
          'password'  => $this->password,
          'login_attempt_count' => '0'
      );

      $login = $this->request('accounts/login/', $this->generateSignature(json_encode($data)), true);

      if ($login[1]['status'] == 'fail')
      {
        throw new InstagramException($login[1]['message']);
        return;
      }

      $this->isLoggedIn = true;
      $this->username_id = $login[1]['logged_in_user']['pk'];
      file_put_contents($this->IGDataPath . $this->username .'-userId.dat', $this->username_id);
      $this->rank_token = $this->username_id . "_" . $this->uuid;
      preg_match('#Set-Cookie: csrftoken=([^;]+)#', $login[0], $match);
      $this->token = $match[1];
      file_put_contents($this->IGDataPath . $this->username . '-token.dat', $this->token);

      $this->syncFeatures();
      $this->autoCompleteUserList();
      $this->timelineFeed();
      $this->getv2Inbox();
      $this->getRecentActivity();

      return $login[1];
    }

    $this->timelineFeed();
    $this->getv2Inbox();
    $this->getRecentActivity();

  }

  public function syncFeatures()
  {
    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        'id'     => $this->username_id,
        '_csrftoken' => $this->token,
        'experiments'   => Constants::EXPERIMENTS
    ));

    return $this->request("qe/sync/", $this->generateSignature($data))[1];
  }

  protected function autoCompleteUserList()
  {
    return $this->request("friendships/autocomplete_user_list/")[1];
  }

  protected function timelineFeed()
  {
    return $this->request("feed/timeline/")[1];
  }

  protected function megaphoneLog()
  {
    return $this->request("megaphone/log/")[1];
  }

  protected function expose()
  {
    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        'id'     => $this->username_id,
        '_csrftoken' => $this->token,
        'experiment'   => 'ig_android_profile_contextual_feed'
    ));

    $this->request("qe/expose/", $this->generateSignature($data))[1];
  }

  /**
  * Login to Instagram
  *
  * @return bool
  *    Returns true if logged out correctly
  */
  public function logout()
  {
    $logout = $this->request('accounts/logout/');

    if ($logout == 'ok')
      return true;
    else
      return false;
  }


  /**
  * Upload photo to Instagram
  *
  * @param string $photo
  *   Path to your photo
  * @param string $caption
  *   Caption to be included in your photo.
  *
  * @return array
  *   Upload data
  */
	public function uploadPhoto($photo, $caption = null)
  {
		$endpoint = Constants::API_URL. 'upload/photo/';
		$boundary = $this->uuid;
		$bodies = [
			[
				'type' => 'form-data',
				'name' => 'upload_id',
				'data' => number_format(round(microtime(true)*1000), 0, '', '')
			],
			[
				'type' => 'form-data',
				'name' => '_uuid',
				'data' => $this->uuid
			],
			[
				'type' => 'form-data',
				'name' => '_csrftoken',
				'data' => $this->token
			],
			[
				"type"=>"form-data",
				"name"=>"image_compression",
			  "data"=>'{"lib_name":"jt","lib_version":"1.3.0","quality":"70"}'
			],
			[
				'type' => 'form-data',
				'name' => 'photo',
				'data' => file_get_contents($photo),
				'filename' => 'pending_media_'.number_format(round(microtime(true)*1000), 0, '', '').'.jpg',
				'headers' =>
        [
          'Content-Transfer-Encoding: binary',
					'Content-type: application/octet-stream'
				]
			]
		];

		$data = $this->buildBody($bodies,$boundary);
		$headers = [
				'Connection: close',
				'Accept: */*',
				'Content-type: multipart/form-data; boundary='.$boundary,
        'Content-Length: '. strlen($data),
        'Cookie2: $Version=1',
        'Accept-Language: en-US',
        'Accept-Encoding: gzip',
		];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_USERAGENT, Constants::USER_AGENT);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_VERBOSE, $this->debug);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->IGDataPath . "$this->username-cookies.dat");
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->IGDataPath . "$this->username-cookies.dat");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		$resp       = curl_exec($ch);
		$header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header     = substr($resp, 0, $header_len);
		$upload     = json_decode(substr($resp, $header_len), true);

		curl_close($ch);

    if ($upload['status'] == 'fail')
    {
      throw new InstagramException($upload['message']);
      return;
    }

    if ($this->debug)
    {
      echo 'RESPONSE: ' . substr($resp, $header_len) . "\n\n";
    }

    $configure = $this->configure($upload['upload_id'], $photo, $caption);
    $this->expose();

		return $configure[1];
	}

  public function direct_share($media_id, $recipients, $text = null)
  {
      if (!is_array($recipients)) {
        $recipients = array($recipients);
      }

      $string = array();
      foreach($recipients as $recipient) {
        $string[] = "\"$recipient\"";
      }

      $recipeint_users = implode(",", $string);

      $endpoint = Constants::API_URL. "direct_v2/threads/broadcast/media_share/?media_type=photo";
  		$boundary = $this->uuid;
  		$bodies = [
  			[
  				'type' => 'form-data',
  				'name' => 'media_id',
  				'data' => $media_id
  			],
  			[
  				'type' => 'form-data',
  				'name' => 'recipient_users',
  				'data' => "[[$recimient_users]]"
  			],
  			[
  				'type' => 'form-data',
  				'name' => 'client_context',
  				'data' => $this->uuid
  			],
  			[
  				'type' => 'form-data',
  				'name' => 'thread_ids',
  				'data' => '["0"]'
  			],
  			[
  				'type' => 'form-data',
  				'name' => 'text',
  				'data' => is_null($text) ? '' : $text
  			]
  		];

  		$data = $this->buildBody($bodies,$boundary);
  		$headers = [
  				'Proxy-Connection: keep-alive',
  				'Connection: keep-alive',
  				'Accept: */*',
  				'Content-type: multipart/form-data; boundary='.$boundary,
  				'Accept-Language: en-en',
  		];

  		$ch = curl_init();
  		curl_setopt($ch, CURLOPT_URL, $endpoint);
  		curl_setopt($ch, CURLOPT_USERAGENT, Constants::USER_AGENT);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  		curl_setopt($ch, CURLOPT_HEADER, true);
  		curl_setopt($ch, CURLOPT_VERBOSE, $this->debug);
  		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->IGDataPath . "$this->username-cookies.dat");
  		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->IGDataPath . "$this->username-cookies.dat");
  		curl_setopt($ch, CURLOPT_POST, true);
  		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

  		$resp       = curl_exec($ch);
  		$header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  		$header     = substr($resp, 0, $header_len);
  		$upload     = json_decode(substr($resp, $header_len), true);

      var_dump($upload);

  		curl_close($ch);
  }

  protected function configure($upload_id, $photo, $caption = '')
  {

    $size = getimagesize($photo)[0];

     $post = json_encode(array(
        'upload_id' => $upload_id,
        'camera_model' => 'HM1S',
        'source_type' => 3,
        'date_time_original' => date("Y:m:d H:i:s"),
        'camera_make' => 'XIAOMI',
        'edits' => array(
          'crop_original_size' => array($size, $size),
          'crop_zoom' => 1.3333334,
          'crop_center' => array(0.0, -0.0)
        ),
        'extra' => array(
          'source_width' => $size,
          'source_height' => $size
        ),
        'device' => array(
          "manufacturer" => "Xiaomi",
          "model" => "HM 1SW",
          "android_version" => 18,
          "android_release" => "4.3"
        ),
        '_csrftoken'  => $this->token,
        '_uuid'       => $this->uuid,
        '_uid'        => $this->username_id,
        'caption' => $caption
     ));

     $post = str_replace('"crop_center":[0,0]', '"crop_center":[0.0,-0.0]', $post);

      $image = $this->request('media/configure/', $this->generateSignature($post))[1];
  }


  /**
  * Edit media
  *
  * @param String $mediaId
  *   Media id
  *
  * @param String $captionText
  *   Caption text
  *
  * @return array
  *   edit media data
  */
  public function editMedia($mediaId, $captionText = "")
  {

    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        '_csrftoken' => $this->token,
        'caption_text'   => $captionText
    ));

    return $this->request("media/$mediaId/edit_media/", $this->generateSignature($data))[1];
  }

  /**
  * Delete photo or video
  *
  * @param String $mediaId
  *   Media id
  *
  * @return array
  *   delete request data
  */
  public function mediaInfo($mediaId)
  {

    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        '_csrftoken' => $this->token,
        'media_id'   => $mediaId
    ));
    return $this->request("media/$mediaId/info/", $this->generateSignature($data))[1];
  }

  /**
  * Delete photo or video
  *
  * @param String $mediaId
  *   Media id
  *
  * @return array
  *   delete request data
  */
  public function deleteMedia($mediaId)
  {

    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        '_csrftoken' => $this->token,
        'media_id'   => $mediaId
    ));
    return $this->request("media/$mediaId/delete/", $this->generateSignature($data))[1];
  }


  /**
  * Comment media
  *
  * @param String $mediaId
  *   Media id
  *
  * @param String $commentText
  *   Comment Text
  *
  * @return array
  *   comment media data
  */
  public function comment($mediaId, $commentText)
  {

    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        '_csrftoken' => $this->token,
        'comment_text'   => $commentText
    ));

    return $this->request("media/$mediaId/comment/", $this->generateSignature($data))[1];
  }



  /**
  * Sets account to public
  *
  * @param String $photo
  *   Path to photo
  */
  public function changeProfilePicture($photo)
  {

    if (is_null($photo))
    {
      echo "Photo not valid\n\n";
      return;
    }

    $uData = json_encode(array(
      '_csrftoken' => $this->token,
      '_uuid'      => $this->uuid,
      '_uid'       => $this->username_id
    ));

    $endpoint = Constants::API_URL. 'accounts/change_profile_picture/';
    $boundary = $this->uuid;
    $bodies = [
      [
        'type' => 'form-data',
        'name' => 'ig_sig_key_version',
        'data' => Constants::SIG_KEY_VERSION
      ],
      [
        'type' => 'form-data',
        'name' => 'signed_body',
        'data' => hash_hmac('sha256', $uData, Constants::IG_SIG_KEY) . $uData
      ],
      [
        'type' => 'form-data',
        'name' => 'profile_pic',
        'data' => file_get_contents($photo),
        'filename' => 'profile_pic',
        'headers' =>
        [
          'Content-type: application/octet-stream',
          'Content-Transfer-Encoding: binary'
        ]
      ]
    ];

    $data = $this->buildBody($bodies,$boundary);
    $headers = [
        'Proxy-Connection: keep-alive',
        'Connection: keep-alive',
        'Accept: */*',
        'Content-type: multipart/form-data; boundary='.$boundary,
        'Accept-Language: en-en',
        'Accept-Encoding: gzip, deflate',
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_USERAGENT, Constants::USER_AGENT);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, $this->debug);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $this->IGDataPath . "$this->username-cookies.dat");
    curl_setopt($ch, CURLOPT_COOKIEJAR, $this->IGDataPath . "$this->username-cookies.dat");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $resp       = curl_exec($ch);
    $header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header     = substr($resp, 0, $header_len);
    $upload     = json_decode(substr($resp, $header_len), true);

    curl_close($ch);
  }


  /**
  * Remove profile picture
  *
  * @return array
  *   status request data
  */
  public function removeProfilePicture()
  {

    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        '_csrftoken' => $this->token
    ));

    return $this->request("accounts/remove_profile_picture/", $this->generateSignature($data))[1];
  }

  /**
  * Sets account to private
  *
  * @return array
  *   status request data
  */
  public function setPrivateAccount()
  {

    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        '_csrftoken' => $this->token
    ));

    return $this->request("accounts/set_private/", $this->generateSignature($data))[1];
  }

  /**
  * Sets account to public
  *
  * @return array
  *   status request data
  */
  public function setPublicAccount()
  {

    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        '_csrftoken' => $this->token
    ));

    return $this->request("accounts/set_public/", $this->generateSignature($data))[1];
  }

  /**
  * Get personal profile data
  *
  * @return array
  *   profile data
  */
  public function getProfileData()
  {
    return $this->request("accounts/current_user/?edit=true", $this->generateSignature($data))[1];
  }

  /**
  * Edit profile
  *
  * @param String $url
  *   Url - website. "" for nothing
  * @param String $phone
  *   Phone number. "" for nothing
  * @param String $first_name
  *   Name. "" for nothing
  * @param String $email
  *   Email. Required.
  * @param int $gender
  *   Gender. male = 1 , female = 0
  *
  * @return array
  *   edit profile data
  */
  public function editProfile($url, $phone, $first_name, $biography, $email, $gender)
  {

    $data = json_encode(array(
        '_uuid'         => $this->uuid,
        '_uid'          => $this->username_id,
        '_csrftoken'    => $this->token,
        'external_url'  => $url,
        'phone_number'  => $phone,
        'username'      => $this->username,
        'full_name'     => $first_name,
        'biography'     => $biography,
        'email'         => $email,
        'gender'        => $gender
    ));

    return $this->request("accounts/edit_profile/", $this->generateSignature($data))[1];
  }


  /**
  * Get username info
  *
  * @param string $usernameId
  *   Username id
  *
  * @return array
  *   Username data
  */
  public function getUsernameInfo($usernameId)
  {
    return $this->request("users/$usernameId/info/")[1];
  }

  /**
  * Get self username info
  *
  * @return array
  *   Username data
  */
  public function getSelfUsernameInfo()
  {
    return $this->getUsernameInfo($this->username_id);
  }

  /**
  * Get recent activity
  *
  * @return array
  *   Recent activity data
  */
  public function getRecentActivity()
  {
    $activity = $this->request("news/inbox/?")[1];

    if ($activity['status'] != 'ok')
    {
      throw new InstagramException($activity['message'] . "\n");
      return;
    }

    return $activity;
  }

  /**
  * I dont know this yet
  *
  * @return array
  *   v2 inbox data
  */
  public function getv2Inbox()
  {
    $inbox = $this->request("direct_v2/inbox/?")[1];

    if ($inbox['status'] != 'ok')
    {
      throw new InstagramException($inbox['message'] . "\n");
      return;
    }

    return $inbox;
  }

  /**
  * Get user tags
  *
  * @param String $usernameId
  *
  * @return array
  *   user tags data
  */
  public function getUserTags($usernameId)
  {
    $tags = $this->request("usertags/$usernameId/feed/?rank_token=$this->rank_token&ranked_content=true&")[1];

    if ($tags['status'] != 'ok')
    {
      throw new InstagramException($tags['message'] . "\n");
      return;
    }

    return $tags;
  }

  /**
  * Get self user tags
  *
  * @return array
  *   self user tags data
  */
  public function getSelfUserTags()
  {
    return $this->getUserTags($this->username_id);
  }

  /**
   * Get tagged media
   *
   * @param string $tag
   *
   * @return array
   */
  public function tagFeed($tag)
  {
    $userFeed = $this->request("feed/tag/$tag/?rank_token=$this->rank_token&ranked_content=true&")[1];

    if ($userFeed['status'] != 'ok')
    {
      throw new InstagramException($userFeed['message'] . "\n");
      return;
    }

    return $userFeed;
  }

  /**
   * Get media likers
   *
   * @param string $mediaId
   *
   * @return array
   */
  public function getMediaLikers($mediaId)
  {
    $likers = $this->request("media/$mediaId/likers/?")[1];
    if ($likers['status'] != 'ok')
    {
      throw new InstagramException($likers['message'] . "\n");
      return;
    }

    return $likers;
  }

  /**
  * Get user locations media
  *
  * @param string $usernameId
  *   Username id
  *
  * @return array
  *   Geo Media data
  */
  public function getGeoMedia($usernameId)
  {
    $locations = $this->request("maps/user/$usernameId/")[1];

    if ($locations['status'] != 'ok')
    {
      throw new InstagramException($locations['message'] . "\n");
      return;
    }

    return $locations;
  }

  /**
  * Get self user locations media
  *
  * @return array
  *   Geo Media data
  */
  public function getSelfGeoMedia()
  {
    return $this->getGeoMedia($this->username_id);
  }

  /**
  * facebook user search
  *
  * @param string $query
  *
  * @return array
  *   query data
  */
  public function fbUserSearch($query)
  {
    $query = $this->request("fbsearch/topsearch/?context=blended&query=$query&rank_token=$this->rank_token")[1];

    if ($query['status'] != 'ok')
    {
      throw new InstagramException($query['message'] . "\n");
      return;
    }

    return $query;
  }

  /**
  * Search users
  *
  * @param string $query
  *
  * @return array
  *   query data
  */
  public function searchUsers($query)
  {
    $query = $this->request("users/search/?ig_sig_key_version=" . Constants::SIG_KEY_VERSION . "&is_typeahead=true&query=$query&rank_token=$this->rank_token")[1];

    if ($query['status'] != 'ok')
    {
      throw new InstagramException($query['message'] . "\n");
      return;
    }

    return $query;
  }

  /**
  * Search users using addres book
  *
  * @param array $contacts
  *
  * @return array
  *   query data
  */
  public function syncFromAdressBook($contacts)
  {
    $data = array(
        'contacts'  => json_encode($contacts, true)
      );

    return $this->request("address_book/link/?include=extra_display_name,thumbnails", $data)[1];
  }

  /**
  * Search tags
  *
  * @param string $query
  *
  * @return array
  *   query data
  */
  public function searchTags($query)
  {
    $query = $this->request("tags/search/?is_typeahead=true&q=$query&rank_token=$this->rank_token")[1];

    if ($query['status'] != 'ok')
    {
      throw new InstagramException($query['message'] . "\n");
      return;
    }

    return $query;
  }


  /**
  * Get timeline data
  *
  * @return array
  *   timeline data
  */
  public function getTimeline()
  {
    $timeline = $this->request("feed/timeline/?rank_token=$this->rank_token&ranked_content=true&")[1];

    if ($timeline['status'] != 'ok')
    {
      throw new InstagramException($timeline['message'] . "\n");
      return;
    }

    return $timeline;
  }

  /**
  * Get user feed
  *
  * @param String $usernameId
  *    Username id
  *
  * @return array
  *   User feed data
  */
  public function getUserFeed($usernameId)
  {
    $userFeed = $this->request("feed/user/$usernameId/?rank_token=$this->rank_token&ranked_content=true&")[1];

    if ($userFeed['status'] != 'ok')
    {
      throw new InstagramException($userFeed['message'] . "\n");
      return;
    }

    return $userFeed;
  }

  /**
  * Get self user feed
  *
  * @return array
  *   User feed data
  */
  public function getSelfUserFeed()
  {
    return $this->getUserFeed($this->username_id);
  }

  /**
  * Get popular feed
  *
  * @return array
  *   popular feed data
  */
  public function getPopularFeed()
  {
    $popularFeed = $this->request("feed/popular/?people_teaser_supported=1&rank_token=$this->rank_token&ranked_content=true&")[1];

    if ($popularFeed['status'] != 'ok')
    {
      throw new InstagramException($popularFeed['message'] . "\n");
      return;
    }

    return $popularFeed;
  }

/**
  * Get user followings
  *
  * @param String $usernameId
  *   Username id
  *
  * @return array
  *   followers data
  */
   public function getUserFollowings($usernameId,$maxid = null)
  {
    return $this->request("friendships/$usernameId/following/?max_id=$maxid&ig_sig_key_version=" . Constants::SIG_KEY_VERSION . "&rank_token=$this->rank_token")[1];
  }

  /**
  * Get user followers
  *
  * @param String $usernameId
  *   Username id
  *
  * @return array
  *   followers data
  */
  public function getUserFollowers($usernameId,$maxid = null)
  {
    return $this->request("friendships/$usernameId/followers/?max_id=$maxid&ig_sig_key_version=" . Constants::SIG_KEY_VERSION . "&rank_token=$this->rank_token")[1];
  }

  /**
  * Get self user followers
  *
  * @return array
  *   followers data
  */
  public function getSelfUserFollowers()
  {
    return $this->getUserFollowers($this->username_id);
  }


  /**
  * Get the users we are following
  *
  * @return array
  *   users we are following data
  */
  public function getUsersFollowing()
  {
    return $this->request("friendships/following/?ig_sig_key_version=" . Constants::SIG_KEY_VERSION . "&rank_token=$this->rank_token")[1];
  }

  /**
  * Like photo or video
  *
  * @param String $mediaId
  *   Media id
  *
  * @return array
  *   status request
  */
  public function like($mediaId)
  {
    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        '_csrftoken' => $this->token,
        'media_id'   => $mediaId
    ));

    return $this->request("media/$mediaId/like/", $this->generateSignature($data))[1];
  }

  /**
  * Unlike photo or video
  *
  * @param String $mediaId
  *   Media id
  *
  * @return array
  *   status request
  */
  public function unlike($mediaId)
  {
    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        '_csrftoken' => $this->token,
        'media_id'   => $mediaId
    ));

    return $this->request("media/$mediaId/unlike/", $this->generateSignature($data))[1];
  }

  /**
  * Get media comments
  *
  * @param String $mediaId
  *   Media id
  *
  * @return array
  *   Media comments data
  */
  public function getMediaComments($mediaId)
  {
    return $this->request("media/$mediaId/comments/?")[1];
  }

  /**
  * Set name and phone (Optional)
  *
  * @param String $name
  *
  * @param String $phone
  *
  * @return array
  *   Set status data
  */
  public function setNameAndPhone($name = "", $phone = "")
  {
    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        'first_name'   => $name,
        'phone_number'  => $phone,
        '_csrftoken' => $this->token
    ));

    return $this->request("accounts/set_phone_and_name/", $this->generateSignature($data))[1];
  }


  /**
  * Get direct share
  *
  * @return array
  *   Direct share data
  */
  public function getDirectShare()
  {
    return $this->request("direct_share/inbox/?")[1];
  }

  /**
  * Backups all your uploaded photos :)
  *
  */
  public function backup()
  {
    $myUploads = $this->getSelfUserFeed();
    foreach ($myUploads['items'] as $item)
    {
      if(!is_dir($this->IGDataPath . 'backup/' . "$this->username-" . date("Y-m-d")))
        mkdir($this->IGDataPath . 'backup/' . "$this->username-" . date("Y-m-d"));
      file_put_contents($this->IGDataPath . 'backup/' . "$this->username-" . date("Y-m-d") . "/" . $item['id'] . ".jpg",
      file_get_contents($item['image_versions2']['candidates'][0]['url']));
    }
  }

  /**
  * Follow
  *
  * @param String $userId
  *
  * @return array
  *   Friendship status data
  */
  public function follow($userId)
  {
    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        'user_id'   => $userId,
        '_csrftoken' => $this->token
    ));

    return $this->request("friendships/create/$userId/", $this->generateSignature($data))[1];
  }

  /**
  * Unfollow
  *
  * @param String $userId
  *
  * @return array
  *   Friendship status data
  */
  public function unfollow($userId)
  {
    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        'user_id'   => $userId,
        '_csrftoken' => $this->token
    ));

    return $this->request("friendships/destroy/$userId/", $this->generateSignature($data))[1];
  }

  /**
  * Block
  *
  * @param String $userId
  *
  * @return array
  *   Friendship status data
  */
  public function block($userId)
  {
    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        'user_id'   => $userId,
        '_csrftoken' => $this->token
    ));

    return $this->request("friendships/block/$userId/", $this->generateSignature($data))[1];
  }

  /**
  * Unblock
  *
  * @param String $userId
  *
  * @return array
  *   Friendship status data
  */
  public function unblock($userId)
  {
    $data = json_encode(array(
        '_uuid'  => $this->uuid,
        '_uid'   => $this->username_id,
        'user_id'   => $userId,
        '_csrftoken' => $this->token
    ));

    return $this->request("friendships/unblock/$userId/", $this->generateSignature($data))[1];
  }

  /**
  * Get liked media
  *
  * @return array
  *   Liked media data
  */
  public function getLikedMedia()
  {
    return $this->request("feed/liked/?")[1];
  }

  public function generateSignature($data)
  {
    $hash = hash_hmac('sha256', $data, Constants::IG_SIG_KEY);

    return 'ig_sig_key_version=' . Constants::SIG_KEY_VERSION .'&signed_body=' . $hash . '.' . urlencode($data);
  }

  public function generateDeviceId()
  {
    return 'android-' . str_split(md5(rand(1000, 9999)), 16)[rand(0, 1)];
  }

  public function generateUUID($type)
  {
    $uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),
      mt_rand(0, 0xffff),
      mt_rand(0, 0x0fff) | 0x4000,
      mt_rand(0, 0x3fff) | 0x8000,
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );

    return $type ? $uuid : str_replace('-', '', $uuid);
  }

  protected function buildBody($bodies, $boundary)
  {
    $body = "";
    foreach($bodies as $b)
    {
      $body .= "--".$boundary."\r\n";
      $body .= "Content-Disposition: ".$b["type"]."; name=\"".$b["name"]."\"";
      if(isset($b["filename"]))
      {
        $ext = pathinfo($b["filename"], PATHINFO_EXTENSION);
        $body .= "; filename=\"" . 'pending_media_' . number_format(round(microtime(true)*1000), 0, '', '') .".".$ext."\"";
      }
      if(isset($b["headers"]) && is_array($b["headers"]))
      {
        foreach($b["headers"] as $header)
        {
          $body.= "\r\n".$header;
        }
      }

      $body.= "\r\n\r\n".$b["data"]."\r\n";
    }
    $body .= "--".$boundary."--";

    return $body;
  }

  protected function request($endpoint, $post = null, $login = false) {

    if (!$this->isLoggedIn && !$login)
    {
      throw new InstagramException("Not logged in\n");
      return;
    }

    $headers = [
        'Connection: close',
        'Accept: */*',
        'Content-type: application/x-www-form-urlencoded; charset=UTF-8',
        'Cookie2: $Version=1',
        'Accept-Language: en-US'
    ];

   $ch = curl_init();

   curl_setopt($ch, CURLOPT_URL, Constants::API_URL . $endpoint);
   curl_setopt($ch, CURLOPT_USERAGENT, Constants::USER_AGENT);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch, CURLOPT_HEADER, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_VERBOSE, false);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $this->IGDataPath . "$this->username-cookies.dat");
   curl_setopt($ch, CURLOPT_COOKIEJAR, $this->IGDataPath . "$this->username-cookies.dat");

   if ($post) {

   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

   }

   $resp       = curl_exec($ch);
   $header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
   $header     = substr($resp, 0, $header_len);
   $body       = substr($resp, $header_len);

   curl_close($ch);

   if ($this->debug)
   {
     echo "REQUEST: $endpoint\n";
     if (!is_null($post))
     {
       if (!is_array($post))
        echo "DATA: " . urldecode($post) . "\n";
     }
     echo "RESPONSE: $body\n\n";
   }

   return array($header, json_decode($body, true));

  }
}
