<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
	use SoftDeletes;

    protected $table = 'questions';
    protected $dates = ['deleted_at'];

    public function choices(){

    	return $this->hasMany('App\Model\QuestionChoice', 'question_id');
    }

    public function answer(){
    	return $this->hasOne('App\Model\QuestionUserAnswer', 'question_id');
    }
}
