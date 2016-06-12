(function(window, document, $){

	gameExpUrl = BASE_URL+'/gameExp';
	profileUrl = BASE_URL+'/profile';
	notifUrl = BASE_URL+'/notification';

	var defaultProfilePic = "http://susanwins.com/images/default_profile_picture.png";

	// YOUTUBE SCRIPT HERE
	// $("iframe[src^='//www.youtube.com']").parent().wrap("<div class='yt_container'></div>");

	function getFrameID(id) 
	{
		var elem = document.getElementById(id);
		if (elem) 
		{
			if (/^iframe$/i.test(elem.tagName)) return id; //Frame, OK
			// else: Look for frame
			var elems = elem.getElementsByTagName("iframe");

			if (!elems.length) return null; //No iframe found, FAILURE

			for (var i = 0; i < elems.length; i++) 
			{
				if (/^https?:\/\/(?:www\.)?youtube(?:-nocookie)?\.com(\/|$)/i.test(elems[i].src)) break;
			}

			elem = elems[i]; //The only, or the best iFrame

			if (elem.id) return elem.id; //Existing ID, return it
			// else: Create a new ID
			do 
			{ //Keep postfixing `-frame` until the ID is unique
				id += "-frame";
			} 
			while (document.getElementById(id));

			elem.id = id;
			return id;
		}
		// If no element, return null.
		return null;
	}

	// Define YT_ready function. 
	var YT_ready = (function() {

		var onReady_funcs = [],
			api_isReady = false;
			/* @param func function     Function to execute on ready
			* @param func Boolean      If true, all qeued functions are executed
			* @param b_before Boolean  If true, the func will added to the first
			position in the queue*/

		return function(func, b_before) {
			if (func === true) 
			{
				api_isReady = true;
				for (var i = 0; i < onReady_funcs.length; i++) 
				{
					// Removes the first func from the array, and execute func
					onReady_funcs.shift()();
				}
			}
			else if (typeof func == "function") 
			{
				if (api_isReady) func();
				else onReady_funcs[b_before ? "unshift" : "push"](func);
			}
		}

	})();

	YT_ready(true);

	var players = {};

	    YT_ready(function() {
      // for debug
      // console.log('watermelon4221!!!!');
      readyYoutube();

      function readyYoutube(){
        // console.log('readyYoutube function');
        if(YT && YT.Player)
        {
          $("iframe[id]").each(function() {
            var identifier = this.id;

            // console.log('samoka this guy oi');
            // console.log(identifier);
            var frameID = getFrameID(identifier);
            if (frameID) 
            {
            	console.log('hey change the controls!');
              //If the frame exists
              // console.log(frameID);
              // players[frameID] = readyYoutube(frameID);
              players[frameID] = new YT.Player(frameID, {
                playerVars: 
                {                       
                  'controls': 1   
                },
                events: 
                {
                  // "onReady": createYTEvent(frameID, identifier),
                  'onStateChange': onPlayerStateChange
                }
              });
              // console.log('WHY!!!!');
              // console.log(players[frameID]);
            }
          });
        }
        else
        {
        console.log('hey change the controls ELSE!');
          setTimeout(readyYoutube, 100);
        }
        //ONPLAYERSTATECHANGE
        function onPlayerStateChange(event) 
        {
          // for debug
          // console.log('am i in?');
          var state = event.target.getPlayerState();
          if (state === 2) 
          {
            // console.log('this is a state');
            // console.log(event.target.F.videoData.video_id);
            // var new_src = '//www.youtube.com/embed/'+event.target.F.videoData.video_id+'?enablejsapi=1&rel=0&controls=1';
          }
          else if (state === 0) 
          {

            var watermelon_id = event.target.getVideoData();
            var get_this_casino_for_yt = $("#casino_after_youtube").html();
            var new_src = '//www.youtube.com/embed/'+watermelon_id.video_id+'?enablejsapi=1&rel=0&controls=0';
            $('iframe[src="'+new_src+'"]').parent().html(get_this_casino_for_yt);

          }
        }
        //END ONPLAYERSTATECHANGE
      };
    });
	//END YOUTUBE SCRIPT

		POST_ID = $('#maincontainer').data('post');

		$.fn.attachSinglePageEvents = function(){

			return this.each(function(){
					page = this;

			$(page).on('click', '.toggleLoginModal', function(){
					$('#loginModal').openModal();
			});

			$(page).on('click', '#showCasino', function(){
					$('#selectCasinoModal').openModal();
			});

			recommendFriendAJAX = false;

			$(page).on('click', '#recommendToFriend', function(){
				
				$(page).find('#recommendFriendModal').openModal();
				if(!recommendFriendAJAX){
	                recommendFriendAJAX = true;

	                friendRecommentList = $(page).find('#friendRecommentList');
	                friendRecommentList.html('').append($('<li>').text('Loading...'));
	                $.ajax({
	                     url : profileUrl+'/getMyFriends',
	                     data : { _token : CSRF_TOKEN },
	                     dataType : 'json',
	                     type : 'POST',
	                     success : function(data){
	                        recommendFriendAJAX = false;
	                        $('#friendRecommentList').html('');
	                        if(data && data.length){
	                          $.each(data, function(){
	                            f = this;

	                                friendRecommentList.append(
	                                  $('<li>')
	                                      .append(
	                                        $('<div>').addClass('msgImgcont')
	                                            .append(
	                                              //$('<img>').attr('src', f.friend.user_detail.profile_picture ? BASE_URL+'/'+ f.friend.user_detail.profile_picture : defaultProfilePic )
	                                              $('<img>').attr('src', getImage(f.friend.user_detail.profile_picture, f.friend.user_detail.user_id, 5050) )
	                                              )
	                                        )
	                                      .append(
	                                        $('<h6>').text(f.friend.user_detail.firstname+' '+f.friend.user_detail.lastname)
	                                        )
	                                      .append(
	                                        $('<input type="checkbox" name="friends[]" value="'+f.friend.user_detail.user_id+'">').addClass('recommendCheck')
	                                        )
	                                  )
	                          });
	                        }
	                     },error : function(xhr){
	                      console.log(xhr.responseText);
	                     }
	                  });
	              } 

			});


			 /********************** START GET IMAGE ******************************************************************************/
		    function getImage(profile_picture ,user_id, size) {

		      if(size === null) {
		          return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+profile_picture : defaultProfilePic;
		      }
		       return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : defaultProfilePic;
		    }

		  /********************** END GET IMAGE ******************************************************************************/


			$(page).on('click','#recommendBtn', function(){

		            theButton = this;

		           

		        friends = [];

		          $(page).find('#friendRecommentList').find('input[name="friends[]"]').each(function(){
		                if($(this).is(':checked')){
		                    friends.push($(this).val());
		                }
		          });

		          if(friends.length){

		          	 $(theButton).attr('disabled', 'disabled').text('Sending...');

		              $.ajax({
		                url : notifUrl+'/recommendGame',
		                data : { friends : friends, post_id : POST_ID, _token : CSRF_TOKEN },
		                type : 'POST',
		                dataType : 'json',
		                success : function(data){
		                  $(theButton).text('Recommendation Sent!');
		                  setTimeout(function(){
		                       $(page).find('#recommendFriendModal').closeModal();
		                        $(theButton).html('<i class="ion-android-happy"> </i> Recommend Game').removeAttr('disabled');
		                        $(page).find('#friendRecommentList').html('');
		                  }, 800);
		                },error : function(xhr){
		                  console.log(xhr.responseText);
		                }
		              });

		          }else{
		            alert('Please select atleast 1 friend');
		          }

		      });
			

				$(page).find('#ratingDiv').jRate(null, rateGameFunc);

			$(page).on('click','#claimBonus', function(){
						$(page).find('.bonusCasino').slideDown();
				});

				function rateGameFunc(value){

       					if(USER_ID && POST_ID){

					          $.ajax({
					              url: gameExpUrl+'/rateGame',
					              type : 'POST',
					              data : { user_id : USER_ID, rating : value , post_id : POST_ID, _token : CSRF_TOKEN  },
					              dataType : 'json',
					              success : function(data){
					                if(data){

					                	$(page).find('#ratingPlayedNotif').text('Thanks for rating!');
					                  setTimeout(function(){
					                  	$(page).find('#ratingPlayedNotif').text(' ');
					                  }, 1000);

					                }

					              },error : function(xhr){
					                console.log(xhr.responseText);
					              }

					            });
					        }
				}

					$(page).on('click', '#addToFavorite', function(){

					_this = $(this).attr('disabled', 'disabled');

					if(USER_ID && POST_ID){

						$.ajax({
				            url: gameExpUrl+'/addFavorite',
				            type : 'POST',
				            data : { user_id : USER_ID , post_id : POST_ID, _token : CSRF_TOKEN  },
				            dataType : 'json',
				            success : function(data){
				              console.log(data);
				              if(data && data.id){

				              	_this.replaceWith(
									$('<button>').attr('type', 'button').addClass('play').data('id', data.id).attr('id', 'removeToFavorite')
										.append( $('<i>').addClass('ion-close-round') )
										.append( $('<span>').text('Remove') )
									)
				              }

				            },error : function(xhr){
				              console.log(xhr.responseText);
				            }

				          });
					}

					
			});

			$(page).on('click', '#removeToFavorite', function(){

					_this = $(this).attr('disabled', 'disabled');

					data_id = $(_this).data('id');
					if(data_id){

						$.ajax({
				            url: gameExpUrl+'/removeFavorite',
				            type : 'POST',
				            data : { id : data_id , _token : CSRF_TOKEN  },
				            dataType : 'json',
				            success : function(data){

				                _this.replaceWith(
									$('<button>').attr('type', 'button').addClass('play').attr('id', 'addToFavorite')
										.append( $('<i>').addClass('ion-ios-heart') )
										.append( $('<span>').text('Fave') )
									)

				            },error : function(xhr){
				              console.log(xhr.responseText);
				            }

				          });

						   	
					}

					
			});

			$(page).on('click','#playedGame', function(){

			        
			        if(USER_ID && POST_ID){
			        _this = $(this).attr('disabled', 'disabled');
			          $.ajax({
			            url: gameExpUrl+'/playedGame',
			            type : 'POST',
			            data : { user_id : USER_ID , post_id : POST_ID, _token : CSRF_TOKEN  },
			            dataType : 'json',
			            success : function(data){
			              if(data && data.id){
			                 $(page).find('.notPlayedGame').hide();
			        			$(page).find('.playedGame').show().find('#ratingDiv').jRate(null, rateGameFunc);

			              }

			            },error : function(xhr){
			              console.log(xhr.responseText);
			            }

			          });

			        }

			    });

			  var total_image = $( page ).find("#postcontent img").length;
				    if(total_image >= 1)
				    {

				      var banner_type = 1;
				      // console.log({_token: CSRF_TOKEN,'articleBannerRatio' : articleBannerRatio,'total_image' : total_image,'banner_type' : banner_type});
				      $.ajax({
				        type: 'get',
				        url: BASE_URL+"/casino/ajax/get_article_banner",
				        data: {_token: CSRF_TOKEN,'articleBannerRatio' : articleBannerRatio,'total_image' : total_image,'banner_type' : banner_type,'get_casino_category' : get_casino_category},
				        dataType: 'json', 
				        success: function(response)
				        {
				        	// console.log('response');
				        	// console.log(response);
				          /*var parsed = JSON.parse(response),*/
				              no_total = articleBannerRatio;

				          $.each( response, function( i, l){

				            if(total_image < articleBannerRatio)
				            {
				              no_total = total_image;
				            }

				            no_total -= 1;
				            var every_nth = "img:eq("+no_total+")";
				            $( page ).find('#postcontent').find(every_nth).parent().after(l);
				            no_total += articleBannerRatio + 2;

				          });

				        },error : function(xhr){
				        	console.log(xhr.responseText);
				        }
				      });
				    }


				 $(page).on('click','#postcontent > p > img',function(){

					var $this = $(this);
					var image_parent = $this.parent();

					if(!$this.hasClass( "not_count" ))
					{
						image_parent.css( "position", "relative" );
						image_parent.append('<span class="overlay_ni_men" style="display: block; position: absolute; z-index: 2; top: 0; width: 100%; height: 100%; text-align: center; background-color:rgba(255, 255, 255, 0.9); "><div class="outer"><div class="middle"><div class="inner"><p>Do you want to play this game?</p> <br /><a href="#" class="casino_yes" track-action="56ddbe4fe6b07" track-value="Yes Count"> <div class="glossy"> Yes </div> </a> <a href="#" class="casino_no" track-action="56ddbe560574d" track-value="No Count"> <div class="glossy" style="float: left;"> No </div> </a></div></div></div> </span>');
					}

				});

				$(page).on('click','#postcontent .casino_no',function(e){
			      e.preventDefault();
			      var $this = $(this);
			      var casino_no_parent = $this.closest('.overlay_ni_men');
			      casino_no_parent.remove();
			    });

			    $(page).on('click','#postcontent .casino_yes',function(e){

				      e.preventDefault();
				      var $this = $(this);
				      var casino_yes_parent = $this.parent();
				       casino_yes_parent.html("<div class='cssload-loader'></div><p style='position:relative;top:50px;'> Searching for Casinos... </p>");
				            

				      $.ajax({
				          type: 'post',
				          url: BASE_URL+"/casino/ajax/get_casino",
				          data: {_token: CSRF_TOKEN,'category_id' : get_casino_category,'post_id' : POST_ID}, 
				          dataType : 'json',
				          success: function(response)
				          {
				            var parsed = response;
				            var casino = '<p class="popupheading">Casino List</p> <ul class="casinolist">';
				           
				            $.each( parsed, function( index, obj){
				              var casino_url = '';

				              casino_url = obj.link_desktop;

				              casino += "<li><a href='"+casino_url+"' track-action='56ddbe5eb51c9' track-value='"+obj.name+"' class='casino_option' get-this-id="+obj.id+" target='_blank'><img src='"+BASE_URL+'/uploads/'+obj.image_url+"'></a></li>";

				            });

				            casino += "</ul>";

				            setTimeout(function() {
				             casino_yes_parent.html(casino);
				            }, 3000);

				          }
				        });

				    });


	

				$(page).find('#share_via_pinterest').sharrre({
				    share : 
				    {
				      pinterest : true
				    },
				    template : '<i class="fa fa-pinterest-p"></i>',
				    enableHover: false,
				    enableTracking: true,
				    click: function(api, options)
				    {
				      api.openPopup('pinterest');
				    }
				  });

				  $(page).find('#share_via_facebook').sharrre({
				    share : 
				    {
				      facebook : true
				    },
				    template : '<i class="fa fa-facebook"></i>',
				    enableHover: false,
				    enableTracking: true,
				    click: function(api, options)
				    {
				      api.openPopup('facebook');
				    }
				  });

				  $(page).find('#share_via_twitter').sharrre({
				    share : 
				    {
				      twitter : true
				    },
				    template : '<i class="fa fa-twitter"></i>',
				    enableHover: false,
				    enableTracking: true,
				    click: function(api, options)
				    {
				      api.openPopup('twitter');
				    }
				  });

				  $(page).find('#share_via_googlePlus').sharrre({
				    share : 
				    {
				      googlePlus : true
				    },
				    template : '<i class="fa fa-google-plus"></i>',
				    enableHover: false,
				    enableTracking: false,
				    click: function(api, options)
				    {
				      api.openPopup('googlePlus');
				    }
				  });


				     function getApiCount(value){
  
				        min = 603;
				        max = 1422;
				        count = 0;

				        if(value){

				        value = parseInt(value) * 2;
				          
				           median = max - min;
				          
				          if( (median - value) >=0 ){
				            count = min + (value - 1);
				          }else{
				            getApiCount(value - median);
				          }
				        }


				        if(count > 999){
					    	count = (count / 1000).toFixed(1)+'K';
					    }

				        
				        return count;
				      }

				  $(page).find('#api_count').text(getApiCount(POST_ID));

				/*$(page).find('#api_count').sharrre({
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

						});
		}



})(window, document, jQuery);