@extends('home.layout')

@section('page-title')
 - All Games
@endsection

@section('scripts_here')
  <script type="text/javascript" src="https://www.youtube.com/player_api"></script>
  <link rel="stylesheet" href="{{ asset('css/slick.css') }}">    
  <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">    
@endsection


@section('singlecontent')

<style type="text/css">

.no-gutter > [class*='col-'] {
padding-right:0;
padding-left:0;
}
#planeMachine{
width: 100%;
height: 280px;
}
.reels{
padding: 0 53px 0 67px;
margin-top: 13px;
height: 244px;
overflow: hidden;
}
.reels img{
border-right: 2px solid #040404;
}

#no-comments{
font-family: Roboto;
margin-left: 40px;
margin-top: 20px;
}

.sidebar .sidebarInner{
background: #c20f14;
padding: 12px 14px 12px 19px;
margin-top: -57px;
border-radius: 4px;
overflow: hidden;
}
.sidebar .susan{
margin-top: 60px;
}
.sidebar h3{
padding: 0 0px 0px 0px;
margin: 3px 0 15px 2px;
font-family: 'Work Sans';
color: #9a0a0e;
font-weight: 800;
font-size: 30px;
border-bottom: 1px solid #b00c0c;
}
.sidebar .rellimg img{
width: 100%;
background: #ffe18d;
background: -moz-linear-gradient(top, #ffe18d 0%, #cd8b01 27%, #ffe491 57%, #cfb319 80%, #cdb985 100%);
background: -webkit-linear-gradient(top, #ffe18d 0%,#cd8b01 27%,#ffe491 57%,#cfb319 80%,#cdb985 100%);
background: linear-gradient(to bottom, #ffe18d 0%,#cd8b01 27%,#ffe491 57%,#cfb319 80%,#cdb985 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffe18d', endColorstr='#cdb985',GradientType=0 );
-moz-background-size: 250% 250%, 100% 100%;
background-size: 250% 250%, 100% 100%;
-webkit-transition: background-position 0s ease;
-moz-transition: background-position 0s ease;
-o-transition: background-position 0s ease;
transition: background-position 0s ease;
border-radius: 7px;
overflow: hidden;
-moz-box-shadow: 0 0 10px -2px #000;
-webkit-box-shadow: 0 0 10px -2px #000;
box-shadow: 0 0 10px -2px #000;
height: auto;
margin: 10px 0;
padding: 2px;
}
.singlePostBG{
height: 100%;
position: absolute;
top: 687px;
width: 99%;
left: 12px;
}
.randombutton {
background: #ffa8a9;
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top, #ffa8a9 0%, #911e1f 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffa8a9), color-stop(100%,#911e1f));
background: -webkit-linear-gradient(top, #ffa8a9 0%,#911e1f 100%);
background: -o-linear-gradient(top, #ffa8a9 0%,#911e1f 100%);
background: -ms-linear-gradient(top, #ffa8a9 0%,#911e1f 100%);
background: linear-gradient(to bottom, #ffa8a9 0%,#911e1f 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffa8a9', endColorstr='#911e1f',GradientType=0 );
border-radius: 50px;
padding: 2px;
width: 38%;
margin-left: 60px;
cursor: pointer;
text-align: center;
margin: 0 auto;
z-index: 2;
position: relative;
}

.randombutton .inner, .claimbutton .inner {
background: #fff!important;
border-radius: 50px!important;
padding: 6px 0;      
}
.claimbutton .inner {
margin: 0!important;
text-align: center!important;
}
.randombutton .inner img, .claimbutton .inner  img{
width: auto;
}

.claimbutton {
background: #f1d841;
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top, #f1d841 0%, #ca9b20 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f1d841), color-stop(100%,#ca9b20));
background: -webkit-linear-gradient(top, #f1d841 0%,#ca9b20 100%);
background: -o-linear-gradient(top, #f1d841 0%,#ca9b20 100%);
background: -ms-linear-gradient(top, #f1d841 0%,#ca9b20 100%);
background: linear-gradient(to bottom, #f1d841 0%,#ca9b20 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1d841', endColorstr='#ca9b20',GradientType=0 );
border-radius: 50px;
padding: 2px;
cursor: pointer;

width: 39%;
margin: 30px auto 20px auto;
}


.commentsReel{
margin-left: -2px;
position: absolute;
top: 20px;
left: 3px;
width: 100.1%;
}

.related {
background-color: #a27721;
width: 97.5%;
padding-top: 10px;
margin: 0 auto;
position: absolute;
top: 64px;
left: 13px;
}
.related .outer {
background-color: #DABE83;
margin: 10px 30px 10px 30px;
padding-top: 1px;
border-radius: 2px;
-moz-box-shadow: inset 0 0 10px -1px #000;
-webkit-box-shadow: inset 0 0 10px -1px #000;
box-shadow: inset 0 0 10px -1px #000;
border: 1px solid #8C6416;
}
.related .outer .inner {
background: #F9F3E8;
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(left, #F9F3E8 0%, #ffffff 21%, #ffffff 50%, #ffffff 79%, #F9F3E8 100%);
background: -webkit-gradient(linear, left top, right top, color-stop(0%,#F9F3E8), color-stop(21%,#ffffff), color-stop(50%,#ffffff), color-stop(79%,#ffffff), color-stop(100%,#F9F3E8));
background: -webkit-linear-gradient(left, #F9F3E8 0%,#ffffff 21%,#ffffff 50%,#ffffff 79%,#F9F3E8 100%);
background: -o-linear-gradient(left, #F9F3E8 0%,#ffffff 21%,#ffffff 50%,#ffffff 79%,#F9F3E8 100%);
background: -ms-linear-gradient(left, #F9F3E8 0%,#ffffff 21%,#ffffff 50%,#ffffff 79%,#F9F3E8 100%);
background: linear-gradient(to right, #F9F3E8 0%,#ffffff 21%,#ffffff 50%,#ffffff 79%,#F9F3E8 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#F9F3E8', endColorstr='#F9F3E8',GradientType=1 );
/* background: #fff; */
margin: 10px;
border: 1px solid #fff;
border-radius: 2px;
}
.related .outer .inner h6 {
font-family: 'Work Sans';
color: #9A0A0E;
padding: 20px 20px 5px 26px;
font-size: 25px;
font-weight: 800;
}
.related .outer .inner ul {
padding: 15px 20px 30px 20px;
text-align: center;
}
.related .outer .inner ul li, .related .outer .inner ul li a {
display: inline-block;
}
.related .outer .inner ul li {
width: 19%;
}
.related .outer .inner ul li a {
width: 100%;
}
.related .outer .inner ul li a img {
width: 100%;
}

.related .outer .inner .comments ul li{
width: 100%;
margin-bottom: 10px;
text-align: left;

}
.related .outer .inner .comments ul li .commentlist img{
border-radius: 50%;
width: 50px;
float: left;
margin: 15px 15px 0 0px;
border: 1px solid #ECECEC;
}
.related .outer .inner .comments ul li .commentlist  .timestamp{
display: block;
font-size: 11px;
color: #ECD8AB;
font-family: 'Work sans',roboto,arial;
letter-spacing: 0px;
text-align: right;
margin-bottom: 10px;
position: relative;
top: 10px;
}
.related .outer .inner .comments ul li .commentlist p{
font-size: 15px;
font-family: 'Work Sans';
line-height: 19px;
font-weight: 500;
margin-top: 10px;
/*border: 1px solid #F7F0E2;*/
padding: 0 0 10px 10px;
width: 81%;
border-radius: 5px;
}
.related .outer .inner .comments ul li .commentlist .reply_btn{
width: 100%;
display: block;
font-size: 12px;
margin-top: 5px;
text-decoration: none;
color: #D8BC81;
padding-left:70px;
font-family: Roboto;
}
.related .outer .inner .comments ul{
padding-top: 0;
padding-bottom: 5px;
}
.related .outer .inner .comments textarea{
width: 84%;
margin: 20px 35px;
border: 1px solid #fff;
border-radius: 3px;
padding: 18px 20px;
font-size: 15px;
font-family: 'Work sans', Arial, Helvetica;

-moz-box-shadow: 0 5px 4px -4px #f6e2b8;
-webkit-box-shadow: 0 5px 4px -4px #f6e2b8;
box-shadow: 0 5px 4px -4px #f6e2b8;


height: 100px;
}
.replies-parent{
overflow: hidden;
}
.reply-list{
margin-left: 60px;
margin-top: 10px;
}
.comment-info, .reply-info{
font-family: 'Work Sans';
font-size: 13px;
font-weight: 400;
color: #CCCCCC;
/*text-align: right;*/
}
.comment-content, .reply-content{
font-size: 15px;
font-family: 'Work Sans';
line-height: 19px;
font-weight: 500;
margin-top: 5px;
/* border: 1px solid #F7F0E2; */
padding: 0 0 10px 70px;
width: 81%;
border-radius: 5px;
}
.reply-form{
padding-left: 70px;
}
.reply-form textarea{
border: 1px solid #F9F4EA!important;
}
.rednotifbox{
background: #FFE7E7;
margin: 10px 20px;
padding: 16px;
border-radius: 5px;
text-align: center;
color: #D26060;
font-family: Roboto;
}
.rednotifbox a{
font-family: Roboto;
text-decoration: none;
color: #CA1B1B;    
font-weight: 600; 
}
.button_example{
cursor: pointer;
border:1px solid #b1423a; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:25px; padding: 12px 12px 12px 12px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3); color: #FFFFFF;
background-color: #C9625B; background-image: -webkit-gradient(linear, left top, left bottom, from(#C9625B), to(#d20202));
background-image: -webkit-linear-gradient(top, #C9625B, #d20202);
background-image: -moz-linear-gradient(top, #C9625B, #d20202);
background-image: -ms-linear-gradient(top, #C9625B, #d20202);
background-image: -o-linear-gradient(top, #C9625B, #d20202);
background-image: linear-gradient(to bottom, #C9625B, #d20202);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#C9625B, endColorstr=#d20202);

display: block;
text-align: center;
width: 40%;
margin: 0 auto 40px auto;
font-family: 'Work Sans';
font-weight: 600;

}

.button_example:hover{
border:1px solid #8f352f;
background-color: #b5433c; background-image: -webkit-gradient(linear, left top, left bottom, from(#b5433c), to(#9f0202));
background-image: -webkit-linear-gradient(top, #b5433c, #9f0202);
background-image: -moz-linear-gradient(top, #b5433c, #9f0202);
background-image: -ms-linear-gradient(top, #b5433c, #9f0202);
background-image: -o-linear-gradient(top, #b5433c, #9f0202);
background-image: linear-gradient(to bottom, #b5433c, #9f0202);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#b5433c, endColorstr=#9f0202);
}


.related .outer .inner .comments .button_example{
font-size: 20px;
padding: 10px;
width: 30%;
}
.singleFooter{
position: absolute;
bottom: 0;
width: 100.3%;
}
.singelTopReel{
position: absolute;

width: 99%;
left: 12px;
}
.featImg {
position: relative;
margin-top: 51px;
margin-left: 40px;
width: 93%;
}

.content{
position: relative;
margin-top: 170px;
padding-left: 8px;
}
.content h2{
padding: 20px 35px 20px 10px;
margin: 10px 70px 0px 70px;
font-family: "Work Sans";
color: rgb(154, 10, 14);
font-weight: 800;
font-size: 30px;
line-height: 33px;
border-bottom: 1px solid rgb(221, 221, 221);
}
.content h2 span{
display: block;
font-weight: 500;
color: rgb(239, 162, 162);
font-family: Roboto;
font-size: 16px;
margin-top: 5px;
}
.content p b{
font-weight: 500;
}
.content p {
font-weight: 400;
font-size: 17px;
font-family: Roboto;
line-height: 25px;
margin: 30px 80px 0px 80px;
}
.content p img{
width: auto;
border-radius: 2px;
cursor: pointer;
height: auto; 
}
.content .commentCount{
font-size: 16px;
margin-top: -3px;
color: #9A0A0E;
cursor: pointer;
}
#api_count{
font-family: 'Work Sans';
font-size: 32px;
font-weight: 700;
color: #353030;
padding: 3px 5px 2px 5px;
border-radius: 5px;
display: inline-block;
margin-top: 7px;
/* background: #DFC546; */
position: relative;
top: 2px;
margin-right: 3px;
}
.contentSociallinks{
margin-left: 70px;
}
.contentSociallinks li, .contentSociallinks li a{
display: inline-block;
}
.contentSociallinks li a{
color: #fff;
padding: 5px 25px;
font-size: 25px;
border-radius: 3px;
}
.contentSociallinks li a.fb{
background: #3b5998;
}
.contentSociallinks li a.tw{
background: #54abee;
}
.contentSociallinks li a.pn{
background: #d73532;
}
.contentSociallinks li a.g{
background: #dc4a38;
}
.right{
position: absolute;
right: 30px;
}
.left{
position: absolute;
z-index: 2;
}





#wrapper{
position: absolute;
border: 0;
top:524px;
}
#wrapper a {
width: 65px;
height: 38px;
position: relative;
left: 70px;
z-index: 5;
top: -28px;
} 
#wrapper a img{
margin-top: -13px;
width: auto;
}


#playbig {
position: absolute;
right: 160px;
top: -41px;
margin-left: 0;
}
#playbig .button{
text-align: center;
font: 33px/0.9em 'Work Sans',sans-serif;
padding: .2em .6em;
}

.reply-list{
margin-left: 10%;
margin-top: 10px;
overflow: hidden;
position: relative;
float: left;
width: 90%;
}

#commentList .temporary{
opacity: 0.2;
}

.recommendBox{
left: 46%;
top: 32%;
position: fixed;
z-index: 10;
}

.recommendBox .fa-times{
position: absolute;
z-index: 2;
right: 0;
margin: 7px;
color: #CECECE;
cursor: pointer;
}

.recommendBox .recommendFriends{
overflow: hidden;
border-radius: 5px;
background: rgba(255, 255, 255, 0.98);
width: 370px;
height: 490px;
text-align: center;
position: relative;
padding: 0 0 20px 0;
display: none;
-moz-box-shadow: 0 0 30px -10px #000;
-webkit-box-shadow: 0 0 30px -10px #000;
box-shadow: 0 0 30px -10px #000;
}

.recommendFriends ul{
height: 426px;
padding-top: 30px;
}

.recommendFriends ul li{
overflow: hidden;
border-bottom: 1px solid rgba(255, 255, 255, 0.48);
padding-bottom: 10px;
padding: 10px 20px;
background: rgba(255, 255, 255, 0.50);
transition: background 0.2s ease;
position: relative;
text-align: left;
}

.recommendFriends ul li .msgImgcont{
width: 50px;
height: 50px;
border-radius: 50%;
overflow: hidden;
float: left;
}

.recommendFriends ul li .msgImgcont img{
width: 100%;
}

.recommendFriends ul li h6{
font-family: 'Work Sans';
margin-left: 75px;
display: block;
font-size: 16px;
font-weight: 600;
padding-top: 10px;
color: #000;
}

.recommendFriends ul li .recommendCheck{
float: right;
margin-top: -12px;
margin-right: 16px;
}

.recommendBox .recommendBtn{
background: #A40605;
border: none;
display: block;
width: 352px;
padding: 7px;
border-radius: 2px;
color: #fff;
font-family: 'Work Sans';
font-size: 20px;
font-weight: 500;
-moz-box-shadow: 0px 2px 3px -2px #696969;
-webkit-box-shadow: 0px 2px 3px -2px #696969;
box-shadow: 0px 2px 3px -2px #696969;
cursor: pointer;
margin: 8px auto;
}

#recommendToFriend{
background: #A40605;
padding: 9px 10px;
border-radius: 2px;
color: #fff;
font-family: 'Work Sans';
font-size: 14px;
font-weight: 200;
display: block;
position: relative;
top: -3px;
-moz-box-shadow: 0px 2px 3px -2px #696969;
-webkit-box-shadow: 0px 2px 3px -2px #696969;
box-shadow: 0px 2px 3px -2px #696969;
cursor: pointer;
border: none;
}
.commentRelativeBox{
overflow: hidden;
left: 5px;
position:relative;
}

.bottomCasinos{
width: 100%;
margin-bottom: 10px;
text-align: center;
display: none;
height: 128px;
}
.bottomCasinos ul li, .bottomCasinos ul li a{
display: inline-block;
}
.bottomCasinos ul li {
width: 23%!important;
}
.bottomCasinos ul li a img{
width: 100%;
border-radius: 5px;
}



@media(max-width: 1199px){
.right{
right:2px; 
width: 25%;
}
.left{
left: -19px;
}
.featImg{
margin-top: 41px;
margin-left: 38px;
width: 92.5%;
}
.reels {
padding: 0 41px 0 58px;
margin-top: 12px;
height: 200px;
}
.singlePostBG{
top: 569px;
}
.content{
margin-top: 150px;
}
#wrapper{
top: 427px;
}
.related{
top: 57px;
left: 11px;
}
}
@media(max-width: 991px){
.featImg {
margin-top: 32px;
margin-left: 31px;
width: 92.7%;
}
.reels {
padding: 0 29px 0 48px;
margin-top: 8px;
height: 156px;
}
#wrapper {
top: 326px;
left: -13px;
}
#wrapper a {
width: 60px;
height: 35px;
}
.singlePostBG{
top: 440px;
}
.content {
margin-top: 111px;
}
.content h2{
margin: 10px 31px 0px 49px;
}
.content p{
margin: 30px 41px 0px 60px;
}
.contentSociallinks {
margin-left: 53px;
}
.singleFooter{
left: 3px;
}
.commentsReel{
top: 29px;
left: 6px;
}
.related .outer .inner ul li {
width: 24%;
}
.randombutton, .claimbutton{
width: 50%;
}
}
@media(max-width: 768px){
.related .outer .inner ul li {
width: 24%;
}
}
@media(max-width: 766px){
.right {
display: none;
}
.left {
left: auto;
}
.singlePostBG {
top: 568px;
}
.reels {
padding: 0 40px 0 57px;
margin-top: 12px;
height: 197px;
}
.featImg {           
margin-left: 36px;
width: 92.4%;
margin-top: 40px;
}
#wrapper{
top: 419px;
}
.content {
margin-top: 150px;
}
.content p {
margin: 30px 53px 0px 60px;
}
.commentsReel{
top: 30px;
left: 4px;
width: 100.2%;
}
.related{
width: 97.6%;
left: 11px;
top: 65px;
}
.singleFooter{
left: 1px;
}
.related .outer .inner ul li {
width: 23%;
}

}
.latestMain{
background: none;
box-shadow: 0 0 0 0;
}
.latestMain .gameList{
margin: 3px 33px 20px 41px;
}
.latestMain .gameList .inner{
background-repeat: repeat;
}

.related{
  height: 1320px;
}
</style>


<div clbeass="container-fluid">
  <div class="container"  style="position:relative;">
    <div class="row no-gutter">
      <div class="col-xs-24 col-lg-24 col-lg-24 col-lg-24">
       

        <div class="col-xs-24 col-sm-19 col-md-19 col-lg-19 left">

          <img src="{{ url('images/responsive/singleTopReel.png') }}" class="singelTopReel" />
          <img src="{{ url('images/responsive/singlePostBG.png') }}" class="singlePostBG">
          
          <div class="featImg featimg">
               <img src="http://susanwins.com/uploads/80615_allgamesheader.png" />
          </div>

          <div class="reels">
                  <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine2" class="" style="overflow: hidden;height: 248px;width: 100%;">
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/19401_music.jpg">                            
                              </div>
                          </div>
                    </div>          
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine3" class="" style="overflow: hidden;height: 248px;width: 100%;">
                              <div class="text-center">
                                <img src="http://susanwins.com/uploads/80687_longterm.jpg">  
                              </div>
                          </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine4" class="" style="overflow: hidden;height: 248px;width: 100%;">
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/81613_funrating.jpg">         
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine5" class="" style="overflow: hidden;height: 248px;width: 100%;">
                          <div class="text-center">
                            <img src="http://susanwins.com/uploads/47931_graphic.jpg">
                          </div>
                        </div>
                    </div>
                  </div>
          </div>

          <div id="wrapper">
              <div class="socbtn"> 
                <a class="button fbblue serif round glass sharrre" id="share_via_facebook" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text="Share this up!"><img src="http://susanwins.com/uploads/34329_fb-button.png" style="left: 2px!important;top: -4px;"></a>
                <a class="button pink serif round glass sharrre" id="share_via_pinterest" style="left:55px;" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text="Pin me!"><img src="http://susanwins.com/uploads/76008_pinterestubtton.png" style="left:4px!important;top: -3px;"></a>
                <a class="button blue serif round glass sharrre" id="share_via_twitter" style="left: 40px;" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text="I'm tweeting this awesome game!"><img src="http://susanwins.com/uploads/70478_twitter-icon.png" style="top: -3px;left: 1px;"></a>      
                <a class="button pink serif round glass sharrre" id="share_via_googlePlus" style="left:25px;" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text=""><img src="http://susanwins.com/uploads/79339_g+button.png"></a>
              </div>
               <div id="playbig">
                <a id="winwinwin3" class="button pink serif round glass"> Play Now! </a>         
              </div>
          </div>
          

          

            

          <div class="content">
             <div class="postcontent">
                 <div class="latestMain">
                      <div class="gameList">
                          <div class="inner">
                                  <div class="gameslider">
                                      <?php $counter_ni = 0; ?>
                                      @foreach($posts as $post)

                                        @if($counter_ni == 0)
                                          <div>
                                            <ul>
                                              <li> <a href="{{url('')}}/{{$post->slug}}"><img class="forlazy" data-lazy="{{url('uploads')}}/{{$post->thumb_feature_image}}" src="http://susanwins.com/uploads/all_games_loading.gif"> </a> </li>
                                              <?php $counter_ni++ ?>
                                        @elseif($counter_ni % 20 == 0)
                                            </ul>
                                          </div>
                                          <div>
                                            <ul>
                                            <li> <a href="{{url('')}}/{{$post->slug}}"><img class="forlazy" data-lazy="{{url('uploads')}}/{{$post->thumb_feature_image}}" src="http://susanwins.com/uploads/all_games_loading.gif"> </a> </li>
                                            <?php $counter_ni++ ?>
                                        @else
                                            <li> <a href="{{url('')}}/{{$post->slug}}"><img class="forlazy" data-lazy="{{url('uploads')}}/{{$post->thumb_feature_image}}" src="http://susanwins.com/uploads/all_games_loading.gif"> </a> </li>
                                            <?php $counter_ni++ ?>
                                        @endif
                                      @endforeach
                                          </ul>
                                        </div>

                                  </div>
                          </div>
                      </div>
                  </div>
              </div>       
          </div>

          <div class="commentRelativeBox" style="height: 1678px;">

           

                <img src="http://www.susanwins.com/images/responsive/commentsReel.png" class="commentsReel">

                <div class="related">
                            

                              <div class="outer">




                                  <div class="inner">

                                          <div class="claimbutton">
                                            <div class="inner">
                                              <img src="http://susanwins.com/images/homepage/claim.png">
                                            </div>
                                          </div>

                                          <div class="bottomCasinos">
                                              <ul>
                                                 
                                                <li> <a href="3" target="_blank"> <img src="http://www.susanwins.com/uploads/13553_hardrock2.jpg"> </a> </li>
                                                 
                                                <li> <a href="1" target="_blank"> <img src="http://www.susanwins.com/uploads/13553_hardrock2.jpg"> </a> </li>
                                                 
                                                <li> <a href="4" target="_blank"> <img src="http://www.susanwins.com/uploads/13553_hardrock2.jpg"> </a> </li>
                                                 
                                                <li> <a href="2" target="_blank"> <img src="http://www.susanwins.com/uploads/13553_hardrock2.jpg"> </a> </li>
                                                                                              </ul>
                                          </div>
                                          


                                      <h6> Top Categories </h6>
                                      <ul>
                                          
                                              <li><a href="http://susanwins.com/pirates"><img src="http://susanwins.com/uploads/70833_pirate.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/cowboywestern"><img src="http://susanwins.com/uploads/71559_cowboy.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/mysterious"><img src="http://susanwins.com/uploads/32493_mystery.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/movie"><img src="http://susanwins.com/uploads/18354_movies.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/party"><img src="http://susanwins.com/uploads/30641_party.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/sea-2"><img src="http://susanwins.com/uploads/42258_sea.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/cute"><img src="http://susanwins.com/uploads/63299_cute.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/vegas"><img src="http://susanwins.com/uploads/35722_vegas.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/myths-legends"><img src="http://susanwins.com/uploads/26569_myths.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/adventure"><img src="http://susanwins.com/uploads/76393_adventure.png"></a></li>
                                           
                                              <li style="position: relative; top: 10px;"><a href="http://susanwins.com/sexy"><img src="http://susanwins.com/uploads/24631_sexy.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/superheroes"><img src="http://susanwins.com/uploads/28203_superhero.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/tropicaljungle"><img src="http://susanwins.com/uploads/41272_tropical.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/animal"><img src="http://susanwins.com/uploads/63125_animals.png "></a></li>
                                           
                                              <li><a href="http://susanwins.com/sorcery"><img src="http://susanwins.com/uploads/88737_sorcery.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/celebs"><img src="http://susanwins.com/uploads/49000_celebs.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/romance"><img src="http://susanwins.com/uploads/33566_romantic.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/seasonal"><img src="http://susanwins.com/uploads/52845_seasonal.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/fantasy"><img src="http://susanwins.com/uploads/48873_fantasy.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/television"><img src="http://susanwins.com/uploads/28435_television.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/medieval"><img src="http://susanwins.com/uploads/43173_medieval.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/egyptian"><img src="http://susanwins.com/uploads/76342_egyptian.png"></a></li>
                                           
                                              <li><a href="http://susanwins.com/comic"><img src="http://susanwins.com/uploads/27452_comic.png "></a></li>
                                           
                                              <li><a href="http://susanwins.com/classic"><img src="http://susanwins.com/uploads/66321_classic.png"></a></li>
                                                                                                                                  
                                      </ul>  
                                                                
                                      <h6 style="border-top: 1px solid #F9EBCF;"> Recent Comments </h6>
                                   

                        
                                      <div class="comments">

                                       <div class="comment-section">
                                                
                                                  <div class="comments-list" id="commentList">
                                                                                                        <ul></ul>
                                                            <p id="no-comments">No Comments yet.</p>


                                                                                                        
                                                  </div>



                                                    <form class="comment-form" action="http://susanwins.com/add_comment" method="POST" id="commentForm">
                                                    <input type="hidden" name="_token" value="1wYYjbtAylFDRJW7j1XBkRXCoxnLbAP3j1zQzdXm">
                                                      <div class="form-group">
                                                          <textarea class="form-control" rows="4" placeholder="Write a comment" name="content" id="submitCommentTextarea" disabled="disabled"></textarea>
                                                      </div>
                                                      <div class="form-group">
                                                        
                                                                                                                 <div class="rednotifbox">
                                                              <a href="http://susanwins.com/login?redirect=http://susanwins.com/tennis-stars-online-slots-review">Login to Comment</a> or <a href="http://susanwins.com/register?redirect=http://susanwins.com/tennis-stars-online-slots-review">Register</a>
                                                            </div>
                                                                                                          </div>
                                                      <div class="form-group">
                                                          <button type="submit" class="button_example" value="submit" id="submitCommentForm" disabled="disabled">Submit</button>
                                                      </div>
                                                  </form>
                                                  
                                              </div>
                                      </div>          

                      </div>
                    </div>
                </div>

                <img src="http://www.susanwins.com/images/responsive/singleFooter.png" class="singleFooter">
            </div>



        </div>

            <div class="col-xs-24 col-sm-5 col-md-5 col-lg-5 right">
               <div class="sidebar">
                  <img src="http://susanwins.com/uploads/26351_single-susan.png" alt="" class="susan">
                      <div class="sidebarInner">
                        <h3> <img src="http://susanwins.com/uploads/28532_sidebartext.png" alt=""> </h3>
                         <div class="rellimg"></div>
                     </div>
               </div>
            </div>

        
              </div>
            </div>  
        </div>
    </div>
  </div>

  



@endsection



@section('footer_scripts')

<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
 <script>
   var width = $(window).width(); 
    var height = $(window).height(); 


    $(document).ready(function(){




      var page = 1,
      all_games_page = 1,
      random_order_number = '{{$random_order_number}}';

        $('.gameslider').slick({
          dots:true,
          lazyLoad: 'ondemand',
          arrows:false,
          speed:250
        });

      var reels_image = [
            @foreach($reel_posts as $reel_post)
              '<div class="slotwrapper"><div class="details"><a href="{{url('')}}/{{$reel_post->slug}}" class="img-shadow"><img style="border-left: 2px solid #000;" src="{{url('uploads')}}/{{$reel_post->reels_image}}"></a></div></div>',
            @endforeach
        ];

      var reel_post_buffers = 
          [
            @foreach($reel_post_buffers as $reel_post_buffer)
              '<div class="slotwrapper"><div class="details"><a href="{{url('')}}/{{$reel_post_buffer->slug}}" class="img-shadow"><img style="border-left: 2px solid #000;" src="{{url('uploads')}}/{{$reel_post_buffer->reels_image}}"></a></div></div>',
            @endforeach
            @foreach($reel_posts as $reel_post)
              '<div class="slotwrapper"><div class="details"><a href="{{url('')}}/{{$reel_post->slug}}" class="img-shadow"><img style="border-left: 2px solid #000;" src="{{url('uploads')}}/{{$reel_post->reels_image}}"></a></div></div>',
            @endforeach
          ];

          <?php $count_yeah = 1; ?>

          preload(
            @foreach($reel_post_buffers as $reel_post_buffer)
              '{{url('uploads')}}/{{$reel_post_buffer->reels_image}}',
            @endforeach
            @foreach($reel_posts as $reel_post)
              <?php 
                if($count_yeah < 20) {
              ?>
              '{{url('uploads')}}/{{$reel_post->reels_image}}',
              <?php 
                }else
                {
              ?>
              '{{url('uploads')}}/{{$reel_post->reels_image}}'
              <?php 
              }
              ?>

              <?php $count_yeah++; ?>
            @endforeach

          );


      var buffer_more = reels_image;

      var ezslot = new EZSlots("ezslots",{"reelCount":4,"winningSet":[0,1,2,3],"symbols":reels_image,"height":287,"width":171});
      


        $("#gogogo2").click(function(){

          $('#ezslots').html('');
          if(page == 1)
          {
            var ezslot = new EZSlots("ezslots",{"reelCount":4,"winningSet":[0,1,2,3],"symbols":reel_post_buffers,"height":287,"width":171});
          }
          else
          {
            var ezslot = new EZSlots("ezslots",{"reelCount":4,"winningSet":[4,5,6,7],"symbols":reel_post_buffers,"height":287,"width":171});
          }
          

          ezslot.win();
          $("#gogogo2").css({
            'pointer-events':'none'
          });

          function pointevent(){
            $("#gogogo2").css({
              'pointer-events':'auto'
            });
          }
          setTimeout(pointevent, 2550);

          $.ajax({
            type: 'post',
            url: "{{url('home/ajax_get_reels_post')}}",
            data: {_token: CSRF_TOKEN,'page' : page,'random_order_number' : random_order_number}, 
            success: function(response)
            {
              
              var parsed = JSON.parse(response),
              number_of_object = Object.keys(parsed).length;

              reel_post_buffers = [];


              if(number_of_object < 4)
              {
                // console.log('less than 4');
                reel_post_buffers = reels_image;
                page = 1;
              }
              else
              {
                // console.log('go on');
                reel_post_buffers.push(buffer_more[0]);
                reel_post_buffers.push(buffer_more[1]);
                reel_post_buffers.push(buffer_more[2]);
                reel_post_buffers.push(buffer_more[3]);

                $.each( parsed, function( index, obj){

                  reel_post_buffers.push('<div class="slotwrapper"><div class="details"><a href="{{url('')}}/'+obj.slug+'"><img src="{{url('uploads')}}/'+obj.reels_image+'"></a></div></div>');
                  preload('{{url("uploads")}}/'+obj.reels_image);
                });
                page++;

              }

            }
            
          });
       
        });

      


    // var images2 = new Array();

      function preload() {
        // console.log(preload.arguments[0]);
        for (i = 0; i < preload.arguments.length; i++) {
          var images2 = new Image();
          images2.src = preload.arguments[i];
        }
      }


      $(function(){

          var $divView = $('div.view');
          var innerHeight = $divView.removeClass('view').height();
          $divView.addClass('view');
            
          $('div.slide').click(function() {
              $('div.view').animate({
                height: (($divView.height() == 450)? innerHeight  : "450px")
              }, 500);
              return false;
          });

        var options = {
          horizontalPixelsCount: 90,
          verticalPixelsCount: 5,
          pixelSize: 5,
          disabledPixelColor: '#080808',
          enabledPixelColor: '#ff0101',
          pathToPixelImage: 'http://susanwins.com/uploads/43978_pixel.png',
          stepDelay: 40,
          // only for canvas
          backgroundColor: '#080808',
          // only for canvas
          pixelRatio: 0.7,
          runImmidiatly: true
        };

      });


    });



    var finalSidebarContentHeight = 0, sidebarContentHeight = 0;
    contentOffset = 1;
    ajaxDone = false;
    sideBarHeightLeft = 0;
    sideBarCompleted = false;
    sideBarAjaxDone = true;

    pendingSideBarElements = [];

    sideBarSpacer = parseInt($('.rellimg').css('padding-bottom'));
    console.log('sideBarSpacer '+sideBarSpacer);

    sideBarSingleContentHeight = 117 + (sideBarSpacer * 2);

    function updateSidebarHeight(){

     mainHeight = $('#main').height() - ($('.main').height()) - parseInt($('.singleFooter').css('padding-bottom').replace('px', ''));

             sideBarHeight = mainHeight + ( $('.postcontent').offset().top - $('.sidebar').offset().top );
        finalSidebarContentHeight = sideBarHeight - ( $('.sidebar').find('h3').height() + (sideBarSpacer ) );
        $('.sidebar').css('height', sideBarHeight+'px');
        sidebarContentHeight = $('.rellimg').height();
        sideBarHeightLeft = finalSidebarContentHeight - sidebarContentHeight;

        lastElement = $('.rellimg').children(':visible').last();

        if( $('.rellimg').find('.updateHeight').length > 0){
             lastElement = $('.rellimg').find('.updateHeight').first();
               lastElement.next().css('visibility', 'hidden');
        }

        theImage = $(lastElement).find('img');

        if(sideBarHeightLeft <= sideBarSpacer){ 

          offsetBottom = ($('.sidebar').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer);

            if(!lastElement.hasClass('updateHeight')){

              lastElement.addClass('updateHeight').data('originalHeight', $(theImage).height());
              theImage.css('height', offsetBottom+'px');
            }else{
              lastElement.css('visibility', 'visible');
              if(offsetBottom > 0 && offsetBottom < lastElement.data('originalHeight')){
                 theImage.css('height', offsetBottom+'px');

              }else if(offsetBottom >= lastElement.data('originalHeight')){

                theImage.css('height', lastElement.data('originalHeight')+'px');

              }else{

               
                   console.log('unshift');

                  prevElement = lastElement.prev();

                  prevElementImage = prevElement.find('img');


                  if(offsetBottom <= 0){
                     lastElement.css('visibility', 'hidden');
                   }else{

                   }

                  prevOffsetBottom = ($('.sidebar').offset().top+sideBarHeight) - prevElement.offset().top - (sideBarSpacer);

                  prevElement.addClass('updateHeight').data('originalHeight', $(prevElementImage).height());
                   prevElementImage.css('height', prevOffsetBottom+'px');
                
              }
            }
            

       
              }else{

                if(lastElement.hasClass('updateHeight')){

                  if(theImage.height() >= lastElement.data('originalHeight')){
                       theImage.css('height', lastElement.data('originalHeight')+'px');
                        lastElement.removeClass('updateHeight').removeData('originalHeight');
                    }else{

                      offsetBottom = ($('.sidebar').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer);

                      if(offsetBottom <= lastElement.data('originalHeight')){
                          theImage.css('height', offsetBottom+'px');
                      }else{
                        

                          if(offsetBottom - lastElement.data('originalHeight') > 0){

                            lastElement.next().css('visibility', 'visible');

                          }else{

                             lastElement.next().css('visibility', 'hidden');
                          }

                          changeHeight = lastElement.attr('data-height') ? lastElement.attr('data-height') : lastElement.data('originalHeight');
                          theImage.css('height', changeHeight+'px');

                          if(!lastElement.attr('data-height') ){
                            lastElement.attr('data-height', lastElement.data('originalHeight') );
                          }

                          lastElement.addClass('updatedHeight').removeClass('updateHeight').removeData('originalHeight');



                          
                      }     
                       
                    }

                }

              }
        }
    


    startAddingSidebarInterval = null;
    setSidebarLoadInterval();
    maxSidebarAutoLoad = 10 * 10; //10 seconds
    maxSidebarCounter = 0;

    $(window).scroll(function(event){
      //console.log(sideBarCompleted);
            if(!sideBarCompleted)
            {
                clearInterval(startAddingSidebarInterval);
                setSidebarLoadInterval();
            }
            else
            {
              // console.log('sideBarCompleted');
            }
    });

    $(document).on('adjustHeight', function(){
          sideBarCompleted = false;
          startAddingSidebarContent();
    });

    function setSidebarLoadInterval(){
        startAddingSidebarInterval = setInterval(function(){
          maxSidebarCounter++;

          if(maxSidebarAutoLoad == maxSidebarCounter){
            clearInterval(startAddingSidebarInterval);
          }else{
             if(sideBarCompleted){
              clearInterval(startAddingSidebarInterval);
            }else{
              startAddingSidebarContent();
            }
          }
         
        

      }, 100);
    }

    function startAddingSidebarContent(){

        updateSidebarHeight();
        //console.log(sideBarCompleted);
            
          if(finalSidebarContentHeight > sidebarContentHeight && sideBarHeightLeft >= sideBarSingleContentHeight){
              getSidebarContent();
            }else{
              if(sideBarHeightLeft <= 0){
                  //console.log(sideBarHeightLeft);
                   lastImage = $('.rellimg').children().last();

                  pendingSideBarElements.push($(lastImage)[0].outerHTML);
                      console.log('sideBarCompleted = true');
                      //$(lastImage).remove();
                      sideBarCompleted = true;
               
              }else{
                sideBarCompleted = true;
              }
            }
    }

     function getSidebarContent(){

          if(sideBarAjaxDone && sideBarHeightLeft >= sideBarSingleContentHeight){ 

            if(pendingSideBarElements.length > 0){

                temp = pendingSideBarElements;

                stillPending = [];

                $.each(temp, function(i, l){

                                     /* if(sideBarHeightLeft >= sideBarSingleContentHeight){
                                          $( ".rellimg" ).append(l);
                                            updateSidebarHeight();
                                      }else{
                                        stillPending.push(l);
                                      }*/

                                    singleSidebarImage(l, function(el){
                                       stillPending.push(el);
                                    });

                });

                pendingSideBarElements = stillPending;

      }else{
              
              sideBarAjaxDone = false;
              sideBarAJAX().done(function(response){
                             

                              var parsed = JSON.parse(response);

                              contentOffset++;

                              $.each( parsed, function( i, l ){
                               

                               /* if(sideBarHeightLeft >= sideBarSingleContentHeight){

                                    $( ".rellimg" ).append(l);
                                      updateSidebarHeight();
                                }else{
                                   pendingSideBarElements.push(l);
                                }*/

                                singleSidebarImage(l, function(el){
                                  pendingSideBarElements.push(el);
                                });
                              });
                              sideBarAjaxDone = true;
              });
      }


                     
          }



    }


    function sideBarAJAX(){

      var dfr = $.Deferred();


      maxThrottles = 10;
      throttleCounter = 0;
      throttleTimeout = 3000;
      (function throttle(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
                          type: 'post',
                          url: "{{url('home/ajax_get_ads_posts_init')}}",
                          data: {_token: CSRF_TOKEN, 'contentOffset' :contentOffset },
                          success : dfr.resolve, 
                          error : function(xhr){

                            throttleCounter++;
                            if ( xhr.status === 401 || xhr.status === 500 && throttleCounter <= maxThrottles) {
                                return setTimeout(function(){ throttle( this ) }, throttleTimeout);
                            }

                            dfr.rejectWith.apply( this, [] );
                          }
                
              });
      })();

      return dfr.promise();

    }


      singleImageLoaded = true;

    function singleSidebarImage(el, callback){

     

      if(sideBarHeightLeft >= sideBarSingleContentHeight && singleImageLoaded){

        element = $(el).hide();

        singleImageLoaded = false;

        $( ".rellimg" ).append(element);

        image = new Image();

        image.onload = function(){

          singleImageLoaded = true;

          theHeight = this.fixedHeight == 117 ? this.fixedHeight : this.naturalHeight;
          $(this.element).find('img').css('height', theHeight+'px');

          $(this.element).show();
          updateSidebarHeight();

        }

        image.onerror = function(){
          singleImageLoaded = true;
          $(this.element).show();
           updateSidebarHeight();
        }

        image.src = $(el).find('img').attr('src');
        image.fixedHeight = parseInt($(el).find('img').css('height').replace('px', ''));
        image.element = element;



      
      }else{
        callback(el);
      }

        
    }

/*      $.ajax({
        type: 'post',
        url: "{{url('home/ajax_get_ads_posts_init')}}",
        data: {_token: CSRF_TOKEN2}, 
        success: function(response)
        {
          var parsed = JSON.parse(response);

          $.each( parsed, function( i, l ){
            $( ".rellimg" ).append(l);
          });

        }
        
      });*/


  


    $(window).bind("load", function() {

        var result = $(".content").height();            
        var result2 = $(".related").height();           

        $(".singlePostBG").height(result);

          if ( width > 1199 ) {
            var relatedAddition = 245;
          }
          else if ( width > 991 && width < 1200 ) {
            var relatedAddition = 205;
          }
          else if( width > 767 && width < 992 ){
            var relatedAddition = 170;
          }
          else if( width > 765 && width < 767 ){
            var relatedAddition = 210;
          }
          else if( width < 766 ){
            var relatedAddition = 210;
          }
        

        $(".commentRelativeBox").height(result2 + relatedAddition );
    });
    

  </script>


@endsection
