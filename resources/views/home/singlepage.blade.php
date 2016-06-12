@extends('home.layout')


@section('page-title')
 - {{$category_name}}
@endsection

@section('scripts_here')
  <script type="text/javascript" src="https://www.youtube.com/player_api"></script>
@endsection


@section('singlecontent')


<style type="text/css">
body{
	margin-top: 100px;
}
.no-gutter > [class*='col-'] {
padding-right:0;
padding-left:0;
}
#planeMachine{
width: 100%;
height: 280px;
}


      .oval-speech {
          position: absolute;
          width: 258px;
          padding: 30px 21px;
          margin: 2.5em auto 50px;
          margin-left: -149px;
          z-index: 2;
          text-align: center;
          color: #fff;
          background: #FFFFFF;
          -webkit-border-top-left-radius: 220px 120px;
          -webkit-border-top-right-radius: 220px 120px;
          -webkit-border-bottom-right-radius: 220px 120px;
          -webkit-border-bottom-left-radius: 220px 120px;
          -moz-border-radius: 220px / 120px;
          border-radius: 318px / 184px;
          border: 4px solid #e8c38a;
          -moz-transform: rotate(-6deg);
          -webkit-transform: rotate(-6deg);
          transform: rotate(-6deg);
          -moz-box-shadow: 0 0 14px -3px #949494;
          -webkit-box-shadow: 0 0 14px -3px #949494;
          box-shadow: 0 0 14px -3px #949494;
      }
      .oval-speech p {
        font-family: 'Work Sans',Roboto,Arial,Helvetica,sans-serif;
        font-size: 27px;
        font-weight: 900;
        color: #000000;
      }
      .oval-speech p a{
        text-decoration: none;
        color: #C12726;
        display: block;
        font-size: 27px;
      }
