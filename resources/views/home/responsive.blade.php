@extends('home.layout')

@section('homecontentResposnive')

<style type="text/css">
  img{width: 100%;}
  .container_24{display: none;}

  /* remove this later */
  header .topicons{
    margin-top: 0;
  }
  .homepageReel{
    margin-top: 0;
    background: none;
  }

  #playbig {
      position: absolute;
    right: 125px;
    top: 587px;
    margin-left: 0;
  }
  #playbig a{
    width: 144px;
    height: 81px;
  }
  #playbig .button {
      font: 39px/1em 'Work Sans',sans-serif;
      padding: .5em .6em;
      font-weight: 600;
  }

  @media(max-width: 1199px){
     #playbig a {
        width: 140px;
        height: 77px;
    }
    #playbig .button {
        font: 37px/1em 'Work Sans',sans-serif;
        padding: .4em .6em;
         font-weight: 600;
    }
    #playbig {
        right: 95px;
        top: 482px;
    }
    .homepageReel{
      height: auto;
    }
  }
  @media(max-width: 991px){
    #playbig {
        right: 51px;
        top: 362px;
    }
    #playbig a {
        width: 120px;
        height: 65px;
    }
    #playbig .button {
        font: 33px/1em 'Work Sans',sans-serif;
        font-weight: 600;
    }
  }



</style>


