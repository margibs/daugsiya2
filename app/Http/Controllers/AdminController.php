<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

use App;
use DB;
use Auth;
use Session;
use Validator;
use File;

use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\Facebook;
use Thujohn\Twitter\Facades\Twitter;
use Intervention\Image\Facades\Image;
use DirkGroenen\Pinterest\Pinterest;

use App\User;
use App\AutopostCategory;

use App\Model\Category;
use App\Model\Link;
use App\Model\MediaFile;
use App\Model\PostCategory;
use App\Model\Post;
use App\Model\Comment;
use App\Model\LinksCountry;
use App\Model\CasinoBannerCountry;

use App\Global_Notification;
use App\Chat_Room;

use App\CustomQuery;
use App\CommonFunctions;

use App\PluginModel\WidgetRating;

use App\Autopost;
use App\BiggestWin;
use App\Custom_Notification;
use App\HomeImage;

use Instagram;

use DateTime;
use DateTimeZone;

use App\Http\HomeImageRequest;
use Input;
use App\Model\CasinoBanner;

use Cache;




class AdminController extends Controller
{   
    private $customQuery;

    public function __construct(CustomQuery $customQuery)
    {
        $this->customQuery = $customQuery;
    }

	public function index()
	{
		return 'ADMIN HOMEPAGE!';
	}

    public function notification()
    {
        // date_default_timezone_set("Europe/London");
        $datetime = new DateTime();
        $custom_notifications = Custom_Notification::all();
        return view('admin.notification', compact('datetime', 'custom_notifications'));
    }

    public function biggestWins(){

        $biggest_wins = BiggestWin::with('post')->get();

        return view('admin.biggestWins', compact('biggest_wins'));
    }

    public function editCustomNotification($id){
        // date_default_timezone_set("Europe/London");
        $custom_notification = Custom_Notification::find($id);

        if($custom_notification->executed == 0){

         $datetime = new DateTime();
         return view('admin.editCustomNotification', compact('custom_notification','datetime'));
        }

        return redirect('admin/notification');
        
    }

    public function edit_biggestWins($id){

        $biggest_win = BiggestWin::findOrFail($id);

        return view('admin.editBiggestWins',compact('biggest_win'));

    }

    public function runAutopost()
    {

        $current_time = new DateTime();

        $autoposts = Autopost::where('date_posting','<=', $current_time)->where('autopost_executed', 0)->get();

        foreach($autoposts as $a)
        {

            $description = $a->description;
            $custom_image = $a->custom_image;
            $image_url = "http://susanwins.com/uploads/".$a->custom_image;
            $fb_image_url = "http://susanwins.com/uploads/".$a->custom_image;
            $link = '';
            $title = '';
            $caption = 'susanwins.com';
            $twitter_image = 'uploads/'.$a->custom_image;

            if($a->post_id != 0)
            {
              $post = Post::find($a->post_id);
              $link = 'http://susanwins.com/'.$post->slug;
              $title = $post->title;
              $caption = 'susanwins.com';
              $twitter_image = 'uploads/'.$post->thumb_feature_image;
              $image_url = "http://susanwins.com/uploads/".$post->thumb_feature_image;
              $fb_image_url = "http://susanwins.com/uploads/".$post->thumb_feature_image;
            }
            else
            {
                if($a->video_link != '')
                {
                    $link = $a->video_link;
                    $fb_image_url = '';
                }
                else
                {
                    $link = $a->link;
                }
            }
            // thumb_feature_image

            if($a->fb == 1)
            {
                
                $linkData = [
                    "message" => $description,
                    "link" => $link,
                    "picture" => $fb_image_url,
                    "name" => $title,
                    "caption" => $caption,
                    "description" => $description
                ];

                $config = array();
                $config['app_id'] = '1124598687604895';
                $config['app_secret'] = '22e86ecb2f45e8ac7a8150be55770a0e';
                $config['default_graph_version'] = 'v2.5';
                // $config['fileUpload'] = false; // optional
                 
                $fb = new Facebook($config);
                
                try {
                  // Returns a `Facebook\FacebookResponse` object
                  //716294001804336 new alllad
                  $response = $fb->post('/1558139581098202/feed', $linkData, 'CAAPZB0QlKIJ8BACGfqZBZB1JpOTpndgdHZAer4dYYSRd9nHnsNwaLzSXyk7ixoiu2UJVaafQybZBB6MwoRadXj9EgBIpj2ZCjsEwe39fUagMszUaWG1Akfx5RtZBLowpvXQ8h0D4PL6VtJULvQt1vOXkRHYadfZBTqsizxy6RzBzXC1mEwLTkwtASJhAAaVsIZAcZD');

                // $response = $fb->get('/me', 'CAACEdEose0cBAGrZAyAJeuq9Y4W53qQyvNcvejexYCrQuemkgkBZB5wHl9AZAS2xNji79UgEVPHEniEBBeJ0OqvYm9DTVe10ZClxXDUx8H7sdggNCT4xVa31xm6d1ZAdbTciO50BF7jxvNRYAyldfZAFUORifVXSySrnpFubZCncrkSzbh7GzNbclPojJqARtOfjKRyvmNywQZDZD');

                } catch(Facebook\Exceptions\FacebookResponseException $e) {
                  echo 'Graph returned an error: ' . $e->getMessage();
                  exit;
                } catch(Facebook\Exceptions\FacebookSDKException $e) {
                  echo 'Facebook SDK returned an error: ' . $e->getMessage();
                  exit;
                }

                $a->fb = 2;
                $a->save();

                //RENEWING THE ACCESS TOKEN
                // https://graph.facebook.com/oauth/access_token?client_id=1124598687604895&client_secret=22e86ecb2f45e8ac7a8150be55770a0e&grant_type=fb_exchange_token&fb_exchange_token=CAAPZB0QlKIJ8BAOuaZB6YTMlT1lYur2OFzWPIK2rXowthAPLBaOCTXkkjbKpL76SIzepW7ZCDpF4BEF3sqIqYA403r37QaYVJfr4ez1uZA4N2PLZA6Oud0ZBKnbygQI4RuaYW9Ub7xXe8S6fidGaUBRtZBTV99QOXXa1b0ZAtKMXKLt1ZCybV4DQGRhIx9HNdEYoxBAWIzKq5aQZDZD
                //END RENEWING THE ACCESS TOKEN
                
            }

            if($a->twitter == 1)
            {
                //For Twitter
                $shorten_url = $this->google_shorten($link);

                $twitter_message = $description.' '.$shorten_url;

                if(strlen($description) > 90)
                {
                    $twitter_message = substr($description,0,85).'... '.$shorten_url;
                }

                $uploaded_media = Twitter::uploadMedia(['media' => File::get(public_path($twitter_image))]);
                Twitter::postTweet(['status' => $twitter_message, 'media_ids' => $uploaded_media->media_id_string]);

                $a->twitter = 2;
                $a->save();

            }

            if($a->pinterest == 1)
            {
                $pinterest = new Pinterest('4825781658326156511', '1f898c0906ae4e99ec357c15e4e0ebb7d2a2157ddf34e8bee5d384ae1e5e5907');
                $pinterest->auth->setOAuthToken('AcCO6UVKm-hbFrJiQU2lpa6G_ld0FD-4GAF8KddC-J72zUArhwAAAAA');
                
                $pinterest->pins->create(array(
                    "note"   => $description,
                    "image_url" => $image_url,
                    "board"  => "susanwins_/susanwins",
                    "link" => $link
                ));

                $a->pinterest = 2;
                $a->save();
            }

            if($a->instagram == 1)
            {

                $username = 'susanwinsofficial';
                $password = 'Hello101!';
                $insta = new Instagram($username, $password,$debug = false);

                $insta->login();

                $insta->uploadPhoto(public_path($twitter_image), $caption = $description);
                
                $a->instagram = 2;
                $a->save();
            }

            // if($a->google_plus == 1)
            // {
            //     //execute google_plus
            //     $a->google_plus = 2;
            // }

            $a->autopost_executed = 1;

            $a->save();
        }

        // dd($autoposts);

    }

