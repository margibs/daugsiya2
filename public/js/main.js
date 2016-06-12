function EZSlots(id,useroptions){
	var that = this; //keep reference to function for use in callbacks
	//set some variables from the options, or with defaults.
	var options = useroptions ? useroptions : {};
	this.reelCount = options.reelCount ? options.reelCount : 3; //how many reels, assume 3 
	this.symbols = options.symbols ? options.symbols : ['A','B','C'];
	this.sameSymbolsEachSlot = true;
	this.winningSet = options.winningSet;
	this.width = options.width ? options.width : 100;
	this.height = options.width ? options.height : 100;
	this.howManySymbolsToAppend = 20; //how many symbols each spin adds
	this.endingLocation = 7; //location for selected symbol... needs to be a few smaller than howManySymbolsToAppend
	this.time = 2500; //time in millis for a spin to take
	this.jqo = $("#"+id); //jquery object reference to main wrapper
	this.jqoSliders = []; //jquery object reference to strips sliding up and down

	//to initialize we construct the correct number of slot windows
	//and then populate each strip once
	this.init = function(){
		this.jqo.addClass("ezslots"); //to get the css goodness
		//figure out if we are using the same of symbols for each window - assume if the first 
		//entry of the symbols is not a string we have an array of arrays
		if(typeof this.symbols[0] != 'string'){
			this.sameSymbolsEachSlot = false;
		}
		//make each slot window
		for(var i = 0; i < this.reelCount; i++){
			var jqoSlider = $('<div class="slider"></div>');
			var jqoWindow = $('<div class="window window_"'+i+'></div>');
			this.scaleJqo(jqoWindow).append(jqoSlider); //make window right size and put slider in it
			this.jqo.append(jqoWindow); //add window to main div
			this.jqoSliders.push(jqoSlider); //keep reference to jqo of slider
			this.addSymbolsToStrip(jqoSlider,i); //and add the initial set 
		}
	};
	//convenience function since we need to apply width and height to multiple parts
	this.scaleJqo = function(jqo){
		jqo.css("height",this.height+"px").css("width",this.width+"px");
		return jqo;
	}
	//add the various symbols - but take care to possibly add the "winner" as the symbol chosen
	this.addSymbolsToStrip = function(jqoSlider, whichReel, shouldWin){
		var symbolsToUse = that.sameSymbolsEachSlot ? that.symbols : that.symbols[whichReel];
		var chosen =  shouldWin ? that.winningSet[whichReel] : Math.floor(Math.random()*symbolsToUse.length);
		for(var i = 0; i < that.howManySymbolsToAppend; i++){
			var ctr = (i == that.endingLocation) ? chosen : Math.floor(Math.random()*symbolsToUse.length);
			//we nest "content" inside of "symbol" so we can do vertical and horizontal centering more easily
			var jqoContent = $("<div class='content'>"+symbolsToUse[ctr]+"</div>");
			that.scaleJqo(jqoContent);
			var jqoSymbol = $("<div class='symbol'></div>");
			that.scaleJqo(jqoSymbol);
			jqoSymbol.append(jqoContent);
			jqoSlider.append(jqoSymbol);
		}
		return chosen;
	}
	//to spin, we add symbols to a strip, and then bounce it down
	this.spinOne = function(jqoSlider,whichReel,shouldWin){
		var heightBefore = parseInt(jqoSlider.css("height"), 10); 
		var chosen = that.addSymbolsToStrip(jqoSlider,whichReel,shouldWin);
		var marginTop = -(heightBefore + ((that.endingLocation) * that.height));
		jqoSlider.stop(true,true).animate(
			{"margin-top":marginTop+"px"},
			{'duration' : that.time + Math.round(Math.random()*1000), 'easing' : "easeOutElastic"});
		return chosen;
	}

	this.spinAll = function(shouldWin){
		var results = [];
		for(var i = 0; i < that.reelCount; i++){
				results.push(that.spinOne(that.jqoSliders[i],i,shouldWin));
			}
		return results;
	}

	this.init();
	return {
		spin : function(){
			return that.spinAll();
		},
		win : function(){
			return that.spinAll(true);
		}
	}
}



/**
 * jQuery Unveil
 * A very lightweight jQuery plugin to lazy load images
 * http://luis-almeida.github.com/unveil
 *
 * Licensed under the MIT license.
 * Copyright 2013 Luís Almeida
 * https://github.com/luis-almeida
 */

;(function($) {

  $.fn.unveil = function(threshold, callback) {

    var $w = $(window),
        th = threshold || 0,
        retina = window.devicePixelRatio > 1,
        attrib = retina? "data-src-retina" : "data-src",
        images = this,
        loaded;

    this.one("unveil", function() {
      var source = this.getAttribute(attrib);
      source = source || this.getAttribute("data-src");
      if (source) {
        this.setAttribute("src", source);
        if (typeof callback === "function") callback.call(this);
      }
    });

    function unveil() {
      var inview = images.filter(function() {
        var $e = $(this);
        if ($e.is(":hidden")) return;

        var wt = $w.scrollTop(),
            wb = wt + $w.height(),
            et = $e.offset().top,
            eb = et + $e.height();

        return eb >= wt - th && et <= wb + th;
      });

      loaded = inview.trigger("unveil");
      images = images.not(loaded);
    }

    $w.on("scroll.unveil resize.unveil lookup.unveil", unveil);

    unveil();

    return this;

  };

})(window.jQuery || window.Zepto);

/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */
// leanModal v1.1 by Ray Stone - http://finelysliced.com.au
// Dual licensed under the MIT and GPL

