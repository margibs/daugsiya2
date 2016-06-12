<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

use App;
use DB;
use Auth;
use Cookie;
use Config;
use Socialite;
use Validator;
use File;
use URL;

use App\Model\Category;
use App\Model\Comments;
use App\Model\Link;
use App\Model\MediaFile;
use App\Model\Post;
use App\Model\PostCategory;
use App\Model\CasinoBanner;
use App\Model\CasinoBannerCountry;

use App\Game_Experience;
use App\User_Rating;
use App\CasinoMaskLink;

use App\PluginModel\WidgetRating;

use App\Global_Notification;
use App\Model\TrackerClick;
use App\Model\TrackerVisit;
use App\Model\Comment;

use App\BiggestWin;
use App\UserActivity;
use App\Friend;
use App\HomeImage;
use App\Chat_Room;
use App\Userchat_Read;

use DirkGroenen\Pinterest\Pinterest;
use Session;
use Cache;
use DateTime;

class PageController extends Controller
{
    private $data = array();
    private $banners_array = array();
    private $article_banners_array = array();
    private $top_games_array = array();

    //array for acctivities
    private $activities = [];

    public function __construct()
    {
        // $this->data['categories'] = 
        // Category::where('id','!=',1)
        // ->where('slug','!=','microgaming')
        // ->where('slug','!=','playtech')
        // ->where('slug','!=','netent')
        // ->where('slug','!=','luxury')
        // ->where('slug','!=','luxuryroyalty')
        // ->where('slug','!=','pirate')
        // ->where('slug','!=','aztec')
        // ->where('slug','!=','gladiators')
        // ->where('slug','!=','native-american')
        // ->where('slug','!=','football')
        // ->where('slug','!=','memory-lane')
        // ->orderBy('name')->get();
    }

    public function agentagent()
    {
        $agent  = new Agent();

        dd($agent->isTablet());
        // $useragent=$_SERVER['HTTP_USER_AGENT'];

        // return "<h1>$useragent</h1>";

        // if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))


        // if(preg_match('/android|ipad|playbook|silk/i',$useragent))
        // {
        //     echo 'Mobile tablet';
        // }
        // else
        // {
        //     echo 'DESKTOP';
        // }

    }

    public function why()
    {
        return view('home.why');
    }

    public function getCountryCode()
    {
        if(session('country_code') == null)
        {
            $location = Location::get();
            $country_code = 'GB';

            // $susan_country_included = ['AT','AU','CA','CH','CZ','DE','ES','FI','GB','IE','IT','NL','NO','NZ','PT','SE','PL','DK'];
            $susan_country_included = ['AT','AU','CA','CH','CZ','DE','ES','FI','GB','IE','IT','NL','NO','NZ','PT','SE'];

            if( in_array($location->isoCode, $susan_country_included) )
            {
                $country_code = $location->isoCode;
            }
            session(['country_code' => $country_code]);

            return $country_code;
        }

        return session('country_code');
    }

    public function home()
    {
        //Get categories
        $this->data['category_randomizer'] = $this->categoryImageList();

        $this->data['posts'] = Cache::remember('get_posts', 20/60, function() {
            return DB::table('posts')
            ->select('posts.id','posts.slug','posts.reels_image','posts.thumb_feature_image')
            // ->join('post_categories','post_categories.post_id','=','posts.id')
            // ->where('post_categories.category_id',20)
            ->where('posts.status',1)
            ->orderBy(DB::raw('RAND()'))
            ->take(40)
            ->get();   
        });

        $this->data['reel_posts'] = Cache::remember('get_reel_posts', 20/60, function() {
            return DB::table('posts')
            ->select('posts.id','posts.slug','posts.reels_image')
            ->where('status',1)
            ->orderBy(DB::raw('RAND()'))
            ->take(40)
            ->get(); 
        });

        $this->data['reel_posts_count'] = 40;

        if(Auth::check())
        {
            $user = Auth::user();
            $this->data['user'] = $user;
            $this->data['random_order_number'] = count($user->unread_messages()->groupBy('from')->get());

            $this->data['chatroom_notification_count'] = $this->getChatroomNotificationCount();
            $this->data['global_notification_count'] = $this->getGlobalNotificationCount();
            $this->data['myFriends'] = Friend::myFriends();

            $this->getUserActivities();
        }

        $this->getChatrooms();

        $this->data['session_id'] = Session::getId();

        $this->data['biggest_wins'] = Cache::remember('get_biggest_wins', 60, function() {
            return BiggestWin::with('post')->take(4)->get();
        });

        /*
        * Adding dynamic image value
        *
        */
        //GET USER COUNTRY CODE
        $country_code = $this->getCountryCode();
        // $country_code = 'GB';

        $this->data['get_home_ads'] = 
            Cache::remember('get_home_ads_desktop',15/60,function() use ($country_code){
                return HomeImage::where('show_add',1)->where('country_code',$country_code)->where('is_boolean',0)->orderBy('position','ASC')->take(2)->get();
            });
        
        // dd(Cache::get('get_home_ads_desktop'));

        $this->data['get_home_ads2'] = 
            Cache::remember('get_home_ads_desktop2',15/60,function() use ($country_code){
                //return HomeImage::where('show_add',1)->where('country_code',$country_code)->where('is_boolean',0)->orderBy('position','ASC')->offset(1*3)->take(2)->get();
                return HomeImage::where('show_add',1)->where('country_code',$country_code)->where('is_boolean',0)->orderBy(DB::raw('RAND()'))->offset(1*3)->take(3)->get();
            });

        // $headers = DB::table('home_images')
        // ->whereIn('id', [1,2])
        // ->get();
        // $this->data['home_image_headers'] = $headers;

        // $footers = DB::table('home_images')
        // ->whereIn('id', [5,6,7])
        // ->get();
        // $this->data['home_image_footers'] = $footers;

        return view('home.homepage',$this->data);
    }

        protected function getChatrooms(){

        $this->data['miniChatrooms'] = Chat_Room::all();
        if(Auth::check()){

            $user = Auth::user();

            foreach($this->data['miniChatrooms'] as $k => $ch){

                $user_read = Userchat_Read::where('user_id', $user->id)->where('chat_room_id', $ch->id)->first();

                if(!$user_read){
                    $user_read = new Userchat_Read();
                    $user_read->user_id = $user->id;
                    $user_read->chat_room_id = $ch->id;
                    $user_read->last_read = new DateTime();
                    $user_read->save();
                }

                $this->data['miniChatrooms'][$k]['unread_count'] = $ch->room_messages()->where('room_messages.user_id' , '!=', $user->id)->where('room_messages.created_at', '>', $user_read->last_read)->count();
            }
        }



        return $this->data['miniChatrooms'];
    }


