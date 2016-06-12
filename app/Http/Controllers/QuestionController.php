<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Validator;

use App\Model\Question;
use App\Model\QuestionChoice;
use App\Model\QuestionUserAnswer;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function question()
    {

    	$questions = Question::all();

    	return view('question.question', compact('questions'));
    }


    public function choices($id){

    	$question = Question::findOrFail($id);

    	$follow_up_questions = Question::where('follow_up', 1)->get();

    	return view('question.choices', compact('question','follow_up_questions'));
    }


    public function answer(Request $request){

    	$user = Auth::user();

    	$answer = new QuestionUserAnswer();

    	$answer->question_id = $request->question_id;
    	$answer->question_choice_id = $request->choice_id;
    	$answer->user_id = $user->id;

    	return json_encode($answer->save());

    }

    public function addChoice(Request $request, $id){

    	$question = Question::findOrFail($id);

    	$redirect = 'admin/question/choices/'.$question->id;

    	$validator = Validator::make($request->all(), [
            'choice' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        $choice = new QuestionChoice();
        $choice->choice = $request->choice;
        $choice->follow_id = $request->follow_id;
        $choice->response = $request->response;
        $question->choices()->save($choice);

        return redirect($redirect);

    }

    public function editQuestion($id){

    	$question = Question::findOrFail($id);

    	return view('question.editQuestion', compact('question'));

    }
    public function deleteQuestion($id){

    	$question = Question::findOrFail($id);

    	$question->delete();

    	return redirect('admin/question');

    }

    public function editChoice($id){

    	$choice = QuestionChoice::findOrFail($id);

        $follow_up_questions = Question::where('follow_up', 1)->get();

    	return view('question.editChoice', compact('choice', 'follow_up_questions'));
    }

    public function postEditChoice(Request $request, $id){

    	$choice = QuestionChoice::findOrFail($id);

    	$redirect = 'admin/question/choices/edit/'.$choice->id;

    	$validator = Validator::make($request->all(), [
            'choice' => 'required',
        ]);

        $choice->choice = $request->choice;
        $choice->follow_id = $request->follow_id;
        $choice->response = $request->response;
        $choice->save();

    	return redirect('admin/question/choices/'.$choice->question_id);
    }

    public function deleteChoice($id){

    	$choice = QuestionChoice::findOrFail($id);

    	$choice->delete();
    	return redirect('admin/question/choices/'.$choice->question_id);
    }

    public function postEditQuestion(Request $request, $id){

    	$question = Question::findOrFail($id);

    	$redirect = 'admin/question/edit/'.$question->id;

    	$validator = Validator::make($request->all(), [
            'question' => 'required',
             'follow_up' => 'required',
            'order' => 'required|min:0',
        ]);

        $question->question = $request->question;
        $question->follow_up = $request->follow_up;
        $question->order = $request->order;
        $question->save();

    	return redirect('admin/question');

    }


    public function addQuestion(Request $request){

    	$redirect = 'admin/question';

    	$validator = Validator::make($request->all(), [
            'question' => 'required',
            'follow_up' => 'required',
            'order' => 'required|min:0',
        ]);

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        $question = new Question();

        $question->question = $request->question;
        $question->follow_up = $request->follow_up;
        $question->order = $request->order;

        $question->save();

    	return redirect($redirect);
    }
}
