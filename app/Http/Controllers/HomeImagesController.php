<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\HomeImage;
use App\Model\CasinoBanner;
use App\Autopost;
use DB;
use App\AutopostChecker;


class HomeImagesController extends Controller
{
   
    /*
    *   FUNCTION FOR DATA TABLE
    *   AUTHOR: IAN ROSALES
    *   DATE: 4-28-2016
    */

    public function getIndex() 
    {
        return view('admin.user');
    }

    public function anyData() 
    {
       /* $home_image = HomeImage::select(['id', 'image', 'link', 'position', 'created_at', 'updated_at'])->get();*/
        $home_image = HomeImage::select(['id','image', 'link', 'redirect_link', 'show_add', 'position'])
                                 ->where('is_boolean', '=', 0)
                                ->get();
        return Datatables::of($home_image)
                 ->addColumn('action', function ($home_image) {
                                            return 
                                            "<a href='".url("admin/homeads/edit")."/".$home_image->id."' >Edit</a>
                                            <a href='".url("admin/homeads/delete/imageDelete")."/".$home_image->id."' >Delete</a>
                                            ";
                                        })
                ->make(true);
    }

    public function trashedData() 
    {
        $home_image = HomeImage::select(['id', 'image', 'link', 'position', 'created_at', 'updated_at'])->onlyTrashed()->get();
        return Datatables::of($home_image)
                 ->addColumn('action', function ($home_image) {
                                            return 
                                            "<a href='".url("admin/homeads/undo")."/".$home_image->id."' >Undo</a>
                                            ";
                                        })
                ->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')
                ->editColumn('updated_at', '{!! $created_at->diffForHumans() !!}')
                ->make(true);
    }

    public function anyDataCasino() 
    {
        $home_image = HomeImage::select(['id', 'image', 'link', 'position', 'created_at', 'updated_at'])->get();
        return Datatables::of($home_image)
                 ->addColumn('action', function ($home_image) {
                                            return 
                                            "<a href='".url("admin/homeads/edit")."/".$home_image->id."?redirect=admin/dynamic/link' >Edit</a>
                                            <a href='".url("admin/homeads /delete/imageDelete")."/".$home_image->id."?redirect=admin/dynamic/link' >Delete</a>
                                            ";
                                        })
                ->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')
                ->editColumn('updated_at', '{!! $created_at->diffForHumans() !!}')
                ->make(true);
    }

    
    public function skypscrapperGet()
    {
       $casino_banners = CasinoBanner::select('casino_banners')
                    ->select(
                        'casino_banners.id', 
                        'casino_banners.image_url', 
                        'casino_banners.image_link',
                        'casino_banners.banner_description',
                        'casino_banners.show_banner',
                        'casino_banners.banner_type',
                        'casino_banners.created_at', 
                        'casino_banners.updated_at'
                        )
                    ->where('casino_banners.banner_type', '=', 2)
                    ->where('casino_banners.show_banner', '=', 1)
                    ->get();
        return Datatables::of($casino_banners)
               ->addColumn('action', function ($casino_banners) {
                                                return 
                                                "
                                                <a href='".url("admin/skyscraper_banner")."/".$casino_banners->id."?redirect=admin/dynamic/link' >Edit</a>
                                                ";
                                            })
                ->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')
                ->editColumn('updated_at', '{!! $created_at->diffForHumans() !!}')
                ->make(true);
    }

   

    public function articleGet()
    {
         $casino_banners = CasinoBanner::select('casino_banners')
                    ->select(
                        'casino_banners.id', 
                        'casino_banners.image_url', 
                        'casino_banners.image_link',
                        'casino_banners.banner_description',
                        'casino_banners.show_banner',
                        'casino_banners.banner_type',
                        'casino_banners.created_at', 
                        'casino_banners.updated_at'
                        )
                    ->where('casino_banners.banner_type', '=', 1)
                    ->where('casino_banners.show_banner', '=', 1)
                    ->get();
        return Datatables::of($casino_banners)
               ->addColumn('action', function ($casino_banners) {
                                                return 
                                                "<a href='".url("admin/article_banner")."/".$casino_banners->id."?redirect=admin/dynamic/link' >Edit</a>
                                                ";
                                            })
                ->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')
                ->editColumn('updated_at', '{!! $created_at->diffForHumans() !!}')
                ->make(true);
    }

