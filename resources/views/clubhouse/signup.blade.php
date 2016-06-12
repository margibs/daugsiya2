

@extends('clubhouse.layout')




@section('page-title', 'Login')

@section('background', 'default')

 @section('switch-button')
 	  <button class="categ-button"> <a href="{{ url('welcome') }}">Sign-Up</a></button>
@endsection

@section('split-content')

<style type="text/css">
  .mainBox{
    position: absolute;
    top: 14%;
    left: 21%;
  }
  .formBox{
/*    margin-right: 14px;*/
    margin-right: 98px;
/*    border: 1px solid #EAEAEA;*/
    padding: 20px 30px;
    border-radius: 2px;
        margin-top: 60px;
    background: rgba(255, 255, 255, 0.99);
    -webkit-box-shadow: 0 0 20px -6px #000;
    -moz-box-shadow: 0 0 20px -6px #000;
    box-shadow: 0 0 20px -6px #000;
  }
  .formBox h1{
    font-family: 'Work Sans',Roboto,Helvetica,Arial,Sans-serif;
    font-size: 50px;
    font-weight: 600;
    color: #000;
    text-align: left;
  }
  .formBox h2{
    color: #cccccc;
    font-family: Roboto,Helvetica,Arial,Sans-serif;
    font-weight: 500;
    margin: 8px 0 20px 0;
     font-size: 21px;
    text-align: left;
  }
  .formBox input[type=text], .formBox input[type=password], .formBox input[type=email]{
    font-family: Roboto;
    padding: 10px;
    width: 100%;
    border-radius: 2px;
    border: 1px solid #EFEFEF;
    font-size: 20px;
    margin: 7px 0;
  }
  .formBox .submit{
    background: #dfa522;
    background: -moz-linear-gradient(top,  #dfa522 0%, #f2c154 100%);
    background: -webkit-linear-gradient(top,  #dfa522 0%,#f2c154 100%);
    background: linear-gradient(to bottom,  #dfa522 0%,#f2c154 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dfa522', endColorstr='#f2c154',GradientType=0 );
    color: #fff;
    font-family: 'Work Sans',Roboto,Helvetica,Arial,Sans-serif;
    border: 1px solid #F5C863;
    font-size: 30px;
    font-weight: 500;
    padding: 10px 20px;
    width: 100%;
    border-bottom: 2px solid #E1A828;
    border-radius: 2px;
    margin-top: 20px;
    cursor: pointer;
    -moz-box-shadow: 0 0 10px -2px #B3B3B3;
    -webkit-box-shadow: 0 0 10px -2px #B3B3B3;
    box-shadow: 0 0 10px -2px #B3B3B3;
    text-shadow: 0px 1px 2px rgb(167, 121, 17);
    font-weight: 600;
  }
  .formBox .terms{
    font-family: Roboto;
    font-size: 11px;
    line-height: 16px;
    margin: 10px 0;
    color: #B7B4B4;
  }
  .formBox .terms a{
    text-decoration:none;
    color: #982A29
  }
  .benefits{
    margin-top: 60px;
    background: rgba(224, 167, 38, 0.97) url(http://susanwins.com/uploads/46508_signup-bg-3.jpg) no-repeat center bottom;
    padding: 20px 20px 166px 20px;
    border-radius: 5px;
    -webkit-box-shadow: 0 0 20px -6px #000;
    -moz-box-shadow: 0 0 20px -6px #000;
    box-shadow: 0 0 20px -6px #000;
  }
  .benefits h2{
    font-family: 'Work Sans';
    font-size: 36px;
    line-height: 36px;
    font-weight: 600;
    color: #fff;
    text-shadow: 0px 2px 10px rgb(210, 169, 74);
  }
  .benefits ul {
    margin-top: 15px;
    background: rgba(255, 213, 116, 0.58);
    border-radius: 9px;
    padding: 10px;
    margin-bottom: 40px;
  }
  .benefits ul li{
    font-family: Roboto;
    font-weight: 500;
    font-size: 15px;
    color: #FFF7E5;
    padding: 4px 6px;
    border-radius: 50px;
    overflow: hidden;
  }
  .benefits ul li i{
    font-size: 20px;
    margin-right: 10px;
    color: #ffe42f;
    position: relative;
    float: left;
       top: -4px;
  }


  @media(max-width: 1440px){
  #roombg {
      width: 117%;
      left: -130px;
      top: 10px;
  }
}
@media(max-width: 1366px){
  #roombg{
    top: 0px;
    left: -112px;
    width: 115%;
  }
  .mainBox{
    left: 9%;
    top: 11%;
  }
  .formBox{
    margin-top: 24px;
  }
  .benefits{
    margin-top: 24px;
    margin-left: 60px;
    position: relative;
    right: -24px;
    padding: 13px 20px 134px 20px;
  }
  .benefits h2{
    font-size: 31px;
    line-height: 33px;
  }
  .benefits ul li{
    font-size: 15px;
    padding: 5px 10px;
    margin: 0px 0;
  }
  .formBox h1{
        font-size: 46px;
  }
  .benefits ul {
    margin-top: 15px;
        padding: 5px;
  }
  .formBox input[type=text], .formBox input[type=password], .formBox input[type=email]{
    font-size: 17px;
  }
}
@media(max-width: 1280px){
  #roombg {
    left: -62px;
    width: 106%;
  }
}
@media(max-width: 1199px){
   #roombg {
      left: -182px;
      width: 136%;
  }
  .benefits {   
    margin-left: 10px;
        background: rgba(224, 167, 38, 0.88) url(http://susanwins.com/uploads/47448_signup-bg-3.jpg) no-repeat 5% 101%;
  }
  .formBox {    
    margin-right: 20px;
  }

}
@media(max-width: 1024px){
  #roombg{
    left: -192px;
    width: 145%;
  }
  .mainBox {
    left: 4%;
  }
}

