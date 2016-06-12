<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use DB;
use Auth;
use Config;

use Stevebauman\Location\Facades\Location;

use App\Model\Post;
use App\Model\PostCategory;
use App\PluginModel\WidgetRating;
use App\Game_Experience;
use App\Model\CasinoBanner;
use App\User_Rating;

use App\Friend;

use App\CustomQuery;
use App\CommonFunctions;
use App\Model\Category;
use App\Global_Notification;
use App\HomeImage;
use App\Chat_Room;
use App\Userchat_Read;
use DateTime;

use Cache;
use Session;

class MobileController extends Controller
{

    public $data = array();
    private $customQuery;
    private $top_games_array = array();



    public function __construct(CustomQuery $customQuery,CommonFunctions $commonFunctions)
    {
        $this->customQuery = $customQuery;
        $this->commonFunctions = $commonFunctions;
        $customQuery->per_page = 30;
    }

    public function categoryImageList($num = 0)
    {
        $categories =  array(
            '<li><a href="http://susanwins.com/adventure"><img src="http://susanwins.com/images/categoryIcons/adventure.png"></a></li>',
            '<li><a href="http://susanwins.com/animal"><img src="http://susanwins.com/images/categoryIcons/animals.png "></a></li>',
            '<li><a href="http://susanwins.com/celebs"><img src="http://susanwins.com/images/categoryIcons/celebs.png"></a></li>',
            '<li><a href="http://susanwins.com/classic"><img src="http://susanwins.com/images/categoryIcons/classic.png"></a></li>',
            '<li><a href="http://susanwins.com/comic"><img src="http://susanwins.com/images/categoryIcons/comic.png "></a></li>',
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
            '<li><a href="http://susanwins.com/sports"><img src="http://susanwins.com/images/categoryIcons/sports.png "></a></li>',
            '<li><a href="http://susanwins.com/magic"><img src="http://susanwins.com/images/categoryIcons/magic.png"></a></li>',
            '<li><a href="http://susanwins.com/sexy"><img src="http://susanwins.com/images/categoryIcons/sexy.png"></a></li>',
            '<li><a href="http://susanwins.com/asian"><img src="http://susanwins.com/images/categoryIcons/asian.png"></a></li>',

            '<li><a href="http://susanwins.com/sci-fi"><img src="http://susanwins.com/images/categoryIcons/sci-fi.png"></a></li>',
            '<li><a href="http://susanwins.com/susans-favourites"><img src="http://susanwins.com/images/categoryIcons/fave.png"></a></li>',

        );


        shuffle($categories);



        return $num > 0 ? array_slice($categories, 0, $num) : $categories;
    }