    public function single($slug)
    {
        //FOR DEBUGGING
        // $begin = microtime(true);
        $this->data['post'] = Cache::rememberForever($slug, function() use ($slug){
            return Post::where('posts.slug','=',$slug)->first();  
        });

        if($this->data['post'] == null)
        {
            App::abort(404);
        }

        $post_id = $this->data['post']->id;


        $this->data['comments'] = Cache::remember('comments_'.$post_id, 15/60, function() use ($post_id){
            return Post::find($post_id)->post_comments()->with('user', 'post_replies')->get(); 
        });

        $this->data['session_id'] = Session::getId();

        if(Auth::check())
        {
            $user = Auth::user();
            $this->data['user'] = $user;
            $this->data['random_order_number'] = count($user->unread_messages()->groupBy('from')->get());
            $this->data['chatroom_notification_count'] = $this->getChatroomNotificationCount();
            $this->data['global_notification_count'] = $this->getGlobalNotificationCount(); 
            $this->data['favorite'] = Auth::user()->game_experiences()->where('post_id', $this->data['post']->id)->where('type', 2)->first();
            $this->data['played_game'] = Auth::user()->game_experiences()->where('post_id', $this->data['post']->id)->where('type', 1)->first();
            $this->data['user_rating'] = Auth::user()->user_rating()->where('post_id', $this->data['post']->id)->first();
            $this->data['gameRating'] = $this->getGameRating($this->data['post']->id);
            $this->data['myFriends'] = Friend::myFriends();
            //get user activites
            $this->getUserActivities();
        }

        $this->getChatrooms();


        $articleBannerRatio = Config::get('casino');
        $this->data['articleBannerRatio'] = $articleBannerRatio['article_banner_ratio'];
        $this->data['skyScraperBannerRatio'] = $articleBannerRatio['sky_scrapper_banner_ratio'];

        $this->data['random_sidebar_order_number'] = rand(1, 50);

        $this->data['posts_category_id'] =  Cache::remember('post_category_id_'.$post_id, 15/60 , function() use ($post_id){
            return PostCategory::where('post_id',$post_id)->orderBy(DB::raw('RAND()'))->first();
        }); 

        $this->data['widget_ratings'] = Cache::rememberForever('widget_ratings_'.$post_id, function() use ($post_id){
            return WidgetRating::where('post_id',$post_id)->first();
        });

        $get_casino_category = Cache::remember('get_casino_'.$post_id,30/60, function() use ($post_id){
            return PostCategory::where('post_id',$post_id)
            ->where('category_id',39)
            ->orWhere('post_id',$post_id)->where('category_id',34)
            ->orWhere('post_id',$post_id)->where('category_id',43)
            ->first(); 
        });
            
        $this->data['get_casino_category'] = $get_casino_category != null ? $get_casino_category->category_id : 39;
        $get_casino_category2 = $this->data['get_casino_category'];
        $this->data['comment_type'] = 3;
        $this->data['content_id'] = $this->data['post']->id;

        //GET USER COUNTRY CODE
        $country_code = $this->getCountryCode();

        //GET CASINO LIST FOR REELS AND BONUS
        $this->data['casino_lists_orig'] = Cache::remember($country_code.'_4'.$get_casino_category2, 30/60 , function() use ($country_code,$get_casino_category2){
                return DB::table('casino_preferences')
                ->join('casino_preference_lists','casino_preference_lists.casino_preference_id','=','casino_preferences.id')
                ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
                ->join('casino_mask_links','casinos.casino_mask_id','=','casino_mask_links.id')
                ->select('casinos.image_url','casino_mask_links.mask_link as link_desktop','casinos.reels_image','casinos.claim_image')
                ->where('casino_preferences.category_id',$get_casino_category2)
                ->where('casinos.country_code',$country_code)
                ->orderBy('casino_preference_lists.position','ASC')
                ->take(4)
                ->get();
        });
           
        if($this->data['casino_lists_orig'] == null)
        {
            $country_code = 'GB';
            $this->data['casino_lists_orig'] = Cache::remember($country_code.'_4'.$get_casino_category2, 30/60 , function() use ($country_code,$get_casino_category2){
                return DB::table('casino_preferences')
                ->join('casino_preference_lists','casino_preference_lists.casino_preference_id','=','casino_preferences.id')
                ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
                ->join('casino_mask_links','casinos.casino_mask_id','=','casino_mask_links.id')
                ->select('casinos.image_url','casino_mask_links.mask_link as link_desktop','casinos.reels_image','casinos.claim_image')
                ->where('casino_preferences.category_id',$get_casino_category2)
                ->where('casinos.country_code',$country_code)
                ->orderBy('casino_preference_lists.position','ASC')
                ->take(4)
                ->get();
            });


        }

        $this->data['casino_lists'] = array();
        $this->data['casino_lists2'] = array();

        foreach ($this->data['casino_lists_orig'] as $casino_list) 
        {
            $this->data['casino_lists'][] = '<a href="'.$casino_list->link_desktop.'" target="_blank" target="_blank"><img src="'.url('uploads').'/'.$casino_list->reels_image.'"></a>';
            // $this->data['casino_lists'][] = '<div class="slotwrapper"><div class="details"><a href="'.$casino_list->link_desktop.'" target="_blank"><img src="'.url('uploads').'/'.$casino_list->reels_image.'"></a></div></div>';
            $this->data['casino_lists2'][] = '<li> <a href="'.$casino_list->link_desktop.'" target="_blank"> <img src="http://susanwins.com/uploads/87911_casinobonusribbon.png" class="ribbon" /> <img src="'.url('uploads').'/'.$casino_list->claim_image.'" > </a> </li>';
        }

        $index_to_get = 0;

        if(count($this->data['casino_lists2']) != 4)
        {
            for($bb = count($this->data['casino_lists2']); $bb < 4; $bb++)
            {
                $this->data['casino_lists'][] = $this->data['casino_lists'][$index_to_get];
                $index_to_get++;
            }
        }
        //END GET CASINO LIST FOR REELS AND BONUS

        $this->data['category_randomizer'] = $this->categoryImageList();
        array_pop($this->data['category_randomizer']);

     
          $this->data['get_home_ads2'] = 
            Cache::remember('get_home_ads_desktop2',15/60,function() use ($country_code){
                return HomeImage::where('show_add',1)->where('country_code',$country_code)->where('is_boolean',0)->orderBy('position','ASC')->offset(1*3)->take(2)->get();
            });

        /*$this->data['ads_rand'] = HomeImage::where('show_add', 1)->orderBy(DB::raw('RAND()'))->where('is_boolean',0)->first(['image','link']);*/

        return view('home.single',$this->data); 
        // dd(microtime(true) - $begin);
        // return view('home.single',$this->data);
    }

