<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Validator;

use App\Model\Prize;
use App\Model\PrizeCode;
use App\Model\PrizeCategory;
use App\Model\PrizeWinner;
use Illuminate\Support\Facades\Auth;
use App\UserActivity;


class PrizeController extends Controller
{
    public function prizes()
    {

        $prizes = Prize::all();

        $prizeCategories = PrizeCategory::all();
        return view('prize.prizes', compact('prizeCategories', 'prizes'));
    }

    public function addPrize(Request $request){

         $redirect = 'admin/prize';

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'prize_category_id' => 'required|exists:prize_categories,id',
            'prize_link' => 'required|url',
            'qty' => 'required|min:1|max:20',
        ]);

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        $prize = new Prize();

        $prize->name = $request->name;
        $prize->prize_category_id = $request->prize_category_id;
        $prize->prize_link = $request->prize_link;
        $prize->qty = $request->qty;

        $prize->save();

        return redirect($redirect);
    }


    public function claimPrize(Request $request){

        $prizeCode = PrizeCode::find($request->prizeCode_id);


        $alreadyWon = $prizeCode->hasWon()->count();

        if($alreadyWon > 0){

            $reason = 'already won';
            return json_encode(false);
        }

        $user = Auth::user();

        $casino_bonus = array(12,20,24);
        $discount_vouchers = array(1,15,23);

         if($request->mobile && $request->mobile == true){
            $casino_bonus = array(2,6,18);
            $discount_vouchers = array(5,7,21);
        }

        $won = false;
        $prize = false;
        $reason = false;

        $prize_category = 2;

        if(in_array($request->price, $discount_vouchers)){
            
            $prize_category = 3;
        }


        $prizeCategory = PrizeCategory::find($prize_category);

        if($prizeCategory){

            $prize = $prizeCategory->prizes()->orderByRaw("RAND()")->first();

            if($prize){

                $prize->qty = $prize->qty > 0 ? $prize->qty-1 : 0;
                $prize->save();

                $winner = new PrizeWinner();

                $winner->prize_code_id = $prizeCode->id;
                $winner->prize_id = $prize->id;
                $winner->user_id = $user->id;
                $winner->save();

                $prize->winner_id = $winner->id;

                $prizeCode->redeem = 1;
                $prizeCode->save();

                $won = true;

                /*
                *   ADDING USER ACTIVITIES
                *   AUTHOR: IAN U ROSALES
                *   DATE: 4-27-2016
                *   TYPE 3 STATIC
                *   CONTENT ID FOR PRIZE ID 
                */
                
                $data = [
                        'user_id' => Auth::user()->id,
                        'post_id' => $prize->id
                    ];
               $activities = UserActivity::addActivity($data, 3);
             
            }else{
                 $reason = 'prize not retrieved';
            }
        }else{
            $reason = 'prize category not retrieved';
        }

        return json_encode(['won' => $won, 'prize' => $prize, 'reason' => $reason ]);

    }


    public function checkPrizeCode(Request $request){

        $valid = false;

        $message = 'Please enter a code.';

        $user = Auth::user();

        $prizeCode = '';

        $validator = Validator::make($request->all(), [
            'code' => 'required'
        ]);

        if ($validator->fails()) 
        {
            return json_encode([ 'message'=> $message , 'valid' => $valid ]);
        }

        $prizeCode = PrizeCode::where('code', $request->code)->first();

        if($prizeCode){

            if($prizeCode->redeem == 0 && ($prizeCode->user_id == $user->id || $prizeCode->user_id == 0)){

                $valid = true;
                $message = 'Code Redeemed. Start Playing!';
                $prizeCode->user_id = $user->id;
                $prizeCode->save();


            }else{
                $message = 'Sorry, Code already redeemed.'; 
            }

        }else{

            $message = 'Invalid Code.';

        }

        return json_encode([ 'message'=> $message , 'valid' => $valid, 'prizeCode' => $prizeCode ]);

    }

    public function prizeCode()
    {
    	$codes = PrizeCode::where('redeem','!=',1)->get();
    	$counter = 1;
    	return view('prize.prizeCodes',compact(['codes','counter']));
    }


    public function prizeCategory(){

        $prizeCategories = PrizeCategory::all();

        return view('prize.prizeCategory', compact('prizeCategories'));
    }

    public function editPrizeCategory($id){

        $prizeCategory = PrizeCategory::findOrFail($id);

        return view('prize.editPrizeCategory', compact('prizeCategory'));

    }

    public function postEditPrizeCategory(Request $request, $id){

        $prizeCategory = PrizeCategory::findOrFail($id);


        $redirect = 'admin/prize/editPrizeCategory/'.$prizeCategory->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        $prizeCategory->name = $request->name;

        $prizeCategory->save();

        return redirect('admin/prize/category');

    }

    public function deletePrizeCategory($id){

        $prizeCategory = PrizeCategory::findOrFail($id);

        $prizeCategory->forceDelete();

        return redirect('admin/prize/category');

    }

    public function addPrizeCategory(Request $request){

        $redirect = 'admin/prize/category';

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        $prizeCat = PrizeCategory::firstOrCreate(['name' => $request->name]);

        return redirect($redirect);

    }

    public function generateCode(Request $request)
    {

    	$redirect = 'admin/prize/code';

        // $messages = [
        //         'post_id.required' => 'Searching for post is required',
        //         'social_media.required' => 'Selecting at least 1 social media is required'
        //     ];

        $validator = Validator::make($request->all(), [
            'qty' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

       
        $data = array();
        $prizeCode = new PrizeCode();

        for ($i=0; $i < $request->input('qty') ; $i++) 
        { 
        	$code = $this->getCode($data);
            $data[] = array('code' => $code,'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
        }

        PrizeCode::insert($data);
       

        return redirect($redirect);

    }

    public function getCode($data)
    {

    	$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    	 $code = '';
		 for ($i = 0; $i < 4; $i++) {
		      $code .= $characters[rand(0, strlen($characters) - 1)];
		 }

    	$check_code = PrizeCode::where('code',$code)->count();

    	if($check_code == 1)
    	{
    		return $this->getCode();
    	}
    	else
    	{
    		if(in_array($code, $data) == true)
    		{
    			return $this->getCode();	
    		}

    		return $code;
    	}
    }
}
