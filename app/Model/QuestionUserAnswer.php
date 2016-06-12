<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestionUserAnswer extends Model
{
    protected $table = 'question_user_answers';

    public function choice(){

    	return $this->belongsTo('App\Model\QuestionChoice', 'question_choice_id');
    }
}