    public function category($slug)
    {
        $check_slug = Cache::remember('cat_'.$slug, 60, function() use ($slug){
            return Category::where('slug','=',$slug)->first();
        });

        if($check_slug == null)
        {

            $check_if_casino_ads = Cache::remember('casino_banner_2'.$slug, 60, function() use ($slug){
                return CasinoMaskLink::where('mask_link','=',$slug)->first();  
            }); 

            if($check_if_casino_ads == null)
            {
                return $this->single(strtolower($slug));
            }

            return redirect()->away($check_if_casino_ads->desktop_redirect_link);
        }

        $category_images_array = 
        [
            'tropicaljungle' => 'http://susanwins.com/uploads/40832_tropical.png',
            'vegas' => 'http://susanwins.com/uploads/94591_vegas.png',
            'romance' => 'http://susanwins.com/uploads/65124_romantic.png',
            'television' => 'http://susanwins.com/uploads/29552_television.png',
            'seasonal' => 'http://susanwins.com/uploads/78618_seasonal.png',
            'superheroes' => 'http://susanwins.com/uploads/16974_superhero.png',
            'sorcery' => 'http://susanwins.com/uploads/50933_sorcery.png',
            'sea' => 'http://susanwins.com/uploads/72390_sea.png',
            'relaxingsoothing' => 'http://susanwins.com/uploads/92030_relaxing.png',
            'mysterious' => 'http://susanwins.com/uploads/99370_mysteru.png',
            'myths-legends' => 'http://susanwins.com/uploads/47026_myths.png',
            'party' => 'http://susanwins.com/uploads/40622_party.png',
            'pirates' => 'http://susanwins.com/uploads/46528_pirate.png',
            'movie' => 'http://susanwins.com/uploads/38275_movies.png',
            'cute' => 'http://susanwins.com/uploads/45977_cute.png',
            'egyptian' => 'http://susanwins.com/uploads/85394_egyptian.png',
            'fantasy' => 'http://susanwins.com/uploads/90928_fantasy.png',
            'medieval' => 'http://susanwins.com/uploads/87307_medieval.png',
            'animal' => 'http://susanwins.com/uploads/38371_animal.png',
            'celebs' => 'http://susanwins.com/uploads/90657_celebs.png',
            'classic' => 'http://susanwins.com/uploads/69738_classic.png',
            'comic' => 'http://susanwins.com/uploads/71226_comic.png',
            'adventure' => 'http://susanwins.com/uploads/87246_adventure-header.png',
            'netent' => 'http://susanwins.com/uploads/43121_netent.png',
            'playtech' => 'http://susanwins.com/uploads/54792_playtech.png',
            'sexy' => 'http://susanwins.com/uploads/89166_sexy.png',
            'sports' => 'http://susanwins.com/uploads/43127_sports.png',
            'susans-favourites' => 'http://susanwins.com/uploads/28378_susansfavs.png',
            'food' => 'http://susanwins.com/uploads/28763_food.png',
            'aztec' => 'http://susanwins.com/uploads/43690_aztec.png',
            'girl-power' => 'http://susanwins.com/uploads/79948_girlpower.png',
            'magic' => 'http://susanwins.com/uploads/52112_magic.png',
            'memory-lane' => 'http://susanwins.com/uploads/73931_memory-lane.png',
            'sci-fi' => 'http://susanwins.com/uploads/47918_scifi.png',
            'oldies' => 'http://susanwins.com/uploads/36728_oldies.png',
            'native-american' => 'http://susanwins.com/uploads/20643_nativeamerican.png',
            'microgaming' => 'http://susanwins.com/uploads/27498_microgaming.png',
            'luxury' => 'http://susanwins.com/uploads/64831_luxury.png',
            'gladiators' => 'http://susanwins.com/uploads/86764_gladiators.png',
            'football' => 'http://susanwins.com/uploads/29008_football.png',
            'copsthiefs' => 'http://susanwins.com/uploads/18188_cops.png',
            'cartoon-style' => 'http://susanwins.com/uploads/58777_cartoon.png',
            'asian' => 'http://susanwins.com/uploads/80081_asian.png',
            'cowboywestern' => 'http://susanwins.com/uploads/55876_cowboy.png'
        ];

        $this->data['random_sidebar_order_number'] = rand(1, 50);
        $this->data['category_randomizer'] = $this->categoryImageList();
        $this->data['category_image'] = $category_images_array[$slug];
        $this->data['current_category_id'] = $check_slug->id;
        $category_men = $check_slug->id;

        $this->data['posts'] = Cache::remember('post_per_category_'.$category_men, 15/60, function() use ($category_men){
            return DB::table('posts')
            ->join('post_categories','post_categories.post_id','=','posts.id')
            ->where('post_categories.category_id',$category_men)
            ->where('posts.status',1)
            ->orderBy(DB::raw('RAND()'))
            ->get();
        }); 

        $this->data['comment_type'] = 2;
        $this->data['content_id'] = $check_slug->id;
        $this->data['category_name'] = $check_slug->name;
        $this->data['cat_slug'] = $slug;
        $this->data['comments'] = $check_slug->category_comments()->with('user', 'category_replies')->get();

        $this->data['top_games'] = $this->getTopGamesCategory($check_slug->id);

         if(Auth::check())
         {

            $user = Auth::user();
            $this->data['user'] = $user;
            $this->data['random_order_number'] = count($user->unread_messages()->groupBy('from')->get());

            $this->data['chatroom_notification_count'] = $this->getChatroomNotificationCount();

            $this->data['global_notification_count'] = $this->getGlobalNotificationCount();

            $this->data['myFriends'] = Friend::myFriends();
            $this->getUserActivities();
        }

        $this->getChatrooms();

        $this->data['session_id'] = Session::getId();

        return view('home.singlepage',$this->data);
    }

