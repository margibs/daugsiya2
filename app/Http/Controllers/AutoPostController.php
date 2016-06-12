<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use File;

use Facebook\Facebook;
use Thujohn\Twitter\Facades\Twitter;
use Intervention\Image\Facades\Image;
use DirkGroenen\Pinterest\Pinterest;
use App\CustomClass\Instagram\Instagram;

use App\Model\Post;
use App\Autopost;
use App\AutopostChecker;
use App\AutopostCategory;

use DateTime;
use DateTimeZone;
use Carbon\Carbon;

class AutoPostController extends Controller
{

    public function __construct()
    {
        // date_default_timezone_set("Europe/London");
    }

    public function makeAutopost()
    {
        $starting_time = "2016-05-31 18:00:00";

        $get_category = AutopostCategory::whereRaw('max_per_day != counter_per_day')->where('status',0)->orderBy(DB::raw('RAND()'))->first(['id','counter_per_day']);

        $autopost = Autopost::where('added_to_list',0)->where('autopost_category_id',$get_category->id)->orderBy('id','ASC')->first(['id']);

        if($autopost != null)
        {
            $check_autopost_checker = AutopostChecker::count();
            $date_posting = '';

            if($check_autopost_checker == 0)
            {
                $date_posting = new Carbon($starting_time);
            }
            else
            {
                $get_last_post_addedd = AutopostChecker::orderBy('date_posting','DESC')->first();
                $date_posting = new Carbon($get_last_post_addedd->date_posting);
                $date_posting->addMinutes(20);
            }

            // ADD AUTOPOST TO AUTOPOST CHECKER

                $add_autopost = new AutopostChecker();
                $add_autopost->autopost_id = $autopost->id;
                $add_autopost->fb = 1;
                $add_autopost->twitter = 1;
                $add_autopost->pinterest = 1;
                $add_autopost->instagram = 1;
                $add_autopost->autopost_executed = 0;
                $add_autopost->date_posting = $date_posting->toDateTimeString();
                $add_autopost->save();

            // END ADD AUTOPOST TO AUTOPOST CHECKER

            // UPDATE counter_per_day ADD 1
                $get_category->counter_per_day = $get_category->counter_per_day + 1;
                $get_category->status = 1;
                $get_category->save();
            // END UPDATE counter_per_day ADD 1

            // UPDATE added_to_list 1
                $autopost->added_to_list = 1;
                $autopost->save();
            // END UPDATE added_to_list 1

            // CHECK CYCLE

                $counter_per_day = 0;
                $status_counter = 0;
                $get_all_category = AutopostCategory::all();

                foreach ($get_all_category as $all_cat) 
                {
                    $counter_per_day += $all_cat->counter_per_day;
                    $status_counter += $all_cat->status;
                }

                //RESET ALL COUNTER
                if($counter_per_day == 72)
                {
                    $reset_counter = DB::table('autopost_categories')->update(array('counter_per_day' => 0));
                }

                //RESET ALL STATUS
                if($status_counter == 12)
                {
                    $reset_status = DB::table('autopost_categories')->whereRaw('max_per_day != counter_per_day')->update(array('status' => 0));
                }
            // END CHECK CYCLE
        }
    }

    // public function runFacebookPost()
    // {
    // 	$current_time = new DateTime();
    //     $autoposts = Autopost::where('date_posting','<=', $current_time)->where('autopost_executed', 0)->get();

    //     foreach($autoposts as $a)
    //     {
    //         if($a->fb == 1)
    //         {
    //             $description = $a->description;
    //             $custom_image = $a->custom_image;
    //             $image_url = "http://susanwins.com/uploads/".$a->custom_image;
    //             $link = 'http://susanwins.com';
    //             $title = '';
    //             $caption = 'susanwins.com';
    //             $twitter_image = 'uploads/'.$custom_image;
    //             $fb_image_url = '';