.reels{
padding: 0 53px 0 67px;
margin-top: 19px;
height: 244px;
overflow: hidden;
}
.reels p{
color: white;
padding: 4px 0;
background: rgb(226,39,39);
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2UyMjcyNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNiMDBmMGYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(226,39,39,1) 0%, rgba(176,15,15,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(226,39,39,1)), color-stop(100%,rgba(176,15,15,1)));
background: -webkit-linear-gradient(top,  rgba(226,39,39,1) 0%,rgba(176,15,15,1) 100%);
background: -o-linear-gradient(top,  rgba(226,39,39,1) 0%,rgba(176,15,15,1) 100%);
background: -ms-linear-gradient(top,  rgba(226,39,39,1) 0%,rgba(176,15,15,1) 100%);
background: linear-gradient(to bottom,  rgba(226,39,39,1) 0%,rgba(176,15,15,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e22727', endColorstr='#b00f0f',GradientType=0 );

-moz-box-shadow: inset 0 0 10px -3px #000;
-webkit-box-shadow: inset 0 0 10px -3px #000;
box-shadow: inset 0 0 10px -3px #000;

position: relative;
text-align: center;
width: 102%;
margin-left: -8px;
font-family: 'Work Sans';
font-weight: 600;
text-shadow: 0px 2px 2px rgb(102, 3, 3);
color: #FFD4D4;
letter-spacing: 0.5px;
}

.reels img{
border-right: 2px solid #040404;
}

#no-comments{
font-family: Roboto;
margin-left: 40px;
margin-top: 20px;
}
.rellimg{
      margin: 12px 14px 12px 19px;
}
.sidebar .sidebarInner{

      background: linear-gradient(to right, #F7ECBA 0%,#ffffff 21%,#ffffff 50%,#ffffff 79%,#F7ECBA 100%);
    border: 2px solid #F3CD7C;


/*background: #c20f14;*/
/*padding: 12px 14px 12px 19px;*/
margin-top: -21px;
border-radius: 4px;
overflow: hidden;
}
 .sidebar .susan{
/*      top: -40px;*/
          margin-top: 60px;
    position: relative;
    left: 7px;
/*    z-index: 3;*/
      }
.sidebar h3{
padding: 0 0px 0px 0px;
margin: 3px 0 15px 2px;
font-family: 'Work Sans';
color: #9a0a0e;
font-weight: 800;
font-size: 30px;
border-bottom: 1px solid #b00c0c;

    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#820a0a+0,970c0b+51,820a0a+100 */
background: #820a0a; /* Old browsers */
background: -moz-linear-gradient(left,  #820a0a 0%, #970c0b 51%, #820a0a 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(left,  #820a0a 0%,#970c0b 51%,#820a0a 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to right,  #820a0a 0%,#970c0b 51%,#820a0a 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#820a0a', endColorstr='#820a0a',GradientType=1 ); /* IE6-9 */

    margin-top: 0;
    padding: 10px 10px 0 10px;
    
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
    padding-bottom: 50px;
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

.latestMain{
background: none;
box-shadow: 0 0 0 0;
}
.latestMain .gameList{
margin: -1px 33px 20px 41px;
padding: 0;
}

.latestMain .gameList .inner{
padding: 33px 0px 10px 14px;
border-radius: 0;
}


.commentRelativeBox{
margin-top: -55px;
height: 1490px;
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
margin-left: 44px;
    width: 92%;
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
/*      position: absolute;*/
  z-index: 2;
  }

  .terms {
    margin-top: 3px;
  }





#wrapper{
position: absolute;
border: 0;
width: 100%;
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
font-size: 33px;
padding: .3em .6em;
line-height: 28px;
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

.simpleFooter{
  -moz-box-shadow: 0px 2px 4px -1px #000000;
  -webkit-box-shadow: 0px 2px 4px -1px #000000;
  box-shadow: 0px 2px 4px -1px #000000;
  width: 96%;
  margin-top: -12px;
  margin-left: 18px;

  background: rgb(218,179,114);
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…IgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
  background: -moz-linear-gradient(left, rgb(162, 119, 33) 0%, rgb(162, 119, 33) 7%, rgba(255,255,252,1) 52%, rgb(162, 119, 33) 89%, rgb(162, 119, 33)100%);
  background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgb(162, 119, 33)), color-stop(7%,rgb(162, 119, 33)), color-stop(52%,rgba(255,255,252,1)), color-stop(89%,rgb(162, 119, 33)), color-stop(100%,rgba(182,132,26,1)));
  background: -webkit-linear-gradient(left, rgb(162, 119, 33) 0%,rgb(162, 119, 33) 7%,rgba(255,255,252,1) 52%,rgb(162, 119, 33) 89%,rgb(162, 119, 33)100%);
  background: -o-linear-gradient(left, rgb(162, 119, 33) 0%,rgb(162, 119, 33) 7%,rgba(255,255,252,1) 52%,rgb(162, 119, 33) 89%,rgb(162, 119, 33)100%);
  background: -ms-linear-gradient(left, rgb(162, 119, 33) 0%,rgb(162, 119, 33) 7%,rgba(255,255,252,1) 52%,rgb(162, 119, 33) 89%,rgb(162, 119, 33)100%);
  background: linear-gradient(to right, rgb(162, 119, 33) 0%,rgb(162, 119, 33) 7%,rgba(255,255,252,1) 52%,rgb(162, 119, 33) 89%,rgb(162, 119, 33) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dab372', endColorstr='#b6841a',GradientType=1 );
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

@media(min-width: 1600px){
.container {
  width: 1230px;
}
.reels {
padding: 0 57px 0 71px;
margin-top: 0;
height: 260px;
overflow: hidden;
}
.reels img{
	height: 260px;
}
.featImg {
    position: relative;
    margin-top: 55px;
    margin-left: 47px;
    width: 92%;
}
.featImg img {
    width: 890px;
    height: 203px;
  margin-bottom: 20px;
}
.singlePostBG{
	    top: 731px;
}
#wrapper{
	top: 562px;
}
}

   @media(max-width: 1366px){
 
        .simpleFooter{
              width: 95.9%;
        }
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
margin-top: 142px;
}
#wrapper{
top: 427px;
}
.related{
top: 57px;
left: 11px;
}
.latestMain .gameList{
 margin: -1px 27px 20px 37px;
}
 .simpleFooter {
  width: 95.6%;
 margin-top: -13px;
margin-left: 16px;
  -moz-box-shadow: 0px 2px 2px -1px #000000;
  -webkit-box-shadow: 0px 2px 2px -1px #000000;
  box-shadow: 0px 2px 2px -1px #000000;
}
}
 @media(max-width: 1199px){
          body {
              margin-top: 80px;
          }
          .singelTopReel{
                height: auto;
          }
          .right{
          right:2px; 
          width: 25%;
          }
          .left{
          left: -19px;
          }
          .content p img{
            height: auto;
          }

          .featImg img{
            height: auto;
            width: 100%;
            margin-bottom: 0;
          }
          .featImg{
             margin-top: 42px;
             margin-left: 35px
          width: 92.5%;
          }
          .fave{
            font-size: 17px;
          }
          .reels {
           padding: 0 40px 0 58px;
            margin-top: 13px;
            height: 196px;
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
          .gameExp{
          top: 62px!important;
          }
          #playedText{
            padding: 9px 9px 9px 21px;
            left: 40%;
          }
          .susanExpression {    
            left: 35%;
          }
          .moveLeft {
            left: 39%;
            top: -12px;
          }
          .content p{
            margin: 31px 56px 0px 65px;
          }
          .content h2{
                padding: 20px 0 20px 0;
          }
          .contentSociallinks {
              margin-left: 62px;
          }
          .played{
            padding: 9px 9px 9px 69px;
            width: 410px;
          }
          .noplayed{
            padding: 9px 9px 9px 31px;
            width: 187px;
          }
          #playbig{
          top: -25px;
          }
         
          #playbig .button{
          font: 30px/0.9em 'Work Sans',sans-serif;
          padding: .1em .6em;
          font-weight: 600;
          }
          #playbig a {
          width: 130px!important;
          height: 70px!important;
          }
         .casinolist li a img{
          width: 150px!important;
          }
          .casino_yes{
           margin-left: 216px;
          }
          .pointingSusan{
            bottom: -10px;
            width: 89%;
            left: 49px;
          }
          .pointingSusan a{
            float: none;
            position: absolute;
            bottom: 30px;
            right: -51px;
          }
          .content {
              margin-top: 140px;
          }
          .oval-speech-border p{
            margin:0!important;
          }
          .hidethenshow{
            left: 208px;
            top: 13px;
          }
          .hidethenshowtwo{
            top: 114px;
            left: 274px;
            width: 156px!important;
          }
    }
    @media(max-width: 991px){
      header .logo{
        margin-top: 7px;
      }
        .featImg {
        margin-top: 42px;
        margin-left: 35px;
        width: 92.7%;
        }
        #addToFavorite span, #removeToFavorite span, #playedGame span {
            top: -7px;
        }
        .right{
          display: none;
        }
        .reels {
       padding: 0 40px 0 58px;
        margin-top: 14px;
        height: 195px;
        }
        #wrapper {
        top: 421px;
        left: -13px;
        }
        #wrapper a {
        width: 60px;
        height: 35px;
        }
        .singlePostBG {
          top: 556px;
        }
       .content {
          margin-top: 131px;
          padding: 0 10px;
        }
        .content h2 {
        margin: 10px 60px;
      }
        .content p{
        margin: 30px 41px 0px 60px;
        }
        .contentSociallinks {
        margin-left: 53px;
        }
        .singleFooter{
        left: 3px;
        height: auto;
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
        .gameExp {
        top: 62px!important;
        }
        .fave{
          font-size: 17px;
          padding: 2px 12px;
        }
        .fave img{
        width: 27px;
        }
        .fave span {
        top: -8px;
        }
        #addToFavorite, #removeToFavorite{
        left: 36px;  
        }
        #playedGame{
        right: 23px;

        }
        #playbig{
        right: 125px;  
        }
        #playbig a {
        width: 119px!important;
        height: 60px!important;
        }
        #playbig .button {
        font: 25px/0.9em 'Work Sans',sans-serif;
        font-weight: 600;
        }
        #playbig {
        top: -13px;
        }
        .popupheading{
        font-size: 23px!important;
        margin-bottom: 10px!important;
        }
        #recommendToFriend{
        top: 11px;  
        }
        .musicStar {
          top: 115px;
        }
        .longtermStar {
        top: 101px;
        }
        .funStar {
        top: 101px;
        }
        .graphicStar {
         top: 103px;
        }      
        .totalcontainer .innertotalcontainer img {
        width: 100px;
        }
        .commentsReel {
          top: 21px;
          left: 4px;
        }
        .latestMain .gameList {
          margin: -1px 19px 20px 37px;
        }
        .singleFooter{
              bottom: -30px;
              left: 1px;
        }
    }
    @media(max-width: 768px){
      .related .outer .inner ul li {
      width: 24%;
      }
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

#planeMachine2, #planeMachine3, #planeMachine4, #planeMachine5{
	height: 238px;
}