.variable-width{
    margin-top: 20px;
    margin-right: 10px;
}
.slick-initialized .slick-slide{
  margin: 0 4px;
  position: relative;
}
.slick-initialized .slick-slide p{
    position: absolute;
    bottom: 0;
    color: #fff;
    font-family: Roboto;
    font-size: 20px;
    font-weight: 600;
    margin: 13px 20px;
    line-height: 21px;
}
@media(max-width: 768px){
 #roombg {
    left: -512px;
    width: 265%;
}
.benefits{
  height: 508px;
      margin-left: 0;
}
.mainBox {
    left: -10px;
}
.formBox {
    margin-right: 0;
}
.container {
    width: 765px;
}
.benefits ul {
    background: rgba(255, 213, 116, 0.89);
}
}
</style>


  <div class="bgwrapper">
		<img id="roombg" src="{{url('images/clubhouse')}}/front-house3.jpg" alt="">		      	
      <div class="mainBox">
    	   <div class="container">

    		  <div class="row">
                    

                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          
                          <div class="benefits">
                            <h2> Here's Why you Should Sign Up with Susan... </h2>
                       <ul>
                              <li> <i class="ion-android-star"></i> Receive Susan's Welcome Pack with Free Gifts! </li>
                              <li> <i class="ion-android-star"></i> 24/7 Chat Lounges - Meet New Friends & Have a Laugh   </li>
                              <li> <i class="ion-android-star"></i> Get Exclusive Casino Bonuses & Offers (Only For Susan's Members!)   </li>                        
                              <!-- <li> <i class="ion-android-star"></i>  24/7 Chat Lounges– Relax and Socialise with the Girls & Me   </li> -->
                              <li> <i class="ion-android-star"></i>  VIP Susan's Club Membership Card – Access Hot Events Worldwide   </li>
                              <li>  <i class="ion-android-star"></i> Win Amazing Prizes & Holidays    </li>
                              <li>  <i class="ion-android-star"></i> Get 24/7 Access to My Private Clubhouse  </li>
                              <li> <i class="ion-android-star"></i>  Keep up to Date With the Latest Slots Games   </li>
                            </ul>

                          <!--   <div id="slider1" class="csslider infinity">
                                <input type="radio" name="slides" id="slides_1"/>
                                <input type="radio" name="slides" checked="checked" id="slides_2"/>
                                <input type="radio" name="slides" id="slides_3"/>
                                <input type="radio" name="slides" id="slides_4"/>
                                <input type="radio" name="slides" id="slides_5"/>
                                <input type="radio" name="slides" id="slides_6"/>
                                <ul>
                                  <li>
                                    <img src="http://susanwins.com/uploads/14427_listone.jpg">
                                    <p>Receive Susan's Welcome Pack with Free Gifts!</p>
                                  </li>
                                 
                                </ul>
                                <div class="arrows">
                                  <label for="slides_1"></label>
                                  <label for="slides_2"></label>
                                  <label for="slides_3"></label>
                                  <label for="slides_4"></label>
                                  <label for="slides_5"></label>
                                  <label for="slides_6"></label>
                                  <label for="slides_1" class="goto-first"></label>
                                  <label for="slides_6" class="goto-last"></label>
                                </div>
                               <div class="navigation"> 
                                  <div>
                                    <label for="slides_1"></label>
                                    <label for="slides_2"></label>
                                    <label for="slides_3"></label>
                                    <label for="slides_4"></label>
                                    <label for="slides_5"></label>
                                    <label for="slides_6"></label>
                                  </div>
                                </div> 
                              </div> 

                              <div class="variable-width">
                                <div>
                                  <img src="http://susanwins.com/uploads/14427_listone.jpg">
                                  <p>  Receive Susan's Welcome Pack with Free Gifts! </p>
                                </div>   
                                <div>
                                  <img src="http://susanwins.com/uploads/14427_listone.jpg">
                                  <p> Meet New Friends & Have a Laugh </p>
                                </div>                              
                                <div>
                                  <img src="http://susanwins.com/uploads/14427_listone.jpg">
                                  <p> Get Exclusive Casino Bonuses & Offers (Only For Susan's Members!) </p>
                                </div> 
                                <div>
                                  <img src="http://susanwins.com/uploads/14427_listone.jpg">
                                  <p> Keep up to Date With the Latest Slots Games </p>
                                </div> 
                                <div>
                                  <img src="http://susanwins.com/uploads/14427_listone.jpg">
                                  <p> 24/7 Chat Lounges – Relax and Socialise with the Girls & Me </p>
                                </div> 
                                <div>
                                  <img src="http://susanwins.com/uploads/14427_listone.jpg">
                                  <p> Win Amazing Prizes & Holidays </p>
                                </div> 
                                <div>
                                  <img src="http://susanwins.com/uploads/14427_listone.jpg">
                                  <p> VIP Susan's Club Membership Card – Get into Hot Events Around the UK </p>
                                </div> 
                                <div>
                                  <img src="http://susanwins.com/uploads/14427_listone.jpg">
                                  <p> Get 24/7 Access to My Private Clubhouse </p>
                                </div>
                              </div>
-->
                          </div>

                      
    			           </div>

                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="formBox">
                        <h1> Sign-up </h1>
                       <h2> Guaranteed Good Times </h2>
                        
                     <!--   <form method="post" class="af-form-wrapper" id="signUP">  -->
                      <!--   <form action="{{ url('signup/post') }}" method="POST"> -->
                         
                          <form action="{{ url('signup/post') }}" class="af-form-wrapper" method="POST">

                            <!-- AWeber Web Form Generator 3.0.1 -->

                              <!--   <form method="post" class="af-form-wrapper" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl"  >
                               -->
                                 {!! csrf_field() !!}
                            
                                  @if(count($errors->all()) > 0)

                                    <ul class="errors">
                                      @foreach($errors->all() as $error)
                                        
                                        <li>{{ $error }}</li>
                                          
                                      @endforeach
                                    </ul>
                                  @endif


                              <div style="display: none;">
                              <input type="hidden" name="meta_web_form_id" value="2089372002" />
                              <input type="hidden" name="meta_split_id" value="" />
                              <input type="hidden" name="listname" value="awlist4254968" />
                              <input type="hidden" name="redirect" value="http://susanwins.com/" id="redirect_2c7e9e9eeb4cdb1c7d53c5c85b3d1e9d" />
                              <input type="hidden" name="meta_redirect_onlist" value="http://susanwins.com/" />
                              <input type="hidden" name="meta_adtracking" value="Susan_Signup" />
                              <input type="hidden" name="meta_message" value="1" />
                              <input type="hidden" name="meta_required" value="name (awf_first),name (awf_last),email,custom Password" />

                              <input type="hidden" name="meta_tooltip" value="" />
                              </div>
                              <div id="af-form-2089372002" class="af-form"><div id="af-body-2089372002" class="af-body af-standards">
                              <div class="af-element">
                              <!-- <label class="previewLabel" for="awf_field-83122113-first">First Name:</label> -->
                              <div class="af-textWrap">
                              <input id="awf_field-83122113-first" type="text" class="text" name="name (awf_first)" value=""  onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " tabindex="500" placeholder="First Name" />
                              </div>
                              <div class="af-clear"></div>
                              </div>
                              <div class="af-element">
                              <!-- <label class="previewLabel" for="awf_field-83122113-last">Last Name:</label> -->
                              <div class="af-textWrap">
                              <input id="awf_field-83122113-last" class="text" type="text" name="name (awf_last)" value=""  onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " tabindex="501" placeholder="Last Name" />
                              </div>
                              <div class="af-clear"></div></div>
                              <div class="af-element">
                           <!--    <label class="previewLabel" for="awf_field-83122114">Email: </label> -->
                              <div class="af-textWrap"><input class="text" id="awf_field-83122114" type="text" name="email" value="" tabindex="502" onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " placeholder="Email Address" />
                              </div><div class="af-clear"></div>
                              </div>
                              <div class="af-element">
           <!--                    <label class="previewLabel" for="awf_field-83122115">Password:</label> -->
                              <div class="af-textWrap"><input type="password" id="awf_field-83122115" class="text" name="custom Password" value=""  onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " tabindex="503" placeholder="Password"/></div>
                              <div class="af-clear"></div></div><div class="af-element buttonContainer">
                              <input name="submit" class="submit" type="submit"  value="Sign me up!" tabindex="504" />
                               <p class="terms"> By clicking Sign Up, you agree to our <a href="#"> Terms </a> and that you have read our <a href="#"> Data Policy </a>, including our Cookie Use. </p>
                              <div class="af-clear"></div>
                              </div>
                              </div>
                              </div>
                              <div style="display: none;"><img src="https://forms.aweber.com/form/displays.htm?id=TAwcnMzsTAwMTA==" alt="" /></div>
                              </form>


                              <!-- /AWeber Web Form Generator 3.0.1 -->


           <!--                  <section>
                            <div class="form-group">
                                <input type="text" name="firstname" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password">
                            </div>
                         <div class="form-group" style='display:none;'>
                            <label for="">Confirm Password</label>
                              <input type="password" name="password_confirmation">
                          </div>
                            </section> -->
                            
                            <!-- <button> Sign me up! </button> -->
                           <!--  <p class="terms"> By clicking Sign Up, you agree to our <a href="#"> Terms </a> and that you have read our <a href="#"> Data Policy </a>, including our Cookie Use. </p>
 -->
                          </form>

                      </div>    
                    </div>  
    							   
    					</div>
        </div>
  		</div>	
  </div>


@endsection





