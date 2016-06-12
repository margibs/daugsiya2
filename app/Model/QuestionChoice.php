<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionChoice extends Model
{
	use SoftDeletes;

    protected $table = 'question_choices';
    protected $dates = ['deleted_at'];

    public function follow_up_questions(){

    	return $this->hasMany('App\Model\Question')->where('follow_up', 1);
    }

    public function question(){
        return $this->belongsTo('App\Model\Question');
    }

    public function follow_up(){
    	return $this->belongsTo('App\Model\Question','follow_id');
    }

    public function answer(){
    	return $this->hasOne('App\Model\QuestionUserAnswer', 'question_choice_id');
    }
}