    public function sample_location()
    {
        // '85.53.81.1' - Spain
        // '46.207.120.1' - Austria
        // '203.8.183.255' - Australia
        // '23.92.143.255' - Canada
        // CH - Switzerland
        // CZ - Czech Republic
        // DE - Germany
        // ES - Spain
        // FI - Finland
        // GB - United Kingdom
        // IE - Ireland
        // IT - Italy
        // NL - Netherlands
        // NO - Norway
        // NZ - New Zealand
        // PT - Portugal
        // SE - Sweden
        // PL - Poland
        // DK - Denmark
        $location = Location::get('23.92.143.255');
        $susan_country_included = ['AT','AU','CA','CH','CZ','DE','ES','FI','GB','IE','IT','NL','NO','NZ','PT','SE','PL','DK'];

        if( in_array($location->isoCode, $susan_country_included) )
        {
            echo 'Naa sa Array <br />';
        }
        else
        {
            echo 'Wala sa Array <br />';
        }
        echo $location->isoCode;

        // dd($location);
        // return 'Hello wordl!';
    }


    public function ajaxGetPostsforAutoPost(Request $request)
    {
        $search_posts = 
        DB::table('posts')
        ->select(DB::raw('posts.slug,posts.id'))
        ->where('posts.title', 'LIKE', '%' . $request->input('searchField') . '%')
        ->where('status',1)
        ->take(5)
        ->get();

        return json_encode($search_posts);
    }

    public function ajaxGetPostsforBiggestWins(Request $request)
    {
        $search_posts = 
        DB::table('posts')
        ->select(DB::raw('posts.slug,posts.id'))
        ->where('posts.title', 'LIKE', '%' . $request->input('searchField') . '%')
        ->whereNotExists(function($query){
             $query->select(DB::raw(1))
                      ->from('biggest_wins')
                      ->whereRaw('posts.id = biggest_wins.post_id');
        })
        ->where('status',1)
        ->take(5)
        ->get();

        
        return json_encode($search_posts);
    }

    public function ajaxGetAdsPostsInit(Request $request)
    {

        $articleBannerRatio = Config::get('casino');
        $sidebar_content =  $articleBannerRatio['sidebar_content'];
        $skyScraperBannerRatio = $articleBannerRatio['sky_scrapper_banner_ratio'];

        
        $contentOffset = $request->contentOffset;

        $maxContent = ( $skyScraperBannerRatio * floor($sidebar_content / $skyScraperBannerRatio)  ) * $contentOffset;

        $banners_to_get = floor($maxContent / $skyScraperBannerRatio);

        $skyScrapperBanner = $this->getBanners($banners_to_get,$request->input('get_casino_category'));

        $counter = 1;
        $counter2 = 0;

        $side_bar_posts = array();

        $latest_reviews = DB::table('posts')
            ->select('posts.slug','posts.feat_image_url','posts.thumb_feature_image','posts.title','posts.created_at','posts.excerpt')
            ->where('posts.status','=',1)
            // ->where('posts.id','!=',$request->input('posts_id'))
            // ->orderBy('posts.id','DESC')
            ->orderBy(DB::raw('RAND('.$request->input('random_sidebar_order_number').')'))
            ->offset($contentOffset * 20)
            ->take($maxContent)
            ->get();


        foreach ($latest_reviews as $latest_review) 
        {
            $side_bar_posts[] = "<a href='".url('')."/".$latest_review->slug."' track-action='56ddbe688790a'> <img src='".url('uploads')."/".$latest_review->thumb_feature_image."' style='display:block; height:117px;'> </a>";

            if( $counter == $skyScraperBannerRatio)
            {
                $side_bar_posts[] = $skyScrapperBanner[$counter2];
                $counter2++;
            }
            elseif(($counter % $skyScraperBannerRatio) == 0 && $counter2 < $banners_to_get)
            {
                $side_bar_posts[] = $skyScrapperBanner[$counter2];
                $counter2++;
            }

            $counter++; 
        }

        return json_encode($side_bar_posts);

    }

    public function termsAndCondition()
    {
        return view('home.terms');
    }

    public function privacyPolicy()
    {
        return view('home.policy');
    }

    // public function getBanners($banners_to_get,$get_casino_category)
    // {
    //     if(count($this->banners_array) == $banners_to_get)
    //     {
    //         return $this->banners_array;
    //     }
    //     else
    //     {
    //         $casino_id_list = $this->getCasinoIdList($get_casino_category);

    //         $new_banners_to_get = $banners_to_get - count($this->banners_array);

    //         $collection_of_banners = CasinoBanner::where('banner_type',2)->where('show_banner',1)->whereIn('casino_id',$casino_id_list)->orderBy(DB::raw('RAND()'))->take($new_banners_to_get)->get();

    //         foreach ($collection_of_banners as $collection_of_banner) 
    //         {
    //            $this->banners_array[] = "<div class='side_bar_banner'><a href='".$collection_of_banner->image_link."' track-action='56ddbe438a370' campaign-enable='true' class='get_me_skyscraper_banner' get-this-id='".$collection_of_banner->id."'><div class='questionMarkHover hint--top hint--bounce hint--rounded' data-hint='Click to know more'> ? </div><img src='".url('uploads')."/".$collection_of_banner->image_url."'></a></div>" ;
    //         }

    //         return  $this->getBanners($banners_to_get,$get_casino_category);
    //     }
    // }

    public function getBanners($banners_to_get,$get_casino_category)
    {
        $banners_array = [];
        $casino_id_list = $this->getCasinoIdList($get_casino_category);

        // $collection_of_banners = 
        //     CasinoBanner::where('banner_type',2)
        //     ->where('show_banner',1)
        //     ->whereIn('casino_id',$casino_id_list)
        //     ->orderBy(DB::raw('RAND()'))
        //     ->take($banners_to_get)->get();

        $collection_of_banners = DB::table('casino_banners')
            ->join('casino_mask_links','casino_mask_links.id','=','casino_banners.casino_mask_id')
            ->select('casino_mask_links.mask_link as image_link','casino_banners.id','casino_banners.image_url')
            ->where('casino_banners.banner_type',2)
            ->where('casino_banners.show_banner',1)
            ->whereIn('casino_banners.casino_id',$casino_id_list)
            ->orderBy(DB::raw('RAND()'))
            ->take($banners_to_get)
            ->get();


        foreach ($collection_of_banners as $collection_of_banner) 
        {
           $banners_array[] = "<div class='side_bar_banner'><a href='".$collection_of_banner->image_link."' track-action='56ddbe438a370' campaign-enable='true' class='get_me_skyscraper_banner' get-this-id='".$collection_of_banner->id."' target='_blank'><div class='questionMarkHover hint--top hint--bounce hint--rounded' data-hint='Click to know more'> ? </div><img src='".url('uploads')."/".$collection_of_banner->image_url."'></a></div>" ;
        }

        $banners_array_total = count($banners_array);

        if($banners_array_total < $banners_to_get)
        {
            $watermelon = rand(1,$banners_array_total) - 1;

            for($ee = $banners_array_total; $ee < $banners_to_get; $ee++)
            {
                $banners_array[] = $banners_array[$watermelon];
                $watermelon = rand(1,$banners_array_total) - 1;
            }
        }

        return $banners_array;
    }


