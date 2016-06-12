<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use Config;
use File;
use DB;


use App\Model\Casino;
use App\Model\Category;
use App\Model\CasinoCategory;
use App\Model\CasinoPreference;
use App\Model\CasinoPreferenceList;
use App\Model\CasinoBanner;
use App\Model\CasinoBannerCountry;

use App\CasinoMaskLink;

use App\Chat_Room;
use App\Userchat_Read;
use DateTime;
use Illuminate\Support\Facades\Auth as Auth;
use App\User;

class CasinoController extends Controller
{
    public function casino()
    {
    	$casinos = Casino::orderBy('name','ASC')->get();

    	return view('casino.casino',compact('casinos'));
    }

    
    public function chatroom($chatname = null)
    {

         if(Auth::check()){

            $user = User::with('user_detail')->find(Auth::user()->id);
            $chatrooms = Chat_Room::with('room_messages')->get();

            $selectedRoom = false;

                if($chatrooms && count($chatrooms) > 0){
                    $selectedRoom = $chatrooms[0];

                        if($chatname){

                            foreach($chatrooms as $chatroom){

                                if($chatroom->name == $chatname){
                                    $selectedRoom = $chatroom;
                                    
                                    break;
                                }
                            }

                        }

                    $user_read = Userchat_Read::firstOrCreate([ 'user_id' => $user->id, 'chat_room_id' => $selectedRoom->id ]);
                    $user_read->last_read = new DateTime();
                    $user_read->save();
                    }

        $selectedRoom->room_messages = $selectedRoom->room_messages()->take(10)->orderBy('created_at','DESC')->get()->reverse();
            return view('casino.chatroom', compact('chatrooms', 'user', 'selectedRoom'));
    
        }

    }

    // MASK LINK
    public function maskLink()
    {
        $maskLinks = CasinoMaskLink::orderBy('mask_link','ASC')->get();
        return view('casino.maskLink',compact('maskLinks'));
    }

    public function newMaskLink()
    {
        return view('casino.newMaskLink');
    }

    public function editMaskLink($id)
    {
        $maskLink = CasinoMaskLink::find($id);
        return view('casino.editMaskLink',compact('maskLink'));
    }

    public function addMaskLink(Request $request,$id = 0)
    {
        $redirect = 'admin/casino/new-mask-link';  
        //check if new casino or edit casino
        //get redirect
        if($id != 0)
        {
            $redirect = 'admin/casino/mask-link/edit/'.$id;
        }

        $validate_rules = [
            'mask_link' => 'required',
            'desktop_redirect_link' => 'required',
            // 'mobile_redirect_link' => 'required',
            // 'type' => 'required'
        ];

        //Validate input
        $validator = Validator::make($request->all(), $validate_rules );

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

                //check if new post or edit post
        if($id != 0)
        {
            $casino_mask = CasinoMaskLink::find($id);
        }
        else
        {
            $casino_mask = new CasinoMaskLink;
        }

        $casino_mask->mask_link = $request->input('mask_link');
        $casino_mask->desktop_redirect_link = $request->input('desktop_redirect_link');
        // $casino_mask->mobile_redirect_link = $request->input('mobile_redirect_link');
        // $casino_mask->type = $request->input('type');
        $casino_mask->save();

        return redirect('admin/casino/mask-link');
    }

    // END MASK LINK

    public function newCasino()
    {
        $maskLinkArray = $this->getMaskLinks();
    	return view('casino.newCasino',compact('maskLinkArray'));
    }

    public function getMaskLinks()
    {
        $maskLinks = CasinoMaskLink::orderBy('mask_link','ASC')->get();
        $maskLinkArray = [];
        $maskLinkArray[0] = "SELECT MASK LINK";

        foreach ($maskLinks as $maskLink) 
        {
           $maskLinkArray[$maskLink->id] = $maskLink->mask_link;
        }

        return $maskLinkArray;
    }

