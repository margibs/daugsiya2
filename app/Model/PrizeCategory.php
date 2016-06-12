<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PrizeCategory extends Model
{
    protected $table = 'prize_categories';

    protected $fillable = ['name'];


    public function prizes(){

    	return $this->hasMany('App\Model\Prize', 'prize_category_id')->where('qty', '>', 0);
    }
}