/* CSS talk bubble */
.talk-bubble {
position: absolute;
width: 258px;
padding: 27px 21px;
margin: 2.5em auto 50px;
margin-left: -176px;
z-index: 2;
text-align: center;
color: #fff;
background: #FFFFFF;
-webkit-border-top-left-radius: 220px 120px;
-webkit-border-top-right-radius: 220px 120px;
-webkit-border-bottom-right-radius: 220px 120px;
-webkit-border-bottom-left-radius: 220px 120px;
-moz-border-radius: 220px / 120px;
border-radius: 318px / 184px;
border: 4px solid #e8c38a;
-moz-transform: rotate(-6deg);
-webkit-transform: rotate(-6deg);
transform: rotate(-6deg);
-moz-box-shadow: 0 0 14px -3px #949494;
-webkit-box-shadow: 0 0 14px -3px #949494;
box-shadow: 0 0 14px -3px #949494;
}

.talk-bubble a{
  text-decoration: none;
}
.tri-right.btm-right-in:before{
    content: ' ';
    position: absolute;
    width: 0;
    z-index: 2;
    height: 0;
    left: auto;
    right: 44px;
    bottom: -5px;
    border: 9px solid;
    border-color: #FBFBFB #FFFFFE transparent transparent;
    -webkit-transform: rotate(-21deg);
    -moz-transform: rotate(-21deg);
    -o-transform: rotate(-21deg);
    -ms-transform: rotate(-21deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=21);
    transform: rotate(-21deg);
}
.tri-right.btm-right-in:after{
    content: ' ';
    position: absolute;
    width: 0;
    height: 0;
    left: auto;
    right: 38px;
    bottom: -13px;
    border: 12px solid;
    border-color: #E8C38A #E8C38A transparent transparent;
    border-radius: 5px;
    -webkit-transform: rotate(-21deg);
    -moz-transform: rotate(-21deg);
    -o-transform: rotate(-21deg);
    -ms-transform: rotate(-21deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=21);
    transform: rotate(-21deg);
}
/* talk bubble contents */
.talktext{
  padding: 7px;
  text-align: left;
  line-height: 1.5em;
}
.talktext p{
  /* remove webkit p margins */
  -webkit-margin-before: 0em;
  -webkit-margin-after: 0em;
  text-align: center;
  font-family: 'Work Sans',Roboto,Arial,Helvetica,sans-serif;
  font-size: 27px;
  font-weight: 900;
  color: #000000; 
}
.talktext p span{
          text-decoration: none;
        color: #C12726;
        display: block;
        font-size: 27px;
}

