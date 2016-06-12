$(document).ready(function(){

	 	comment_connected = false;
		login_success = false;
		tempComment = null;
		tempReply = null;
		user_json = $('meta[name="user_json"]').attr('content');
		user = user_json ? JSON.parse(user_json) : false;
		friendUrl = BASE_URL+'/friends';
		profileImage = $('#data-profile').val();
		USER_NAME = $('#userId').attr('data-name');
		publicUrl = BASE_URL;
		defaultProfilePic = BASE_URL+'/user_uploads/default_image/default_01.png';

		content_id = $('meta[name="content_id"]').attr('content');
		comment_type = $('meta[name="comment_type"]').attr('content');

	// Welcome Package and Resend Confirmation
	submitWelcomePackageAJAX = false;
	resendConfirmationAjax = false;

	$('#yesWelcomePackage').leanModal( { top : '50%' } );

	$(document).on('click','.submitWelcomePackage', function(){

		address = $(this).parents('.modal').find('.welcomeAddress').val();

		if(!address){
			alert('Please enter a valid address');
			return;
		}

		if( !submitWelcomePackageAJAX ){

			submitWelcomePackageAJAX = true;

			$.ajax({
				url :BASE_URL+'/admin/enterAddress',
				data : { _token : CSRF_TOKEN, address: address },
				dataType : 'json',
				type : 'POST',
				success : function(data){

					$("#lean_overlay").trigger("click");
					$('.confirmNotification').addClass('done').text('Welcome Package Request Sent!');

				},error : function(xhr){
					console.log(xhr.responseText);
				}
			});

		}
	});

	
	$(document).on('click', '#resendConfirmation', function(){
		_this = $(this);

		if(!resendConfirmationAjax){

			_this.text('Loading...');
			resendConfirmationAjax = true;

			$.ajax({
				url :BASE_URL+'/admin/sendEmailAweber',
				data : { _token : CSRF_TOKEN },
				dataType : 'json',
				type : 'POST',
				success : function(data){
					console.log(data);
					_this.parent('.confirmNotification').addClass('done').text('Resend Confirmation Sent! Please Check Your Email.');
				},error : function(xhr){
					console.log(xhr.responseText);
				}
			});
		}
	});
	//End Welcome Package and Resend Confirmation

});