    //             if($a->post_id != 0)
    //             {
    //               $post = Post::find($a->post_id);
    //               $link = 'http://susanwins.com/'.$post->slug;
    //               $title = $post->title;
    //               $caption = 'susanwins.com';
    //               $image_url = "http://susanwins.com/uploads/".$post->thumb_feature_image;
    //               $fb_image_url = "http://susanwins.com/uploads/".$post->thumb_feature_image;
    //             }
    //             else
    //             {
    //                 if($a->video_link != '')
    //                 {
    //                     $link = $a->video_link;
    //                     $fb_image_url = '';
    //                 }
    //                 elseif($a->link != '')
    //                 {
    //                     $link = $a->link;

    //                     $img = Image::make($twitter_image);

    //                     $img->fit(470, 500, function ($constraint) {
    //                         $constraint->upsize();
    //                     });

    //                     $new_image_name = 'uploads/'.rand(11111,99999).'_'.$a->custom_image;

    //                     $img->save($new_image_name);

    //                     $fb_image_url = "http://susanwins.com/".$new_image_name;
    //                 }
    //             }


    //         	$a->fb = 2;
    //             $a->save();
                
    //             $linkData = [
    //                 "message" => $a->description,
    //                 "link" => $link,
    //                 "picture" => $fb_image_url,
    //                 "name" => $title,
    //                 "caption" => $caption,
    //                 "description" => $description
    //             ];

    //             $config = array();
    //             $config['app_id'] = '1124598687604895';
    //             $config['app_secret'] = '22e86ecb2f45e8ac7a8150be55770a0e';
    //             $config['default_graph_version'] = 'v2.5';
    //             // $config['fileUpload'] = false; // optional
                 
    //             $fb = new Facebook($config);
                
    //             try {
    //               // Returns a `Facebook\FacebookResponse` object
    //               //716294001804336 new alllad
    //               $response = $fb->post('/1558139581098202/feed', $linkData, 'EAAPZB0QlKIJ8BAKWXOwHmR80DtCkazPAZAltvBPCI6ughsZAZAIr9nOKhlIxCjyQ96xpPNcVPyVpbYFLlHC9RbmsCENVyZAIIEokUW5LwXXM7wgjPZATRyIN8PZA3OxJCf6L2fCfscELMJfnqd6EX7O4gmZBVW5ONcEPrPTeECTu76uT7ColGdqJ');

    //             // $response = $fb->get('/me', 'CAACEdEose0cBAGrZAyAJeuq9Y4W53qQyvNcvejexYCrQuemkgkBZB5wHl9AZAS2xNji79UgEVPHEniEBBeJ0OqvYm9DTVe10ZClxXDUx8H7sdggNCT4xVa31xm6d1ZAdbTciO50BF7jxvNRYAyldfZAFUORifVXSySrnpFubZCncrkSzbh7GzNbclPojJqARtOfjKRyvmNywQZDZD');

    //             } catch(Facebook\Exceptions\FacebookResponseException $e) {
    //               echo 'Graph returned an error: ' . $e->getMessage();
    //               exit;
    //             } catch(Facebook\Exceptions\FacebookSDKException $e) {
    //               echo 'Facebook SDK returned an error: ' . $e->getMessage();
    //               exit;
    //             }

    //             $a->fb = 3;
    //             $a->save();

    //             //RENEWING THE ACCESS TOKEN
    //             // https://graph.facebook.com/oauth/access_token?client_id=1124598687604895&client_secret=22e86ecb2f45e8ac7a8150be55770a0e&grant_type=fb_exchange_token&fb_exchange_token=EAAPZB0QlKIJ8BAKWXOwHmR80DtCkazPAZAltvBPCI6ughsZAZAIr9nOKhlIxCjyQ96xpPNcVPyVpbYFLlHC9RbmsCENVyZAIIEokUW5LwXXM7wgjPZATRyIN8PZA3OxJCf6L2fCfscELMJfnqd6EX7O4gmZBVW5ONcEPrPTeECTu76uT7ColGdqJ
    //             //END RENEWING THE ACCESS TOKEN
                
    //         }
    //     }

    // }