    public function getCasinoIdList($get_casino_category)
    {
        //GET USER COUNTRY CODE
        $country_code = $this->getCountryCode();

        $casino_lists = 
        Cache::remember($country_code.'_'.$get_casino_category, 30/60, function() use ($country_code,$get_casino_category){
            return DB::table('casino_preferences')
                ->join('casino_preference_lists','casino_preference_lists.casino_preference_id','=','casino_preferences.id')
                ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
                ->select('casinos.id')
                ->where('casino_preferences.category_id',$get_casino_category)
                ->orderBy('casino_preference_lists.position','ASC')
                ->where('casinos.country_code',$country_code)
                ->get();
        });

        if($casino_lists == null)
        {
            $country_code = 'GB';
            $casino_lists = 
            Cache::remember($country_code.'_'.$get_casino_category, 30/60, function() use ($country_code,$get_casino_category){
                return DB::table('casino_preferences')
                    ->join('casino_preference_lists','casino_preference_lists.casino_preference_id','=','casino_preferences.id')
                    ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
                    ->select('casinos.id')
                    ->where('casino_preferences.category_id',$get_casino_category)
                    ->orderBy('casino_preference_lists.position','ASC')
                    ->where('casinos.country_code',$country_code)
                    ->get();
            });
        }

        $casino_id_list = array();
        foreach ($casino_lists as $casino_list) 
        {
           $casino_id_list[] = $casino_list->id;
        }

        return $casino_id_list;
    }

    // public function ladbrokesroulette()
    // {

    //     return 'Still transfering to alllad.com';
    //     // $clicker_daw = CasinoBannerCountry::find(9);
    //     // $clicker_daw->casino_banner_id = $clicker_daw->casino_banner_id + 1;
    //     // $clicker_daw->save();
    //     // return redirect()->away('http://online.ladbrokes.com/promoRedirect?key=ej0xMzc3MTY0NSZsPTE0MjYzMTAyJnA9NjcwMTI3&amp;amp;var4=EMNT');
    // }

    public function allGames()
    {
        $category_randomizer = $this->categoryImageList();
        $random_order_number = rand(1, 50);

        $reel_posts = Cache::remember('get_reel_posts', 20/60, function() {
            return DB::table('posts')
            ->select('posts.id','posts.slug','posts.reels_image')
            ->where('status',1)
            ->orderBy(DB::raw('RAND()'))
            ->take(40)
            ->get(); 
        });

        $reel_posts_count = 40;

        $posts = Cache::rememberForever('get_all_posts_allgames', function() {
            return Post::where('status',1)->orderBy('posts.id','ASC')->get();
        });

        $comments = Comment::where('type', 1)->where('parent', '=', 0)->with('user', 'allgames_replies')->get();

        $comment_type = 1;
        $content_id = 0;
        $user = Auth::user();

        //get user activites
        $user_activities = $this->getUserActivities();

        $myFriends = Friend::myFriends();

        return view('home.allGames',compact(['posts','random_order_number','reel_posts','reel_post_buffers','category_randomizer', 'comments','comment_type','content_id', 'user', 'user_activities', 'myFriends','reel_posts_count']));
    }

    protected function getUserNotificationCount()
    {

        $user = Auth::user();

        $unread_friend_requests = $user->accepted_friends()->where('confirmed', 0)->where('read', 0)->count();
        $unread_user_notifications = $user->user_notifications()->where('read', 0)->count();

        return $unread_user_notifications+$unread_friend_requests;
    }

    protected function getGlobalNotificationCount()
    {

        $user_id = Auth::user();

        $not_custom_notifications = Global_Notification::whereNotExists(function($query){

            $query->select('global_notification_id')
                ->from('globalnotification_reads')
                ->whereRaw('globalnotification_reads.global_notification_id = global_notifications.id');
        })->where('type', '!=', 4)->count();

        $custom_notifications = Global_Notification::where('type', 4)

        ->whereExists(function($query){

            $query->select('global_notification_id')
                    ->from('custom_notifications')
                    ->whereRaw('custom_notifications.global_notification_id = global_notifications.id AND executed = 1');

    
        })->whereNotExists(function($query){

            $query->select('global_notification_id')
                ->from('globalnotification_reads')
                ->whereRaw('globalnotification_reads.global_notification_id = global_notifications.id');
        })->count();

        return $not_custom_notifications+$custom_notifications;

    }

        protected function getChatroomNotificationCount(){

        $chatrooms = Chat_Room::all();

        $totalChatroomCount = 0;

        if(Auth::check()){

            $user = Auth::user();

            foreach($chatrooms as $k => $ch){

            $user_read = Userchat_Read::where('user_id', $user->id)->where('chat_room_id', $ch->id)->first();
                if(!$user_read){
                    $user_read = new Userchat_Read();
                    $user_read->user_id = $user->id;
                    $user_read->chat_room_id = $ch->id;
                    $user_read->last_read = new DateTime();
                    $user_read->save();
                }
                
                $totalChatroomCount += $ch->room_messages()->where('room_messages.user_id' , '!=', $user->id)->where('room_messages.created_at', '>', $user_read->last_read)->count();
            }
        }

        return $totalChatroomCount;
    }