    public function google_shorten($url)
    {
        // Get API key from : http://code.google.com/apis/console/
        $apiKey = 'AIzaSyACvNKMmB7-WpRRL_bRSXLm7YSCAM4CmB4';

        $postData = array('longUrl' => $url);
        $jsonData = json_encode($postData);

        $curlObj = curl_init();

        curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);
        curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlObj, CURLOPT_HEADER, 0);
        curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt($curlObj, CURLOPT_POST, 1);
        curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

        $response = curl_exec($curlObj);
        // Change the response json string to object
        $json = json_decode($response);

        curl_close($curlObj);

        return $json->id;
    }

    public function autoposts()
    {
        
        $autoposts = Autopost::where('added_to_list',0)->get();
        // dd($autoposts);

        // date_default_timezone_set("Europe/London");

        $datetime = new DateTime();

        return view('admin.autoposts', compact('autoposts', 'datetime'));
    }

    public function autopostCheckPool()
    {
        $datetime = new DateTime();
        $check_pools = DB::table('autoposts')
            ->join('autopost_categories','autopost_categories.id','=','autoposts.autopost_category_id')
            ->select(DB::raw('autopost_categories.id,autopost_categories.name,COUNT(1) as ADDED,autopost_categories.max_per_day'))
            ->where('autoposts.added_to_list',0)
            ->groupBy('autoposts.autopost_category_id')
            ->get();
        
        return view('admin.autopostCheckPool',compact('check_pools','datetime'));
    }

    public function autopostsListIncluded()
    {
        $autoposts = 
            DB::table('autopost_checkers')
            ->join('autoposts','autopost_checkers.autopost_id','=','autoposts.id')
            ->select('autoposts.post_id','autoposts.description','autoposts.custom_image','autoposts.link','autoposts.video_link','autopost_checkers.id as autopost_checkers_id','autopost_checkers.fb','autopost_checkers.twitter','autopost_checkers.pinterest','autopost_checkers.instagram','autopost_checkers.autopost_executed','autoposts.id','autopost_checkers.date_posting')
            ->get();

        $datetime = new DateTime();

        return view('admin.autopostsList', compact('autoposts', 'datetime'));
    }

    public function new_autopost()
    {
        // date_default_timezone_set("Europe/London");
        $datetime = new DateTime();
        $categories = AutopostCategory::all();

        $category_lists = array();

        foreach($categories as $category)
        {
            $category_lists[$category->id] = $category->name;
        }

        return view('admin.new_autopost', compact(['datetime','category_lists']));
    }

    public function delete_autopost($id)
    {
        $autopost = Autopost::findOrFail($id);

        $autopost->forceDelete();

        return redirect('admin/autoposts');
    }

    public function view_editAutopost($id)
    {
        // date_default_timezone_set("Europe/London");
        $autopost = Autopost::with('post')->findOrFail($id);

        $categories = AutopostCategory::all();

        $category_lists = array();

        foreach($categories as $category)
        {
            $category_lists[$category->id] = $category->name;
        }

        $datetime = new DateTime();

        return view('admin/editAutopost', compact(['autopost', 'datetime','category_lists']));

    }

    public function post_autopost(Request $request){

        $redirect = 'admin/autoposts/new_autopost';

        $messages = [
                'post_id.required' => 'Searching for post is required',
                'social_media.required' => 'Selecting at least 1 social media is required'
            ];

        $validator = Validator::make($request->all(), [
            'description' => 'required',
            // 'social_media' => 'required',
            // 'date_posting' => 'required',
            'category' => 'required'
        ],  $messages);

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->post_id == 0 && $request->custom_image == '') 
        {
            Session::flash('custom_image', 'Please upload Image');
            return redirect($redirect)->withInput();
        }


        $autopost = new Autopost();

        $autopost->post_id = $request->post_id;
        $autopost->description = $request->description;
        // $autopost->date_posting = $request->date_posting;
        $autopost->custom_image = $request->custom_image;
        $autopost->link = $request->link;
        $autopost->video_link = $request->video_link;
        $autopost->autopost_category_id = $request->category;
        $autopost->added_to_list = 0;
        

        // foreach($request->social_media as $sc){
        //    $autopost->{$sc} = 1;         
        // }

        $autopost->save();

        return redirect('admin/autoposts');

    }


    public function post_biggestWins(Request $request){

        $redirect = 'admin/biggest_wins';

        $messages = [
                'post_id.required' => 'Searching for post is required',
                'post_id.unique' => 'Game already one of Biggest Wins',
                'total_wins.regex' => 'Total Wins must be a monetary value'
            ];

        $validator = Validator::make($request->all(), [
            'post_id' => 'required|unique:biggest_wins,post_id',
            'total_wins' => 'required|regex:/^\d*(\.\d{2})?$/|min:1'
        ],  $messages);

        $biggest_wins_count = BiggestWin::count();

        


        if ($validator->fails() || $biggest_wins_count == 4) 
        {

            if($biggest_wins_count == 4){
                    $validator->errors()->add('post_id', 'Exceed Maximum of 4 Biggest Wins');
              }

            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        $bigwin = new BiggestWin();
        $bigwin->post_id = $request->post_id;
        $bigwin->custom_image = $request->custom_image;
        $bigwin->total_wins = $request->total_wins;
        $bigwin->save();

        return redirect($redirect);

    }

    public function postEdit_biggestWins(Request $request, $id){

        $biggest_win = BiggestWin::findOrFail($id);

        $redirect = 'admin/biggest_wins/edit/'.$biggest_win->id;

        $messages = [
                'post_id.required' => 'Searching for post is required',
                'total_wins.regex' => 'Total Wins must be a monetary value'
            ];

        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
            'total_wins' => 'required|regex:/^\d*(\.\d{2})?$/|min:1'
        ],  $messages);

        if ($validator->fails())
        {

            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        $biggest_win->post_id = $request->post_id;
        $biggest_win->custom_image = $request->custom_image;
        $biggest_win->total_wins = $request->total_wins;
        $biggest_win->save();

        return redirect('admin/biggest_wins');

    }



    public function delete_biggestWins($id){

        $biggest_win = BiggestWin::findOrFail($id);

        $biggest_win->forceDelete();

        return redirect('admin/biggest_wins');

    }

    public function edit_autopost(Request $request, $id){

        $autopost = Autopost::findOrFail($id);



        $redirect = 'admin/autoposts/'.$id.'/edit';

        $messages = [
                'post_id.required' => 'Searching for post is required',
                'social_media.required' => 'Selecting at least 1 social media is required'
            ];

        $validator = Validator::make($request->all(), [
            'description' => 'required',
            // 'social_media' => 'required',
            // 'date_posting' => 'required',
            'category'  => 'required'
        ],  $messages);

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        $autopost->post_id = $request->post_id;
        $autopost->description = $request->description;
        // $autopost->date_posting = $request->date_posting;
        $autopost->custom_image = $request->custom_image;
        $autopost->link = $request->link;
        $autopost->video_link = $request->video_link;
        // $autopost->fb = 0;
        // $autopost->twitter = 0;
        // $autopost->pinterest = 0;
        // $autopost->instagram = 0;
        // $autopost->google_plus = 0;
        $autopost->autopost_category_id = $request->category;

        // foreach($request->social_media as $sc){
        //    $autopost->{$sc} = 1;         
        // }

        $autopost->save();

        return redirect('admin/autoposts');


    }

    public function adminSettings()
    {
        return view('admin.adminSettings');
    }

	public function users()
	{
		$data['users'] = User::with('user_detail')->get();


        // dd($data['users']);

        return view('admin.users',$data);
	}

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.editUser',compact('user'));
    }

    public function editUserPost(Request $request,$id)
    {
        $user = User::find($id);
        $user->banned = isset($request->banned) ? $request->banned : 0;
        $user->banned_reason = $request->banned_reason;
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect('admin/users');
    }
    /*
    *   FUNCTION FOR HOME ADDS IMAGE
    *   AUTHOR: IAN ROSALES
    *   DATE: 4-28-2016
    */
    // HOME ADS
    public function homeAds()
    {
        $home_images = HomeImage::get();
        return view('admin.homeAds',compact('home_images'));
    }

    public function insertImage(Request $request) 
    {
         $validator = Validator::make($request->all(), [
            'image' => 'required',
            'link' => 'required',
            'redirect_link' => 'required',
            'position' => 'required',
            'country_code' => 'required'
        ]);

        if ($validator->fails()) 
        {
         
            $home_images = HomeImage::get();
            return view('admin.homeAds',compact('home_images'))->withErrors($validator);
         }

        /*$result = HomeImage::find_redirect($request->link);
        if($result) {
            $validator = [
                'link' => 'Susan Link Already Exist'
            ];
            $home_images = HomeImage::get();
            return view('admin.homeAds',compact('home_images'))->withErrors($validator);
        }*/

        $data = $request->all();
        $image = HomeImage::create($data);
        $home_images = HomeImage::get();
        return view('admin.listImageAdds',compact('home_images'));
    }

    public function getAdds($id) 
    {

        $home_image = HomeImage::find($id);
        return view('admin.viewAds', compact('home_image'));
        
    }

    public function editHomeAdds(Request $request,$id)
    { 

        $redirect = '';
        if($request->redirect != null)
        {
          $redirect = $request->redirect;  
        }


        $home_image = HomeImage::find($id);

        // dd($home_image);
        return view('admin.editHomeAdd', compact('home_image', 'redirect'));
       
    }

    public function editImageAdd(Request $request, $id) 
    {

        $request = Input::get('homeadds');
        $home_image = HomeImage::findOrFail($id);
        $data = Input::all();
        $home_image->update($data);
        $home_images = HomeImage::get();
       
        if($request != null)
        {
            return redirect($request);
        }
         return view('admin.listImageAdds',compact('home_images'));
    }

    public function listImageHome()
    {
        $home_images = HomeImage::get();
        return view('admin.listImageAdds',compact('home_images'));
    }

    public function listImageHomeTrashed()
    {
        return view('admin.listImageAddTrashed');
    }

    public function deleteImageHome($id)
    {
        $request = Input::get('redirect');
        $home_image = HomeImage::find($id);
        if($home_image)
        {
            if($request != null)
            {
                $home_image->delete();
                $home_images = HomeImage::get();
                return redirect($request);
            }
            $home_image->delete();
            $home_images = HomeImage::get();
            return view('admin.listImageAdds',compact('home_images'));

        }
        else
        {
            if($request != null)
            {
                return redirect($request);
            }
            $home_images = HomeImage::get();
            return view('admin.listImageAdds',compact('home_images'));
        }
       
    }

    // END HOME ADS

    // ADD IS MOBILE FUNCTION
    public function ismobile() 
    {
        $is_mobile = Input::get('is_mobile');
        $id = Input::get('id');
        $data = [
                'id' => $id,
                'is_mobile' => $is_mobile
            ];
        $post = Post::find($id);
        $post->is_mobile = $is_mobile;
        $post->save();
        return json_encode($data);
    }

    /*R
    *   FUNCTION FOR DYNAMIC LINK
    *   AUTHOR: IAN ROSALES
    *   DATE: 4-29-2016
    */

    public function getLink()
    {
        $articles = CasinoBanner::getArticles();
        $skypsCrappers = CasinoBanner::getSkypsCrapper();
        $casinos = HomeImage::getHomeImage();

        return view('admin.dynamic_link', compact('articles', 'skypsCrappers', 'casinos'));
    }

   
   
    //POSTS
	public function posts(Request $request)
	{
        $data['post_name'] = 'Posts';

        //Get all categories
        $cat_lists = Category::get();

        $data['category_lists'] = array();
        $data['category_lists']['all'] = 'Categories';

        foreach($cat_lists as $cat_list)
        {
            $data['category_lists'][$cat_list->id] = $cat_list->name;
        }
        //END Get All Categories

        //GET ALL POSTS
        $data['posts'] = DB::table('posts')->where('posts.status','=',1);

        if($request->get('categories') != null && $request->get('categories') != 'all')
        {
           $data['posts'] = $data['posts']
                ->join('post_categories','posts.id','=','post_categories.post_id')
                ->join('categories','categories.id','=','post_categories.category_id')
                ->select('posts.id','posts.slug','posts.title','posts.created_at','categories.name','posts.is_mobile')
                ->where('categories.id',$request->get('categories'));
        }
        
        $data['posts'] = $request->get('orderby') == 'all' || $request->get('orderby') == null ? $data['posts']->orderBy('posts.created_at','DESC') : $data['posts']->orderBy('posts.title',$request->get('orderby'));
        // $date = $request->get('date') == 'all' ? 'all' : $request->get('date');

        $data['posts'] = $data['posts']->where('posts.title', 'LIKE', '%'.$request->get('q').'%');

        $data['posts'] = $data['posts']->paginate(15);
        //END Get All Posts
        
        if($request->get('categories') == 'all' || $request->get('categories') == null)
        {
            //Loop post to get its categories
            foreach ($data['posts'] as $post)
            {
                $post->categories = $this->customQuery->getPostCategories($post->id,true);
            } 
        }

		return view('admin.posts',$data);
	}

    public function drafts(Request $request)
    {
        $data['post_name'] = 'Drafts';

        if($request->get('q') != null)
        {
            $data['posts'] = Post::where('title', 'LIKE', '%'.$request->get('q').'%')->where('status','=',0)->orderBy('created_at','DESC')->paginate(15);
        }
        else
        {
            $data['posts'] = Post::where('status','=',0)->orderBy('created_at','DESC')->paginate(15); 
        }

        //Loop post to get its categories
        foreach ($data['posts'] as $post)
        {
            $post->categories = $this->customQuery->getPostCategories($post->id,true);
        }

        return view('admin.drafts',$data);
    }

    public function trash(Request $request)
    {
    	$data['post_name'] = 'Trash';

        if($request->get('q') != null)
        {
            $data['posts'] = Post::where('title', 'LIKE', '%'.$request->get('q').'%')->where('status','=',3)->orderBy('created_at','DESC')->paginate(15);
        }
        else
        {
            $data['posts'] = Post::where('status','=',3)->orderBy('created_at','DESC')->paginate(15); 
        }
        //Loop post to get its categories
        foreach ($data['posts'] as $post) 
        {
            $post->categories = $this->customQuery->getPostCategories($post->id,true);
        }

        return view('admin.trashs',$data);
    }

    public function newPost()
    {
        // $_apiurl = 'http://www.copyscape.com/api/?';
        // $apiurl = $_apiurl.'u=nbbulk2014&k=0wn4xoctsdnlcnnn&o=balance&f=html';
        // $curl=curl_init();
        // curl_setopt ($curl, CURLOPT_URL, $apiurl);
        // curl_setopt ($curl, CURLOPT_HEADER, 1);

        // curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        // curl_setopt($curl, CURLOPT_TIMEOUT,60);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // $response=curl_exec($curl);
        // curl_close($curl);
        // $ar = explode("\r\n\r\n", $response, 2);

        // $data['copyscape_balance'] = $ar[1];

        $data['categories'] = Category::orderBy('name')->get();
        return view('admin.newPost',$data);
    }

    public function editPost($id)
    {
        $data['post'] = Post::find($id);
        $data['shared_fb_status'] = false;
        $data['shared_twitter_status'] = false;

        $data['widget_rating'] = WidgetRating::where('post_id',$id)->first();

        if($data['post']->shared_fb == 1)
        {
            $data['shared_fb_status'] = true;
        }

        if($data['post']->shared_twitter == 1)
        {
            $data['shared_twitter_status'] = true;
        }

        $data['categories'] = $this->customQuery->getSelectedPostCategories($id);
        
        return view('admin.editPost',$data);
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->status = 3;
        $post->save();

        return redirect('admin/posts');
    }

	public function addPost(Request $request,$id = 0)
	{
        // dd($request->input('widget_visible'));
        // dd($request->all());
        $redirect = 'admin/new_post';  

        //check if new post or edit post
        //get redirect
        if($id != 0)
        {
            $redirect = 'admin/posts/'.$id;
        }

        //Validate input
		$validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'name' => 'required',
            'feat_image_url' => 'required',
            'introduction' => 'required',
            'category_id' => 'required',
            'publish_date_time' => 'required'
        ]);

    	if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        //check if new post or edit post
        if($id != 0)
        {
            $post = Post::find($id);
            $post->slug = $request->input('slug');
        }
        else
        {
            $post = new Post;
            $post->slug = $this->getPostSlug($request->input('title'));
            $post->user_id = Auth::user()->id;
            $post->created_at = $request->input('publish_date_time') . ":00";
        }
        
        $post->excerpt = $request->input('excerpt');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->name = $request->input('name');
        $post->introduction = $request->input('introduction');

        $post->status = $request->input('status') != null ? $request->input('status') : 0;
        // $post->status = 0;
        // $post_fb_now = false;
        // $post_twitter_now = false;

        // if($request->input('status') != null)
        // {
        //     $post->status = $request->input('status');

        //     if($request->input('shared_fb') == 1)
        //     {
        //         if($post->shared_fb == 0 || $post->shared_fb == null)
        //         {
        //             $post->shared_fb = 1;
        //             $post_fb_now = true;
        //         }
        //     }

        //     if($request->input('shared_twitter') == 1)
        //     {
        //         if($post->shared_twitter == 0 || $post->shared_twitter == null)
        //         {
        //             $post->shared_twitter = 1;
        //             $post_twitter_now = true;
        //         }
        //     }
        // }

        $post->feat_image_url = $request->input('feat_image_url') != '' ? $request->input('feat_image_url') : '';
        $post->thumb_feature_image = $request->input('thumb_feature_image') != '' ? $request->input('thumb_feature_image') : '';
        $post->icon_feature_image = $request->input('icon_feature_image') != '' ? $request->input('icon_feature_image') : '';
        $post->reels_image = $request->input('reels_image') != '' ? $request->input('reels_image') : '';
        

        // if($request->input('feat_image_url') != '')
        // {

            // $post->feat_image_url = $request->input('feat_image_url'); 
            // $feat_image_url =  $request->input('feat_image_url');
            // $check_fiu = substr($feat_image_url, 0,4);

            // if($check_fiu != 'fiu_')
            // {
            //     // open an image file
            //     $img = Image::make('uploads/'.$feat_image_url);
            //     $img2 = Image::make('uploads/'.$feat_image_url);

            //     // now you are able to resize the instance
            //     // $img->resize(753, 438);
            //     // add callback functionality to retain maximal original image size
            //     $img->fit(750, 438, function ($constraint) {
            //         $constraint->upsize();
            //     });

            //     $img2->fit(666, 428, function ($constraint) {
            //         $constraint->upsize();
            //     });

            //     // finally we save the image as a new file
            //     $img->save('uploads/fiu_'.$feat_image_url);
            //     $img2->save('uploads/tmb_'.$feat_image_url);

            //     $post->feat_image_url = 'fiu_'.$feat_image_url;
            //     $post->thumb_feature_image = 'tmb_'.$feat_image_url;
            // }
            // else
            // {
            //     $post->feat_image_url = $feat_image_url;

            //     if($post->thumb_feature_image == '')
            //     {
            //         $old_feat_image_url = substr($feat_image_url, 4);
            //         $img2 = Image::make('uploads/'.$old_feat_image_url);
            //         $img2->fit(666, 428, function ($constraint) {
            //             $constraint->upsize();
            //         });
            //         $img2->save('uploads/tmb_'.$old_feat_image_url);
            //         $post->thumb_feature_image = 'tmb_'.$old_feat_image_url;
            //     }
            // }
        // }

		$post->save();

        if($post->status == 1 && $id == 0){

            if(Auth::check()){

                $user_id = Auth::user()->id;

                if($user_id){

                    $gn = new Global_Notification();

                    $gn->user_id = $user_id;
                    $gn->type = 1;

                    $post->new_game_notification()->save($gn);

                    $gn->game = $gn->game()->first();

                    $url = url('').':8891/push_global_notification';

                    $data_string = json_encode($gn);

                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                        'Content-Type: application/json',                                                                                
                        'Content-Length: ' . strlen($data_string))                                                                       
                    );                                                                                                                   
                                                                                                                                         
                    $result = curl_exec($ch);

                }


            }
        }

        PostCategory::where('post_id','=',$post->id)->delete();

        if( count( $request->input('category_id') ) != 0 )
        {
            $data = array();

            for ($i=0; $i < count($request->input('category_id')) ; $i++) 
            { 
                $data[] = array('post_id' => $post->id,'category_id' => $request->input('category_id')[$i],'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
            }

            PostCategory::insert($data);
        }
        else
        {
            // For Uncategorized category
            $postCategories = new PostCategory;
            $postCategories->post_id = $post->id;
            $postCategories->category_id = 1;
            $postCategories->save();
        }

        //Widget rating here
        $widget_rating = WidgetRating::where('post_id',$post->id)->first();

        if($widget_rating == null)
        {
            $widget_rating = new WidgetRating;
        }

        $widget_rating->post_id = $post->id;
        // $widget_rating->image_url = $request->input('widget_image_url');
        $widget_rating->music_sounds = $request->input('music_sounds');
        $widget_rating->long_term_play = $request->input('long_term_play');
        $widget_rating->fun_rate = $request->input('fun_rate');
        $widget_rating->graphics = $request->input('graphics');
        // $widget_rating->slot_url = $request->input('slot_url');
        $widget_rating->final_verdict = $request->input('final_verdict');
        $widget_rating->enable = $request->input('widget_visible') != null ? $request->input('widget_visible') : 0;
        $widget_rating->save();
        //End widget rating


        // $get_category = $this->customQuery->getPostCategories($post->id,false);
        // $blog_url = "http://alllad.com/".$get_category->slug.'/'.$post->slug;

        // if($post_fb_now)
        // {
        //     $linkData = [
        //         "message" => $post->title,
        //         "link" => $blog_url,
        //         "picture" => 'http://alllad.com/uploads/'.$post->feat_image_url,
        //         "name" => $post->title,
        //         "caption" => "alllad.com",
        //         "description" => $post->excerpt
        //     ];
        //     $this->shared_fb($linkData);
        // }

        // if($post_twitter_now)
        // {
        //     $shorten_url = $this->google_shorten($blog_url);

        //     $twitter_message = $post->title.' '.$shorten_url;

        //     if(strlen($post->title) > 90)
        //     {
        //         $twitter_message = substr($post->title,0,90).'... '.$shorten_url;
        //     }

        //     $twitter_file = 'uploads/'.$post->feat_image_url;

        //     $uploaded_media = Twitter::uploadMedia(['media' => File::get(public_path($twitter_file))]);
        //     Twitter::postTweet(['status' => $twitter_message, 'media_ids' => $uploaded_media->media_id_string]);
        // }

        // CLEAR ALL CACHE
        Cache::forget($post->slug);
        Cache::forget('widget_ratings_'.$post->id);

        return redirect('admin/posts');
	}
    //END POSTS


    public function addChatroom(Request $request){

        $redirect = 'admin/chatroom';

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        $chatroom = new Chat_Room();
        $chatroom->name = $request->name;
        $chatroom->description = $request->description;

        $chatroom->save();


        if(Auth::check()){

            $user_id = Auth::user()->id;

             $gn = new Global_Notification();


            $gn->user_id = $user_id;
            $gn->type = 2;

            $chatroom->new_room_notification()->save($gn);

            $gn->room = $gn->room()->first();

            $url = url('').':8891/push_global_notification';

            $data_string = json_encode($gn);

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string))                                                                       
            );                                                                                                                   
                                                                                                                                 
            $result = curl_exec($ch);


        }

        return redirect($redirect);

    }

    //CATEGORIES
	public function categories()
	{
		$data['categories'] = Category::orderBy('name')->get();
		return view('admin.categories',$data);
	}

	public function addCategory(Request $request)
	{
		$messages = [
		    'name.required' => 'Category name is required',
		    'name.unique' => 'Category name is not available',
		    'name.max' => 'Category name may not be greater than 200 characters.',
		];

		$validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|max:200'
        ],$messages);

    	if ($validator->fails()) {
            return redirect('admin/categories')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->input('category_id') == '')
        {
            $category = new Category;
        }
        else
        {
            $category = Category::find($request->input('category_id'));
        }
        
        $category->name = $request->input('name');
        $category->slug = $this->getCategorySlug($request->input('name'));
        $category->save();

        return  redirect('admin/categories');
	}
    //END CATEGORIES

    //LINKS
    public function links()
    {
        $data['links'] = Link::all();
        return view('admin.links',$data);
    }

    public function newLink()
    {
        return view('admin.newLink');
    }

    public function editLink($id)
    {
        $link = Link::find($id);
        $country_codes = [];
        $countries = LinkCountry::where('links_id',$link->id)->get(['country_code']);

        foreach ($countries as $country) {
            $country_codes[] = $country->country_code;
        }

        return view('admin.editLink',compact('link','country_codes'));
    }

    public function addLink(Request $request,$id = 0)
    {
        // dd($request->all());
        $redirect = 'admin/new_link';  

        //check if new post or edit post
        //get redirect
        if($id != 0)
        {
            $redirect = 'admin/edit_link/'.$id;
        }

        $validator = Validator::make($request->all(), [
            'url' => 'required',
            'image' => 'required',
            'website_url' => 'required',
            'countries' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        //check if new post or edit post
        if($id != 0)
        {
            $link = Link::find($id);
        }
        else
        {
            $link = new Link;
        }

        $link->url = $request->input('url');
        $link->image = $request->input('image');
        $link->description = $request->input('description');
        $link->website_url = $request->input('website_url');
        $link->visible = $request->input('visible');
        $link->save();

        LinkCountry::where('links_id','=',$link->id)->delete();
        if( count( $request->input('countries') ) != 0 )
        {
            $data = array();

            for ($i=0; $i < count($request->input('countries')) ; $i++) 
            { 
                $data[] = array('links_id' => $link->id,'country_code' => $request->input('countries')[$i],'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
            }

            LinkCountry::insert($data);
        }

        return redirect('admin/links');

    }
    //END LINKS

    public function mediaGallery()
    {
        $media_files = MediaFile::orderBy('id','DESC')->paginate(20);
        return view('admin.mediaGallery',compact('media_files'));
    }
	public function mediaFiles()
	{
        $data['media_files'] = MediaFile::orderBy('id','DESC')->take(30)->get();
		return view('admin.media_file',$data);
	}

    public function media_file_upload(Request $request)
    {

        // getting all of the post data
        $file = array('file' => $request->file('file'),'item_label' => $request->input('item_label'));
        // setting up rules
        //$rules = array('file' => 'required','file' => 'mimes:jpeg,png,bmp'); //mimes:jpeg,bmp,png and for max size max:10000
        $rules = array('file' => 'required|mimes:jpeg,png,bmp,gif,mp4','item_label' => 'required'); 
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) 
        {
            // return $validator->messages();
            return Redirect::back()->withErrors($validator->messages());
        }
        else 
        {

            // checking file is valid.
            $originalName = $request->file('file')->getClientOriginalName();

            if ($request->file('file')->isValid()) 
            {
              $destinationPath = 'uploads'; // upload path
              // $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
              //$originalName = Input::file('file')->getClientOriginalName();
              $fileName = rand(11111,99999).'_'.strtolower($originalName); // renameing image
              $fileSize = $request->file('file')->getSize();

              $request->file('file')->move($destinationPath, $fileName); // uploading file to given path
              // sending back with message
              Session::flash('success', 'Upload successfully'); 

              $file['file_name'] = strtolower($fileName); 
              $file['file_size'] = $fileSize / 1024;


              $meadiFiles = new MediaFile;
              $meadiFiles->image_url = $file['file_name'];
              $meadiFiles->user_id = Auth::user()->id;
              $meadiFiles->title = $request->input('item_label');
              $meadiFiles->save();

              return redirect('admin/media_file');
            }
            else 
            {
              // return 'not successfully uploaded: '.$request->file('file')->getErrorMessage();
                return Redirect::back()->withErrors(['error', 'file not valid']);
            }
        }
    
    }

	public function comments(Request $request)
	{

        $comment_status = $request->get('comment_status');
        $comment_status2 = 3;
        $comments = '';
        
        if($comment_status == null)
        {
            $comments =
                DB::table('comments')
                ->join('users','comments.user_id','=','users.id')
                ->join('posts','comments.content_id','=','posts.id')
                ->select('users.name','comments.content','comments.created_at','comments.approved','posts.slug','posts.id')
                ->where('comments.type',3)
                // ->groupBy('posts.slug')
                ->paginate(15);
        }
        elseif($comment_status == 'pending')
        {
            $comments =
                DB::table('comments')
                ->join('users','comments.user_id','=','users.id')
                ->join('posts','comments.content_id','=','posts.id')
                ->select('users.name','comments.content','comments.created_at','comments.approved','posts.slug','posts.id')
                ->where('comments.type',3)
                ->where('approved',0)
                // ->groupBy('comments.id')
                ->paginate(15);

                $comment_status2 = 0;
        }
        elseif($comment_status == 'approved')
        {
            $comments =
                DB::table('comments')
                ->join('users','comments.user_id','=','users.id')
                ->join('posts','comments.content_id','=','posts.id')
                ->select('users.name','comments.content','comments.created_at','comments.approved','posts.slug','posts.id')
                ->where('comments.type',3)
                ->where('approved',1)
                // ->groupBy('comments.id')
                ->paginate(15);

                $comment_status2 = 1;
        }
        elseif($comment_status == 'trashed')
        {
            $comments =
                DB::table('comments')
                ->join('users','comments.user_id','=','users.id')
                ->join('posts','comments.content_id','=','posts.id')
                ->select('users.name','comments.content','comments.created_at','comments.approved','posts.slug','posts.id')
                ->where('comments.type',3)
                ->where('approved',2)
                // ->groupBy('comments.id')
                ->paginate(15);

                $comment_status2 = 2;
        }


        // dd($comments);

		return view('admin.comments',compact(['comments','comment_status2']));
	}

    //AJAX
    public function ajaxGetMediaFile()
    {
        return json_encode(MediaFile::orderBy('id','DESC')->take(30)->get());
    }

    public function ajaxDeleteImage(Request $request)
    {
        $mediaFile = MediaFile::find($request->input('image_id'));
        $image_url = $mediaFile->image_url;
        $mediaFile->delete();
        File::Delete(public_path('uploads/'.$image_url));
        
        return 'image delete';
    }
    public function ajaxUploadImage(Request $request)
    {
        // getting all of the post data
        $file = array('file' => $request->file('myfile'));
        // setting up rules
        //$rules = array('file' => 'required','file' => 'mimes:jpeg,png,bmp'); //mimes:jpeg,bmp,png and for max size max:10000
        $rules = array('file' => 'required|mimes:jpeg,png,bmp,gif,mp4'); 
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) 
        {
            // return $validator->messages();
            dd($validator->messages());
            return Redirect::back()->withErrors($validator->messages());
        }
        else 
        {

            // checking file is valid.
            $originalName = $request->file('myfile')->getClientOriginalName();

            if ($request->file('myfile')->isValid()) 
            {
              $destinationPath = 'uploads'; // upload path
              // $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
              //$originalName = Input::file('file')->getClientOriginalName();
              $fileName = rand(11111,99999).'_'.strtolower($originalName); // renameing image
              $fileSize = $request->file('myfile')->getSize();

              $request->file('myfile')->move($destinationPath, $fileName); // uploading file to given path

              $file['file_name'] = strtolower($fileName); 
              $file['file_size'] = $fileSize / 1024;


              $mediaFile = new MediaFile;
              $mediaFile->image_url = $file['file_name'];
              $mediaFile->user_id = Auth::user()->id;
              $mediaFile->title = strtolower($originalName);
              $mediaFile->save();

              return json_encode(MediaFile::find($mediaFile->id));
            }
            else 
            {
              // return 'not successfully uploaded: '.$request->file('file')->getErrorMessage();
             // return Redirect::back()->withErrors(['error', 'file not valid']);
            }
        }

    }
    //END AJAX

    //COMMON FUNCTIONS
    public function shared_fb($linkData)
    {
        
        $config = array();
        $config['app_id'] = '1477336432588187';
        $config['app_secret'] = 'c5b66416be056c880147ae77d88f1aad';
        // $config['fileUpload'] = false; // optional
         
        $fb = new Facebook($config);

        try {
          // Returns a `Facebook\FacebookResponse` object
          $response = $fb->post('/600041156765457/feed', $linkData, 'CAAUZCoTFHNZAsBAH7dKZCNBgu25ZCdBIaFfSIwlmzvMqLZBjOA64FucuoHNR7YkwKgAMZC5mJwXJWfdDZAF9lOCAQIR9MkkHK4qW3175tsv3KrvJQWO7vlkBdUFMJ93f0HZBYrIGSUo8D7kCWZBnk0f2wWIhsdvuHLLZBsuM72Q5tQa3fwCbRtJTL2eZAVoemET6dAZD');
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
    }

    //END COMMON FUNCTIONS
    //SLUGS

	public function getCategorySlug($value, $slug_check = false)
    {
        if (!$slug_check)
        {
            $slug = Str::slug($value);
        }
        else
        {
            $slug = $value;
        }
        

        if($slug == 'new')
        {
            $slug = 'new_0';
        }
   
        $slugCount = (Category::where('slug','like',$slug.'%')->count()); 

        if ($slugCount >0)
        {
            $slugCount ++;
            return  $slug.'-'.($slugCount);
        }
        else
        {
            return $slug;
        }

    }

    public function getPostSlug($value, $slug_check = false)
    {
        if (!$slug_check)
        {
            $slug = Str::slug($value);
        }
        else
        {
            $slug = $value;
        }
        

        if($slug == 'new')
        {
            $slug = 'new_0';
        }
   
        $slugCount = (Post::where('slug','like',$slug.'%')->count()); 

        if ($slugCount >0)
        {
            $slugCount ++;
            return  $slug.'-'.($slugCount);
        }
        else
        {
            return $slug;
        }
    }

    public function ajaxCheckContent(Request $request)
    {
        $_username = 'nbbulk2014';

        $_apikey = '0wn4xoctsdnlcnnn';

        $_apiurl = 'http://www.copyscape.com/api/?';

        $content = $request->input('content');

        // $content = "When in the course of human events, it becomes necessary for one people to dissolve the political bands which have connected them with another, and to assume the Powers of the earth, the separate and equal station to which the Laws of Nature and of Nature's God entitle them, a decent respect to the opinions of mankind requires that they should declare the causes which impel them to the separation.";

        $apiurl = $_apiurl.'u=nbbulk2014&k=0wn4xoctsdnlcnnn&o=csearch&e='.urlencode('UTF-8').'&c=5';

        //search by text

        $curl=curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiurl);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,urlencode($content));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response=curl_exec($curl);

        $sites = simplexml_load_string ($response);

        curl_close($curl);

        return json_encode($sites);
    }

    public function mobile_home_ads() {

        $home_images = HomeImage::get();
        $priority_list = array("1" => 1,"2" => 2,"3" => 3);
        return view('admin.mobileHomeAds',compact('home_images', 'priority_list'));
    }

     public function findMediaFiles($id) {
        $media_files =  MediaFile::find($id);
        return json_encode($media_files);
    }

    public function deleteMediaFiles($id) {
        $media_file = MediaFile::findOrFail($id);
        if(!unlink(public_path('/uploads/' . $media_file->image_url))) {

        }
        $media_file->delete();
          //delete the image
        $data = ['error' => false, 'data' => $media_file];
        return json_encode($data);
    } 


 
}