    public function runFacebookPost()
    {
        $current_time = new DateTime();

        $autopost = 
            DB::table('autopost_checkers')
            ->join('autoposts','autopost_checkers.autopost_id','=','autoposts.id')
            ->select('autoposts.post_id','autoposts.description','autoposts.custom_image','autoposts.link','autoposts.video_link','autopost_checkers.id as autopost_checkers_id','autopost_checkers.fb')
            ->where('autopost_checkers.date_posting','<=', $current_time)
            ->where('autopost_checkers.autopost_executed',0)
            ->first();

        if($autopost != null && $autopost->fb == 1)
        {
            $description = $autopost->description;
            $custom_image = $autopost->custom_image;
            $image_url = "http://susanwins.com/uploads/".$custom_image;
            $link = 'http://susanwins.com';
            $title = 'Susanwins';
            $caption = 'susanwins.com';
            $twitter_image = 'uploads/'.$custom_image;
            $fb_image_url = '';

            if($autopost->post_id != 0)
            {
              $post = Post::find($autopost->post_id);
              $link = 'http://susanwins.com/'.$post->slug;
              $title = $post->title;
              $caption = 'susanwins.com';
              $image_url = "http://susanwins.com/uploads/".$post->thumb_feature_image;
              $fb_image_url = "http://susanwins.com/uploads/".$post->thumb_feature_image;
            }
            else
            {
                if($autopost->video_link != '')
                {
                    $link = $autopost->video_link;
                    $fb_image_url = '';
                }
                elseif($autopost->link != '')
                {
                    $link = $autopost->link;

                    $img = Image::make($twitter_image);

                    // $img->fit(470, 500, function ($constraint) {
                    //     $constraint->upsize();
                    // });

                    $new_image_name = 'autoposter_uploads/'.rand(11111,99999).'_'.$str=preg_replace('/\s+/', '', $custom_image);

                    $img->save($new_image_name);

                    $fb_image_url = "http://susanwins.com/".$new_image_name;
                }
            }

            $autopost_checker = AutopostChecker::find($autopost->autopost_checkers_id);
            $autopost_checker->fb = 2;
            $autopost_checker->save();
            
            $linkData = [
                "message" => $description,
                "link" => $link,
                "picture" => $fb_image_url,
                "name" => $title,
                "caption" => $caption,
                "description" => $description
            ];
            
            $config = array();

            // SUSANPOSTING
            // $config['app_id'] = '1124598687604895';
            // $config['app_secret'] = '22e86ecb2f45e8ac7a8150be55770a0e';
            // $config['default_graph_version'] = 'v2.5';
            // END SUSANPOSTING

            // SUSANWINS
            $config['app_id'] = '233426580372931';
            $config['app_secret'] = '2b7ae0e4c8d498a3fe83eee3b0ad401e';
            $config['default_graph_version'] = 'v2.5';
            // END SUSANWINS

            // $config['fileUpload'] = false; // optional
             
            $fb = new Facebook($config);
            
            try {
                // Returns a `Facebook\FacebookResponse` object
                // SUSANPOSTING
                // $response = $fb->post('/1558139581098202/feed', $linkData, 'EAAPZB0QlKIJ8BANkDZB4oWdJZBPKUoXZCjVShYwUoEWo5Nqy8PuEKujUFhOVxkKHxyLWO2DmFRbqZAV7oIkZB43AT41IUT114POA4muamRCJdKTahmrrWlUaGE0VxULO6EAi3VW4xA3mkDajX4KZB3exZBjxTs2w5dJKnlQGdjp8z6AjG0q0pZCDX');
                // END SUSANPOSTING

                // SUSANWINS
                $response = $fb->post('/1558139581098202/feed', $linkData, 'EAADUTNxnfcMBAEoMrDTNVU6JFHGPXw2QpoFwXxm6ZCdWpiu2z6mBlf0GOraI0lETKTTkNyoDaVenwA46RFqEXH8B8YAXpoYta6KKO1pmlLob2H6MC6BBfDo08NEwSMr2EdwemE5Gpo6R9ZA9fWyc8OhDaP7nwq6pvQWWGHQAxXMGKNwXZCA');
                // END SUSANWINS

            } catch(Facebook\Exceptions\FacebookResponseException $e) {
              echo 'Graph returned an error: ' . $e->getMessage();
              exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
              echo 'Facebook SDK returned an error: ' . $e->getMessage();
              exit;
            }

            $autopost_checker->fb = 3;
            $autopost_checker->save();

            //RENEWING THE ACCESS TOKEN ON SUSANPOSTING
            // https://graph.facebook.com/oauth/access_token?client_id=1124598687604895&client_secret=22e86ecb2f45e8ac7a8150be55770a0e&grant_type=fb_exchange_token&fb_exchange_token=EAAPZB0QlKIJ8BANkDZB4oWdJZBPKUoXZCjVShYwUoEWo5Nqy8PuEKujUFhOVxkKHxyLWO2DmFRbqZAV7oIkZB43AT41IUT114POA4muamRCJdKTahmrrWlUaGE0VxULO6EAi3VW4xA3mkDajX4KZB3exZBjxTs2w5dJKnlQGdjp8z6AjG0q0pZCDX
            //END RENEWING THE ACCESS TOKEN

            // RENEWING THE ACCESS TOKEN ON SUSANWINS
            // https://graph.facebook.com/oauth/access_token?client_id=233426580372931&client_secret=2b7ae0e4c8d498a3fe83eee3b0ad401e&grant_type=fb_exchange_token&fb_exchange_token=EAADUTNxnfcMBAEoMrDTNVU6JFHGPXw2QpoFwXxm6ZCdWpiu2z6mBlf0GOraI0lETKTTkNyoDaVenwA46RFqEXH8B8YAXpoYta6KKO1pmlLob2H6MC6BBfDo08NEwSMr2EdwemE5Gpo6R9ZA9fWyc8OhDaP7nwq6pvQWWGHQAxXMGKNwXZCA
            // END RENEWING THE ACCESS TOKEN ON SUSANWINS
        }

    }