.related{
  width: 97.6%;
  margin: 0 auto;
  top: 37px;
}
.commentsReel{
  z-index: 2;
}
@media(max-width: 1366px){
    .commentRelativeBox{
            height: 1361px;
    }
 }
 @media(max-width: 768px){
  .singlePostBG {
      top: 556px;
  }
  .content {
      margin-top: 130px;
  }
  .latestMain ul li a {
      height: 155px!important;
  }
  .commentRelativeBox {
    margin-top: -59px;
  }
  .smaller .messageBox, .smaller .globalBox {
    top: 60px;
  }
}
</style>
     <div class="recommendBox">
          
          <div class="recommendFriends">
              <i class="fa fa-times"></i>
              <ul id="friendRecommentList">
  </ul>
        <button class="recommendBtn" id="recommendBtn" type="button">Recommend Game</button>
          </div>

      </div>



<div clbeass="container-fluid">
  <div class="container"  style="position:relative;">
    <div class="row no-gutter">
      <div class="col-xs-24 col-lg-24 col-lg-24 col-lg-24">
       

        <div class="col-xs-24 col-sm-24 col-md-19 col-lg-19 left" id="main">

          <img src="{{ url('images/responsive/singleTopReel.png') }}" class="singelTopReel" />
          <img src="{{ url('images/responsive/singlePostBG.png') }}" class="singlePostBG">
          
          <div class="featImg featimg">
              <img src="{{$category_image}}">
          </div>

          <div class="reels">
            <div class="row no-gutter">

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div id="planeMachine2">
                  {!! $top_games[0] !!}
                  {!! $top_games[4] !!}
                </div>
              </div>

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div id="planeMachine3">
                  {!! $top_games[1] !!}
                  {!! $top_games[5] !!}
                </div>
              </div>

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div id="planeMachine4">
                  {!! $top_games[2] !!}
                  {!! $top_games[6] !!}
                </div>
              </div>

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div id="planeMachine5">
                  {!! $top_games[3] !!}
                  {!! $top_games[7] !!}
                  </div>
              </div>

            </div>
          </div>

          <div id="wrapper">
            	<div class="socbtn"> 
	              <a class="button fbblue serif round glass sharrre" id="share_via_facebook" data-url="http://susanwins.com/{{$cat_slug}}" data-text="Share this up!"><img src="http://susanwins.com/uploads/34329_fb-button.png" style="left: 2px!important;top: -4px;"></a>
	              <a class="button pink serif round glass sharrre" id="share_via_pinterest" style="left:55px;" data-url="http://susanwins.com/{{$cat_slug}}" data-text="Pin me!"><img src="http://susanwins.com/uploads/76008_pinterestubtton.png" style="left:4px!important;top: -3px;"></a>
	              <a class="button blue serif round glass sharrre" id="share_via_twitter" style="left: 40px;" data-url="http://susanwins.com/{{$cat_slug}}" data-text="I'm tweeting this awesome game category!"><img src="http://susanwins.com/uploads/70478_twitter-icon.png" style="top: -3px;left: 1px;"></a>      
	              <a class="button pink serif round glass sharrre" id="share_via_googlePlus" style="left:25px;" data-url="http://susanwins.com/{{$cat_slug}}" data-text=""><img src="http://susanwins.com/uploads/79339_g+button.png"></a>
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
                                  <ul>
                                     @foreach($posts as $post)
                                        <li>           
                                          <a href="{{url('')}}/{{$post->slug}}">                  
                                            <img src="{{url('uploads')}}/{{$post->thumb_feature_image}}">
                                          </a>
                                      </li>  
                                    @endforeach
                                  </ul>
                          </div>
                      </div>
                  </div>
              </div>       
          </div>

       <div class="commentRelativeBox">

           

                <img src="http://susanwins.com/uploads/74843_singlepagebartranspa.png" class="commentsReel">

                <div class="related">
                            

                              <div class="outer">




                                  <div class="inner">

                             

                                                                
                                      <h6 style="border-top: 1px solid #F9EBCF;"> Recent Comments </h6>
                                   

                        
                                      <div class="comments">

              <div class="comment-section">

                <div class="comments-list" id="commentList">
                  @if(count($comments))
                    <ul>
                      @foreach($comments as $comment)
                      <li>

                        <div class="commentlist">

                          <div class="comment-parent">

                            <!-- <img src="{{$comment->user->user_detail->profile_picture ? url('').'/'.$comment->user->user_detail->profile_picture : url('').'/images/default_profile_picture.png' }}" class="avatar"> -->
                            <img src="{{$comment->user->user_detail->userPicture5050()  }}" class="avatar">
                            <span class="timestamp" data-datetime="{{ $comment->created_at }}"><span class="livetime"></span> | <span class="readable_time"></span></span>
                            <div class="comment-info">{{$comment->user->user_detail->firstname.' '.$comment->user->user_detail->lastname }}</div>
                            <div class="comment-content">{!! $comment->content !!}</div>
                            <a href="javascript:;" class="reply_btn">Reply</a>

                            <div class="reply-list" id="reply-to-{{$comment->id}}">
                              @foreach($comment->category_replies as $reply)
                              <div class="replies-parent">
                                <!-- <img src="{{$reply->user->user_detail->profile_picture ? url('').'/'.$reply->user->user_detail->profile_picture : url('').'/images/default_profile_picture.png' }}" class="avatar"> -->
                                <img src="{{$reply->user->user_detail->userPicture5050() }}" class="avatar">
                                <span class="timestamp" data-datetime="{{ $reply->created_at }}"><span class="livetime"></span> | <span class="readable_time"></span></span>
                                <div class="reply-info">{{$reply->user->user_detail->firstname.' '.$reply->user->user_detail->lastname }}</div>
                                <div class="reply-content">{!! $reply->content !!}</div>
                              </div>
                              @endforeach
                            </div>

                            @if(isset($user))
                            <form class="reply-form" action="{{ url('add_reply') }}" method="POST" style="display:none">
                              <input type="hidden" name="parent" value="{{ $comment->id }}">
                              <input type="hidden" name="user_id" value="{{ $user->id }}">
                              <input type="hidden" name="content_id" value="{{ $current_category_id }}">
                              <input type="hidden" name="email" value="{{ $user->email }}">

                              <div class="form-group">
                                <textarea class="form-control" rows="4" placeholder="Write a reply" name="content"></textarea>
                              </div>
                              <div class="form-group"></div>
                              <div class="form-group">
                                <button type="submit" class="button_example"  value="submit">Submit</button>
                              </div>
                            </form>
                            @endif                                                              
                          </div>
                        </div>

                      </li>         
                      @endforeach
                    </ul> 

                  @else
                    <ul></ul>
                    <p id="no-comments">No Comments yet.</p>
                  @endif 
                </div>

                <form class="comment-form" action="{{ url('add_comment') }}" method="POST" id="commentForm">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <textarea class="form-control" rows="4" placeholder="Write a comment" name="content" id="submitCommentTextarea" disabled="disabled"></textarea>
                  </div>
                  <div class="form-group">

                    @if(isset($user))
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      <input type="hidden" name="content_id" value="{{ $current_category_id }}">
                      <input type="hidden" name="email" value="{{ $user->email }}">
                      <p style="display:none;">Signed in as {{ $user->email }}  
                        <a href="{{ url('logout') }}?redirect={{ Request::url() }}"><i class="fa fa-sign-out"></i></a> 
                      </p>
                    @else
                      <div class="rednotifbox">
                        <a href="{{ url('login') }}?redirect={{ Request::url() }}">Login to Comment</a> or <a href="{{ url('register') }}?redirect={{ Request::url() }}">Register</a>
                      </div>
                    @endif

                  </div>
                  <div class="form-group">
                    <button type="submit" class="button_example"  value="submit" id="submitCommentForm" disabled="disabled">Submit</button>
                  </div>
                </form>

              </div>
            </div> 
                            	

                                      <h6 style="border-top: 1px solid #F9EBCF;"> Top Categories </h6>
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


                      </div>
                    </div>
                </div>

                <!-- <img src="http://www.susanwins.com/images/responsive/singleFooter.png" class="singleFooter"> -->
            </div>


             <div class="simpleFooter"></div>
        </div>

            <div class="col-xs-24 col-sm-24 col-md-5 col-lg-5 right">
               <div class="sidebar">
                @if(!isset($user))                
                <a href="{{ url('/signup') }}"> 
                <div class="talk-bubble tri-right btm-right-in bounceIn animated">
                  <div class="talktext">
                    <p> You're Missing All the Fun! <span> Signup Now </span> </p>
                  </div>
                  </a> 
                </div>

                <!-- 	<blockquote class="oval-speech bounceIn animated">
                      <p> You're Missing All the Fun! <a href="{{ url('/signup') }}"> Signup Now </a> </p>
                    </blockquote> -->
                    @endif
                  <img src="{{ url('images/single-susan.png') }}" alt="" class="susan">
                      <div class="sidebarInner">
                        <h3> <img src="http://susanwins.com/uploads/28532_sidebartext.png" alt=""> </h3>
                         <div class="rellimg"></div>
                     </div>
               </div>
            </div>

        
              </div>


               <div class="col-xs-24">
                    <p class="terms">
                      <a href="#">Terms & Conditions</a> <a href="#"> Privacy Policy </a> Gambling is for over <img src="http://susanwins.com/uploads/48153_18-logo.gif" class="eighteen" />  <a href="#"> <img src="http://susanwins.com/uploads/63793_gambleaware.gif" class="gambleaware" /> </a> <br /> <b>Copyright &copy; <?php echo date("Y") ?> SusanWins</b>
                    </p>
              </div>

            </div>  
        </div>
    </div>
  </div>

  



