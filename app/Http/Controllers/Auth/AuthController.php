<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Session;
use App\User_Detail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/admin';
    protected $loginPath = '/login';
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    protected function signupValidator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'custom_Password' => 'required|min:6',
            'name_(awf_first)' => 'required|min:2',
            'name_(awf_last)' => 'required|min:2',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function signup(Request $request){

    $validator = $this->signupValidator($request->all());

        if ($validator->fails()) {

            return redirect('signup')->withErrors($validator)
                        ->withInput();
        } 

        $data = [
                'password' => $request->Input('custom_Password'),
                'email' => $request->Input('email'),
                'firstname' =>  $request->Input('name_(awf_first)'),
                'lastname' =>  $request->Input('name_(awf_last)')
            ];



      Auth::login($this->create($data));

        $user_detail = new User_Detail();
        $user_detail->firstname = $request->Input('name_(awf_first)');
        $user_detail->lastname = $request->Input('name_(awf_last)');

        $user = Auth::user();
 
       $user->user_detail()->save($user_detail);
       
       $full_name = $request->Input('name_(awf_first)').''.$request->Input('name_(awf_last)');
        $ch = curl_init('http://www.aweber.com/scripts/addlead.pl');
       $fields_string = '';
       $fields = array( 
                       'name' => urlencode($full_name), 
                       'email' => urlencode($request->Input('email')), 
                       'meta_web_form_id' => '2089372002', 
                       'meta_split_id' => '', 
                       'listname' => 'awlist4254968', 
                       'redirect' => 'http://susanwins.com/clubhouse/home', 
                       'meta_redirect_onlist' => 'http://susanwins.com/', 
                       'meta_adtracking' => 'Susan_Signup', 
                       'meta_message' => '1'
                       ); 
       foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; } 
       rtrim($fields_string,'&'); 
        
       curl_setopt($ch,CURLOPT_POST,count($fields)); 
       curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string); 
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
       $returned = curl_exec($ch); 
        //dd($returned);

       
       echo $returned;

       echo '<script type="text/javascript">'
         , '(function(document, window){'

            , ' anchor = document.getElementsByTagName("h1")[0].style.display = "none";'
            , ' anchor = document.getElementsByTagName("p")[0].style.display = "none";'
             , ' anchor = document.getElementsByTagName("A")[0].click();'
       , ' })(document, window)'
         , '</script>'
      ;
     
      // return redirect('clubhouse/home');
        //return redirect('https://www.aweber.com/scripts/addlead.pl');

    }
}