    // public function runTwitterPost()
    // {
    // 	$current_time = new DateTime();
    //     $autoposts = Autopost::where('date_posting','<=', $current_time)->where('autopost_executed', 0)->get();

    //     foreach($autoposts as $a)
    //     {
    //     	$description = $a->description;
    //         $link = 'http://susanwins.com';
    //         $twitter_image = 'uploads/'.$a->custom_image;

    //         if($a->post_id != 0)
    //         {
    //           $post = Post::find($a->post_id);
    //           $link = 'http://susanwins.com/'.$post->slug;
    //           $twitter_image = 'uploads/'.$post->thumb_feature_image;
    //         }
    //         else
    //         {
    //             if($a->video_link != '')
    //             {
    //                 $link = $a->video_link;
    //             }
    //             elseif($a->link != '')
    //             {
    //                 $link = $a->link;
    //             }
    //         }

    //         if($a->twitter == 1)
    //         {
    //         	$a->twitter = 2;
    //             $a->save();
    //             //For Twitter
    //             $shorten_url = $this->google_shorten($link);

    //             $twitter_message = $description.' '.$shorten_url;

    //             if(strlen($description) > 90)
    //             {
    //                 $twitter_message = substr($description,0,85).'... '.$shorten_url;
    //             }

    //             $uploaded_media = Twitter::uploadMedia(['media' => File::get(public_path($twitter_image))]);
    //             Twitter::postTweet(['status' => $twitter_message, 'media_ids' => $uploaded_media->media_id_string]);

    //             $a->twitter = 3;
    //             $a->save();
    //         }
    //     }
    // }

    public function runTwitterPost()
    {
        $current_time = new DateTime();

        $autopost = 
            DB::table('autopost_checkers')
            ->join('autoposts','autopost_checkers.autopost_id','=','autoposts.id')
            ->select('autoposts.post_id','autoposts.description','autoposts.custom_image','autoposts.link','autoposts.video_link','autopost_checkers.id as autopost_checkers_id','autopost_checkers.twitter')
            ->where('autopost_checkers.date_posting','<=', $current_time)
            ->where('autopost_checkers.autopost_executed',0)
            ->first();

        if($autopost != null && $autopost->twitter == 1)
        {
            $description = $autopost->description;
            $link = 'http://susanwins.com';
            $twitter_image = 'uploads/'.$autopost->custom_image;

            if($autopost->post_id != 0)
            {
              $post = Post::find($autopost->post_id);
              $link = 'http://susanwins.com/'.$post->slug;
              $twitter_image = 'uploads/'.$post->thumb_feature_image;
            }
            else
            {
                if($autopost->video_link != '')
                {
                    $link = $autopost->video_link;
                }
                elseif($autopost->link != '')
                {
                    $link = $autopost->link;
                }
            }

            $autopost_checker = AutopostChecker::find($autopost->autopost_checkers_id);
            $autopost_checker->twitter = 2;
            $autopost_checker->save();

            //For Twitter
            $shorten_url = $this->google_shorten($link);

            $twitter_message = $description.' '.$shorten_url;

            if(strlen($description) > 90)
            {
                $twitter_message = substr($description,0,85).'... '.$shorten_url;
            }

            $uploaded_media = Twitter::uploadMedia(['media' => File::get(public_path($twitter_image))]);
            Twitter::postTweet(['status' => $twitter_message, 'media_ids' => $uploaded_media->media_id_string]);

            $autopost_checker->twitter = 3;
            $autopost_checker->save();
        }
    }