    protected function getUserNotificationCount(){

        $user = Auth::user();

        $unread_friend_requests = $user->accepted_friends()->where('confirmed', 0)->where('read', 0)->count();
       $unread_user_notifications = $user->user_notifications()->where('read', 0)->count();

        return $unread_user_notifications+$unread_friend_requests;
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

    protected function getGlobalNotificationCount(){

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

    public function getNotificationCounts(){

        if(Auth::check()){

            $user = Auth::user();
            $this->data['user'] = $user;
            $this->data['random_order_number'] = count($user->unread_messages()->groupBy('from')->get());

            $this->data['chatroom_notification_count'] = $this->getChatroomNotificationCount();

            $this->data['global_notification_count'] = $this->getGlobalNotificationCount(); 
            $this->data['myFriends'] = Friend::myFriends();
        }
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


    public function home(){

        $country_code = $this->getCountryCode();
        // $country_code = 'IT';

        $this->data['posts'] = Cache::remember('mobile_get_posts', 20/60, function() {
            return DB::table('posts')
                ->select('posts.id','posts.slug','posts.reels_image','posts.thumb_feature_image')
                // ->join('post_categories','post_categories.post_id','=','posts.id')
                // ->where('post_categories.category_id',20)
                ->where('posts.status',1)
                ->orderBy(DB::raw('RAND()'))
                ->take(21)
                ->get();
        });

        $this->getNotificationCounts();
        $this->getChatrooms();

         $this->data['category_randomizer'] = $this->categoryImageList(15);
         $this->data['home_images_all'] = HomeImage::where('is_boolean', 1)->where('country_code',$country_code)->get();
         $this->data['session_id'] = Session::getId();


        $this->data['home_images_footer_ad'] = HomeImage::where('show_add', 1)->where('is_boolean', 1)->where('country_code',$country_code)->first(['image','link','id']);
       
        $this->data['home_images_footer_ad2'] = 
        HomeImage::where('show_add', 1)
            ->where('id','!=',$this->data['home_images_footer_ad']->id)
            ->where('is_boolean', 1)
            ->where('country_code',$country_code)
            ->orderBy(DB::raw('RAND()'))
            ->first(['image','link']);

         //dd($this->data);
        return view('home.homepage', $this->data);
    }


    public function getTopGamesCategory($id)
    {
        if(count($this->top_games_array) == 8)
        {
            return $this->top_games_array;
        }
        else
        {
            $new_top_games = 8 - count($this->top_games_array);
            $collection_of_top_games = DB::table('posts')
            ->join('widget_ratings','posts.id','=','widget_ratings.post_id')
            ->join('post_categories','posts.id','=','post_categories.post_id')
            ->select(DB::raw('posts.slug,posts.reels_image,posts.title,( (widget_ratings.music_sounds + widget_ratings.long_term_play + widget_ratings.fun_rate + widget_ratings.graphics) / 40 * 100  ) as total_rating'))
            ->where('posts.status',1)
            ->where('post_categories.category_id',$id)
            ->orderBy('total_rating')
            ->take($new_top_games)
            ->get();

            foreach ($collection_of_top_games as $collection_of_top_game) 
            {
               // $this->top_games_array[] = "<div class='slotwrapper'><div class='details'><a href='".url('/')."/".$collection_of_top_game->slug."'><img src='".url('uploads')."/".$collection_of_top_game->thumb_feature_image."' stlye='width: 100%;'></a></div></div>";

                // $this->top_games_array[] = "<div class='text-center'><img src='".url('/')."/".$collection_of_top_game->slug."'><img src='".url('uploads')."/".$collection_of_top_game->thumb_feature_image."'></div>";
                $this->top_games_array[] = "<div class='text-center'><img src='http://susanwins.com/uploads/".$collection_of_top_game->reels_image."'></div>";
            }

            return  $this->getTopGamesCategory($id);
        }
        
    }


    public function category($slug)
    {
        $check_slug = Category::where('slug','=',$slug)->first();

        if($check_slug == null)
        {
            $check_if_casino_ads = CasinoBanner::where('image_link','=',$slug)->first();

            if($check_if_casino_ads == null)
            {
                return $this->single(strtolower($slug));
            }

            return redirect()->away($check_if_casino_ads->mobile_redirect_link);
        }
        else
        {
             $category_images_array = 
            [
                'tropicaljungle' => 'http://susanwins.com/images/mobileHeaders/mh_40832_tropical.jpg',
                'vegas' => 'http://susanwins.com/images/mobileHeaders/mh_94591_vegas.jpg',
                'romance' => 'http://susanwins.com/images/mobileHeaders/mh_65124_romantic.jpg',
                'television' => 'http://susanwins.com/images/mobileHeaders/mh_29552_television.jpg',
                'seasonal' => 'http://susanwins.com/images/mobileHeaders/mh_78618_seasonal.jpg',
                'superheroes' => 'http://susanwins.com/images/mobileHeaders/mh_16974_superhero.jpg',
                'sorcery' => 'http://susanwins.com/images/mobileHeaders/mh_50933_sorcery.jpg',
                'sea' => 'http://susanwins.com/images/mobileHeaders/mh_72390_sea.jpg',
                'relaxingsoothing' => 'http://susanwins.com/images/mobileHeaders/mh_92030_relaxing.jpg',
                'mysterious' => 'http://susanwins.com/images/mobileHeaders/mh_99370_mysteru.jpg',
                'myths-legends' => 'http://susanwins.com/images/mobileHeaders/mh_47026_myths.jpg',
                'party' => 'http://susanwins.com/images/mobileHeaders/mh_40622_party.jpg',
                'pirates' => 'http://susanwins.com/images/mobileHeaders/mh_46528_pirate.jpg',
                'movie' => 'http://susanwins.com/images/mobileHeaders/mh_38275_movies.jpg',
                'cute' => 'http://susanwins.com/images/mobileHeaders/mh_45977_cute.jpg',
                'egyptian' => 'http://susanwins.com/images/mobileHeaders/mh_85394_egyptian.jpg',
                'fantasy' => 'http://susanwins.com/images/mobileHeaders/mh_90928_fantasy.jpg',
                'medieval' => 'http://susanwins.com/images/mobileHeaders/mh_87307_medieval.jpg',
                'animal' => 'http://susanwins.com/images/mobileHeaders/mh_38371_animal.jpg',
                'celebs' => 'http://susanwins.com/images/mobileHeaders/mh_90657_celebs.jpg',
                'classic' => 'http://susanwins.com/images/mobileHeaders/mh_69738_classic.jpg',
                'comic' => 'http://susanwins.com/images/mobileHeaders/mh_71226_comic.jpg',
                'adventure' => 'http://susanwins.com/images/mobileHeaders/mh_87246_adventure-header.jpg',
                'netent' => 'http://susanwins.com/images/mobileHeaders/mh_43121_netent.jpg',
                'playtech' => 'http://susanwins.com/images/mobileHeaders/mh_54792_playtech.jpg',
                'sexy' => 'http://susanwins.com/images/mobileHeaders/mh_89166_sexy.jpg',
                'sports' => 'http://susanwins.com/images/mobileHeaders/mh_43127_sports.jpg',
                'susans-favourites' => 'http://susanwins.com/images/mobileHeaders/mh_28378_susansfavs.jpg',
                'food' => 'http://susanwins.com/images/mobileHeaders/mh_28763_food.jpg',
                'aztec' => 'http://susanwins.com/images/mobileHeaders/mh_43690_aztec.jpg',
                'girl-power' => 'http://susanwins.com/images/mobileHeaders/mh_79948_girlpower.jpg',
                'magic' => 'http://susanwins.com/images/mobileHeaders/mh_52112_magic.jpg',
                'memory-lane' => 'http://susanwins.com/images/mobileHeaders/mh_73931_memory-lane.jpg',
                'sci-fi' => 'http://susanwins.com/images/mobileHeaders/mh_47918_scifi.jpg',
                'oldies' => 'http://susanwins.com/images/mobileHeaders/mh_36728_oldies.jpg',
                'native-american' => 'http://susanwins.com/images/mobileHeaders/mh_20643_nativeamerican.jpg',
                'microgaming' => 'http://susanwins.com/images/mobileHeaders/mh_27498_microgaming.jpg',
                'luxuryroyalty' => 'http://susanwins.com/images/mobileHeaders/mh_64831_luxury.jpg',
                'gladiators' => 'http://susanwins.com/images/mobileHeaders/mh_86764_gladiators.jpg',
                'football' => 'http://susanwins.com/images/mobileHeaders/mh_29008_football.jpg',
                'copsthiefs' => 'http://susanwins.com/images/mobileHeaders/mh_18188_cops.jpg',
                'cartoon-style' => 'http://susanwins.com/images/mobileHeaders/mh_58777_cartoon.jpg',
                'asian' => 'http://susanwins.com/images/mobileHeaders/mh_80081_asian.jpg',
                'cowboywestern' => 'http://susanwins.com/images/mobileHeaders/mh_55876_cowboy.jpg'
            ];

             // $this->data['category_randomizer'] = $this->categoryImageList();
            $this->data['category_image'] = $category_images_array[$slug];
            $this->data['query_string'] = '';
            $this->data['posts'] = 
                DB::table('posts')
                ->join('post_categories','post_categories.post_id','=','posts.id')
                ->where('post_categories.category_id',$check_slug->id)
                ->where('posts.status',1)
                ->orderBy(DB::raw('RAND()'))
                ->get();
            // $this->customQuery->getPosts(0,$check_slug->id,'','ASC');

            $this->data['current_category_id'] = $check_slug->id;
            $this->data['comment_type'] = 2;
            $this->data['content_id'] = $check_slug->id;
            $this->data['category_name'] = $check_slug->name;
            $this->data['cat_slug'] = $slug;
            $this->data['comments'] = $check_slug->category_comments()->with('user', 'category_replies')->get();

            $this->data['top_games'] = $this->getTopGamesCategory($check_slug->id);

            $this->getNotificationCounts();
            $this->getChatrooms();

            /*dd($this->data);*/
            $this->data['category_randomizer'] = $this->categoryImageList(15);
             $this->data['session_id'] = Session::getId();

            $this->data['ads_rand'] = HomeImage::where('show_add', 1)->orderBy(DB::raw('RAND()'))->where('is_boolean',1)->first(['image','link']);

            return view('home.singlepage',$this->data);

        }

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

    public function single($slug)
    {

        $this->data['post'] = Cache::remember($slug, 60, function() use ($slug){
            return Post::where('posts.slug','=',$slug)->first();  
        });

        if($this->data['post'] == null)
        {
            App::abort(404);
        }

        $post_id = $this->data['post']->id;

        $this->data['widget_ratings'] = Cache::rememberForever('widget_ratings_'.$post_id, function() use ($post_id){
            return WidgetRating::where('post_id',$post_id)->first();
        });

        $this->data['comments'] = Cache::remember('comments_'.$post_id, 15/60, function() use ($post_id){
            return Post::find($post_id)->post_comments()->with('user', 'post_replies')->get(); 
        });

        $this->data['session_id'] = Session::getId();

        $this->data['comment_type'] = 3;
        $this->data['content_id'] = $this->data['post']->id;


        $articleBannerRatio = Config::get('casino');
        $this->data['articleBannerRatio'] = $articleBannerRatio['article_banner_ratio'];

        $get_casino_category = Cache::rememberForever('get_casino_'.$post_id, function() use ($post_id){
            return PostCategory::where('post_id',$post_id)
            ->where('category_id',39)
            ->orWhere('post_id',$post_id)->where('category_id',34)
            ->orWhere('post_id',$post_id)->where('category_id',43)
            ->first(); 
        });

        $this->data['get_casino_category'] = $get_casino_category != null ? $get_casino_category->category_id : 39;
        $get_casino_category2 = $this->data['get_casino_category'];

        //GET USER COUNTRY CODE
        $country_code = $this->getCountryCode();

        //GET CASINO LIST FOR REELS AND BONUS
        $this->data['casino_lists_orig'] = Cache::remember($country_code.'_4'.$get_casino_category2, 30/60 , function() use ($country_code,$get_casino_category2){
                return DB::table('casino_preferences')
                ->join('casino_preference_lists','casino_preference_lists.casino_preference_id','=','casino_preferences.id')
                ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
                ->select('casinos.id','casinos.name','casinos.image_url','casinos.link_desktop','casinos.link_mobile','casinos.bonus_offer','casinos.reels_image','casinos.claim_image')
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
                ->select('casinos.id','casinos.name','casinos.image_url','casinos.link_desktop','casinos.link_mobile','casinos.bonus_offer','casinos.reels_image','casinos.claim_image')
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
            // $this->data['casino_lists'][] = '<a href="'.$casino_list->link_desktop.'" target="_blank"><img src="'.url('uploads').'/'.$casino_list->reels_image.'"></a>';
            // $this->data['casino_lists'][] = '<div class="slotwrapper"><div class="details"><a href="'.$casino_list->link_desktop.'" target="_blank"><img src="'.url('uploads').'/'.$casino_list->reels_image.'"></a></div></div>';
            $this->data['casino_lists2'][] = '<li> <a href="'.$casino_list->link_desktop.'" target="_blank"> <img src="http://susanwins.com/uploads/87911_casinobonusribbon.png" class="ribbon" /> <img src="'.url('uploads').'/'.$casino_list->claim_image.'" > </a> </li>';
            $this->data['casino_lists'][] = '<li> <a href="'.$casino_list->link_desktop.'" target="_blank"><img src="'.url('uploads').'/'.$casino_list->claim_image.'" ></a></li>';
        }

        $this->getNotificationCounts();
        $this->getChatrooms();

        if(isset($this->data['user']))
        {

            $user = $this->data['user'];

            $this->data['favorite'] = $user->game_experiences()->where('post_id', $this->data['post']->id)->where('type', 2)->first();
            $this->data['played_game'] = $user->game_experiences()->where('post_id', $this->data['post']->id)->where('type', 1)->first();
            $this->data['user_rating'] = $user->user_rating()->where('post_id', $this->data['post']->id)->first();
            $this->data['gameRating'] = $this->getGameRating($this->data['post']->id);
        }

        $this->data['category_randomizer'] = $this->categoryImageList(15);
        //need to modified
        $country_code = $this->getCountryCode();
        $this->data['ads_rand'] = HomeImage::where('show_add', 1)->orderBy(DB::raw('RAND()'))->where('is_boolean',1)->where('country_code',$country_code)->first(['image','link']);

        return view('home.single', $this->data);
    }
}