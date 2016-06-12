<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PrizeCode extends Model
{
    protected $table = 'prize_codes';


    public function hasWon(){

    	return $this->hasMany('App\Model\PrizeWinner', 'prize_code_id');
    }
}