    // public function runPinterestPost()
    // {
    // 	$current_time = new DateTime();
    //     $autoposts = Autopost::where('date_posting','<=', $current_time)->where('autopost_executed', 0)->get();

    //     foreach($autoposts as $a)
    //     {

    //     	$description = $a->description;
    //         $image_url = "http://susanwins.com/uploads/".$a->custom_image;
    //         $link = '';

    //         if($a->post_id != 0)
    //         {
    //           $post = Post::find($a->post_id);
    //           $link = 'http://susanwins.com/'.$post->slug;
    //           $image_url = "http://susanwins.com/uploads/".$post->thumb_feature_image;
    //         }
    //         else
    //         {
    //             if($a->video_link != '')
    //             {
    //                 $link = $a->video_link;
    //             }
    //             else
    //             {
    //                 $link = $a->link;
    //             }
    //         }

    //         if($a->pinterest == 1)
    //         {
    //         	$a->pinterest = 2;
    //             $a->save();

    //             $pinterest = new Pinterest('4825781658326156511', '1f898c0906ae4e99ec357c15e4e0ebb7d2a2157ddf34e8bee5d384ae1e5e5907');
    //             $pinterest->auth->setOAuthToken('AcCO6UVKm-hbFrJiQU2lpa6G_ld0FD-4GAF8KddC-J72zUArhwAAAAA');
                
    //             $pinterest->pins->create(array(
    //                 "note"   => $description,
    //                 "image_url" => $image_url,
    //                 "board"  => "susanwins_/susanwins",
    //                 "link" => $link
    //             ));

    //             $a->pinterest = 3;
    //             $a->save();
    //         }
    //     }
    // }

    public function runPinterestPost()
    {
        $current_time = new DateTime();

        $autopost = 
            DB::table('autopost_checkers')
            ->join('autoposts','autopost_checkers.autopost_id','=','autoposts.id')
            ->select('autoposts.post_id','autoposts.description','autoposts.custom_image','autoposts.link','autoposts.video_link','autopost_checkers.id as autopost_checkers_id','autopost_checkers.pinterest')
            ->where('autopost_checkers.date_posting','<=', $current_time)
            ->where('autopost_checkers.autopost_executed',0)
            ->first();

        if($autopost != null && $autopost->pinterest == 1)
        {
            $description = $autopost->description;
            $image_url = "http://susanwins.com/uploads/".$autopost->custom_image;
            $link = '';

            if($autopost->post_id != 0)
            {
              $post = Post::find($autopost->post_id);
              $link = 'http://susanwins.com/'.$post->slug;
              $image_url = "http://susanwins.com/uploads/".$post->thumb_feature_image;
            }
            else
            {
                if($autopost->video_link != '')
                {
                    $link = $autopost->video_link;
                }
                else
                {
                    $link = $autopost->link;
                }
            }

            $autopost_checker = AutopostChecker::find($autopost->autopost_checkers_id);
            $autopost_checker->pinterest = 2;
            $autopost_checker->save();

            $pinterest = new Pinterest('4825781658326156511', '1f898c0906ae4e99ec357c15e4e0ebb7d2a2157ddf34e8bee5d384ae1e5e5907');
            $pinterest->auth->setOAuthToken('AcCO6UVKm-hbFrJiQU2lpa6G_ld0FD-4GAF8KddC-J72zUArhwAAAAA');
            
            $pinterest->pins->create(array(
                "note"   => $description,
                "image_url" => $image_url,
                "board"  => "susanwins_/susanwins",
                "link" => $link
            ));

            $autopost_checker->pinterest = 3;
            $autopost_checker->save();
        }
    }

