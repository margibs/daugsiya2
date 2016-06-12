
(function(window, document, $){

	
	  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var BASE_URL = $('meta[name="baseURL"]').attr('content');
		var messageUrl = BASE_URL+'/message';
		var userId = $('#userId').val();
		var USER_ID = userId;
		var USER_UPLOADS = '/user_uploads/user_';
		var tabActions = [];

		var defaultProfilePic = BASE_URL+'/user_uploads/default_image/default_01.png';





	function getTabActionKey(user_id){
		if(tabActions.length > 0){

			for(i=0;i<tabActions.length;i++){
				if(tabActions[i].tab_user_id == user_id){
					return i;
				}
			}
		}

		return false;
	}

	 function messageChecker(message, updated_at) {
      result = message.indexOf(".com");
      image = message.indexOf(".jpg");

      if(result != -1) {
          console.log(true);
          return "<p><a target='_blank' href='"+message+"' style='text-decoration: none;'>"+message+"</a><dev class='timestamp' data-datetime='"+updated_at+"'><dev class='livetime'></dev></dev></p>";
      }
      else {
          console.log(false);
          
          return "<p>"+message+"<dev class='timestamp' data-datetime='"+updated_at+"'><dev class='livetime'></dev></dev></p>";
      }
     
    }


	function addTabAction(action, user_id, elem){
		 key = getTabActionKey(user_id);
		 elemJson = elem ? JSON.stringify($(elem)[0].outerHTML) : null;
		 if(key>=0 && tabActions[key]){
		 	
		 	if(tabActions[key].action == 'addTab' && action != 'addTab' && action !='close' ){
		 		tabActions[key].subAction = action;
		 	}else{
			 	tabActions[key].action = action;
			 	tabActions[key].elem = elemJson;
			 	tabActions[key].subAction = null;
		 	}
		 	
		 }else{
		 	tabAction = { tab_user_id : user_id, action : action, elem : elemJson };
		 	tabActions.push(tabAction);
		 }

		 console.log('addTabAction');
		 console.log(tabActions);
	}

	   /********************** START GET IMAGE ******************************************************************************/
    function getImage(profile_picture ,user_id, size) {

      if(size === null) {
          return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+profile_picture : defaultProfilePic;
      }
       return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : defaultProfilePic;
    }

  /********************** END GET IMAGE ******************************************************************************/

function getPmCb(userId){

	

	pmCb = $('#pmbox-user-'+userId);

	if(pmCb.length == 0){
			
		pmCb = $('<div>').addClass('chatbox-container pmMiniChat').attr('id', 'pmbox-user-'+userId).data('user', userId)
						.append( $('<div>').addClass('chatbox')

							.append( $('<div>').addClass('inactivebox').css('display', 'none')
								.append( $('<h2>')
									.append( $('<b>').addClass('pmName') )
									.append( $('<i>').addClass('fa fa-times closeCb') )
									  ) )

							.append( $('<div>').addClass('activebox').css('display', 'block')
								.append( 
									$('<div>').addClass('head')
										.append($('<h2>')
												.append( $('<i>').addClass('fa fa-times closeCb') )
												.append( $('<i>').addClass('fa fa-minus minimizeCb') )

												.append( $('<a href="javascript:;">').addClass('pmName') )
											)
												
									 )
								.append(
									$('<ul>').addClass('messagesContent')
									)
								.append(
									$('<div>').addClass('triggers')
											.append( $('<i>').addClass('fa fa-paper-plane pmTrigger') )
									)
								.append(
									$('<form>').addClass('sendPrivateMessage')
											.append( $('<textarea>').addClass('privateMessageTextarea observeTyping observerEnd_user_'+userId).attr('data-broadcastId', 'user_'+userId).attr('data-endbroadcastId', 'user_'+USER_ID).attr('placeholder', 'Type Message') )
									)
							 )
						 )

		appendTab(pmCb);

			user_id = pmCb.data('user');
			addTabAction('addTab', userId, pmCb);

	}

	return pmCb;

}

function appendTab(theTab){

	chatBoxPanel = $('#chatBoxPanel');
	chatBoxContainers = $('.chatbox-container');

	theTab.appendTo(chatBoxPanel);

	if(chatBoxContainers.length >=4){
		lastContainer = $(chatBoxContainers).eq(3);
		theTab.insertBefore(lastContainer);
	}

	checkTabContainers();

}

function checkTabContainers(){

	chatBoxContainers = $('.chatbox-container').show();

	if(chatBoxContainers.length >4){

		smContainer = getSmContainer();
		smInner = smContainer.find('.smInner').html('');
		for(i=chatBoxContainers.length-1;i>=4;i--){
			container = $('.chatbox-container').eq(i);
			$(container).hide();

			pmName = $(container).find('.pmName:first-child').text();
			smNavbtn = $('<li>').append( $('<a href="javascript:;">').text(pmName) )
							.append( $('<span>').addClass('fa fa-times closeSm') )
							.data('index', i);
			smInner.append( smNavbtn )
		}
	}else if(chatBoxContainers.length == 4){
		$('.chatSmContainerParent').remove();
		$('.chatbox-container').show();
	}else{
		$('.chatSmContainerParent').remove();
	}
	
}

$(document).on('checkTabContainers', function(){
	checkTabContainers();
})

$(document).on('click','.chatSmContainerBtn', function(){
	$('.chatSmContainer').toggle();
});

$(document).on('click', '.chatSmContainer .smInner li', function(){
	lastContainer = $('.chatbox-container').eq(3);
	selectedIndex = $(this).data('index');
	$(this).remove();
	$('.chatbox-container').eq(selectedIndex).show().insertBefore(lastContainer);
	/*$(lastContainer).hide();*/
	console.log(lastContainer);
	checkTabContainers();
});

$(document).on('click', '.chatSmContainer .smInner li .closeSm', function(e){
	e.stopPropagation();
	selectedIndex = $(this).parent('li').data('index');
	$('.chatbox-container').eq(selectedIndex).remove();
	$(this).parent('li').remove();
	checkTabContainers();
});


function getSmContainer(){


	chatSmContainerParent = $('.chatSmContainerParent');

	if(chatSmContainerParent.length == 0){

		chatSmContainerParent = $('<div>').addClass('chatSmContainerParent')
			.append( $('<a href="javascript:;">').addClass('chatSmContainerBtn')
				.append( $('<span>').addClass('ion-ios-chatboxes') )
			 )
			.append( $('<div>').addClass('chatSmContainer')
				.append( $('<ul>').addClass('smInner')
				 )
			 )
		chatSmContainerParent.appendTo('#chatBoxPanel');
	}

      return chatSmContainerParent;

}
	
	$(window).load(function() {
	 	
	 	if(userId){
	 		if(localStorage.storageData){
				oldData = JSON.parse(localStorage.storageData);
				console.log(oldData);
				if(oldData){

					key = false;
					for(i=0;i<oldData.length;i++){
						if(oldData[i].owner_id	== userId ){
								key = i;
								break;
						}
					}

					if(key>=0 && oldData[key]){
						secondsPassed = (new Date().getTime() - oldData[key].date) / 1000;

						if(secondsPassed <= 1800 && oldData[key].boxes.length){


							$.each(oldData[key].boxes, function(){
								appendPmBox(this);
							});

								checkTabContainers();
						}
					}		
				}

			}

	 	}else{
	 		localStorage.clear();
	 	}


		

	});

	function appendPmBox(arg){

		theBox = $(arg.box);
		theBox.data('user', arg.user_id);

		if($('#pmbox-user-'+arg.user_id).length == 0){
			$('#chatBoxPanel').append(theBox);
		
			if(theBox.find('.inactivebox').is(':visible')){
				theBox.find('.notif').remove();
				theBox.addClass('reload');
				getPrivateMessageReadCount(arg.user_id);
			}else{
				getPrivateMessage(arg.user_id);
			}
			
		}
		
	}

	function doTabAction(action, user_id, callback){

		theBox = $('#pmbox-user-'+user_id);
		if(theBox.length > 0){

			if(action == 'minimize'){
				theBox.find('.inactivebox').show();
				theBox.find('.activebox').hide();
			}else if(action == 'maximize'){
				theBox.find('.activebox').show();
				theBox.find('.inactivebox').hide();

				if(theBox.hasClass('reload')){
					theBox.removeClass('reload');
					getPrivateMessage(user_id);
				}
			}else if(action == 'close'){
				theBox.remove();
			}

			if(callback) callback();

		}

	}

	$(window).on('blur', function(){
		if(tabActions.length > 0){
			localStorage.tabActions = JSON.stringify(tabActions);
			tabActions = [];
		}
	});

	$(window).on('focus', function(){
		if(localStorage.tabActions){

			tabActionStorage = JSON.parse(localStorage.tabActions);
			if(tabActionStorage && tabActionStorage.length > 0){

				for(i=0;i<tabActionStorage.length;i++){

					theAction = tabActionStorage[i];

					thePmCb = $('#pmbox-user-'+theAction.tab_user_id);

					if(theAction.action == 'addTab' && thePmCb.length == 0){

						theBox = $(JSON.parse(theAction.elem));
						theBox.data('user', theAction.tab_user_id);
						appendTab(theBox);

						if(theBox.find('.messagesContent').children().length == 0){
							getPrivateMessage(theAction.tab_user_id);
						}

						

					}else{
						doTabAction(theAction.action, theAction.tab_user_id);
					}

					if(theAction.subAction) doTabAction(theAction.subAction, theAction.tab_user_id);

				}

			}

		}
	});


	$(window).on('beforeunload', saveTabs);

	function saveTabs(){

	if(userId){

		pmBoxes = [];

			$('.pmMiniChat').each(function(){

	  				_this = $(this);

	  				user_id = _this.data('user');
	  				if(user_id){

	  					clonedBox = _this.clone();
	  					$(clonedBox).find('.messagesContent').html('');
	  					pmBoxes.push({ user_id : user_id , box : $(clonedBox)[0].outerHTML } );
	  				}
	  		});

	  		storeData = { date : new Date().getTime(), owner_id :userId, boxes : pmBoxes };
	  		saveToLocalStorage(storeData);

		}
	}

	function saveToLocalStorage(data){
		oldData = [];
		if(localStorage.storageData){
			oldData = JSON.parse(localStorage.storageData);
		}
		if(oldData.length == 0){
			oldData.push(data);
		}else{

			key = false;
			for(i=0;i<oldData.length;i++){
				if(oldData[i].owner_id	== data.owner_id ){
						key = i;
						break;
				}
			}

			if(key>=0){
				oldData[key] = data;
			}else{
				oldData.push(data);
			}
		}

		localStorage.storageData = JSON.stringify(oldData);

	}



$(document).on('click','.closeCb', function(e){

	e.stopPropagation();
	user_id = $(this).parents('.pmMiniChat').data('user');
	doTabAction('close', user_id, function(){ addTabAction('close', user_id) });
	checkTabContainers();
	return false;
});

$(document).on('click', '.pmMiniChat .inactivebox', function(){

	user_id = $(this).parents('.pmMiniChat').data('user');
	doTabAction('maximize', user_id, function(){ addTabAction('maximize', user_id) });
});


$(document).on('click','.minimizeCb', function(e){
	e.stopPropagation();
	user_id = $(this).parents('.pmMiniChat').data('user');
	doTabAction('minimize', user_id, function(){ addTabAction('minimize', user_id) });

	return false;
});

function initializeDate() {

          timeZone = 'Europe/London';
      
      $('.timestamp').each(function(){
          timestamp = this;
          datetime = $(timestamp).data('datetime');
          $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
          $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
      });

   }


function getPrivateMessageReadCount(user_id, callback){

			$.ajax({

					url : messageUrl+'/getPrivateMessageReadCount',
					data : { other_person : user_id , _token : CSRF_TOKEN },
					dataType : 'json',
					type : 'POST',
					success : function(count)
					{
						if(count && parseInt(count) > 0){
							theBox = $('#pmbox-user-'+user_id);
							theBox.find('.inactivebox').append($('<div>').addClass('notif').text(count));

						}
						
					},
					error : function(xhr)
					{
						console.log(xhr.responseText);
					}
				});
}

function getPrivateMessage(user_id, callback){

	thePmCb = $('#pmbox-user-'+user_id);

		if(!thePmCb.hasClass('loading') && thePmCb.length > 0)
			{
				$(thePmCb).addClass('loading');
				loading  = $('<li>').text('Loading... ').addClass('loading');
				$(thePmCb).find('.messagesContent').append(loading);
				$(thePmCb).append(loading);
				$(thePmCb).find('.messagesContent').html('');

				$(thePmCb).find('.privateMessageTextarea').attr('disabled', 'disabled');

			return $.ajax({
					url : messageUrl+'/getPrivateMessages',
					data : { user_id : userId , other_person : user_id , _token : CSRF_TOKEN },
					dataType : 'json',
					type : 'POST',
					success : function(data)
					{
						

						thePmCb = $('#pmbox-user-'+user_id);
						loading = $(thePmCb).find('.loading');
						$(loading).remove();
						thePmCb.removeClass('loading');
						$(thePmCb).find('.privateMessageTextarea').removeAttr('disabled');

						$(thePmCb).find('.pmName').text( data.other_person.user_detail.firstname +' '+ data.other_person.user_detail.lastname);

						if(data.conversation && data.conversation.length > 0)
						{
							$.each(data.conversation, function(){

								li = $('<li>');

								//span = $('<span>').text(this.message);
								//span = $('<span>').text(messageChecker(this.message, data.other_person.user_detail.updated_at));
								
								span = $('<span>').append(messageChecker(this.message, this.created_at));
								



								if(this.from != userId)
								{
									$(li).append(                        
										//$('<img>').attr('src', data.other_person.user_detail.profile_picture ? BASE_URL+'/'+USER_UPLOADS+data.other_person.user_detail.user_id+'/'+data.other_person.user_detail.profile_picture : defaultProfilePic )
										$('<img>').attr('src', getImage(data.other_person.user_detail.profile_picture, data.other_person.user_detail.user_id, 5050))                        
									);
								}
								else
								{
									$(li).addClass('alt');
									$(span).addClass('alt');
								}

								$(thePmCb).find('.messagesContent').append(
								li.append(span)
								);

							});

							$(thePmCb).find('.messagesContent').scrollTop( $(thePmCb).find('.messagesContent')[0].scrollHeight );

							if(callback) callback(thePmCb);
						}

						initializeDate();						

					},
					error : function(xhr)
					{
						console.log(xhr.responseText);
					}
				});
			}
}

$(document).on('click', '.pmFriend', function(){
	_this = this;

	$(_this).removeClass('unread');

	user_id = $(this).attr('data-user') ? $(this).attr('data-user') : $(this).parent().attr('data-user');

	if(!user_id){
		user_id = $(this).data('user') ? $(this).data('user') : $(this).parent().data('user');
	}
	
	if(user_id){

		thePmCb = getPmCb(user_id);

		addTabAction('addTab', user_id, thePmCb);

		getPrivateMessage(user_id, function(theBox){
				/*user_id = theBox.data('user');
				addTabAction('addTab', user_id, theBox);*/
			});

	}

});

socket.on('post_private_message', function(message){

		console.log('you got a private message!');
		console.log(BASE_URL+'/'+message.from.profile_picture);
		console.log(message);

		thePmCb = $('#pmbox-user-'+message.from.user_id);

		if(message.from.user_id == userId){
			thePmCb = $('#pmbox-user-'+message.to)
		}
		
		if( thePmCb.length > 0 )
		{
			console.log('real time add');

			if(message.from.user_id == userId){

				thePmCb.find('.messagesContent').append(
					$('<li>').addClass('alt').append(
						$('<span>').addClass('alt').text(message.message)
					)
				);
			}else{

				if(thePmCb.find('.inactivebox').is(':visible')){

					notif =  thePmCb.find('.inactivebox .notif');
					notifications = 0;
					if(notif.length == 0){
						notif = $('<div>').addClass('notif');
						thePmCb.find('.inactivebox').append(notif);
					}else{
						notifications = notif.text() ? parseInt(notif.text()) : 0;
					}

					notif.text(notifications+1);
					
				}


				thePmCb.find('.messagesContent').append(
					$('<li>').append(
						//$('<img>').attr('src', BASE_URL+'/'+message.from.profile_picture ? BASE_URL+'/'+message.from.profile_picture : defaultProfilePic )
						$('<img>').attr('src', getImage(message.from.profile_picture, message.from.user_id, 5050))
					)
					.append(
						//$('<span>').text(message.message)
						$('<span>').append(messageChecker(message.message, message.updated_at))
					)
				);
			}

			

			thePmCb.find('.messagesContent').animate({
				scrollTop: thePmCb.find('.messagesContent')[0].scrollHeight
			}, 2000);
		}
		else
		{

			if($('#inbox-user-'+message.from.user_id).length)
			{
				$('#inbox-user-'+message.from.user_id).find('a').addClass('unread').find('.message').text(message.message);
				$('#myMessages').prepend($('#inbox-user-'+message.from.user_id));

				$('#inbox-user-'+message.from.user_id).find('.timestamp').replaceWith($('<span></span>').addClass('timestamp').livestamp(moment.tz(timeZone).format()) );
			}
			else
			{
				$('#myMessages').prepend(
					$('<li>').attr('data-user', message.from.user_id).attr('id', 'inbox-user-'+message.from.user_id)
					.append(
						$('<a href="javascript:;">').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox').addClass('unread')
						.append(
							//$('<img>').attr('src', message.from.profile_picture ? BASE_URL+'/'+ message.from.profile_picture : defaultProfilePic )
							$('<img>').attr('src', getImage(message.from.profile_picture, message.from.user_id, 5050))
						)
						.append(
							$('<p>')
							.append(
								$('<span>').addClass('name').text(message.from.name)
								.append($('<span></span>').addClass('timestamp').livestamp(moment.tz(timeZone).format()))
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


$(document).on('mouseup', '.pmTrigger', function(){
		$(this).parents('.pmMiniChat').find('form').submit();
});


$(document).on('submit','.sendPrivateMessage', function(e){

		e.preventDefault();
		theModal = $(this).parents('.pmMiniChat');
		theUser = theModal.data('user');
		message = $(this).find('.privateMessageTextarea').val();

		$(this).find('.privateMessageTextarea').val('');

		if(theUser && message)
		{

			theModal.find('.messagesContent').append(
				$('<li>').addClass('alt').append(
					$('<span>').addClass('alt').text(message)
				)
			);

			theModal.find('.messagesContent').animate({
				scrollTop: theModal.find('.messagesContent')[0].scrollHeight
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

})(window, document, jQuery);