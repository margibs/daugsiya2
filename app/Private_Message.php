<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Private_Message extends Model
{
    //

	protected $table ='private_messages';


	public function from_user(){
		return $this->belongsTo('App\User', 'from')->with('user_detail');
	}
}