(function($){$.fn.extend({leanModal:function(options){var defaults={top:100,overlay:0.5,closeButton:null};var overlay=$("<div id='lean_overlay'></div>");$("body").append(overlay);options=$.extend(defaults,options);return this.each(function(){var o=options;$(this).click(function(e){var modal_id=$(this).attr("href");$("#lean_overlay").click(function(){close_modal(modal_id)});$(o.closeButton).click(function(){close_modal(modal_id)});var modal_height=$(modal_id).outerHeight();var modal_width=$(modal_id).outerWidth();
$("#lean_overlay").css({"display":"block",opacity:0});$("#lean_overlay").fadeTo(200,o.overlay);$(modal_id).css({"display":"block","position":"fixed","opacity":0,"z-index":11000,"left":50+"%","margin-left":-(modal_width/2)+"px","top":o.top+"px"});$(modal_id).fadeTo(200,1);e.preventDefault()})});function close_modal(modal_id){$("#lean_overlay").fadeOut(200);$(modal_id).css({"display":"none"})}}})})(jQuery);

$(function(){

	BASE_URL = $('meta[name="baseURL"]').attr('content');
	CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	socket = io.connect(BASE_URL+':8891');
	defaultProfilePic = BASE_URL+'/images/default_profile_picture.png';

	//USER DETAILS
	userImage = $('#userId').data('image');
	userId = $('#userId').val();
    userName = $('#userId').data('name');
    isAdmin = $('#userId').data('isAdmin') == 1 ? true : false;
    sessionId = $('#sessionId').val();
    //END USER DETAILS

    var profileUrl = BASE_URL+'/profile',
    	notifUrl = BASE_URL+'/notification',
    	messageUrl = BASE_URL+'/message',
    	friendUrl = BASE_URL+'/friends';

	$.fn.preload = function() {
		this.each(function(){
			$('<img/>')[0].src = this;
		});
	}

	$(['http://susanwins.com/uploads/64878_click-header.png']).preload();


	//SOCKET ON

	socket.on('user_logged_in', function(){
		location.reload();
	});

	socket.on('user_logged_out', function(){
		location.reload();
	});

	socket.on('connect', function(){

		if(userId)
		{
		  socket.emit('login', { user_id : userId , profile_picture : userImage, name : userName, session_id : sessionId }, false, isAdmin);
		}
		else
		{
		  socket.emit('look_at_room', sessionId);
		}

	});


	socket.on('user_banned', function(data, room_id){
		console.log('user_banned');
		console.log($('#chatbox-'+room_id));
		console.log($('#chatbox-'+room_id).length);
      if(data.user_id == userId && $('#chatbox-'+room_id).length ){
        $('#chatbox-'+room_id).find('textarea').initBan(data.time);
        $('#')
      }

   });


   socket.on('lift_ban', function(user_id, room_id){
      console.log('lift_ban');
      console.log(user_id);
      console.log(room_id);
      if(user_id == userId && $('#chatbox-'+room_id).length){
        
        clearInterval($('#chatbox-'+room_id).find('textarea').data('time_interval'));
        $('#chatbox-'+room_id).find('textarea').attr('placeholder', 'Type Message').removeAttr('disabled');

      }

   });


   $.fn.initBan = function(time){

        function millisToMinutesAndSeconds(millis) {
          var minutes = Math.floor(millis / 60000);
          var seconds = ((millis % 60000) / 1000).toFixed(0);
          return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
        }

        function countRemaining(input){

          remaining_time = $(input).data('remaining_time');

          remaining_time = remaining_time - 1000;

          if(remaining_time > 0){

            $(input).data('remaining_time', remaining_time);
            $(input).removeData('remaining_time').data('remaining_time', remaining_time);
             $(input).attr('placeholder' ,'Banned for '+millisToMinutesAndSeconds(remaining_time)).attr('disabled', 'disabled');

          }else{
            clearInterval($(input).data('time_interval'));
            $(input).attr('placeholder', 'Type Message').removeAttr('disabled');
          }

          

        }

        return this.each(function(){

          input = this;

          $(input).attr('disabled', 'disabled');

          $(input).removeData('remaining_time').data('remaining_time', time);

          $(input).attr('placeholder' ,'Banned for '+millisToMinutesAndSeconds(time));

          if($(input).data('time_interval')){

            clearInterval($(input).data('time_interval'));

          }

          $(input).data('time_interval', 

            setInterval(countRemaining, 1000, input)

            )



        });

      }



	socket.on('post_recommendGame_notification', function(friend){

		console.log('post_recommendGame_notification');

		span = $('<span>').addClass('notifcount');
		notifcount = 1;

		if($('#unreadUserNotification').find('.notifcount').length)
		{
		  notifcount = parseInt($('#unreadUserNotification').find('.notifcount').text())+1;
		}

		$('#unreadUserNotification').html('').append($(span).text(notifcount));


		$('#myNotifications').prepend(
		  $('<li>').append(
		    $('<a href="'+BASE_URL+'/'+friend.game.slug+'">').addClass('unread')
		    .append(
		      $('<img>').attr('src', friend.user.user_detail.profile_picture ? BASE_URL+'/'+friend.user.user_detail.profile_picture : defaultProfilePic )
		    )
		    .append(
		      $('<p>')
		      .append(
		        $('<span>').addClass('name').text(friend.user.user_detail.firstname+' '+friend.user.user_detail.lastname+' recommended you to play. ')
		      )
		      .append(
		        $('<div>').addClass('actionList')
		        .append(
		          $('<span>').text('Click to Play')
		        )
		      )
		    )
		  )
		);
	});

	socket.on('post_accepted_friend_notification', function(friend){
		span = $('<span>').addClass('notifcount');
		notifcount = 1;

		if($('#unreadUserNotification').find('.notifcount').length)
		{
		  notifcount = parseInt($('#unreadUserNotification').find('.notifcount').text())+1;
		}

		$('#unreadUserNotification').html('').append($(span).text(notifcount));

		$('#myNotifications').prepend(
		  $('<li>').append(
		    $('<a href="javascript:;">').addClass('unread')
		    .append(
		      $('<img>').attr('src', friend.profile_picture ? BASE_URL+'/'+friend.profile_picture : defaultProfilePic )
		    )
		    .append(
		      $('<p>')
		      .append(
		        $('<span>').addClass('name').text('You and '+friend.name+' are now friends!')
		      )
		      .append(
		        $('<div>').addClass('actionList').data('user', friend.user_id)
		        .append(
		          $('<button>').text('Message').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox')
		        )
		      )
		    )
		  )
		);
	});

	socket.on('post_global_notification', function(notification){

	  console.log('post_global_notification');
	  console.log(notification);

	  if(notification)
	  {
	    span = $('<span>').addClass('notifcount');
	    notifcount = 1;

	    if($('#unreadGlobalNotification').find('.notifcount').length)
	    {
	      notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
	    }

	    $('#unreadGlobalNotification').html('').append($(span).text(notifcount));

	    if(notification.type == 1)
	    {

	      $('#myGlobalNotifications').prepend(
	        $('<li>')
	        .append(
	          $('<a href="'+BASE_URL+'/'+notification.game.slug+'">').addClass('unread')
	          .append(
	            $('<p>')
	            .append(
	              $('<span>').text('New Game has Added!')
	            )
	          )
	        )
	      );

	    }
	    else if(notification.type == 2)
	    {

	      $('#myGlobalNotifications').prepend(
	        $('<li>')
	        .append(
	          $('<a href="'+BASE_URL+'/clubhouse/chatroom/'+notification.room.name+'">').addClass('unread')
	          .append(
	            $('<p>')
	            .append(
	              $('<span>').text('New Chatroom Created!')
	            )
	          )
	        )
	      );

	    }
	    else if(notification.type == 3)
	    {

	      $('#myGlobalNotifications').prepend(
	        $('<li>')
	        .append(
	          $('<a href="'+BASE_URL+'/clubhouse/chatroom/'+notification.room.name+'">').addClass('unread')
	          .append(
	            $('<p>')
	            .append(
	              $('<span>').text(notification.moderator.user_detail.firstname+' '+notification.moderator.user_detail.lastname+' is now in '+notification.room.name)
	            )
	          )
	        )
	      );
	    }
	    else if(notification.type == 4)
	    {

	      $('#myGlobalNotifications').prepend(
	        $('<li>')
	        .append(
	          $('<a href="//'+ notification.custom_notification.link +' ">').addClass('unread')
	          .append(
	            $('<p>')
	            .append(
	              $('<span>').text(notification.custom_notification.description)
	            )
	          )
	        )
	      );
	    }
	  }
	});

	socket.on('post_custom_notification', function(notification){
	  $.each(notification, function(){
	    data = this;
	    span = $('<span>').addClass('notifcount');
	    notifcount = 1;
	    if($('#unreadGlobalNotification').find('.notifcount').length){
	      notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
	    }

	    $('#unreadGlobalNotification').html('').append($(span).text(notifcount));

	    $('#myGlobalNotifications').prepend(
	      $('<li>')
	          .append(
	            $('<a href="//'+ data.custom_notification.link +' ">').addClass('unread')
	                  .append(
	                    $('<p>')
	                      .append(
	                        $('<span>').text(data.custom_notification.description)
	                        )
	                    )
	            )
	          );
	  });
	});

	socket.on('post_addFriend_request', function(request_id, request){

		console.log('post_addFriend_request');
		console.log(request);

		requestHtml =  $('<li>').attr('id','friend-request-'+request.user_id).append(
			$('<a href="javascript:;">').addClass('unread')
			.append(
				$('<img>').attr('src', request.profile_picture ? BASE_URL+'/'+request.profile_picture : defaultProfilePic )
			)
			.append(
				$('<p>')
				.append(
					$('<span>').addClass('name').text(request.name)
				)
				.append(
					$('<div>').addClass('actionList')
					.append(
						$('<button>').text('Accept').addClass('acceptFriend').data('id', request_id).data('user', request.user_id)
					)
					.append(
						$('<button>').text('Decline').addClass('declineFriend').data('id', request_id)
					)
				)
			)
		);

		if($('#friend-request-'+request.user_id).length)
		{
			$('#friend-request-'+request.user_id).replaceWith(requestHtml);
		}
		else
		{
			notifcount = $('#notificationMenu').find('.notifcount');

			if(notifcount.length)
			{
				notifs = parseInt($(notifcount).text());
				$(notifcount).text(notifs+1);
			}
			else
			{
				$('#notificationMenu').prepend($('<span>').addClass('notifcount').text(1));
			}

			$('#myNotifications').prepend( requestHtml );
		}
	});

	socket.on('post_private_message', function(message){

		console.log('you got a private message!');
		console.log(message);

		if($('#pmBox').data('current') == message.from.user_id && $('#pmBox').is(':visible'))
		{
			console.log('real time add');

			$('#pmMessageContent').append(
				$('<li>').append(
					$('<img>').attr('src', message.from.profile_picture ? BASE_URL+'/'+message.from.profile_picture : defaultProfilePic )
				)
				.append(
					$('<span>').text(message.message)
				)
			);

			$('#pmMessageContent').animate({
				scrollTop: $('#pmMessageContent')[0].scrollHeight
			}, 2000);
		}
		else
		{

			if($('#inbox-user-'+message.from.user_id).length)
			{
				$('#inbox-user-'+message.from.user_id).find('a').addClass('unread').find('.message').text(message.message);
				$('#myMessages').prepend($('#inbox-user-'+message.from.user_id));
			}
			else
			{
				$('#myMessages').prepend(
					$('<li>').attr('data-user', message.from.user_id).attr('id', 'inbox-user-'+message.from.user_id)
					.append(
						$('<a href="javascript:;">').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox').addClass('unread')
						.append(
							$('<img>').attr('src', message.from.profile_picture ? BASE_URL+'/'+ message.from.profile_picture : defaultProfilePic )
						)
						.append(
							$('<p>')
							.append(
								$('<span>').addClass('name').text(message.from.name)
								.append($('<span>').addClass('timestamp').text('3:36pm'))
							)
							.append(
								$('<span>').addClass('message').text(message.message)
							)
						)
					)
				);
			}

			$('#unreadMessageNotification').html('').append(
				$('<span>').addClass('notifcount').text($('#myMessages li a.unread').length)
			);
		}
	});

	socket.on('open_current_room', function(room){
		if(room)
		{
			if($('#chatbox-'+room.id).length == 0)
			{

				$('#chatBoxPanel').append(
					$('<div>').addClass('chatbox-container').addClass('chatMinimized').attr('id', 'chatbox-'+room.id)
					.append(
						$('<div>').addClass('chatbox').data('id', room.id).data('name', room.name)
						.append(
							$('<div>').addClass('inactivebox')
							.append(
								$('<b>').text(room.name)
							)
							.append(
								$('<span>').addClass('peopleTalking').text(room.people.length+' people talking').data('total', room.people.length)
							)
						)
					)
				);
			}     
		}
	});

	socket.on('rooms_opened', function(rooms){

		console.log(rooms);

		$.each(rooms, function(){

			room =this;
			console.log($('#chatBoxPanel'));

			/*     $('#chatBoxPanel').append(
			$('<div>').addClass('chatbox-container').addClass('chatMinimized').attr('id', 'chatbox-'+room.id)
			.append(

			$('<div>').addClass('chatbox').data('id', room.id).data('name', room.name)
			.append(
			$('<div>').addClass('inactivebox')
			.append(
			$('<b>').text(room.name)
			)
			.append(
			$('<span>').addClass('peopleTalking').text(room.people.length+' people talking').data('total', room.people.length)
			)


			)
			)
			);*/

			$.ajax({
				url : BASE_URL+'/chatroom/getUnreadCount',
				type : 'POST',
				data : { room_id : room.id, user_id : userId,  _token : CSRF_TOKEN },
				dataType : 'json',
				success : function(count)
				{

					textarea = $('<textarea>').addClass('common').attr('placeholder', 'Type Message').css('width', '100%');

					$('#chatBoxPanel').append(
						$('<div>').addClass('chatbox-container').addClass('chatMinimized').attr('id', 'chatbox-'+room.id)
						.append(
							$('<div>').addClass('chatbox').data('id', room.id).data('name', room.name)
							.append(
								$('<div>').addClass('inactivebox')
								.append(
									$('<b>').text(room.name)
								)
								.append(
									$('<span>').addClass('peopleTalking').text(room.people.length+' people talking').data('total', room.people.length)
								)
							)

							.append(
									$('<div>').addClass('activebox').css('display', 'none')
									.append(
										$('<div>').addClass('head')
										.append(
											$('<h2>')
											.append(
												$('<i>').addClass('fa fa-minus').addClass('minimizeChat')
											)
											// ROY: Ako sa e hide sa karon

											//.append(                    
											// $('<a href="javascript:;">')
											//     .append(
											//       $('<i>').addClass('fa fa-times').addClass('closeChat')
											//       )
											// )
											.append(
												$('<a href="javascript:;">').text(room.name)
											)
											.append(
												$('<span>').text(room.people.length+' people are talking now')
											)
										)
									)
									.append(
										$('<div>').addClass('body')
									)

									.append(
										textarea
									)
								)
						)
					);

					if(room.banned){
						$(textarea).initBan(room.banned);
					}

					if(count > 0)
					{
						$('#chatbox-'+room.id).find('.inactivebox')
						.append(
							$('<div>').addClass('notif').text(count)
						);
					}

				},
				error : function(xhr)
				{
					console.log(xhr.responseText);
				}
			}); 
		});

	});

	socket.on('display_people', function(people, room_id){
		$('#chatbox-'+room_id).find('.peopleTalking').text(people.length+' people are talking now');
		$('#chatbox-'+room_id).find('.activebox head span').text(people.length+' people are talking now');
	});

	socket.on('room_opened', function(data, banned){

		socket.emit('observer_room', data.room.id);
		console.log('room_opened');
		console.log(data);    

		if($('#chatbox-'+data.room.id).length == 0)
		{
			$.ajax({
				url : BASE_URL+'/chatroom/getUnreadCount',
				type : 'POST',
				data : { room_id : data.room.id, user_id : userId,  _token : CSRF_TOKEN },
				dataType : 'json',
				success : function(count)
				{
					textarea = $('<textarea>').addClass('common').attr('placeholder', 'Type Message').css('width', '100%');

					$('#chatBoxPanel').append(
						$('<div>').addClass('chatbox-container').addClass('chatMinimized').attr('id', 'chatbox-'+data.room.id)
						.append(
							$('<div>').addClass('chatbox').data('id', data.room.id).data('name', data.room.name)
							.append(
								$('<div>').addClass('inactivebox')
								.append(
									$('<b>').text(data.room.name)
								)
								.append(
									$('<span>').addClass('peopleTalking').text(data.people.length+' people talking').data('total', data.people.length)
								)
							).append(
									$('<div>').addClass('activebox').css('display', 'none')
									.append(
										$('<div>').addClass('head')
										.append(
											$('<h2>')
											.append(
												$('<i>').addClass('fa fa-minus').addClass('minimizeChat')
											)
											// ROY: Ako sa e hide sa karon

											//.append(                    
											// $('<a href="javascript:;">')
											//     .append(
											//       $('<i>').addClass('fa fa-times').addClass('closeChat')
											//       )
											// )
											.append(
												$('<a href="javascript:;">').text(data.room.name)
											)
											.append(
												$('<span>').text(data.people.length+' people are talking now')
											)
										)
									)
									.append(
										$('<div>').addClass('body')
									)

									.append(
										textarea
									)
								)
						)

					);

					if(banned){
							$(textarea).initBan(banned);
						}

					if(count > 0)
					{
						$('#chatbox-'+data.room.id).find('.inactivebox')
						.append(
						$('<div>').addClass('notif').text(count)
						);
					}
				},
				error : function(xhr)
				{
					console.log(xhr.responseText);
				}
			});  
		} 
	});

	socket.on('post_chatroom_message', function(data){

		console.log('a new message from room');
		console.log(data);

		chatbox = $('#chatbox-'+data.room_id);
		if($(chatbox).length)
		{

			body = $(chatbox).find('.body');

			$(body).append(
				$('<div>').addClass('message')
				.append(
					$('<div>').addClass('avatar')
					.append(
						$('<a href="javascript:;">')
						.append(
							$('<img src="'+( data.user.profile_picture ? BASE_URL+'/'+data.user.profile_picture : defaultProfilePic) +'">')
						)
					)
				)
				.append(
					$('<p>').addClass('bubble yellow').text(data.message)
				)
			);

			if($(chatbox).hasClass('chatMinimized') && userId != data.user.user_id)
			{
				if($(chatbox).find('.inactivebox').find('.notif').length)
				{
					lastCount = parseInt($(chatbox).find('.inactivebox').find('.notif').text());
					$(chatbox).find('.inactivebox').find('.notif').text(lastCount+1);
				}
				else
				{
					$(chatbox).find('.inactivebox').append(
						$('<div>').addClass('notif').text(1)
					);
				}
			}
		}
	});

	socket.on('force_minimizeChat', function(room_id){
		chatbox = $('#chatbox-'+room_id).find('.chatbox');
		if(chatbox.length)
		{
			minimizeChat(chatbox);
		}
	});

	socket.on('force_closeChat', function(room_id){

		chatbox = $('#chatbox-'+room_id).find('.chatbox');
		if(chatbox.length)
		{
			closeChat(chatbox);
			socket.emit('leaveChat', room_id);
		}
	});

	socket.on('force_maximizeChat', function(room_id){
		chatbox = $('#chatbox-'+room_id).find('.chatbox');
		if(chatbox.length)
		{
			maximizeChat(chatbox);
		}
	});


	//END SOCKET ON

	// EVENTS

	$('#globalNotifMenu').on('click', function(){
		$('#unreadGlobalNotification').html('');
	});

	$('#globalNotifMenu').one('click', function(e){

	button = this;

	$('#myGlobalNotifications').html('').append($('<li style="border:none;">').addClass('loading').append('<div class="typing-indicator"><span></span><span></span><span></span></div><p> Loading... </p>'));

		$.ajax({
		url : notifUrl+'/getGlobalNotifications',
		data : {  _token : CSRF_TOKEN },
		dataType : 'json',
		type : 'POST',
		success : function(data)
		{
		  console.log('getGlobalNotifications');
		  console.log(data);

		  $(button).bind('click', readGlobalNotification);

		  readGlobalNotification();

		  $('#myGlobalNotifications').html('');

		  $.each(data, function(){

		    notification = this;

		    li = $('<li>');

		    if(notification.type == 1)
		    {

		      $('#myGlobalNotifications').append(
		        $(li)
		        .append(
		          $('<a href="'+BASE_URL+'/'+notification.game.slug+'">')
		          .append(
		            $('<p>')
		            .append(
		              $('<span>').text('New Game has Added!')
		            )
		          )
		        )
		      );

		    }
		    else if(notification.type == 2)
		    {

		      $('#myGlobalNotifications').append(
		        $(li)
		        .append(
		          $('<a href="'+BASE_URL+'/clubhouse/chatroom/'+notification.room.name+'">')
		          .append(
		            $('<p>')
		            .append(
		              $('<span>').text('New Chatroom Created!')
		            )
		          )
		        )
		      );

		    }
		    else if(notification.type == 3)
		    {

		      $('#myGlobalNotifications').append(
		        $(li)
		        .append(
		          $('<a href="'+BASE_URL+'/clubhouse/chatroom/'+notification.room.name+'">')
		          .append(
		            $('<p>')
		            .append(
		              $('<span>').text(notification.moderator.user_detail.firstname+' '+notification.moderator.user_detail.lastname+' is now in '+notification.room.name)
		            )
		          )
		        )
		      );
		    }
		    else if(notification.type == 4)
		    {

		      $('#myGlobalNotifications').append(
		        $(li)
		        .append(
		          $('<a href="//'+ notification.custom_notification.link +' ">')
		          .append(
		            $('<p>')
		            .append(
		              $('<span>').text(notification.custom_notification.description)
		            )
		          )
		        )
		      );

		    }


		    if(!notification.globalnotification_read)
		    {
		    $(li).find('a').addClass('unread');
		    }


		  });

		},
		error : function(xhr)
		{
		  console.log(xhr.responseText);
		}
		});
	});

	$(document).on('click','.pmFriend', function(){
		$('.pmBox').css('display','block');
		$('.messageNotifBox ').hide();
	});

	$('#notificationMenu').on('click', function(){

		$('#notificationMenu').find('.notifcount').remove();

	});

	$('#notificationMenu').one('click', function(){

		theButton = this;

		$('#myNotifications').html('').append($('<li style="border:none;">').addClass('loading').append('<div class="typing-indicator"><span></span><span></span><span></span></div><p> Loading... </p>'));

		$.ajax({
			url : profileUrl+'/getFriendRequests',
			data : { user_id : userId, _token : CSRF_TOKEN },
			dataType : 'json',
			type : 'POST',
			success : function(data)
			{
				console.log('getFriendRequests');
				console.log(data);

				if(data)
				{
					readUserNotifications();
					$(theButton).bind('ckick', readUserNotifications);
				}

				$('#myNotifications').html('');

				$.each(data, function(){

					li = $('<li>');

					request = this;

					if(request.type == 0)
					{
						button = $('<a href="javascript:;">')
						.append(
							$('<img>').attr('src', request.user.user_detail.profile_picture ? BASE_URL+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
						)
						.append(
							$('<p>')
							.append(
								$('<span>').addClass('name').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname)
							)
							.append(
								$('<div>').addClass('actionList')
								.append(
									$('<button>').text('Accept').addClass('acceptFriend').data('id', request.id).data('user', request.user_id)
								)
								.append(
									$('<button>').text('Decline').addClass('declineFriend').data('id', request.id)
								)
							)
						);

						$(li).attr('id', 'friend-request-'+request.user_id).append(
						button
						);     

					}
					else if(request.type == 1)
					{
						$(li).append(
							$('<a href="javascript:;">')
							.append(
							$('<img>').attr('src', request.user.profile_picture ? BASE_URL+'/'+request.user.profile_picture : defaultProfilePic )
							)
							.append(
								$('<p>')
								.append(
									$('<span>').addClass('name').text('You and '+request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' are now friends!')
								)
								.append(
									$('<div>').addClass('actionList').data('user', request.user.user_detail.user_id)
									.append(
										$('<button>').text('Message').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox')
									)
								)
							)
						);

					}
					else if(request.type == 2)
					{

						$(li).append(
							$('<a href="'+BASE_URL+'/'+request.game.slug+'">')
							.append(
								$('<img>').attr('src', request.user.user_detail.profile_picture ? BASE_URL+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
							)
							.append(
								$('<p>')
								.append(
									$('<span>').addClass('name').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' recommended you to play. ')
								)
								.append(
									$('<div>').addClass('actionList')
									.append(
										$('<span>').text('Click to Play')
									)
								)
							)
						);
					}

					if(request.read == 0)
					{
						$(li).find('a').addClass('unread');
					}

					$('#myNotifications').append(li);

				});

			},
			error : function(xhr)
			{
				console.log(xhr.responseText);
			}
		});

	});

	$('#sendPrivateMessage').on('submit', function(e){

		e.preventDefault();
		theUser = $(this).data('user');
		message = $('#privateMessageTextarea').val();

		$('#privateMessageTextarea').val('');

		if(theUser && message)
		{

			$('#pmMessageContent').append(
				$('<li>').addClass('alt').append(
					$('<span>').addClass('alt').text(message)
				)
			);

			$('#pmMessageContent').animate({
				scrollTop: $('#pmMessageContent')[0].scrollHeight
			}, 200);

			$.ajax({
				url : messageUrl+'/sendPrivateMessage',
				data : { from : userId, to : theUser, message : message, _token : CSRF_TOKEN },
				type : 'POST',
				dataType : 'json',
				success : function(data)
				{
					socket.emit('send_private_message', { to : theUser, message : message });
				},
				error : function(xhr)
				{
					console.log(xhr.responseText);
					// message is not send resend?
				}
			});
		}
	});

	$('.chatCommon').each(function(){

		var txt = $(this),
			hiddenDiv = $(document.createElement('div')),
			content = null;

		txt.addClass('txtstuff');
		hiddenDiv.addClass('hiddendiv common');

		$('body').append(hiddenDiv);

		txt.on('keyup', function (e) {

			if (e.keyCode == 13) 
			{
				$(txt).parent('form').submit();
			}
			else
			{
				content = $(this).val();
				content = content.replace(/\n/g, '<br>');
				hiddenDiv.html(content + '<br class="lbr">');
				$(this).css('height', hiddenDiv.height());
			}

		});

	});

	$(document).on('click', '.pmFriend', function(){

		modal = $('#pmBox');

		$(this).removeClass('unread');

		if(!modal.hasClass('loading'))
		{
			$(modal).addClass('loading');
			theUser = $(this).parent().data('user');
			$('#pmBox').attr('data-current', theUser);
			$('#sendPrivateMessage').data('user', theUser);
			$(modal).find('.divContainer').hide();

			loading = $('<div>').addClass('loadContainer').append('<div class="typing-indicator"><span></span><span></span><span></span></div><p> Loading... </p>');

			$(modal).append(loading);
			$('#pmMessageContent').html('');

			$.ajax({
				url : messageUrl+'/getPrivateMessages',
				data : { user_id : userId , other_person : theUser , _token : CSRF_TOKEN },
				dataType : 'json',
				type : 'POST',
				success : function(data)
				{
					$('#unreadMessage').text('('+data['unread']+')');
					$('#readMessage').text('('+data['read']+')');

					$(modal).find('.divContainer').show();
					$(loading).remove();
					modal.removeClass('loading');

					$('#pmName').text( data.other_person.user_detail.firstname +' '+ data.other_person.user_detail.lastname);

					if(data.conversation && data.conversation.length > 0)
					{
						$.each(data.conversation, function(){

							li = $('<li>');

							span = $('<span>').text(this.message);

							if(this.from != userId)
							{
								$(li).append(                        
									$('<img>').attr('src', data.other_person.user_detail.profile_picture ? BASE_URL+'/'+data.other_person.user_detail.profile_picture : defaultProfilePic )                        
								);
							}
							else
							{
								$(li).addClass('alt');
								$(span).addClass('alt');
							}

							$('#pmMessageContent').append(
							li.append(span)
							);

						});
					}

				},
				error : function(xhr)
				{
					console.log(xhr.responseText);
				}
			});
		}
	});

  
	$('#myNotifications').on('click', '.acceptFriend', function(){

		data_id = $(this).data('id');
		user = $(this).data('user');

		$(this).parents('li').find('.actionList').html('')

		.append(
			$('<span>').text('Request accepted! ').css('font-size', '12px').data('user', user)
			.append(
				$('<button>').text('Message').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox')
			)
		);

		$.ajax({
			url : friendUrl+'/acceptFriendRequest',
			data : { _token : CSRF_TOKEN, id : data_id },
			type : 'POST',
			dataType : 'json',
			success : function(data)
			{
				if(data)
				{
					socket.emit('friend_request_accepted', { other_person : user });
				}
			},
			error : function (xhr)
			{
				console.log(xhr.responseText);
			}
		});
	});
  
	$('#myNotifications').on('click', '.declineFriend', function(){

		data_id = $(this).data('id');

		$(this).parents('li').remove();

		$.ajax({
			url : friendUrl+'/cancelFriendRequest',
			data : { _token : CSRF_TOKEN, id : data_id },
			type : 'POST',
			dataType : 'json',
			success : function(data)
			{
				console.log(data);
			},error : function (xhr)
			{
				console.log(xhr.responseText);
			}
		});
	});

	$('#messagesMenu').one('click', function(){

		$('#myMessages').html('').append($('<li style="border:none;">').addClass('loading').append('<div class="typing-indicator"><span></span><span></span><span></span></div><p> Loading... </p>'));

		$.ajax({
			url : messageUrl+'/getInbox',
			data : { user_id : userId, _token : CSRF_TOKEN },
			dataType : 'json',
			type : 'POST',
			success : function(data)
			{
				sortDates = data.sort(function(a, b){
					return new Date(a.created_at) < new Date(b.created_at);
				});

				unread_messages = [];
				read_messages = [];

				$.each(sortDates, function(){

					if(this.read == 0)
					{
						unread_messages.push(this);
					}
					else
					{
						read_messages.push(this);
					}

				});

				inbox = unread_messages.concat(read_messages);

				$('#myMessages').html('');

				$.each(inbox, function(){

					msg = this;

					button = $('<a href="javascript:;">').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox')
					.append(
						$('<img>').attr('src', msg.from_user.user_detail.profile_picture ? BASE_URL+'/'+ msg.from_user.user_detail.profile_picture : defaultProfilePic )
					)
					.append(
						$('<p>')
						.append(
							$('<span>').addClass('name').text(msg.from_user.user_detail.firstname+' '+msg.from_user.user_detail.lastname)
							.append($('<span>').addClass('timestamp').text('3:36pm'))
						)
						.append(
							$('<span>').addClass('message').text(msg.message)
						)
					);

					if(msg.read == 0)
					{
						$(button).addClass('unread');
					}

					$('#myMessages').append(
						$('<li>').attr('id', 'inbox-user-'+msg.from_user.user_detail.user_id).attr('data-user', msg.from_user.user_detail.user_id)
						.append(
							button
						)
					);
				});
			},
			error : function(xhr)
			{
				console.log(xhr.responseText);
			}
		});
	});

	$('#myMessages').on('click', 'li a', function(){
		$('#unreadMessageNotification').html('');
	});

	$('#messagesMenu').on('click', function(){
		$('#unreadMessageNotification').html('');
	});

	$('#userMenu').click(function(){
		$('.profileBox').toggle();
	});

	$('#messagesMenu').click(function(){
		$('.messageNotifBox').toggle();
		$('.globalNotifBox ').hide();
		$('.notificationBox ').hide();
	});


	$('#globalNotifMenu').click(function(){
		$('.globalNotifBox').toggle();
		$('.messageNotifBox ').hide();
		$('.notificationBox ').hide();
	});

	$('#notificationMenu').click(function(){
		$('.notificationBox').toggle();
		$('.globalNotifBox ').hide();
		$('.messageNotifBox ').hide();
	});


	$('.messageBox ul').slimScroll({
		height: '366px',
		start: 'bottom'
	});

	$('#chatBoxPanel').on('click', '.minimizeChat', function(e){

		e.stopPropagation();
		chatbox = $(this).parents('.chatbox');
		room_id = $(chatbox).data('id');
		minimizeChat(chatbox);
		socket.emit('chat_minimized', room_id);
	});

	$('#chatBoxPanel').on('click', '.closeChat', function(e){
		e.stopPropagation();
		chatbox = $(this).parents('.chatbox');
		room_id = $(chatbox).data('id');
		closeChat(chatbox);
		socket.emit('stop_observing', room_id);
	});

	$('#chatBoxPanel').on('keydown', 'textarea', function(e){

		if(e.keyCode == 13)
		{
			message = $(this).val();
			chatbox = $(this).parents('.chatbox');
			room_id = $(chatbox).data('id');

			if(message && userId && room_id)
			{
				$(this).val('');
				body = $(this).parents('.activebox').find('.body');

				console.log(body);

				$(body).append(
					$('<div>').addClass('message')
					.append(
						$('<div>').addClass('avatar')
						.append(
							$('<a href="javascript:;">')
							// .append(
							//   $('<img src="img/assets/chat-avatar-shine.png">').addClass('shine')
							//   )
							.append(
								$('<img src="'+( userImage ? BASE_URL+'/'+userImage : defaultProfilePic) +'">')
							)
						)
					)
					.append(
						$('<p>').addClass('bubble yellow').text(message)
					)
				);

				$.ajax({
					url : BASE_URL+"/chatroom/postMessage",
					type : 'POST',
					data : { user_id : userId , message : message, room_id : room_id , _token : CSRF_TOKEN },
					dataType : 'json',
					success : function(data)
					{
						socket.emit('send_chatroom_message', room_id, message );
					},
					error : function(xhr)
					{
						console.log(xhr.responseText);
					}
				});

				scrollDownChatBody();
			}
		}

	});

	$('#chatBoxPanel').on('keyup', 'textarea', function(e){
		if(e.keyCode == 13)
		{
			$(this).val('');
		}
	});


	$('#chatBoxPanel').on('click','.chatbox', function(e){
		room_id = $(this).data('id');
		maximizeChat(this);
		if(room_id)
		{
			socket.emit('chat_maximized', room_id);
		}
	});

	$(".categ-button").click(function(){
		$(".categ-entries").fadeToggle();
	});

	$('body').on('click', function(e){

		if( $('.categ-entries').is(':visible') && ( !$(e.target).hasClass('categ-entries') && !$(e.target).hasClass('categ-button')))
		{
			$(".categ-entries").fadeOut();
		} 

	});

	// END EVENTS

	// FUNCTIONS

	function readGlobalNotification(){
		$.ajax({
		  url : notifUrl+'/readGlobalNotifications',
		  data : { _token : CSRF_TOKEN },
		  dataType : 'json',
		  type : 'POST',
		  success : function(data)
		  {
		    console.log('readGlobalNotification');
		    console.log(data);
		  },
		  error : function(xhr)
		  {
		    console.log(xhr.responseText);
		  }
		});
	}

	function readUserNotifications(){
		$.ajax({
			url : profileUrl+'/readFriendRequests',
			data : { user_id : userId, _token : CSRF_TOKEN },
			dataType : 'json',
			type : 'POST',
			success : function(data)
			{
			 
			 console.log('readFriendRequests');
			 console.log(data);

			},
			error : function(xhr)
			{
			  console.log(xhr.responseText);
			}
		});
	}

	function minimizeChat(chatbox){

		console.log('minimizeChat');
		chatbox.find('.inactivebox').css('display', 'block');
		chatbox.find('.activebox').css('display', 'none');
		chatbox.parent().removeClass('chatMaximized').addClass('chatMinimized');
	}

	function maximizeChat(chatbox){

		room_id = $(chatbox).data('id');
		room_name = $(chatbox).data('name');
		peopleTalking = $(chatbox).find('.peopleTalking').data('total');
		$(chatbox).find('.notif').remove();
		$(chatbox).parent().removeClass('chatMinimized').addClass('chatMaximized');


		if(room_id)
		{

			$.ajax({
				url : BASE_URL+'/chatroom/userChatRead',
				type : 'POST',
				data : { user_id : userId, room_id : room_id, _token : CSRF_TOKEN },
				dataType : 'json',
				success : function(data)
				{
					// console.log(data);
					console.log('User is looged in')
				},
				error : function(xhr)
				{
					console.log('User is not logged in');
					// console.log(xhr.responseText);
				}
			});

			$(chatbox).find('.inactivebox').hide();

			if($(chatbox).find('.activebox .message').length > 0)
			{
				$(chatbox).find('.activebox').show();
			}
			else
			{
				$(chatbox).find('.activebox').show();
				body = $(chatbox).find('.body');

				if(!userId)
				{

					$(chatbox).find('.activebox textarea')
					.replaceWith(
						$('<div>').addClass('joinBox')
						.append(
							$('<a href="'+BASE_URL+'/login">').addClass('join').text('Join Chat')
						)
					);

				}
				

				$.ajax({
					url : BASE_URL+'/room/getRoomMessages',
					data : { room_id : room_id, _token : CSRF_TOKEN },
					type : 'POST',
					dataType : 'json',
					success : function(data)
					{
						$.each(data, function(){
							$(body)
							.append(
								$('<div>').addClass('message')
								.append(
									$('<div>').addClass('avatar')
									.append(
										$('<a href="javascript:;">')
										// .append(
										//   $('<img src="img/assets/chat-avatar-shine.png">').addClass('shine')
										//   )
										.append(
											$('<img src="'+( this.user.user_detail.profile_picture ? BASE_URL+'/'+this.user.user_detail.profile_picture : defaultProfilePic) +'">')
										)
									)
								)
								.append(
								$('<p>').addClass('bubble yellow').text(this.message)
								)
							);
						});

						scrollDownChatBody();
					},
					error : function(xhr)
					{
						console.log(xhr.responseText);
					}
				});
			}
		}


	}

	function closeChat(chatbox){

		$(chatbox).parent('.chatbox-container').remove();

	}

	function scrollDownChatBody(){

		$('#chatBoxPanel').find('.body').scrollTop($('#chatBoxPanel').find('.body')[0].scrollHeight);
	}

	// END FUNCTIONS

});
/* 
 *   jQuery LazyImage Plugin 1.0.3
 *   https://github.com/dnasir/jquery-lazyimage
 *
 *   Copyright 2013, Dzulqarnain Nasir
 *   http://dnasir.com
 *
 *   Licensed under the MIT license:
 *   http://www.opensource.org/licenses/MIT
 */

