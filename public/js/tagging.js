(function($){

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var BASE_URL = $('meta[name="baseURL"]').attr('content');

	IMAGE_BASE_URL = "{{ url('/')}}";

	 
	//var publicUrl = '{{ asset("") }}';
	//var defaultProfilePic = IMAGE_BASE_URL+'/images/default_profile_picture.png';
	var defaultProfilePic = "http://susanwins.com/images/default_profile_picture.png";


	function placeCaretAtEnd(el) {
   /* el.focus();*/

    $(el).parent('.textarea').focus();
    if (typeof window.getSelection != "undefined"
            && typeof document.createRange != "undefined") {
        var range = document.createRange();
        range.selectNodeContents(el);
        range.collapse(false);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
    } else if (typeof document.body.createTextRange != "undefined") {
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.collapse(false);
        textRange.select();
    }
}

	$.fn.resetTagging = function(){

		return this.each(function(){

			$(this).html('').append($('<div></div>').addClass('parentContent').css({ 'min-height' : '16px', 'display' : 'inline-block', 'width' : '100%' })
			.append($('<span></span>').addClass('textarea').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true')  ));



		});
	}
	$.fn.replaceInitTagging = function(){

		return this.each(function(){

			$(this).replaceWith($('<div></div>').addClass('parentContent').css({ 'min-height' : '16px', 'display' : 'inline-block', 'width' : '100%' })
			.append($('<span></span>').addClass('textarea').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true')  ));



		});
	}

	function typingAction(event){

		action = event.which;

		typingActions = [8,32,46];

		if($.inArray(action, typingActions) >=0 || (action >= 48 && action <= 90) || (action >= 96 && action <= 111) || (action >= 186 && action <= 222)  /* && (actions < 48 || actions > 90)*//* || (actions < 96 && actions > 111) || (actions < 186 && actions > 222)*/ ){
			return true;
		}

		return false;

	}

	function createPersonContainer(){
		closeButton = $('<i>').addClass('fa fa-times');
		returnContainer = $('<div></div>').addClass('viewPersonContainer').css('display', 'none')
			.append(
				$('<div></div>').addClass('personImageContainer')
					.append(closeButton)
					.append($('<div>').addClass('imageFrame'))
					.append($('<h6>'))
				)
			.append($('<div>').addClass('actionButtons'));

			$(closeButton).on('click', function(){
				$(returnContainer).removeClass('hovering').hide();
			});

			return returnContainer;
	}


	$(document).on('mouseleave', '.viewPersonContainer', function(e){
		
		if(!$(e.relatedTarget).hasClass('tagFriend')){
			$(this).removeClass('hovering').hide();
		}
	});

	$(document).on('mouseleave', '.tagFriend', function(e){
		personContainer = $('.viewPersonContainer');
		console.log(e.relatedTarget);
		if($(e.relatedTarget).parents('.viewPersonContainer').length == 0){
			$(personContainer).removeClass('hovering').hide();
		}
		
	});

	$(document).on('mouseover', '.tagFriend', function(){

		tagFriend = this;

		personContainer = $('.viewPersonContainer');



		if($(personContainer).length == 0){
			personContainer = createPersonContainer();
			$('body').append( personContainer);
		}
		
		if(!$(personContainer).hasClass('hovering')){

			$(personContainer).addClass('hovering');

			person_id = $(tagFriend).attr('data-id');

			$.ajax({
				type : 'GET',
				data : { _token : CSRF_TOKEN, user_id : person_id },
				url : BASE_URL+'/profile/viewUserProfile',
				dataType : 'json',
				success : function(data){
					console.log(data);
				if(data){
					offsetTop = $(tagFriend).offset().top+$(tagFriend).height();
					offsetLeft = $(tagFriend).offset().left;

					//var defaultProfilePic = BASE_URL+'/images/default_profile_picture.png';
					//var profile_picture = data.user_detail.profile_picture ? BASE_URL+'/'+data.user_detail.profile_picture : defaultProfilePic;
					//$(personContainer).find('.imageFrame').html('').append($('<img>').attr('src', profile_picture ));
					$value_null = null;
					$(personContainer).find('.imageFrame').html('').append($('<img>').attr('src', getImage(data.user_detail.profile_picture, data.user_detail.user_id, $value_null) ));
					$(personContainer).find('h6').text(data.user_detail.firstname+' '+data.user_detail.lastname);

					if(data.friend){
						relation = data.friend.relation;
                  		friend_id = data.friend.friend_id;

		                  if(relation != 2){

		                    actionBtn = $('<button type="button">').data('other_person', person_id);

		                    if(relation != 1){
		                        $(actionBtn).data('friend_id', friend_id);
		                    }

		                    if(relation == 1){
		                      $(actionBtn).text('Add Friend').data('action', 1);
		                    }else if(relation == 3){
		                      $(actionBtn).text('Cancel Friend Request').data('action', 2);
		                    }else if(relation == 4){
		                      $(actionBtn).text('Accept Friend Request').data('action', 3);
		                    }else if(relation == 5){
		                      $(actionBtn).text('Unfriend').data('action', 4);
		                    }

		                    $(personContainer).find('.actionButtons').html('').append(actionBtn);

		                  };
					}

					$(personContainer).show().css({'top' : offsetTop+'px', 'left' : offsetLeft+'px'});
					
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


	$(document).on('focus','.dummyTextarea', function(e){
			
			parentContent = $(this).find('.parentContent');


				$(parentContent).focus();


			});

			mouseHappened = false;


			/*searchResultDiv = $(dummyTextarea).parent().find('.searchResultDiv');


					if($(searchResultDiv).length == 0){

							searchResultDiv = $('<div></div>').addClass('searchResultDiv').append($('<div></div>').addClass('inner').append($('<div></div>').addClass('title').text('Tag Game')).append($('<ul></ul>').addClass('body'))).hide();


					$(dummyTextarea).parent().append(searchResultDiv);

					$(searchResultDiv).on('mousedown', function(){
						mouseHappened = true;
					});
				}*/

			$(document).on('mousedown','.searchResultDiv', function(){
						mouseHappened = true;
				});

			$(document).on('focusout','.dummyTextarea', function(){

				if(mouseHappened){
					mouseHappened = false;
				}else{
					$(this).next('.searchResultDiv').hide();
				}
				

			});

			$(document).on('mouseup keyup','.dummyTextarea', function(e){
				
				theDummyTextarea = this;

				TextArea = $(theDummyTextarea).parent().next('textarea');
				sel = window.getSelection();
				focusedNode = sel.focusNode;
				contentTextarea = $(sel.focusNode.parentNode);

				parentContent = $(contentTextarea).parent('.parentContent');
				theText = $(contentTextarea).text();

				searchResultDiv = $(theDummyTextarea).parent().find('.searchResultDiv');
				/*console.log(focusedNode);*/

				if(e.which == 13){

					$(theDummyTextarea).find('> *').each(function(){
						if($(this).is('div') && !$(this).hasClass('parentContent')){
							
							getParentContent = $(this).find('> .parentContent');
							
							if(getParentContent.length > 0){
								getParentContent.unwrap();
								getTextarea = $(getParentContent).find('.textarea');
								if(getTextarea.length == 0){
									$(getParentContent).append($('<span></span>').addClass('textarea').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true')  );
								}
							}else{
								$(this).replaceInitTagging();
							}
						}
					});

					$(theDummyTextarea).find('br').remove();
					/*console.log($(sel.focusNode));
					placeCaretAtEnd($(_this).find('.parentContent').last().find('.textarea')[0]);*/

				}else if(e.which == 8){
					$(theDummyTextarea).find('> *').each(function(){
						if($(this).is('br')){
							
							$(this).replaceInitTagging();
								
							$(this).find('> *').each(function(){
								if($(this).is('br')){
									$(this).replaceWith($('<span></span>').addClass('textarea').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true'));
								}
							});
						}
					});

				/*if($(_this).find(' > *').length == 1 && $(_this).find(' > .parentContent > .textarea').length == 1){
						placeCaretAtEnd( $(_this).find(' > .parentContent > .textarea')[0] );	
					}*/
				}

				if($(contentTextarea).hasClass('parentContent')){
					if($(focusedNode).is('span')){
						placeCaretAtEnd($(focusedNode)[0]);
					}else if(focusedNode.nodeType == 3){

						nextFindTextarea = $(focusedNode).next('.textarea');

						if($(nextFindTextarea).length == 0){
							nextFindTextarea = $('<span></span>').addClass('textarea').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true');
							$(contentTextarea).append(nextFindTextarea);
						}
						placeCaretAtEnd($(nextFindTextarea).text(focusedNode.data)[0]);
						$(focusedNode).remove();
					}
				}

				if($(contentTextarea).hasClass('searchItem') && typingAction(e)){

					prevTextarea = $(contentTextarea).prev('.textarea');

					if($(prevTextarea).length == 0){
						prevTextarea = $('<span></span>').addClass('textarea').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true').text(theText);
						$(contentTextarea).replaceWith(prevTextarea);
					}else{
						$(prevTextarea).text($(prevTextarea).text()+theText);
						$(contentTextarea).remove();
					}
				}

					if($(searchResultDiv).length == 0){

							searchResultDiv = $('<div></div>').addClass('searchResultDiv').append($('<div></div>').addClass('inner').append($('<div></div>').addClass('title')).append($('<ul></ul>').addClass('body')));


					$(theDummyTextarea).parent().append(searchResultDiv);
				}

				$(searchResultDiv).hide().find('.body').html('');

			currentCaret = $(contentTextarea).caret();
			currentCaretSubstring = theText.substring(currentCaret-1, currentCaret);
			gamePrefix = false;
			friendPrefix = false;
			searchGame = false;
			searchFriend = false;
				if(currentCaret != undefined){

					tempPrefix = false;
					for(k=currentCaret; k>0;k-- ){


						getPrevSubstr = theText.substring(k-1, k);
						if(getPrevSubstr == '#' && tempPrefix){
							gamePrefix = k;
							break;
						}else if(getPrevSubstr == '@' && tempPrefix){
							friendPrefix = k;
							break;
						}else if(getPrevSubstr != ' ' || (getPrevSubstr != '@' && getPrevSubstr != '#') ){
							tempPrefix = true;
						}else{

							tempPrefix = false;
						}
					}

					lastHasSpace = false;
					lastSpaceString = theText.substring(currentCaret, currentCaret+1 );
					if( lastSpaceString == ' ' || lastSpaceString == '' ){
						lastHasSpace = true;
					}

					if(gamePrefix && lastHasSpace){
						searchFriend = false;
							searchGame = theText.substring(gamePrefix, currentCaret);
							remainingSubstring = theText.substring(0, gamePrefix);
							tagDivOffsetTop = $(parentContent).position().top + $(parentContent).height();
							tagDivOffsetLeftDiv = $(parentContent).find('.tagDivOffsetLeftDiv');

							if($(tagDivOffsetLeftDiv).length == 0){
								tagDivOffsetLeftDiv = $('<span></span>').addClass('tagDivOffsetLeftDiv').attr('contenteditable', 'false').css({ 'height' : '0px', 'color' :'transparent', 'position' :'absolute', 'pointer-events' : 'none' });
								$(parentContent).prepend(tagDivOffsetLeftDiv);
							}
							$(tagDivOffsetLeftDiv).text(remainingSubstring);
							tagDivOffsetLeft = $(tagDivOffsetLeftDiv).width()+$(contentTextarea).position().left;
							$(searchResultDiv).css({ 'top' : tagDivOffsetTop+'px', 'left' : tagDivOffsetLeft+'px' });
					}else if(friendPrefix && lastHasSpace){
						searchGame = false;
							searchFriend = theText.substring(friendPrefix, currentCaret);
							remainingSubstring = theText.substring(0, friendPrefix);
							tagDivOffsetTop = $(parentContent).position().top + $(parentContent).height();
							tagDivOffsetLeftDiv = $(parentContent).find('.tagDivOffsetLeftDiv');

							if($(tagDivOffsetLeftDiv).length == 0){
								tagDivOffsetLeftDiv = $('<span></span>').addClass('tagDivOffsetLeftDiv').attr('contenteditable', 'false').css({ 'height' : '0px', 'color' :'transparent', 'position' :'absolute', 'pointer-events' : 'none' });
								$(parentContent).prepend(tagDivOffsetLeftDiv);
							}
							$(tagDivOffsetLeftDiv).text(remainingSubstring);
							tagDivOffsetLeft = $(tagDivOffsetLeftDiv).width()+$(contentTextarea).position().left;
							$(searchResultDiv).css({ 'top' : tagDivOffsetTop+'px', 'left' : tagDivOffsetLeft+'px' });
					}else{
						searchGame = false;
					}
				}

				if(searchFriend){
					$.ajax({
							url : BASE_URL+'/searchHashFriend',
							type : 'GET',
							data : { _token : CSRF_TOKEN, wildcard : searchFriend },
							dataType : 'json',
							success : function(data){
								console.log(searchFriend);
								console.log(data);
									if(data && data.length){

										$(searchResultDiv).show().find('.title').text('Tag a Friend');
										$(searchResultDiv).find('.body').html('');

										$.each(data, function(){

											tag = $('<a href="javascript:;"></a>').text(this.fullname).data('id', this.id);
											$(searchResultDiv).find('.body').append($('<li></li>').append(tag));

											$(tag).on('click', function(){
												$(contentTextarea).html(theText.substring(0, friendPrefix - 1));
												data_id = $(this).data('id');
												spansearched = $('<span>').addClass('searchItem').addClass('findFriend').css('background', '#ccc').attr('data-id', data_id).text($(this).text());

												nextTextarea = $(contentTextarea).next('.textarea');

												$(spansearched).insertAfter(contentTextarea);

												if($(nextTextarea).length == 0){

													nextTextareaText = theText.substring(currentCaret, theText.length);
												nextTextarea = $('<span></span>').addClass('textarea').css({'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true').html('&nbsp'+nextTextareaText);

												$(nextTextarea).insertAfter(spansearched);
												}
												
												

												placeCaretAtEnd($(nextTextarea)[0]);

												$(TextArea).decodeValue($(theDummyTextarea).html());
												$(searchResultDiv).hide().find('.body').html('');
											});
										});
									}else{
										$(searchResultDiv).hide().find('.body').html('');
									}

								},error : function(xhr){
									console.log(xhr.responseText);
								}
							});

				}else if(searchGame){
					$.ajax({
							url : BASE_URL+'/searchHashGame',
							type : 'GET',
							data : { _token : CSRF_TOKEN, wildcard : searchGame },
							dataType : 'json',
							success : function(data){

									if(data && data.length){

										$(searchResultDiv).show().find('.title').text('Tag a Game');
										$(searchResultDiv).find('.body').html('');

										$.each(data, function(){

											tag = $('<a href="javascript:;"></a>').text(this.name).data('link', BASE_URL+'/'+this.slug).data('id', this.id);
											$(searchResultDiv).find('.body').append($('<li></li>').append(tag));

											$(tag).on('click', function(){

												$(contentTextarea).html(theText.substring(0, gamePrefix - 1));
												data_id = $(this).data('id');
												data_link = $(this).data('link');
												spansearched = $('<span>').addClass('searchItem').addClass('findGame').css('background', '#ccc').attr('data-id', data_id).attr('data-link', data_link).text($(this).text());

												nextTextarea = $(contentTextarea).next('.textarea');

												$(spansearched).insertAfter(contentTextarea);

												if($(nextTextarea).length == 0){

													nextTextareaText = theText.substring(currentCaret, theText.length);
												nextTextarea = $('<span></span>').addClass('textarea').css({'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true').html('&nbsp'+nextTextareaText);

												$(nextTextarea).insertAfter(spansearched);
												}
												
												

												placeCaretAtEnd($(nextTextarea)[0]);

												$(TextArea).decodeValue($(theDummyTextarea).html());
												$(searchResultDiv).hide().find('.body').html('');
											});
										});
									}else{
										$(searchResultDiv).hide().find('.body').html('');
									}

								},error : function(xhr){
									console.log(xhr.responseText);
								}
							});
				}else{
					$(searchResultDiv).hide().find('.body').html('');
				}

				 if($(theDummyTextarea).html() == ''){
						$(theDummyTextarea).resetTagging();
					}

			$(TextArea).decodeValue($(theDummyTextarea).html());

			});

				$(document).on('keydown','.dummyTextarea', function(e){

				sel = window.getSelection();
				contentTextarea = $(sel.focusNode.parentNode);

				parentContent = $(contentTextarea).parent('.parentContent');
				
				theText = $(contentTextarea).text();
				/*_this = this;*/


				if($(contentTextarea).hasClass('searchItem') && e.which == 13){

					prevTextarea = $(contentTextarea).prev('.textarea');

					if($(prevTextarea).length == 0){
						prevTextarea = $('<span></span>').addClass('textarea').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true').text(theText);
						$(contentTextarea).replaceWith(prevTextarea);
					}else{
						$(prevTextarea).text($(prevTextarea).text()+theText);
						$(contentTextarea).remove();
					}
				}

				if(e.which == 8){

					if($(contentTextarea).hasClass('searchItem')){
						$(contentTextarea).remove();
					}
					
					/*if($(_this).find(' > *').length == 1 && $(_this).find(' > .parentContent > .textarea').length == 1){
						placeCaretAtEnd( $(_this).find(' > .parentContent > .textarea')[0] );	
					}*/

				}

			});

	$(document).on('simulateSubmit','form', function(e){

				friendTags = [];
				 $(this).find('.dummyTextarea .findFriend').each(function(){

				 	friend_id = $(this).attr('data-id');

				 	if(friend_id){
				 		friendTags.push(friend_id);
				 	}
				 	
				});
				 $(this).data('friendTags', friendTags);

				/* alert(JSON.stringify(friendTags));*/

				$(this).find('.dummyTextarea').resetTagging();
			});

	$.fn.tagging = function(){


		return this.each(function(){

			TextArea = $(this);
			dummyTextarea = $('<div></div>').addClass('dummyTextarea')
			.append($('<div></div>').addClass('parentContent').css({ 'min-height' : '16px', 'display' : 'inline-block', 'width' : '100%' })
			.append($('<span></span>').addClass('textarea').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true')  ));

			/*$(dummyTextarea).find('.textarea').append($('<span></span>').addClass('ee'));*/

			placeholder = $(TextArea).attr('placeholder');
			$(dummyTextarea).css({
			 'width' : $(TextArea).css('width'),
			 'height' : $(TextArea).css('height'),
			 'padding' :  $(TextArea).css('padding'),
			 'border' :  $(TextArea).css('border'),
			 'border-radius' :  $(TextArea).css('border-radius'),
			 'text-align' : 'left',
			 'overflow-y' : 'auto',
			 'margin' : $(TextArea).css('margin'),
			 'font-family' : $(TextArea).css('font-family'),
			 'font-size' : $(TextArea).css('font-size'),
			 'box-shadow' : $(TextArea).css('box-shadow'),
			 'background' : $(TextArea).css('background'),
			  }).attr('contenteditable', 'true').attr('placeholder', placeholder);
			dummyTextareaParent = $('<div></div>').addClass('dummyTextareaParent').append(dummyTextarea).css('position', 'relative');
			if(TextArea.parent().find('.dummyTextareaParent').length == 0){
				$(dummyTextareaParent).insertBefore(TextArea);
				$(TextArea).hide();
			}

			
		
		});
	}

	$.fn.decodeValue = function(htmlVal){


		return this.each(function(){
			
			htmlParent = $.parseHTML(htmlVal);
			/*console.log(htmlVal);*/
			parsedValue = '';
			$.each(htmlParent, function(k, parent){

				if(k > 0){
					parsedValue+='<br/>';
				}

				$.each($(parent).find('> *'), function(l, child){

					if(!$(child).hasClass('tagDivOffsetLeftDiv')){

						if($(child).hasClass('findGame')){
							parsedValue += '<a href="'+$(child).data('link')+'">'+$(child).text()+'</a>';
						}else if($(child).hasClass('findFriend')){
							parsedValue += '<a href="javascript:;" data-id="'+$(child).data('id')+'" class="tagFriend">'+$(child).text()+'</a>';
						}else{
							parsedValue += $(child).text();
						}
					}


					
				});
				
			});

			$(this).val(parsedValue);

		});
	}

})(jQuery);