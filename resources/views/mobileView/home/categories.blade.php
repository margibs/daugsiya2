@extends('home.layout')

@section('singlecontentResposnive')

<style type="text/css">
  	 .round{
    height: 240px;
        border-radius: 92%/25%;
  }
  .round2{    
    border-radius: 48%/6%;
  }
  .round2 .featimg{
    position: static;
    width: 100%;
    margin-top: -2px;
   height: 100px;
  }
	 .latestgames{
	    margin-left: -7px;
	    margin-top: 13px;
	    z-index: 22;
  	}
   .latestgamescontent .inner{
	    background: #FDF6E9;
	    box-shadow: 0px 0px 10px 3px #DCB76B inset;
	    border: 1px solid #A07019;
   }
   .latestgamescontent .inner img{
      border: none;
      padding: 0;
      box-shadow: 0 0;
   }
   .bonusCasino a{
      display: inline-block;
      padding: 5px;
      width: 49%;
   }
   .bonusCasino a img{
      width: 100%;
      border-radius: 4px;
   }
   .thickgolddivider{
      background: transparent linear-gradient(to bottom, #BFA05E 0%, #D4BF77 27%, #A27832 51%, #7D5712 100%) repeat scroll 0% 0%;
      border-bottom: 1px solid #735218;
   }
   .thickgolddivider p{
       font-size: 24px;
    line-height: 23px;
   }
   .thickgolddivider {
      width: 97%;
      margin-left: 6px;
   }
   #maincontainer{
    margin-top: 0;
   }
   #categoryContainer {
    top: 36px;
  }
/********** MEDIA QUERIES *************/
@media(min-width: 360px){   
   .round2{
      padding: 1px 0 0 0;
    }
   .thickgolddivider{
      margin-top: -1px;
   }
   #maincontainer{
    margin-top: -3px;
    padding: 1px 9px;
   }
   #postcontent {
    margin-top: 25px;
   }
   .categories{
    margin: 8px 7px 18px 7px;
   }
   .latestgames {    
      margin-top: 18px;
  }
   .latestgamescontent{
      padding:10px 15px 13px 12px;
   }
   .latestgamescontent .inner img{
    border: none;
   }
   #categoryContainer{
      top: 41px;
   }
   .g2, .g1 {
    top: 10px;
  }
  .thickgolddivider{
    margin-left: 6px;
    width: 97%;
    padding: 3px 0;
  }
  .thickgolddivider p {
    font-size: 21px;
  }
}


</style>


<div class="round ellipse">
  <div class="round2 ellipse">
   <img src="http://susanwins.com/uploads/67780_mobileheader.png" class="featimg" />
  </div>  
</div>

   <div class="thickgolddivider">
      <p> Check the cool games below! </p>
    </div>

