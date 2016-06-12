(function(window, document, $){


	emojiShortCuts ={
		':D' : '_s21',
		':)' : '_s41',
		':(' : '_s62'
	};

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
			.append($('<span></span>').addClass('textarea focused').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true')  ));



		});
	}
	$.fn.replaceInitTagging = function(){

		return this.each(function(){

			$(this).replaceWith($('<div></div>').addClass('parentContent').css({ 'min-height' : '16px', 'display' : 'inline-block', 'width' : '100%' })
			.append($('<span></span>').addClass('textarea focused').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true')  ));



		});
	}

					$(document).on('mousedown keydown','.dummyTextarea', function(e){

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
					

				}

			});

	$(document).on('mouseup keyup','.dummyTextarea', function(e){

		sel = window.getSelection();
		focusedNode = sel.focusNode;
		theDummyTextarea = this;
			contentTextarea = $(sel.focusNode.parentNode);

			$(this).find('.focused').removeClass('focused');
			contentTextarea.addClass('focused');

			currentCaret = $(contentTextarea).caret();
			$(contentTextarea).data('caret', currentCaret);
			theText = $(contentTextarea).text();
			parentContent = $(contentTextarea).parent('.parentContent');

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
									$(this).replaceWith($('<span></span>').addClass('textarea focused').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true'));
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

			currentCaretSubstring = theText.substring(currentCaret-1, currentCaret);
			
			emojiPrefix = false;
			if(currentCaret != undefined){

					tempPrefix = false;
					for(k=currentCaret; k>0;k-- ){


						getPrevSubstr = theText.substring(k-1, k);
						if(getPrevSubstr == ':' && tempPrefix){
							emojiPrefix = k;
							break;
						}else if(getPrevSubstr != ' ' || (getPrevSubstr != ':') ){
							tempPrefix = true;
						}else{

							tempPrefix = false;
						}
					}
				}


				lastHasSpace = false;
					lastSpaceString = theText.substring(currentCaret, currentCaret+1 );
					if( lastSpaceString == ' ' || lastSpaceString == '' ){
						lastHasSpace = true;
					}


			if(emojiPrefix && lastHasSpace){
				searchEmoji = theText.substring(emojiPrefix-1, currentCaret);

				if(emojiShortCuts[searchEmoji] != undefined){
					emoticonSPan = $('<span>').addClass('emoticon '+emojiShortCuts[searchEmoji]).attr('contenteditable', 'false').attr('unselectable', 'on').attr('draggable', 'false');

					$(contentTextarea).html(theText.substring(0, emojiPrefix - 2));

					nextTextarea = $(contentTextarea).next('.textarea');

					$(emoticonSPan).insertAfter(contentTextarea);

					if($(nextTextarea).length == 0){

					nextTextareaText = theText.substring(currentCaret, theText.length);
					nextTextarea = $('<span></span>').addClass('textarea focused').css({'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true').html('&nbsp'+nextTextareaText);

					$(nextTextarea).insertAfter(emoticonSPan);
					}
												
					placeCaretAtEnd($(nextTextarea)[0]);

					$(TextArea).decodeValue($(theDummyTextarea).html());
				}
			}


		 if($(theDummyTextarea).html() == ''){
						$(theDummyTextarea).resetTagging();
					}


			$(TextArea).decodeValue($(theDummyTextarea).html());

	});


	$(document).on('simulateSubmit','form', function(e){

			/*	friendTags = [];
				 $(this).find('.dummyTextarea .findFriend').each(function(){

				 	friend_id = $(this).attr('data-id');

				 	if(friend_id){
				 		friendTags.push(friend_id);
				 	}
				 	
				});
				 $(this).data('friendTags', friendTags);*/

				/* alert(JSON.stringify(friendTags));*/
				$(this).find('.dummyTextarea').resetTagging();
				$(this).submit();
			});

	$(document).on('click','.triggerEmoticon', function(){

		targetEmoji = $($(this).data('target'));

		targetForm = $($(targetEmoji).data('target'));
		if(targetForm.find('textarea').attr('disabled') != 'disabled'){
			targetEmoji.show().focus();
		}

	});

	$(document).on('focusout', '.emojiContainer', function(){
		$(this).hide();
	});


	$(document).on('click', '.emoticonTrigger', function(){
		targetForm = $($(this).parents('.emojiContainer').data('target'));
		emoticon = $(this).data('emoticon');
		content = targetForm.find('.dummyTextarea').find('.focused');
		theDummyTextarea = targetForm.find('.dummyTextarea');
		theText = $(content).text();
		caret = content.data('caret');
		TextArea = $(targetForm).find('textarea');

		if(emoticon){
			emoticonSPan = $('<span>').addClass('emoticon '+emoticon).attr('contenteditable', 'false').attr('unselectable', 'on').attr('draggable', 'false');

			if(caret != undefined){

				$(content).html(theText.substring(0, caret));
				nextTextarea = $(content).next('.textarea');
				$(emoticonSPan).insertAfter(content);

				if($(nextTextarea).length == 0){

					nextTextareaText = theText.substring(caret, theText.length);
					nextTextarea = $('<span></span>').addClass('textarea focused').css({'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true').html('&nbsp'+nextTextareaText);

					$(nextTextarea).insertAfter(emoticonSPan);
					}
												
					placeCaretAtEnd($(nextTextarea)[0]);

				
			}else{
				$(content).replaceWith($(emoticonSPan));

				nextTextarea = $(content).next('.textarea');

				if($(nextTextarea).length == 0){

					nextTextarea = $('<span></span>').addClass('textarea focused').css({'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true').html('&nbsp');

					$(nextTextarea).insertAfter(emoticonSPan);
				}
			}

				$(TextArea).decodeValue($(theDummyTextarea).html());
		}

	});

	$.fn.emoji = function(){


		return this.each(function(){

			TextArea = $(this);
			dummyTextarea = $('<div></div>').addClass('dummyTextarea')
			.append($('<div></div>').addClass('parentContent').css({ 'min-height' : '16px', 'display' : 'inline-block', 'width' : '100%' })
			.append($('<span></span>').addClass('textarea focused').css({ 'min-height' : '16px', 'display' : 'inline-block' }).attr('contenteditable', 'true')  ));

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
			 'float' : $(TextArea).css('float'),
			 'font-family' : $(TextArea).css('font-family'),
			 'font-size' : $(TextArea).css('font-size'),
			 'box-shadow' : $(TextArea).css('box-shadow'),
/*			 'background' : $(TextArea).css('background'),*/
	/*		 'background-color' : $(TextArea).css('background-color'),*/
			  }).attr('contenteditable', 'true').attr('placeholder', placeholder);
			dummyTextareaParent = $('<div></div>').addClass('dummyTextareaParent').append(dummyTextarea).css('position', 'relative');
			if(TextArea.parent().find('.dummyTextareaParent').length == 0){
				$(dummyTextareaParent).insertBefore(TextArea);
				$(TextArea).hide();
			}

			if($(TextArea).attr('disabled') == 'disabled' || $(TextArea).attr('disabled') == 'true' ){
				$(dummyTextarea).hide();
				$(TextArea).show();
			}

			$(TextArea).on('enable', function(){
				$(dummyTextarea).show();
				textVal = $(TextArea).data('textVal');
				$(TextArea).hide().val(textVal);
			});
			$(TextArea).on('disable', function(){
				$(dummyTextarea).hide();
				textVal = $(TextArea).val();
				$(TextArea).show().val('').data('textVal', textVal);
			});
			


			
		
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

/*						if($(child).hasClass('findGame')){
							parsedValue += '<a href="'+$(child).data('link')+'">'+$(child).text()+'</a>';
						}else if($(child).hasClass('findFriend')){
							parsedValue += '<a href="javascript:;" data-id="'+$(child).data('id')+'" class="tagFriend">'+$(child).text()+'</a>';
						}
*/
						if($(child).hasClass('emoticon')){
							parsedValue += $(child)[0].outerHTML;
						}

						else{
							parsedValue += $(child).text();
						}
					}


					
				});
				
			});

			$(this).val(parsedValue);

		});
	}

})(window, document, jQuery);