    // public function runInstagramPost()
    // {
    // 	$current_time = new DateTime();
    //     $autoposts = Autopost::where('date_posting','<=', $current_time)->where('autopost_executed', 0)->get();

    //     foreach($autoposts as $a)
    //     {

    //     	$description = $a->description;
    //         $link = '';
    //         $twitter_image = 'uploads/'.$a->custom_image;

    //         if($a->post_id != 0)
    //         {
    //           $post = Post::find($a->post_id);
    //           $link = 'http://susanwins.com/'.$post->slug;
    //           $twitter_image = 'uploads/'.$post->thumb_feature_image;
    //         }
    //         else
    //         {
    //             if($a->video_link != '')
    //             {
    //                 $link = $a->video_link;
    //                 $fb_image_url = '';
    //             }
    //             else
    //             {
    //                 $link = $a->link;
    //             }
    //         }

    //         if($a->instagram == 1)
    //         {

    //             $a->instagram = 2;
    //             $a->save();

    //             $username = 'susanwinsofficial';
    //             $password = 'Hello101!';
    //             $insta = new Instagram($username, $password,$debug = false);

    //             $img = Image::make($twitter_image);

    //             $img->fit(1080, 1080, function ($constraint) {
    //                 $constraint->upsize();
    //             });

    //             $img->save('uploads/for_instagram.jpg');

    //             $description .= ' '.$link;

    //             $insta->login();

    //             $insta->uploadPhoto(public_path('uploads/for_instagram.jpg'), $caption = $description);
                
    //             $a->instagram = 3;
    //             $a->save();
    //         }
    //     }
    // }

    public function runInstagramPost()
    {
        $current_time = new DateTime();

        $autopost = 
            DB::table('autopost_checkers')
            ->join('autoposts','autopost_checkers.autopost_id','=','autoposts.id')
            ->select('autoposts.post_id','autoposts.description','autoposts.custom_image','autoposts.link','autoposts.video_link','autopost_checkers.id as autopost_checkers_id','autopost_checkers.instagram')
            ->where('autopost_checkers.date_posting','<=', $current_time)
            ->where('autopost_checkers.autopost_executed',0)
            ->first();

        if($autopost != null && $autopost->instagram == 1)
        {
            $description = $autopost->description;
            $link = '';
            $twitter_image = 'uploads/'.$autopost->custom_image;

            if($autopost->post_id != 0)
            {
              $post = Post::find($autopost->post_id);
              $link = 'http://susanwins.com/'.$post->slug;
              $twitter_image = 'uploads/'.$post->thumb_feature_image;
            }
            else
            {
                if($autopost->video_link != '')
                {
                    $link = $autopost->video_link;
                    $fb_image_url = '';
                }
                else
                {
                    $link = $autopost->link;
                }
            }

            $autopost_checker = AutopostChecker::find($autopost->autopost_checkers_id);
            $autopost_checker->instagram = 2;
            $autopost_checker->save();

            $username = 'susanwinsofficial';
            $password = 'Hello101!';
            $insta = new Instagram($username, $password,$debug = false);

            $img = Image::make($twitter_image);

            $img->fit(1080, 1080, function ($constraint) {
                $constraint->upsize();
            });

            $img->save('uploads/for_instagram.jpg');

            $description .= ' '.$link;

            $insta->login();

            $insta->uploadPhoto(public_path('uploads/for_instagram.jpg'), $caption = $description);
            
            $autopost_checker->instagram = 3;
            $autopost_checker->save();
        }
    }

    public function checkExecute()
    {
    	$current_time = new DateTime();
        $autoposts = AutopostChecker::where('date_posting','<=', $current_time)->where('autopost_executed', 0)->get();

        foreach($autoposts as $a)
        {
        	if($a->fb > 1 && $a->twitter > 1 && $a->pinterest > 1 && $a->instagram > 1)
        	{
        		$a->autopost_executed = 1;
            	$a->save();
        	}
        }

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
}