(function ($, window) {
    var $window = $(window);

    // Helpers
    function isInViewport(el) {
        var viewport = {
            top: $window.scrollTop(),
            left: $window.scrollLeft()
        };
        viewport.right = viewport.left + $window.width();
        viewport.bottom = viewport.top + $window.height();

        var bounds = el[0].getBoundingClientRect();
        bounds.right = bounds.left + el.outerWidth();
        bounds.bottom = bounds.top + el.outerHeight();

        return (
            !(viewport.right < bounds.left
                || viewport.left > bounds.right
                || viewport.bottom < bounds.top
                || viewport.top > bounds.bottom)
            && el.is(':visible')
            );
    }

    // LazyImage constructor
    $.LazyImage = function(img) {
        this.$img = $(img);
        this.loading = false;
        this.originalSrc = this.$img.data('src');
        this.fadeIn = this.$img.data('fade-in');
        this.init();
    };

    // Public methods
    $.LazyImage.prototype = {
        init: function () {
            var self = this,
                fadeIn = this.fadeIn;

            self.$fakeImg = $('<img />')
                .on('load', function() {
                    self.$img
                        .removeAttr('style')
                        .css('opacity', 0)
                        .attr('src', $(this).attr('src'));

                    if (fadeIn) {
                        self.$img.animate({ opacity: 1 });
                    } else {
                        self.$img.css({ opacity: 1 });
                    }

                    self.$img.addClass('lazy-loaded');
                })
                .on('load error', function (e) {
                    self.loading = false;
                    self.$img.trigger('lazyLoaded', [self, e.type]);
                });
        },

        loadImage: function () {
            this.$fakeImg.attr('src', this.originalSrc);
        },

        destroy: function() {
            $(this).data('plugin_lazyImage', undefined);
            
        }
    };

    // jQuery interface
    $.fn.lazyImage = function () {
        // Build array of LazyImage objects
        var images = this.filter('img').map(function () {
                var image = new $.LazyImage(this);
                $(this).data('plugin_lazyImage', image);
                return image;
            });
        
        function update() {
            $.each(images, function () {
                // Load images when it's visible in the viewport
                if (isInViewport(this.$img) && !this.loading) {
                    this.loading = true;
                    this.loadImage();
                }
            });

            // Once all images have been processed, remove event handler
            if(images.length <= 0) {
                $window.off('load scroll resize', update);
            }
        }

        // Remove images that have been loaded from array
        $(this).on('lazyLoaded', function (e, image) {
            images = images.filter(function() {
                return this.originalSrc != image.originalSrc;
            });
        });

        // Set up event handler
        $window.on('load scroll resize', update);

        // Return original object to maintain chainability
        return this;
    };
})(jQuery, window);
//# sourceMappingURL=main.js.map