    public function editCasino($id)
    {
    	$casino = Casino::find($id);
        $play_tech = '';
        $microgaming = '';
        $netent = '';

        $maskLinkArray = $this->getMaskLinks();

        $casino_categories = CasinoCategory::where('casino_id',$id)->get();

         $priority_list = array("1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5);

        foreach ($casino_categories as $casino_category) 
        {
            if($casino_category->category_id == 34)
            {
              $microgaming = 'checked';  
            }

            if($casino_category->category_id == 39)
            {
              $play_tech = 'checked';  
            }

            if($casino_category->category_id == 43)
            {
              $netent = 'checked';  
            }
        }

    	return view('casino.editCasino',compact(['casino','play_tech','microgaming','netent', 'priority_list','maskLinkArray']));
    }

    public function addCasino(Request $request,$id = 0)
    {

    	$redirect = 'admin/new_casino';  
    	//check if new casino or edit casino
        //get redirect
        if($id != 0)
        {
            $redirect = 'admin/casino/'.$id;
        }

        $validate_rules = [
            'name' => 'required',
            'image_url' => 'required',
            'reels_image' => 'required',
            'claim_image' => 'required',
            // 'link_desktop' => 'required',
            // 'link_mobile' => 'required',
            // 'bonus_offer' => 'required',
            'category_id' => 'required',
            'country'   => 'required',
            'casino_mask_id'   => 'required',
            // 'mask_link'   => 'required',
        ];

        //Validate input
		$validator = Validator::make($request->all(), $validate_rules );

    	if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

                //check if new post or edit post
        if($id != 0)
        {
            $casino = Casino::find($id);
        }
        else
        {
            $casino = new Casino;
        }

        $casino->name = $request->input('name');
        // $casino->link_desktop = $request->input('link_desktop');
        // $casino->link_mobile = $request->input('link_mobile');
        // $casino->bonus_offer = $request->input('bonus_offer');
        $casino->image_url = $request->input('image_url');
        $casino->reels_image = $request->input('reels_image');
        $casino->claim_image = $request->input('claim_image');
        $casino->country_code = $request->input('country');
        $casino->casino_mask_id = $request->input('casino_mask_id');
        // $casino->mask_link = $request->input('mask_link');
        $casino->save();

        if( count( $request->input('category_id') ) != 0 )
        {
            CasinoCategory::where('casino_id','=',$casino->id)->delete();
            $data = array();

            for ($i=0; $i < count($request->input('category_id')) ; $i++) 
            { 
                $data[] = array('casino_id' => $casino->id,'category_id' => $request->input('category_id')[$i],'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
            }

            CasinoCategory::insert($data);
        }

        return redirect('admin/casino');
    }

     public function addCasinoBanner(Request $request,$id = 0){

        $casino = Casino::findOrFail($id);

        if($casino){

          $redirect = 'admin/casino/'.$id;

                $validate_rules = [
                    'image_url' => 'required',
                    'banner_type' => 'required',
                    'image_link' => 'required',
                ];

        $validator = Validator::make($request->all(), $validate_rules );

        if ($validator->fails()) 
            {
                return redirect($redirect)
                            ->withErrors($validator)
                            ->withInput();
            }

           $casinoBanner = new CasinoBanner();

            $casinoBanner->image_link = $request->input('image_link');
            $casinoBanner->banner_type = $request->input('banner_type');
            $casinoBanner->show_banner = 0 ;
            $casinoBanner->image_url = $request->input('image_url');
            $casinoBanner->priority = 5;

            $casino->casino_banners()->save($casinoBanner);

            return redirect($redirect);

        }else{

            abort(404);
        }

        

    }

    public function casinoPreference()
    {
    	$categories = Category::all();
    	$casinoPreferences = 
    	DB::table('casino_preferences')
    	->join('categories','casino_preferences.category_id','=','categories.id')
    	->select('categories.name','casino_preferences.number_to_show','casino_preferences.id')
    	->get();
    	return view('casino.casinoPreference',compact(['categories','casinoPreferences']));
    }

    public function addCasinoPreference(Request $request,$id = 0)
    {
    	$redirect = 'admin/casino_preference';  

        if($id != 0)
        {
        	$redirect = 'admin/casino_preference/'.$id;
            $casinoPreference = CasinoPreference::find($id);
            $casinoPreference->number_to_show = $request->input('number_to_show');
        }
        else
        {
            $casinoPreference = new CasinoPreference;
            $casinoPreference->category_id = $request->input('category_id');
        }

        $casinoPreference->yt_image_url = $request->input('image_url');
        $casinoPreference->yt_image_link = $request->input('yt_image_link');
        
        $casinoPreference->save();

        return redirect($redirect);
    }

    public function editCasinoPreference($id)
    {
    	$casinoPreference = 
    	DB::table('casino_preferences')
    	->join('categories','casino_preferences.category_id','=','categories.id')
    	->select('categories.name','casino_preferences.number_to_show','casino_preferences.id','casino_preferences.yt_image_url','casino_preferences.category_id','casino_preferences.yt_image_link')
    	->where('casino_preferences.id',$id)
    	->first();

        $select_casinos = array();
        $find_casinos = 
        DB::table('casinos')
        ->join('casino_categories','casino_categories.casino_id','=','casinos.id')
        ->where('casino_categories.category_id',$casinoPreference->category_id)
        ->select('casinos.id','casinos.name')
        ->get();

        foreach($find_casinos as $find_casino)
        {
            $select_casinos[$find_casino->id] = $find_casino->name;
        }

    	$casinoPreferenceLists = 
    	DB::table('casino_preference_lists')
    	->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
    	->where('casino_preference_lists.casino_preference_id',$casinoPreference->id)
        ->select('casinos.name','casino_preference_lists.id','casino_preference_lists.casino_id')
        ->orderBy('casino_preference_lists.position')
    	->get();

    	return view('casino.editCasinoPreference',compact(['casinoPreference','casinoPreferenceLists','select_casinos']));
    }

    public function savePriority(Request $request)
    {
        $casino_banners = CasinoBanner::find($request->input('id'));
        $casino_banners->priority = $request->input('priority');
        $casino_banners->save();

        return 'save!';

    }

    public function saveSort(Request $request)
    {
        CasinoPreferenceList::where('casino_preference_id',$request->input('casino_preference_id'))->delete();
        $position = 1;

        for ($i=0; $i < count($request->input('array')) ; $i++) 
        {
            
            if($request->input('array')[$i] != '')
            {
                $data[] = array('casino_preference_id' => $request->input('casino_preference_id'),'casino_id' => $request->input('array')[$i],'position' => $position,'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
                $position++;
            }

        }

        CasinoPreferenceList::insert($data);

        return json_encode($data);
    }

    public function saveCasinoPreferencesList(Request $request)
    {
        $already_added = CasinoPreferenceList::where('casino_id',$request->input('casino_id'))->where('casino_preference_id',$request->input('casino_preference_id'))->first();

        if($already_added == null)
        {
            $casino_preferences_list = new CasinoPreferenceList;
            $casino_preferences_list->casino_id = $request->input('casino_id');
            $casino_preferences_list->casino_preference_id = $request->input('casino_preference_id');

            if(CasinoPreferenceList::where('casino_preference_id',$request->input('casino_preference_id'))->count() == 0)
            {
                $casino_preferences_list->position = 1;
            }
            else
            {
                $get_max_position = 
                DB::table('casino_preference_lists')
                ->where('casino_preference_id',$request->input('casino_preference_id'))
                ->max('position');

                $casino_preferences_list->position = $get_max_position + 1;
            }

            $casino_preferences_list->save();
             // Casino::find($request->input('casino_id'));
            $get_casino_profile =
        DB::table('casino_preference_lists')
        ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
        ->where('casinos.id',$request->input('casino_id'))
        ->select('casinos.name','casino_preference_lists.id','casino_preference_lists.casino_id')
        ->first();

            return json_encode($get_casino_profile);
        }

        return 'already added';
    }

    //Article Banner
    public function articleBanner()
    {
        $articleBannerRatio = Config::get('casino');
        $articleBannerRatio = $articleBannerRatio['article_banner_ratio'];
        $articleBanners = CasinoBanner::where('banner_type',1)->get();
        $priority_list = array("1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5);
        return view('casino.articleBanner',compact(['articleBanners','articleBannerRatio','priority_list']));
    }

    public function articleBannerOption(Request $request)
    {
        
        $array = Config::get('casino');

        $array['article_banner_ratio'] = $request->input('banner_ratio');

        $data = var_export($array, 1);

        $bytes_written = File::put(app_path('../config/casino.php') , "<?php\n return $data ;");

        if($bytes_written != false)
        {
            return redirect('admin/article_banner');
        }

    }

    public function newArticleBanner()
    {
        $casinos = $this->getCasinosArray();
        $maskLinkArray = $this->getMaskLinks();

        $priority_list = array("1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5);
        
        return view('casino.newArticleBanner',compact('priority_list', 'casinos','maskLinkArray'));
    }

    public function getCasinosArray()
    {
        $casinos = Casino::orderBy('name','ASC')->get();
        $casinoArray = [];
        $casinoArray[0] = "SELECT CASINO";
        foreach ($casinos as $casino) 
        {
            $casinoArray[$casino->id] = $casino->name;
        }
        

        return $casinoArray;
    }

    public function editArticleBanner(Request $request, $id)
    {
        $redirect = '';
        if($request->redirect != null)
        {
          $redirect = $request->redirect;  
        }

        $casinos = $this->getCasinosArray();
        $maskLinkArray = $this->getMaskLinks();
        
        $articleBanner = CasinoBanner::find($id);
        // $country_codes = [];
        $priority_list = array("1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5);


        // $countries = CasinoBannerCountry::where('casino_banner_id',$articleBanner->id)->get(['country_code']);
        // foreach ($countries as $country) {
        //     $country_codes[] = $country->country_code;
        // }

        return view('casino.editArticleBanner',compact(['articleBanner','priority_list', 'casinos','redirect','maskLinkArray']));
    }

    public function addArticleBanner(Request $request,$id = 0)
    {
        $redirect = 'admin/new_article_banner';

        //check if new casino or edit casino
        //get redirect
        if($id != 0)
        {
            $redirect = 'admin/article_banner/'.$id;
        }

        $validate_rules = [
            // 'image_link' => 'required',
            'image_url' => 'required',
            // 'countries' => 'required',
            // 'mobile_redirect_link' => 'required',
            // 'redirect_link' => 'required',
            'casino_id' => 'required',
            'casino_mask_id' => 'required'
        ];

        //Validate input
        $validator = Validator::make($request->all(), $validate_rules );

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        // if($id == 0 )
        // {
        //     $image_link = CasinoBanner::searchImageLink($request->input('image_link'));
        //     if($image_link) {

        //          $validate_rules = [
        //         'image_link' => 'Image Link Already Exist'
        //     ];
                
        //          return redirect($redirect)
        //                     ->withErrors($validate_rules)
        //                     ->withInput();
        //     }
        // }

                //check if new post or edit post
        if($id != 0)
        {
            $casinoBanner = CasinoBanner::find($id);
        }
        else
        {
            $casinoBanner = new CasinoBanner;
        }

        // $casinoBanner->image_link = $request->input('image_link');
        $casinoBanner->banner_type = $request->input('banner_type');
        $casinoBanner->show_banner = $request->input('show_banner') ? $request->input('show_banner') : 0 ;
        $casinoBanner->image_url = $request->input('image_url');
        $casinoBanner->priority = $request->input('priority');
        $casinoBanner->casino_id = $request->input('casino_id');
        $casinoBanner->casino_mask_id = $request->input('casino_mask_id');
        
        //ADD COLUMN REDIRECT LINK
        // $casinoBanner->redirect_link = $request->input('redirect_link');
        // $casinoBanner->mobile_redirect_link = $request->input('mobile_redirect_link');
        
        $casinoBanner->save();

        // CasinoBannerCountry::where('casino_banner_id','=',$casinoBanner->id)->delete();
        // if( count( $request->input('countries') ) != 0 )
        // {
        //     $data = array();
        //     for ($i=0; $i < count($request->input('countries')) ; $i++) 
        //     { 
        //         $data[] = array('casino_banner_id' => $casinoBanner->id,'country_code' => $request->input('countries')[$i],'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
        //     }
        //     CasinoBannerCountry::insert($data);
        // }

        if($request->article != null)
        {
            return redirect($request->article);
        }

        return redirect('admin/article_banner');

    }
    /*
    *   FUNCTION FOR DYNAMIC PAGE
    *   AUTHOR: IAN ROSALES
    *   DATE: 5-2-2016
    **/
    public function dynamicEditArticleBanner($id)
    {
        $articleBanner = CasinoBanner::find($id);
        $country_codes = [];
        $priority_list = array("1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5);

        $casinos = Casino::all();

        $countries = CasinoBannerCountry::where('casino_banner_id',$articleBanner->id)->get(['country_code']);
        foreach ($countries as $country) {
            $country_codes[] = $country->country_code;
        }

        return view('casino.dynamicEditArticleBanner',compact(['articleBanner','priority_list','country_codes', 'casinos']));
    }
  /*  public function dynamiceAddArticleBanner(Request $request,$id = 0)
    {
        $redirect = 'admin/new_article_banner';
      
        //check if new casino or edit casino
        //get redirect
        if($id != 0)
        {
            $redirect = 'admin/article_banner/'.$id;
        }

        $validate_rules = [
            'image_link' => 'required',
            'image_url' => 'required',
            'countries' => 'required',
        ];

        //Validate input
        $validator = Validator::make($request->all(), $validate_rules );

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

                //check if new post or edit post
        if($id != 0)
        {
            $casinoBanner = CasinoBanner::find($id);
        }
        else
        {
            $casinoBanner = new CasinoBanner;
        }

        $casinoBanner->image_link = $request->input('image_link');
        $casinoBanner->banner_type = $request->input('banner_type');
        $casinoBanner->show_banner = $request->input('show_banner') ? $request->input('show_banner') : 0 ;
        $casinoBanner->image_url = $request->input('image_url');
        $casinoBanner->priority = $request->input('priority');
        $casinoBanner->casino_id = $request->input('casino_id');
        $casinoBanner->save();

        CasinoBannerCountry::where('casino_banner_id','=',$casinoBanner->id)->delete();
        if( count( $request->input('countries') ) != 0 )
        {
            $data = array();
            for ($i=0; $i < count($request->input('countries')) ; $i++) 
            { 
                $data[] = array('casino_banner_id' => $casinoBanner->id,'country_code' => $request->input('countries')[$i],'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
            }
            CasinoBannerCountry::insert($data);
        }

        //redirect to dynamic page
        return redirect('admin/dynamic/link');

    }*/

   
    //Skyscraper Banner
    public function skyScraperBanner()
    {
        $articleBannerRatio = Config::get('casino');
        $articleBannerRatio = $articleBannerRatio['sky_scrapper_banner_ratio'];
        $articleBanners = CasinoBanner::where('banner_type',2)->get();
        $priority_list = array("1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5);
        return view('casino.skyScraperBanner',compact(['articleBanners','articleBannerRatio','priority_list']));
    }

    public function skyScraperBannerOption(Request $request)
    {
        
        $array = Config::get('casino');

        $array['sky_scrapper_banner_ratio'] = $request->input('banner_ratio');

        $data = var_export($array, 1);

        $bytes_written = File::put(app_path('../config/casino.php') , "<?php\n return $data ;");

        if($bytes_written != false)
        {
            return redirect('admin/skyscraper_banner');
        }

    }

    public function newSkyScraperBanner()
    {
        $casinos = $this->getCasinosArray();
        $maskLinkArray = $this->getMaskLinks();

        $priority_list = array("1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5);
        return view('casino.newSkyScraperBanner',compact('priority_list', 'casinos','maskLinkArray'));
    }

    public function editSkyScraperBanner(Request $request, $id)
    {
        $redirect = '';
        if($request->redirect != null)
        {
          $redirect = $request->redirect;  
        }

        $casinos = $this->getCasinosArray();
        $maskLinkArray = $this->getMaskLinks();

        $articleBanner = CasinoBanner::find($id);

        // dd($articleBanner);
        // $country_codes = [];
        $priority_list = array("1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5);

        // $countries = CasinoBannerCountry::where('casino_banner_id',$articleBanner->id)->get(['country_code']);
        // foreach ($countries as $country) {
        //     $country_codes[] = $country->country_code;
        // }

        return view('casino.editSkyScraperBanner',compact('articleBanner','priority_list','country_codes', 'casinos', 'redirect','maskLinkArray'));
    }

    public function addSkyScraperBanner(Request $request,$id = 0)
    {
        $redirect = 'admin/new_skyscraper_banner';  

        //check if new casino or edit casino
        //get redirect
        if($id != 0)
        {
            $redirect = 'admin/skyscraper_banner/'.$id;
        }

        $validate_rules = [
            // 'image_link' => 'required',
            'image_url' => 'required',
            // 'mobile_redirect_link' => 'required',
            // 'redirect_link' => 'required',
            'casino_id' => 'required',
            'casino_mask_id' => 'required'
        ];

        //Validate input
        $validator = Validator::make($request->all(), $validate_rules );

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        // if($id == 0 )
        // {
        //     $image_link = CasinoBanner::searchImageLink($request->input('image_link'));
        //     if($image_link) {

        //          $validate_rules = [
        //         'image_link' => 'Image Link Already Exist'
        //     ];
                
        //          return redirect($redirect)
        //                     ->withErrors($validate_rules)
        //                     ->withInput();
        //     }
        // }



                //check if new post or edit post
        if($id != 0)
        {
            $casinoBanner = CasinoBanner::find($id);
        }
        else
        {
            $casinoBanner = new CasinoBanner;
        }

        // $casinoBanner->image_link = $request->input('image_link');
        $casinoBanner->banner_type = $request->input('banner_type');
        $casinoBanner->show_banner = $request->input('show_banner') ? $request->input('show_banner') : 0 ;
        $casinoBanner->image_url = $request->input('image_url');
        $casinoBanner->priority = $request->input('priority');
        $casinoBanner->casino_id = $request->input('casino_id');
        $casinoBanner->casino_mask_id = $request->input('casino_mask_id');
        // $casinoBanner->redirect_link = $request->input('redirect_link');
        // $casinoBanner->mobile_redirect_link = $request->input('mobile_redirect_link');
        $casinoBanner->save();

        // CasinoBannerCountry::where('casino_banner_id','=',$casinoBanner->id)->delete();
        // if( count( $request->input('countries') ) != 0 )
        // {
        //     $data = array();
        //     for ($i=0; $i < count($request->input('countries')) ; $i++) 
        //     { 
        //         $data[] = array('casino_banner_id' => $casinoBanner->id,'country_code' => $request->input('countries')[$i],'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
        //     }
        //     CasinoBannerCountry::insert($data);
        // }

        if($request->sykycrapper != null)
        {
            return redirect($request->sykycrapper);
        }

        return redirect('admin/skyscraper_banner');

    }
}
