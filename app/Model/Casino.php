<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Casino extends Model
{
    protected $table = 'casinos';


    public function casino_banners(){
    	return $this->hasMany('App\Model\CasinoBanner');
    }

    public function article_banners(){

    	return $this->hasMany('App\Model\CasinoBanner')->where('banner_type', 1);
    }
    public function skyscraper_banners(){

    	return $this->hasMany('App\Model\CasinoBanner')->where('banner_type', 2);
    }
}