    public function categoryImageList()
    {
        $categories =  array(
            '<li><a href="http://susanwins.com/adventure"><img src="http://susanwins.com/images/categoryIcons/adventure.png"></a></li>',
            '<li><a href="http://susanwins.com/animal"><img src="http://susanwins.com/images/categoryIcons/animals.png"></a></li>',
            '<li><a href="http://susanwins.com/celebs"><img src="http://susanwins.com/images/categoryIcons/celebs.png"></a></li>',
            '<li><a href="http://susanwins.com/classic"><img src="http://susanwins.com/images/categoryIcons/classic.png"></a></li>',
            '<li><a href="http://susanwins.com/comic"><img src="http://susanwins.com/images/categoryIcons/comic.png"></a></li>',
            '<li><a href="http://susanwins.com/cowboywestern"><img src="http://susanwins.com/images/categoryIcons/cowboy.png"></a></li>',
            '<li><a href="http://susanwins.com/cute"><img src="http://susanwins.com/images/categoryIcons/cute.png"></a></li>',
            '<li><a href="http://susanwins.com/egyptian"><img src="http://susanwins.com/images/categoryIcons/egyptian.png"></a></li>',
            '<li><a href="http://susanwins.com/fantasy"><img src="http://susanwins.com/images/categoryIcons/fantasy.png"></a></li>',
            '<li><a href="http://susanwins.com/medieval"><img src="http://susanwins.com/images/categoryIcons/medieval.png"></a></li>',
            '<li><a href="http://susanwins.com/movie"><img src="http://susanwins.com/images/categoryIcons/movies.png"></a></li>',
            '<li><a href="http://susanwins.com/mysterious"><img src="http://susanwins.com/images/categoryIcons/mystery.png"></a></li>',
            '<li><a href="http://susanwins.com/myths-legends"><img src="http://susanwins.com/images/categoryIcons/myths.png"></a></li>',
            '<li><a href="http://susanwins.com/party"><img src="http://susanwins.com/images/categoryIcons/party.png"></a></li>',
            '<li><a href="http://susanwins.com/pirates"><img src="http://susanwins.com/images/categoryIcons/pirate.png"></a></li>',
            '<li><a href="http://susanwins.com/relaxingsoothing"><img src="http://susanwins.com/images/categoryIcons/relaxing.png"></a></li>',
            '<li><a href="http://susanwins.com/romance"><img src="http://susanwins.com/images/categoryIcons/romantic.png"></a></li>',
            '<li><a href="http://susanwins.com/sea"><img src="http://susanwins.com/images/categoryIcons/sea.png"></a></li>',
            '<li><a href="http://susanwins.com/seasonal"><img src="http://susanwins.com/images/categoryIcons/seasonal.png"></a></li>',
            '<li><a href="http://susanwins.com/vegas"><img src="http://susanwins.com/images/categoryIcons/vegas.png"></a></li>',
            // '<li><a href="http://susanwins.com/sorcery"><img src="http://susanwins.com/uploads/88737_sorcery.png"></a></li>',
            '<li><a href="http://susanwins.com/superheroes"><img src="http://susanwins.com/images/categoryIcons/superhero.png"></a></li>',
            '<li><a href="http://susanwins.com/tropicaljungle"><img src="http://susanwins.com/images/categoryIcons/tropical.png"></a></li>',
            '<li><a href="http://susanwins.com/television"><img src="http://susanwins.com/images/categoryIcons/television.png"></a></li>',
            '<li><a href="http://susanwins.com/copsthiefs"><img src="http://susanwins.com/images/categoryIcons/cops.png"></a></li>',
            '<li><a href="http://susanwins.com/food"><img src="http://susanwins.com/images/categoryIcons/food.png"></a></li>',
            '<li><a href="http://susanwins.com/girl-power"><img src="http://susanwins.com/images/categoryIcons/girlpower.png"></a></li>',
            '<li><a href="http://susanwins.com/sports"><img src="http://susanwins.com/images/categoryIcons/sports.png"></a></li>',
            '<li><a href="http://susanwins.com/magic"><img src="http://susanwins.com/images/categoryIcons/magic.png"></a></li>',
            '<li><a href="http://susanwins.com/sexy"><img src="http://susanwins.com/images/categoryIcons/sexy.png"></a></li>',
            '<li><a href="http://susanwins.com/asian"><img src="http://susanwins.com/images/categoryIcons/asian.png"></a></li>',

            '<li><a href="http://susanwins.com/sci-fi"><img src="http://susanwins.com/images/categoryIcons/sci-fi.png"></a></li>',
            '<li><a href="http://susanwins.com/susans-favourites"><img src="http://susanwins.com/images/categoryIcons/fave.png"></a></li>',

        );


        shuffle($categories);

        return $categories;
    }

    protected function getGameRating($post_id)
    {
        
        $gamePlayers = User_Rating::where('post_id', $post_id)->get();

        $totalRating = 0;

        $data['totalRating'] = 0;
        $data['voters'] = 0;
        if(count($gamePlayers) > 0){

        foreach($gamePlayers as $player){
            $totalRating+= $player->rating;
        }

            $totalRating = $totalRating / count($gamePlayers);

            $data['totalRating'] = $totalRating;
            $data['voters'] = count($gamePlayers);  
        }


        return $data;
    }

    public function getUserActivities() 
    {
      /*
        *   ADDING USER ACTIVITIES
        *   AUTHOR: IAN U ROSALES
        *   DATE: 4-28-2016
        *   TYPE 3 STATIC
        *   CONTENT ID FOR PRIZE ID 
        */

    $this->data['user_activities'] = false;
        if(Auth::check()){
            $id = Auth::user()->id;
          $data = DB::table('user_activities')
                ->select(
                    'user_activities.user_id', 
                    'user_activities.id',
                    'users.id as user_id',
                    'user_activities.type',
                    'user_activities.content_id',
                    'posts.slug',
                    'posts.name as gamename',
                    'prizes.name as prizename',
                    'prizes.prize_link',
                    DB::raw('CONCAT(user_details.firstname, " ", user_details.lastname) AS full_name'),
                    'user_details.profile_picture'
                    )
                ->join('users','user_activities.user_id','=','users.id')
                ->join('friends', function($join) use ($id){
                    $join->on('friends.user_id', '=', 'user_activities.user_id')->where('friends.friend_id','=', $id)
                    ->orOn('friends.friend_id', '=', 'user_activities.user_id')->where('friends.user_id','=', $id);
                })
                ->join('user_details', function($join2) use($id){
                     $join2->on('friends.user_id', '=', 'user_details.user_id')->where('friends.friend_id','=', $id)
                       ->orOn('friends.friend_id', '=', 'user_details.user_id')->where('friends.user_id','=', $id);
                   })
                ->leftJoin('posts', function($join3){
                    $join3->on('user_activities.content_id', '=', 'posts.id')->where('user_activities.type', '<=', 2);
                })
                ->leftJoin('prizes', function($join4){
                    $join4->on('user_activities.content_id', '=', 'prizes.id')->where('user_activities.type', '=', 3);
                })
                ->take(8)
                ->get();      
       // dd($data);
       $this->data['user_activities'] = $data;

       return $this->data['user_activities'];
      // dd($data);
        }
    }

    // public function getTopGamesCategory($id)
    // {
    //     if(count($this->top_games_array) == 8)
    //     {
    //         return $this->top_games_array;
    //     }
    //     else
    //     {
    //         $new_top_games = 8 - count($this->top_games_array);

    //         $collection_of_top_games = DB::table('posts')
    //                 ->join('widget_ratings','posts.id','=','widget_ratings.post_id')
    //                 ->join('post_categories','posts.id','=','post_categories.post_id')
    //                 ->select(DB::raw('posts.slug,posts.reels_image,posts.title,( (widget_ratings.music_sounds + widget_ratings.long_term_play + widget_ratings.fun_rate + widget_ratings.graphics) / 40 * 100  ) as total_rating'))
    //                 ->where('posts.status',1)
    //                 ->where('post_categories.category_id',$id)
    //                 ->orderBy('total_rating')
    //                 ->take($new_top_games)
    //                 ->get();