<div id="maincontainer">
 
	<div class="innerfirst"> 

             
   <!-- 
        <div id="playbig">
            <a id="gogogo2" class="button pink glass"> Play Now! </a>         
        </div>     --> 
   
   

        <div id="categoryContainer">
            <div class="goldborder g1"></div>
            <div class="goldborder g2"></div>
              
             <div class="latestgamescontent">
              <div class="inner">
                  <div class="row">
                    <div class="col-xs-12">
                      <img src="http://susanwins.com/uploads/31332_sunset-beach.jpg" alt="">
                      <img src="http://susanwins.com/uploads/21698_ice-hokey.jpg" alt="">
                      <img src="http://susanwins.com/uploads/30686_hot-gems.jpg" alt="">
                      <img src="http://susanwins.com/uploads/95958_la-chatte-rouge.jpg" alt="">
                      <img src="http://susanwins.com/uploads/92183_jungle-boogie.jpg" alt="">
                    </div>     
                    <div class="col-xs-12">
                      <img src="http://susanwins.com/uploads/80031_azteca.jpg" alt="">
                      <img src="http://susanwins.com/uploads/40393_monroe.jpg" alt="">
                      <img src="http://susanwins.com/uploads/22611_spamalot.jpg" alt="">
                      <img src="http://susanwins.com/uploads/57127_luckypanda.jpg" alt="">
                      <img src="http://susanwins.com/uploads/11356_neptunes-kingdom.jpg" alt="">
                    </div>            
                  </div>
              </div>
            </div>


        </div>    

        
        <div class="latestgames"></div>
        <div class="latestgamescontent">
     
          <div class="inner">

              <div class="commentsContainer">
                <h2> Recent Comments </h2>
                <ul>
                  <li>
                    <img src="http://susanwins.com/images/default_profile_picture.png" class="avatar" />
                    <p class="name"> Bertha Gorman </p>
                    <p class="comment"> It has alwayd been my deram as a litt tle gril t be an equestriam </p>
                    <a href=""> Reply </a>
                    <ul class="replyList">
                      <li>
                        <img src="http://susanwins.com/images/default_profile_picture.png" class="avatar" />
                        <p class="name"> Bertha Gorman </p>
                        <p class="comment"> It has alwayd been my deram as a litt tle gril t be an equestriam </p>
                        <a href=""> Reply </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <img src="http://susanwins.com/images/default_profile_picture.png" class="avatar" />
                    <p class="name"> Bertha Gorman </p>
                    <p class="comment"> It has alwayd been my deram as a litt tle gril t be an equestriam </p>
                    <a href=""> Reply </a>
                  </li>
                  <li>
                    <img src="http://susanwins.com/images/default_profile_picture.png" class="avatar" />
                    <p class="name"> Bertha Gorman </p>
                    <p class="comment"> It has alwayd been my deram as a litt tle gril t be an equestriam </p>
                    <a href=""> Reply </a>
                  </li>
                  <li>
                    <img src="http://susanwins.com/images/default_profile_picture.png" class="avatar" />
                    <p class="name"> Bertha Gorman </p>
                    <p class="comment"> It has alwayd been my deram as a litt tle gril t be an equestriam </p>
                    <a href=""> Reply </a>
                  </li>
                </ul>
              </div>

              <h2> Top Categories </h2>

               <div class="row">
                <div class="col-xs-8" style="padding: 0;">
                   <img src="http://susanwins.com/uploads/48873_fantasy.png" alt="">
                  <img src="http://susanwins.com/uploads/52845_seasonal.png" alt="">
                  <img src="http://susanwins.com/uploads/41272_tropical.png" alt="">
                  <img src="http://susanwins.com/uploads/88737_sorcery.png" alt="">
                </div>     
                <div class="col-xs-8" style="padding: 0;">
                   <img src="http://susanwins.com/uploads/48873_fantasy.png" alt="">
                  <img src="http://susanwins.com/uploads/52845_seasonal.png" alt="">
                  <img src="http://susanwins.com/uploads/41272_tropical.png" alt="">
                  <img src="http://susanwins.com/uploads/88737_sorcery.png" alt="">
                </div>            
                <div class="col-xs-8" style="padding: 0;">
                   <img src="http://susanwins.com/uploads/48873_fantasy.png" alt="">
                  <img src="http://susanwins.com/uploads/52845_seasonal.png" alt="">
                  <img src="http://susanwins.com/uploads/41272_tropical.png" alt="">
                  <img src="http://susanwins.com/uploads/88737_sorcery.png" alt="">
                </div>            
              </div>

          </div>
        </div>
        <div class="bottomads">
        <!--   <img src="http://a1.mzstatic.com/us/r30/Purple/v4/e1/e7/c6/e1e7c6c5-8ce5-9a7b-8236-695ac0eb0168/screen520x924.jpeg" alt=""> -->
          <a href="{{$ads_rand->link}}">
           <img src="{{ url('uploads').'/'.$ads_rand->image}}" alt="">
          </a>
        </div>
        <div class="footer"></div>
      </div>

</div> 

@endsection