@endsection



@section('footer_scripts')
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-xxxxxx-x']);
_gaq.push(['_trackPageview']);
(function() { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();
</script>
<script type="text/javascript">

$(document).ready(function(){
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var category_id = {{$current_category_id}};
  
  // FILTER SCRIPT
  $('.filters a').on('click',function(e){
    e.preventDefault();
    var $this = $(this),
        type = $this.attr('get-this-id'),
        order_by = $this.attr('get-this-order'),
        category_id = {{$current_category_id}};

      /*  $('#contents_here').css({'overflow' : 'hidden'}).children().each(function(i, l){

           $(this).animate({'opacity' : 0, 'top' : '-140px'}, 500 , function(){

           

           });

        });*/


contentHeight = $(contents_here).outerHeight() +'px';

//console.log(contentHeight);

     $('#contents_here').html(

            $('<div>').css({'height': contentHeight})
                .append(
                   $('<img src="{{url()}}/uploads/66058_default.gif">').css({'width' : '45px', 'margin' : '2em auto', 'display' : 'block'})
                  )     
        );

      $.ajax({ 
          type: 'post',
          url: "{{url('home/ajax_get_filter_posts')}}",
          data: {_token: CSRF_TOKEN,'type' : type,'order_by' : order_by,'category_id' : category_id}, 
          success: function(response)
          {
            var parsed = JSON.parse(response);
            $( "#contents_here" ).html('');
            $.each( parsed, function( i, l ){


              $( "#contents_here" ).append(

                $(l).css({'opacity' : 0, 'top' : '140px'}).animate({'opacity' : 1, 'top' : '0px'}, 500)

                );
            });

            if(order_by == 'ASC')
            {
               $this.attr('get-this-order','DESC');
            }
            else
            {
               $this.attr('get-this-order','ASC');
            }

          }
        });

  });


    var CSRF_TOKEN2 = $('meta[name="csrf-token"]').attr('content');
	var finalSidebarContentHeight = 0, sidebarContentHeight = 0;

    contentOffset = 1;
    ajaxDone = false;
    sideBarHeightLeft = 0;
    sideBarCompleted = false;
    sideBarAjaxDone = true;

    pendingSideBarElements = [];

    sideBarSpacer = parseInt($('.rellimg').css('padding-bottom'));
    console.log('sideBarSpacer '+sideBarSpacer);

    sideBarSingleContentHeight = 117 + (sideBarSpacer);

    function updateSidebarHeight(){

      mainHeight = $('#main').height() - ($('.singelTopReel').height())/* - parseInt($('.singleFooter').css('padding-bottom').replace('px', ''))*/;


             sideBarHeight = mainHeight + ( $('.postcontent').offset().top - $('.sidebarInner').offset().top );
        finalSidebarContentHeight = sideBarHeight - ( $('.sidebarInner').find('h3').height() + (sideBarSpacer) );
        $('.sidebarInner').css('height', sideBarHeight+'px');
        sidebarContentHeight = $('.rellimg').height();
        sideBarHeightLeft = finalSidebarContentHeight - sidebarContentHeight;

        lastElement = $('.rellimg').children(':visible').last();

        theImage = $(lastElement).find('img');

        if(sideBarHeightLeft <= 0){

          offsetBottom = ($('.sidebarInner').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer);

            lastElement.css('visibility', 'hidden');

            if(!lastElement.hasClass('updateHeight')){
              lastElement.addClass('updateHeight').data('originalHeight', $(theImage).height());
              theImage.css('height', offsetBottom+'px');	
            }
            

       
              }else{

                if(lastElement.hasClass('updateHeight')){
                  
                  if(theImage.height() >= lastElement.data('originalHeight')){
                       theImage.css('height', lastElement.data('originalHeight')+'px');
                        lastElement.removeClass('updateHeight').removeData('originalHeight');
                    }else{

                      offsetBottom = ($('.sidebarInner').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer);

                      if(offsetBottom <= lastElement.data('originalHeight')){
                          theImage.css('height', offsetBottom+'px');
                      }else{
                          theImage.css('height', lastElement.data('originalHeight')+'px');
                      }
                            
                       
                    }


                }
                

                lastElement.css('visibility', 'visible');

              }
        }
    


    startAddingSidebarInterval = null;
    setSidebarLoadInterval();
    maxSidebarAutoLoad = 10 * 10; //10 seconds
    maxSidebarCounter = 0;

    $(window).scroll(function(event){
      //console.log(sideBarCompleted);
            if(!sideBarCompleted){
                clearInterval(startAddingSidebarInterval);
                setSidebarLoadInterval();
            }

            else{
              console.log('sideBarCompleted');
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
                              
                                singleSidebarImage(l, function(el){
                                  pendingSideBarElements.push(el);
                                });

                              });
                              sideBarAjaxDone = true;
              });
      }


                     
          }



    }

    var random_sidebar_order_number = {{$random_sidebar_order_number}};

    function sideBarAJAX(){

      var dfr = $.Deferred();


      maxThrottles = 10;
      throttleCounter = 0;
      throttleTimeout = 3000;
      (function throttle(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
                          type: 'get',
                          url: "{{url('home/ajax_get_ads_posts_init')}}",
                          data: {'contentOffset' :contentOffset, 'random_sidebar_order_number' : random_sidebar_order_number, 'get_casino_category' : 43},
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

    // APIS


  $('#share_via_pinterest').sharrre({
  share : {
    pinterest : true
  },
  template : '<img src="http://susanwins.com/uploads/76008_pinterestubtton.png" style="left:4px!important;top: -3px;">',
  enableHover: false,
  enableTracking: true,
  click: function(api, options){
    api.openPopup('pinterest');
  }
});
  $('#share_via_facebook').sharrre({
  share : {
    facebook : true
    },
    template : '<img src="http://susanwins.com/uploads/34329_fb-button.png" style="left: 2px!important;top: -4px;">',
  enableHover: false,
  enableTracking: true,
  click: function(api, options){
    popup = api.openPopup('facebook');
  }
});

  $('#share_via_twitter').sharrre({
  share : {
    twitter : true
    },
     template : '<img src="http://susanwins.com/uploads/70478_twitter-icon.png" style="top: -3px;left: 1px;">',
  enableHover: false,
  enableTracking: true,
  click: function(api, options){
    api.openPopup('twitter');
  }
});
  $('#share_via_googlePlus').sharrre({
    share : {
    googlePlus : true
    },
  template : '<img src="http://susanwins.com/uploads/79339_g+button.png" style="left: 3px;top: -2px;">',
  enableHover: false,
  enableTracking: false,
  click: function(api, options){
    api.openPopup('googlePlus');
  }
});


    $('#api_count').sharrre({
    share : {
      pinterest : true,
      facebook : true,
      twitter : true,
      googlePlus : true
    },
    enableTracking: true,
    template : 'Total Shares: {total}',
    enableHover: false
  });

      //ENDOF APIS
});

	var width = $(window).width(); 
	var height = $(window).height(); 

	$(document).on('adjustsinglePostBG', function(){
		adjustsinglePostBG();
	});
	$(window).bind("load", function() {
		adjustsinglePostBG();
		adjustCommentRelativeBox();

	});

	$(document).on('adjustHeight', function(){
		adjustsinglePostBG();
		adjustCommentRelativeBox();
	})

	function adjustsinglePostBG(){
		var result = $(".content").height();   
		$(".singlePostBG").height(result);
	}

	function adjustCommentRelativeBox(){        
	    var result2 = $(".related").height();           
	    	console.log(result2);

	      // if ( width > 1199 ) {
	      //   var relatedAddition = 245;
	      // }
	      // else if ( width > 991 && width < 1200 ) {
	      //   var relatedAddition = 205;
	      // }
	      // else if( width > 767 && width < 992 ){
	      //   var relatedAddition = 170;
	      // }
	      // else if( width > 765 && width < 767 ){
	      //   var relatedAddition = 210;
	      // }
	      // else if( width < 766 ){
	      //   var relatedAddition = 210;
	      // }
	    
	      	// console.log(relatedAddition);
	    $(".commentRelativeBox").height(result2 + 37);
	}
/*   var width = $(window).width(); 
    var height = $(window).height(); 


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
    });*/
	
	 $(window).bind("load", function() {
   
        var machine1 = $("#planeMachine2").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
        });

        var machine2 = $("#planeMachine3").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
        });

        var machine3 = $("#planeMachine4").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
        });

        var machine4 = $("#planeMachine5").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
        });

        $("#winwinwin3").click(function(){

          machine1.shuffle(5);

          setTimeout(function(){
            machine2.shuffle(5);
          }, 500);

          setTimeout(function(){
            machine3.shuffle(5);
          }, 600);

          setTimeout(function(){
            machine4.shuffle(5);
          }, 700);

        })

});

</script>

@endsection