    //         foreach ($collection_of_top_games as $collection_of_top_game) 
    //         {
    //             $this->top_games_array[] = "<div class='text-center'><a href='".url('/')."/".$collection_of_top_game->slug."'><img src='http://susanwins.com/uploads/".$collection_of_top_game->reels_image."'></a></div>";
    //         }

    //         return  $this->getTopGamesCategory($id);
    //     }
    // }

    public function getTopGamesCategory($id)
    {
        $top_games = [];

        $collection_of_top_games = 
            Cache::rememberForever('collection_of_top_games_'.$id,function(){
                return DB::table('posts')
                ->join('widget_ratings','posts.id','=','widget_ratings.post_id')
                ->join('post_categories','posts.id','=','post_categories.post_id')
                ->select(DB::raw('posts.slug,posts.reels_image,posts.title,( (widget_ratings.music_sounds + widget_ratings.long_term_play + widget_ratings.fun_rate + widget_ratings.graphics) / 40 * 100  ) as total_rating'))
                ->where('posts.status',1)
                ->where('post_categories.category_id',$id)
                ->orderBy('total_rating')
                ->take(8)
                ->get();
            });

        foreach ($collection_of_top_games as $collection_of_top_game) 
        {
            $top_games[] = "<div class='text-center'><a href='".url('/')."/".$collection_of_top_game->slug."'><img src='http://susanwins.com/uploads/".$collection_of_top_game->reels_image."'></a></div>";
        }

        $top_games_total = count($top_games);

        if($top_games_total < 8)
        {
            $watermelon = rand(1,$top_games_total) - 1;

            for($ee = $top_games_total; $ee < 8; $ee++)
            {
                $top_games[] = $top_games[$watermelon];
                $watermelon = rand(1,$top_games_total) - 1;
            }
        }

        return $top_games;
    }

    public function ajaxGetPosts(Request $request)
    {
        $searchField = trim($request->input('searchField'));
        $search_exploded = explode (" ", $searchField); 
        $search_posts = 
        DB::table('posts')
        ->join('widget_ratings','posts.id','=','widget_ratings.post_id')
        ->select(DB::raw('posts.slug,posts.icon_feature_image,posts.title,( (widget_ratings.music_sounds + widget_ratings.long_term_play + widget_ratings.fun_rate + widget_ratings.graphics) / 40 * 100  ) as total_rating'))
        ->where('status',1)
        ->where(function($query) use ($search_exploded,$searchField)
        {
            $x = 1;
    
            foreach($search_exploded as $search_each) 
            {
                if($x==1) {
                    $query->where('posts.name','LIKE','%' . $search_each . '%');
                } else {
                    $query->orWhere('posts.name','LIKE','%' . $search_each . '%');
                }
                $x++;
            }

            // $query->where('posts.title','LIKE','%' . $searchField . '%');
        })
        ->take(10)
        ->get();
        // $search_posts = 
        // DB::table('posts')
        // ->join('widget_ratings','posts.id','=','widget_ratings.post_id')
        // ->select(DB::raw('posts.slug,posts.icon_feature_image,posts.title,( (widget_ratings.music_sounds + widget_ratings.long_term_play + widget_ratings.fun_rate + widget_ratings.graphics) / 40 * 100  ) as total_rating'))
        // ->where('posts.title', 'LIKE', '%' . $request->input('searchField') . '%')
        // ->where('status',1)
        // ->take(10)
        // ->get();

        
        return json_encode($search_posts);
    }

    public function forDebugging()
    {
        $search = 'cherry ball crazy';
        $search_exploded = explode (" ", $search);
        
        $construct = '';
        DB::enableQueryLog();
        $search_posts = 
        DB::table('posts')
        ->join('widget_ratings','posts.id','=','widget_ratings.post_id')
        ->select(DB::raw('posts.slug,posts.icon_feature_image,posts.title,( (widget_ratings.music_sounds + widget_ratings.long_term_play + widget_ratings.fun_rate + widget_ratings.graphics) / 40 * 100  ) as total_rating'))
        // ->where('posts.title', 'LIKE', '%' . $request->input('searchField') . '%')
        ->where('status',1)
        ->where(function($query) use ($search_exploded)
        {
             // $query->where('posts.title','LIKE','%' . $search_each . '%');
            $x = 1;

            foreach($search_exploded as $search_each) 
            {
                if($search_each == '')
                {
                    continue;
                }
                if($x==1) 
                {
                    $query->where('posts.title','LIKE','%' . $search_each . '%');
                } else 
                {
                    $query->orWhere('posts.title','LIKE','%' . $search_each . '%');
                }
                $x++;
            }

            
        })
        ->take(10)
        ->get();



        $query = DB::getQueryLog();
        $lastQuery = end($query);
        print_r($lastQuery);
        dd($search_posts);
        // return 'watermelon!!';

    }


    public function ajaxGetFilterPosts(Request $request)
    {
    	//type
    	//ASC or DESC
    	//Category ID

    	$ajax_posts = array();


         $posts = DB::table('posts')
        ->join('widget_ratings','posts.id','=','widget_ratings.post_id')
        ->join('post_categories','posts.id','=','post_categories.post_id')
        ->select(DB::raw('posts.title,posts.slug,posts.thumb_feature_image,( (widget_ratings.music_sounds + widget_ratings.long_term_play + widget_ratings.fun_rate + widget_ratings.graphics) / 40 * 100  ) as total_rating'))
        ->where('posts.status',1)
        ->where('post_categories.category_id',$request->input('category_id'))
        ->orderBy($request->input('type'),$request->input('order_by'))
        ->take(30)
        ->get();


        foreach ($posts as $post) 
        {
        	$ajax_posts[] = '<div class="col-lg-8" style="height: 162px;"><div class="game"><a href="'.url('').'/'.$post->slug.'" class="icon"><img src="'.url('uploads').'/'.$post->thumb_feature_image.'"></a></div></div>';
        }
        
        return json_encode($ajax_posts);
    }

    public function ajaxGetReelsPosts(Request $request)
    {

    	$reel_posts = 
    	DB::table('posts')
    	->select('posts.id','posts.slug','posts.reels_image')
    	->where('status',1)
    	->take(4)
        ->orderBy(DB::raw('RAND('.$request->input('random_order_number').')'))
    	->offset($request->input('page') * 4)
    	->get();

    	return json_encode($reel_posts);

    }

