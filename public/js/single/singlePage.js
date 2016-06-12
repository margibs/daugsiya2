
$(function(){

	_scrollTop = $(window).scrollTop();


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
		$(".singlePostBG").height(result + 280 );
	}

	$('#friendRecommentList').slimScroll({
      height: '400px'
    });

	function adjustCommentRelativeBox(){        
	    var result2 = $(".related").height();           
	    	console.log(result2);

	      if ( width > 1199 ) {
	        // var relatedAddition = 245;
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
	    
	      	console.log(relatedAddition);
	    $(".commentRelativeBox").height(result2 + 25 );
	}



	$( ".claimbutton" ).click(function() {
		$( ".bottomCasinos" ).slideDown( "fast", function() {
			$(document).trigger('adjustHeight');
			adjustCommentRelativeBox();
		});
		var result2 = $(".related").height();        
		$(".commentRelativeBox").height(result2 + relatedAddition );
	});

	$('#playFancy').on('click', function(e) {
        $('.bottomCasinos').animate({width: '100%', height: 193}, 300);
    });

	jQuery.fn.renameAttr = function(oldName, newName) {
		var args = arguments[0] || {}; 
		var o = $(this[0]) 

		o
		.attr(
			newName, o.attr(oldName)
		)
		.removeAttr(oldName)
		;
	};

	$('.postcontent img').each(function() {
		$this = $(this);
		$this.renameAttr('src', 'data-src' );
		$this.attr('src','http://susanwins.com/uploads/66058_default.gif');
		$this.parent().css('text-align','center');
		$this.removeAttr('height');
		$this.removeAttr('width');
		
		// $this.css('display','block');

      // $(this).renameAttr('height', 'data-height' );
      // $(this).renameAttr('width', 'data-width' );
    });

    
    $('.postcontent img').attr('track-action', '56ddbe6f3a840');

    

	if(_scrollTop == 0)
	{
		$('.postcontent img').addClass('img-loading');
	}

	$('a[rel*=leanModal]').leanModal({ top : 200, closeButton: ".modal_close" });

	$(document).on('click','.postcontent p > img',function(){

		var $this = $(this);
		var image_parent = $this.parent();

		if(!$this.hasClass( "not_count" ))
		{
			image_parent.css( "position", "relative" );
			image_parent.append('<span class="overlay_ni_men" style="display: block; position: absolute; z-index: 2; top: 0; width: 100%; height: 100%; text-align: center; background-color:rgba(255, 255, 255, 0.9); "><div class="outer"><div class="middle"><div class="inner"><p>Do you want to play this game?</p> <br /><a href="#" class="casino_yes" track-action="56ddbe4fe6b07" track-value="Yes Count"> <div class="glossy"> Yes </div> </a> <a href="#" class="casino_no" track-action="56ddbe560574d" track-value="No Count"> <div class="glossy" style="float: left;"> No </div> </a></div></div></div> </span>');
		}

	});

	$('.postcontent').on('click','.casino_no',function(e){
      e.preventDefault();
      var $this = $(this);
      var casino_no_parent = $this.closest('.overlay_ni_men');
      casino_no_parent.remove();
    });

    $("iframe").parent().css({
      //"width":"80%",
      //"margin":"30px 80px 0 80px"
    });

	//SOCIAL APIS
	  $('.contentSociallinks li a').on('click', function(){
	      __target = $(this).attr('data-target');
	      $(__target).trigger('click');
	  });

	  $('#share_via_pinterest').sharrre({
	    share : 
	    {
	      pinterest : true
	    },
	    template : '<img src="http://susanwins.com/uploads/76008_pinterestubtton.png" style="left:4px!important;top: -3px;">',
	    enableHover: false,
	    enableTracking: true,
	    click: function(api, options)
	    {
	      api.openPopup('pinterest');
	    }
	  });

	  $('#share_via_facebook').sharrre({
	    share : 
	    {
	      facebook : true
	    },
	    template : '<img src="http://susanwins.com/uploads/34329_fb-button.png" style="left: 2px!important;top: -4px;">',
	    enableHover: false,
	    enableTracking: true,
	    click: function(api, options)
	    {
	      api.openPopup('facebook');
	    }
	  });

	  $('#share_via_twitter').sharrre({
	    share : 
	    {
	      twitter : true
	    },
	    template : '<img src="http://susanwins.com/uploads/70478_twitter-icon.png" style="top: -3px;left: 1px;">',
	    enableHover: false,
	    enableTracking: true,
	    click: function(api, options)
	    {
	      api.openPopup('twitter');
	    }
	  });

	  $('#share_via_googlePlus').sharrre({
	    share : 
	    {
	      googlePlus : true
	    },
	    template : '<img src="http://susanwins.com/uploads/79339_g+button.png" style="left: 3px;top: -2px;">',
	    enableHover: false,
	    enableTracking: false,
	    click: function(api, options)
	    {
	      api.openPopup('googlePlus');
	    }
	  });

	/*$('#api_count').sharrre({
		share : 
		{
			pinterest : true,
			facebook : true,
			twitter : true,
			googlePlus : true
		},
		template :'{total}',
		enableHover: false
	});*/
	//END SOCIAL APIS

	$('iframe').each(function(){
      var youtube_src = $(this).attr('src');
      var res = youtube_src.replace("controls=0", "controls=1");
      $(this).attr('src',res);
      // $(this).parent().wrap('<p></p>');
    });

});