<div class="container-fluid">
  <div class="container"  style="position:relative;">
    <div class="row">
      <div class="col-lg-24">

        <img src="{{ asset('images/responsive/topReel.png')}}" class="topReel" />
        <img src="{{ asset('images/responsive/categoryReel.png')}}"  class="categoryReel"/>
        <img src="{{ asset('images/responsive/bigwinsReel.png')}}" class="bigwinsMainReel">        
        <img src="{{ asset('images/responsive/footerReel.png')}}" class="footerReel">

         <div class="col-lg-24">
              <div class="homepageReel">
                 <img src="{{ asset('images/responsive/withtdog.png') }}" class="susan">
                <h1 class="headText2"> Hi! I'm Susan 
                  <span> Let's Play </span> 
                </h1>  
                <div class="reels">
                  <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine2" class="" style="overflow: hidden;height: 305px;width: 100%;">
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/54797_junglejimreels.jpg">                              
                              </div>
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/20611_wildgamblerreel.jpg">
                              </div>
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/63331_we.jpg">                              
                              </div>
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/72613_tales_of_krakow.jpg">
                              </div>
                          </div>
                    </div>          
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine3" class="" style="overflow: hidden;height: 305px;width: 100%;">
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/63331_we.jpg">                              
                              </div>
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/54797_junglejimreels.jpg">                              
                              </div>
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/20611_wildgamblerreel.jpg">
                              </div>
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/63331_we.jpg">                              
                              </div>
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/72613_tales_of_krakow.jpg">
                              </div>
                          </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine4" class="" style="overflow: hidden;height: 305px;width: 100%;">
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/72613_tales_of_krakow.jpg">
                          </div>
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/54797_junglejimreels.jpg">                              
                          </div>
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/20611_wildgamblerreel.jpg">
                          </div>
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/63331_we.jpg">                              
                          </div>
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/72613_tales_of_krakow.jpg">
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine5" class="" style="overflow: hidden;height: 305px;width: 100%;">
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/20611_wildgamblerreel.jpg">
                          </div>
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/54797_junglejimreels.jpg">                              
                          </div>
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/20611_wildgamblerreel.jpg">
                          </div>
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/63331_we.jpg">                              
                          </div>
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/72613_tales_of_krakow.jpg">
                          </div>
                        </div>
                    </div>
                  </div>
                </div>

               


              </div>
              <div class="categoryMain">
               <p> Know what you like? Uncover great slots using the categories below </p>

                 <div id="playbig">
              <a id="gogogo2" class="button pink serif round glass"> Spin! </a>         
            </div>

                <div class="col-xs-24 col-sm-19 col-md-19 col-lg-19">
                  <div class="categories">
                    <ul>
                        <li><a href="http://susanwins.com/relaxingsoothing"><img src="http://susanwins.com/uploads/49793_relaxing.png"></a></li>
                    
                        <li><a href="http://susanwins.com/pirates"><img src="http://susanwins.com/uploads/70833_pirate.png"></a></li>
                    
                        <li><a href="http://susanwins.com/classic"><img src="http://susanwins.com/uploads/66321_classic.png"></a></li>
                    
                        <li><a href="http://susanwins.com/egyptian"><img src="http://susanwins.com/uploads/76342_egyptian.png"></a></li>
                    
                        <!-- <li style="position: relative; top: 10px;"><a href="http://susanwins.com/sexy"><img src="http://susanwins.com/uploads/24631_sexy.png"></a></li> -->
                    
                        <li><a href="http://susanwins.com/adventure"><img src="http://susanwins.com/uploads/76393_adventure.png"></a></li>
                    
                        <li><a href="http://susanwins.com/vegas"><img src="http://susanwins.com/uploads/35722_vegas.png"></a></li>
                    
                        <li><a href="http://susanwins.com/animal"><img src="http://susanwins.com/uploads/63125_animals.png "></a></li>
                    
                        <li><a href="http://susanwins.com/romance"><img src="http://susanwins.com/uploads/33566_romantic.png"></a></li>
                    
                        <li><a href="http://susanwins.com/myths-legends"><img src="http://susanwins.com/uploads/26569_myths.png"></a></li>
                    
                        <li><a href="http://susanwins.com/movie"><img src="http://susanwins.com/uploads/18354_movies.png"></a></li>
                    
                        <li><a href="http://susanwins.com/party"><img src="http://susanwins.com/uploads/30641_party.png"></a></li>
                    
                        <li><a href="http://susanwins.com/tropicaljungle"><img src="http://susanwins.com/uploads/41272_tropical.png"></a></li>
                    
                        <li><a href="http://susanwins.com/celebs"><img src="http://susanwins.com/uploads/49000_celebs.png"></a></li>
                    
                        <li><a href="http://susanwins.com/sea-2"><img src="http://susanwins.com/uploads/42258_sea.png"></a></li>
                    
                        <li><a href="http://susanwins.com/sorcery"><img src="http://susanwins.com/uploads/88737_sorcery.png"></a></li>
                    
                        <li><a href="http://susanwins.com/mysterious"><img src="http://susanwins.com/uploads/32493_mystery.png"></a></li>
                    
                        <li><a href="http://susanwins.com/television"><img src="http://susanwins.com/uploads/28435_television.png"></a></li>
                    
                        <li><a href="http://susanwins.com/seasonal"><img src="http://susanwins.com/uploads/52845_seasonal.png"></a></li>
                    
                        <li><a href="http://susanwins.com/comic"><img src="http://susanwins.com/uploads/27452_comic.png "></a></li>
                    
                        <li><a href="http://susanwins.com/cowboywestern"><img src="http://susanwins.com/uploads/71559_cowboy.png"></a></li>
                    
                        <li><a href="http://susanwins.com/superheroes"><img src="http://susanwins.com/uploads/28203_superhero.png"></a></li>
                    
                        <li><a href="http://susanwins.com/fantasy"><img src="http://susanwins.com/uploads/48873_fantasy.png"></a></li>
                    
                        <li><a href="http://susanwins.com/medieval"><img src="http://susanwins.com/uploads/43173_medieval.png"></a></li>
                    
                        <li><a href="http://susanwins.com/cute"><img src="http://susanwins.com/uploads/63299_cute.png"></a></li>

                         <li><a href="http://susanwins.com/relaxingsoothing"><img src="http://susanwins.com/uploads/49793_relaxing.png"></a></li>
                    
                        <li><a href="http://susanwins.com/pirates"><img src="http://susanwins.com/uploads/70833_pirate.png"></a></li>
                    
                        <li><a href="http://susanwins.com/classic"><img src="http://susanwins.com/uploads/66321_classic.png"></a></li>
                    
                        <li><a href="http://susanwins.com/egyptian"><img src="http://susanwins.com/uploads/76342_egyptian.png"></a></li>

                      </ul>
                  </div>
                </div>
                <div class="col-xs-24 col-sm-5 col-md-5 col-lg-5">
                  <div class="categAds">
                    <a href="#">
                      <img src="http://susanwins.com/images/homepage/home-categ-ad1.jpg">
                    </a>
                    <a href="#">
                      <img src="http://susanwins.com/images/homepage/home-categ-ad2.jpg">
                    </a>
                  </div>
                </div>
              </div>
              <div class="bigwinsMain">
                <ul>
                  <li> 

                   <!--  <div class="inner refCell" style="border-right: 1px solid #000;">
                      <img class="info" src="http://susanwins.com/uploads/24372_goldcoins.png" alt=""> -->
                      <a href="http://susanwins.com/starscape-online-slots-review"> 
                        <img src="http://susanwins.com/uploads/12338_biggest1.jpg"> 
                      </a>
                   <!--    <a href="http://susanwins.com/starscape-online-slots-review" class="info2">
                        <img src="http://susanwins.com/uploads/69264_biggest1-1.png" style="border:none;">
                      </a>
                    </div> -->

                  
                  </li>
                  <li> 
                    <!--  <div class="inner refCell" style="border-right: 1px solid #000;">
                      <img class="info" src="http://susanwins.com/uploads/24372_goldcoins.png" alt=""> -->
                      <a href="http://susanwins.com/starscape-online-slots-review"> 
                        <img src="http://susanwins.com/uploads/98141_biggest2.jpg"> 
                      </a>
                   <!--    <a href="http://susanwins.com/starscape-online-slots-review" class="info2">
                        <img src="http://susanwins.com/uploads/69264_biggest1-1.png" style="border:none;">
                      </a>
                    </div> -->
                  </li>
                  <li> 
                     <!--  <div class="inner refCell" style="border-right: 1px solid #000;">
                      <img class="info" src="http://susanwins.com/uploads/24372_goldcoins.png" alt=""> -->
                      <a href="http://susanwins.com/starscape-online-slots-review"> 
                        <img src="http://susanwins.com/uploads/78354_biggest3.jpg"> 
                      </a>
                   <!--    <a href="http://susanwins.com/starscape-online-slots-review" class="info2">
                        <img src="http://susanwins.com/uploads/69264_biggest1-1.png" style="border:none;">
                      </a>
                    </div> -->
                  </li>
                  <li> 
                    <!--  <div class="inner refCell" style="border-right: 1px solid #000;">
                      <img class="info" src="http://susanwins.com/uploads/24372_goldcoins.png" alt=""> -->
                      <a href="http://susanwins.com/starscape-online-slots-review"> 
                        <img src="http://susanwins.com/uploads/29427_biggest4.jpg"> 
                      </a>
                   <!--    <a href="http://susanwins.com/starscape-online-slots-review" class="info2">
                        <img src="http://susanwins.com/uploads/69264_biggest1-1.png" style="border:none;">
                      </a>
                    </div> -->
                  </li>
                </ul>
              </div>
               <div class="latestMain">
                  <div class="col-xs-24 col-sm-18 col-md-18 col-lg-18">  
                      <div class="gameList">
                        <div class="inner">
                      <!--     <img src="http://susanwins.com/images/homepage/latestGamesSusan.png" class="susan"> -->
                          <ul>

                                               <li>           
                                  <a href="http://susanwins.com/8-ball-slots-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/29149_thumb_8ballslots.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/The-Alchemists-Lab-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/43721_thumb_alchemist_lab.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/hot-gems-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/57311_thumb_hot_gems.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/ice-hockey-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/21698_ice-hokey.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/innocence-or-temptation-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/22433_thumb_innocence_temptation.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/iron-man-slots-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/75031_iron-man.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/jackpot-giant-slots-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/77280_jackpot-giant.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/john-wayne-slots-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/32145_john-wayne.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/jungle-boogie-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/92183_jungle-boogie.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/la-chatte-rouge-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/95958_la-chatte-rouge.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/little-britain-slots-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/47087_little-britain.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/lucky-panda-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/57127_luckypanda.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/azteca-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/80031_azteca.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/marilyn-monroe-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/40393_monroe.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/monty-pythons-spamalot-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/22611_spamalot.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/mrcashback-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/42636_cashback.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/neptunes-kingdom-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/11356_neptunes-kingdom.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/party-line-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/31985_party-line.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/punisher-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/57643_thumb_the_punisher.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/banana-monkey-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/95225_banana-monkey.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/purple-hot-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/69836_purple-hot.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/rock-n-roller-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/50718_rock-and-roller.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/rome-and-glory-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/44324_rome-and-glory.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/silver-bullet-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/28133_silverbullet.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/sunset-beach-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/31332_sunset-beach.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/baywatch-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/51907_baywatch.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/sweet-party-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/95473_sweet-party.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/bermuda-triangle-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/68702_bermuda-triable.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/tennis-stars-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/63389_tennis-stars.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/thai-temple-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/48590_thai-temple.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/blade-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/81751_bladethumb.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/the-six-million-dollar-man-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/44863_thumb_6milliondollarman.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/bonus-bear-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/67271_thumb_bonusbears.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/the-alchemist-spell-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/51825_thumb_the_alchemists_spell.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/the-discovery-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/45816_thumb_the_discovery.jpg">
                                  </a>
                              </li>  
                                              <li>           
                                  <a href="http://susanwins.com/britains-got-talent-online-slots-review">                  
                                    <img src="http://susanwins.com/uploads/73716_britainthumb.jpg">
                                  </a>
                              </li>  
                                        </ul>
                        </div>
                      </div>
                  </div>
                  <div class="col-xs-24 col-sm-5 col-md-5 col-lg-5">  
                      <div class="ads2">
                        <img src="http://susanwins.com/images/homepage/ad2-ad1.png">
                        <img src="http://susanwins.com/images/homepage/ad2-ad1.png">
                       <img src="http://susanwins.com/images/homepage/ad2-ad1.png">        
                      </div>
                  </div>
              </div>
        </div>

      </dov>
    </div>
  </div>  
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="http://josex2r.github.io/jQuery-SlotMachine/dist/jquery.slotmachine.js"></script>
   <script>
      $(document).ready(function(){
        $("#planeMachine").slotMachine({
          active  : 1,
          delay : 250,
          auto  : 1500
        });
        $("#planeMachine2").slotMachine({
          active  : 1,
          delay : 250,
          auto  : 1500
        });
        $("#planeMachine3").slotMachine({
          active  : 2,
          delay : 250,
          auto  : 1500
        });
        $("#planeMachine4").slotMachine({
          active  : 3,
          delay : 250,
          auto  : 1500
        });
        $("#planeMachine5").slotMachine({
          active  : 4,
          delay : 250,
          auto  : 1500
        });
      });
    </script>

@endsection