    public function ajaxGetReelsPosts2(Request $request)
    {

        $reel_posts = 
        DB::table('posts')
        ->select('posts.id','posts.slug','posts.reels_image')
        ->where('status',1)
        ->take(3)
        ->offset($request->input('page') * 3)
        ->get();

        return json_encode($reel_posts);

    }

    public function ajaxGetReelPostsCategory(Request $request)
    {
            $reel_posts = DB::table('posts')
            ->join('widget_ratings','posts.id','=','widget_ratings.post_id')
            ->join('post_categories','posts.id','=','post_categories.post_id')
            ->select(DB::raw('posts.slug,posts.thumb_feature_image,posts.title,( (widget_ratings.music_sounds + widget_ratings.long_term_play + widget_ratings.fun_rate + widget_ratings.graphics) / 40 * 100  ) as total_rating'))
            ->where('posts.status',1)
            ->where('post_categories.category_id',$request->input('category_id'))
            ->orderBy(DB::raw('RAND()'))
            ->take(3)
            ->offset($request->input('page') * 3)
            ->get();

            return json_encode($reel_posts);
    }

    //AJAX CASINO
    public function ajaxGetCasino(Request $request)
    {
        //GET USER COUNTRY CODE
        $country_code = $this->getCountryCode();


        $casino_lists = 
            DB::table('casino_preferences')
            ->join('casino_preference_lists','casino_preference_lists.casino_preference_id','=','casino_preferences.id')
            ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
            ->join('casino_mask_links','casinos.casino_mask_id','=','casino_mask_links.id')
            ->select('casinos.id','casinos.name','casinos.image_url','casino_mask_links.mask_link as link_desktop','casinos.reels_image','casinos.claim_image')
            ->where('casino_preferences.category_id',$request->input('category_id'))
            ->where('casinos.country_code',$country_code)
            ->orderBy('casino_preference_lists.position','ASC')
            ->get();

        
        if($casino_lists == null)
        {
            $country_code = 'GB';
            $casino_lists = 
                DB::table('casino_preferences')
                ->join('casino_preference_lists','casino_preference_lists.casino_preference_id','=','casino_preferences.id')
                ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
                ->join('casino_mask_links','casinos.casino_mask_id','=','casino_mask_links.id')
                ->select('casinos.id','casinos.name','casinos.image_url','casino_mask_links.mask_link as link_desktop','casinos.reels_image','casinos.claim_image')
                ->where('casino_preferences.category_id',$request->input('category_id'))
                ->where('casinos.country_code',$country_code)
                ->orderBy('casino_preference_lists.position','ASC')
                ->get();
        }

        return json_encode($casino_lists);
    }

    public function ajaxGetArticleBanner(Request $request)
    {
        // return 'hello world!';
        $no_of_banner = 1;

        if($request->input('total_image') > $request->input('articleBannerRatio'))
        {
            $no_of_banner = floor($request->input('total_image') / $request->input('articleBannerRatio'));
        }
        

        $artcleBanner = $this->getArticleBanners($request->input('banner_type'),$no_of_banner,$request->input('get_casino_category'));

        return json_encode($artcleBanner);
    }

    // public function getArticleBanners($banner_type,$no_of_banner,$get_casino_category)
    // {

    //     if(count($this->article_banners_array) == $no_of_banner)
    //     {
    //         return $this->article_banners_array;
    //     }
    //     else
    //     {
    //         $casino_id_list = $this->getCasinoIdList($get_casino_category);

    //         $new_banners_to_get = $no_of_banner - count($this->article_banners_array);
    //         $collection_of_banners = CasinoBanner::where('banner_type',$banner_type)->where('show_banner',1)->whereIn('casino_id',$casino_id_list)->orderBy(DB::raw('RAND()'))->take($new_banners_to_get)->get();

    //         foreach ($collection_of_banners as $collection_of_banner) 
    //         {
    //            $this->article_banners_array[] = "<p><a href='".$collection_of_banner->image_link."' track-action='56ddbe3996ada' class='get_me_article_banner' get-this-id='".$collection_of_banner->id."' target='_blank'><img class='not_count' src='".url('uploads')."/" .$collection_of_banner->image_url. "' style='width:100%;'></a></p>" ;
            
    //         }

    //         return  $this->getArticleBanners($banner_type,$no_of_banner,$get_casino_category);
    //     }
    // }

    public function getArticleBanners($banner_type,$no_of_banner,$get_casino_category)
    {
        $article_banners_array = [];
        $casino_id_list = $this->getCasinoIdList($get_casino_category);

        // $collection_of_banners = 
        // CasinoBanner::where('banner_type',$banner_type)
        // ->where('show_banner',1)
        // ->whereIn('casino_id',$casino_id_list)
        // ->orderBy(DB::raw('RAND()'))
        // ->take($no_of_banner)
        // ->get();

        $collection_of_banners = 
            DB::table('casino_banners')
            ->join('casino_mask_links','casino_mask_links.id','=','casino_banners.casino_mask_id')
            ->select('casino_mask_links.mask_link as image_link','casino_banners.id','casino_banners.image_url')
            ->where('casino_banners.banner_type',$banner_type)
            ->where('casino_banners.show_banner',1)
            ->whereIn('casino_banners.casino_id',$casino_id_list)
            ->orderBy(DB::raw('RAND()'))
            ->take($no_of_banner)
            ->get();

        foreach ($collection_of_banners as $collection_of_banner) 
        {
           $article_banners_array[] = "<p><a href='".$collection_of_banner->image_link."' track-action='56ddbe3996ada' class='get_me_article_banner' get-this-id='".$collection_of_banner->id."' target='_blank'><img class='not_count' src='".url('uploads')."/" .$collection_of_banner->image_url. "' style='width:100%;'></a></p>" ;
        
        }

        $banners_array_total = count($article_banners_array);

        if($banners_array_total < $no_of_banner)
        {
            $watermelon = rand(1,$banners_array_total) - 1;

            for($ee = $banners_array_total; $ee < $no_of_banner; $ee++)
            {
                $article_banners_array[] = $article_banners_array[$watermelon];
                $watermelon = rand(1,$banners_array_total) - 1;
            }
        }

        return  $article_banners_array;
    }



    
    public function signup()
    {

        if(Auth::check()){
            return redirect('clubhouse/home');
        }

        return view('clubhouse.signup');

    }

    public function login()
    {

        if(Auth::check()){
            return redirect('clubhouse/home');
        }

        $session_id = Session::getId();

        return view('clubhouse.login', compact('session_id'));
    }
}