      public function get_mobile_adds() {

         $home_image = HomeImage::select(['id','image', 'link', 'redirect_link', 'show_add', 'position'])
                                ->where('is_boolean', '=', 1)
                                ->get();
        return Datatables::of($home_image)
                 ->addColumn('action', function ($home_image) {
                                            return 
                                            "<a href='".url("admin/homeads/edit")."/".$home_image->id."' >Edit</a>
                                            <a href='".url("admin/homeads/delete/imageDelete")."/".$home_image->id."' >Delete</a>
                                            ";
                                        })
              /*  ->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')
                ->editColumn('updated_at', '{!! $created_at->diffForHumans() !!}')*/
                ->make(true);
    }

    public function getAutopostAll() {

       /*  $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->select(['posts.id', 'posts.title', 'users.name', 'users.email', 'posts.created_at', 'posts.updated_at']);*/

       /* //$autopost = Autopost::select(['id', 'description', 'custom_image','link', 'video_link'])
        $autopost = DB::table('autoposts')
                    ->leftjoin('autopost_categories','autoposts.autopost_category_id', '=', 'autopost_categories.id')
                     ->select(['autoposts.id', 'autoposts.description', 'autoposts.custom_image','autoposts.link', 'autoposts.video_link', 'autopost_categories.name'])
                    ->where('added_to_list', '=', 0);*/
                    //->get();

        $autopost = Autopost::join('autopost_categories','autoposts.autopost_category_id', '=', 'autopost_categories.id')
                     ->select(['autoposts.id', 'autoposts.description', 'autoposts.custom_image','autoposts.link', 'autoposts.video_link', 'autopost_categories.name'])
                     ->where('added_to_list', '=', 0);

          return Datatables::of($autopost)
                 ->addColumn('action', function ($autopost) {
                                            return 
                                            "<a href='".url("admin/autoposts")."/".$autopost->id."/edit' ><i class='fa fa-pencil'></i></a>";
                                        })
                ->make(true);

    }

    //AUTOPOSTLIST
    public function autopostsListTable(Request $request) {
        
          /*$autoposts = 
            DB::table('autopost_checkers')
            ->join('autoposts','autopost_checkers.autopost_id','=','autoposts.id')
            ->select('autoposts.post_id','autoposts.description','autoposts.custom_image','autoposts.link','autoposts.video_link','autopost_checkers.id as autopost_checkers_id','autopost_checkers.fb','autopost_checkers.twitter','autopost_checkers.pinterest','autopost_checkers.instagram','autopost_checkers.autopost_executed','autoposts.id','autopost_checkers.date_posting');*/
            /*->get();*/

            $autoposts = AutopostChecker::join('autoposts','autopost_checkers.autopost_id','=','autoposts.id')
                     ->select(['autoposts.post_id','autoposts.description','autoposts.custom_image','autoposts.link','autoposts.video_link','autopost_checkers.id as autopost_checkers_id','autopost_checkers.fb','autopost_checkers.twitter','autopost_checkers.pinterest','autopost_checkers.instagram','autopost_checkers.autopost_executed','autoposts.id','autopost_checkers.date_posting']);
                     

         return Datatables::of($autoposts)
                 ->addColumn('action', function ($autoposts) {
                            return 
                            "<a href='".url("admin/autoposts")."/".$autoposts->id."/edit' ><i class='fa fa-pencil'></i></a>";
                        })
                  ->editColumn('fb', function($autoposts){
                     return (($autoposts->fb == 1) ? '<span style="color:yellow;">Not Posted</span>'  : 
                            (($autoposts->fb == 2) ? '<span style="color:red;">ERROR POSTING</span>' :
                            '<span style="color:green;">POSTED</span>'));
                  })
                  ->editColumn('twitter', function($autoposts){
                     return (($autoposts->twitter == 1) ? '<span style="color:yellow;">Not Posted</span>'  : 
                            (($autoposts->twitter == 2) ? '<span style="color:red;">ERROR POSTING</span>' :
                            '<span style="color:green;">POSTED</span>'));
                  })
                   ->editColumn('pinterest', function($autoposts){
                     return (($autoposts->pinterest == 1) ? '<span style="color:yellow;">Not Posted</span>'  : 
                            (($autoposts->pinterest == 2) ? '<span style="color:red;">ERROR POSTING</span>' :
                            '<span style="color:green;">POSTED</span>'));
                  })
                  ->editColumn('instagram', function($autoposts){
                     return (($autoposts->instagram == 1) ? '<span style="color:yellow;">Not Posted</span>'  : 
                            (($autoposts->instagram == 2) ? '<span style="color:red;">ERROR POSTING</span>' :
                            '<span style="color:green;">POSTED</span>'));
                  })
                ->make(true);

    }

}