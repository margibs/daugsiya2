(function($){






	$.fn.cModal = function(){

		function showModal(toggle, modal){

			

			if(!$(modal).hasClass('opened')){


				TweenLite.fromTo(modal, 0.5, 
						{ scale : 0,
						  ease: Power4.easeIn,
						 },

						{ scale : 1,
						 ease: Power4.easeOut,
						 onComplete : function(){
						 	$(modal).css('visibility', 'visible');
						 },
						display : 'block' }

						);

				$(modal).addClass('opened');

			}


		}
		function hideModal(toggle, modal){

			/*TweenLite.to(modal, 0.5, 
						{ scale : 0,
						  ease: Power4.easeIn,
						  onComplete : function(){
						 	$(modal).find('.formMessage').remove();
						 },
						 display : 'none'}
						);

			$(modal).removeClass('opened');*/

			$(document).find('.opened').each(function(){
				console.log('opened');

				TweenLite.to(this, 0.5, 
						{ scale : 0,
						  ease: Power4.easeIn,
						  onComplete : function(){
						 	$(modal).find('.formMessage').remove();
						 },
						 display : 'none'}
						);

				$(this).removeClass('opened');
			});

			history.pushState("", document.title, window.location.href.split('#')[0]);

		}


		return this.each(function(){

			
			_that = this;

			console.log('_that');
			console.log(_that);

			toggle = $(this).data('toggle');
			if(toggle){

				eventData = {
					toggle : toggle,
					modal : _that
				};

				open = location.hash.replace('#', '') == $(_that).attr('id') && $(_that).attr('id') != undefined; 

				if(open){

					showModal(toggle, _that);
				}

				$(toggle).bind('click', eventData, function(e){

					data = e.data;

					showModal(data.toggle, data.modal);
				});

				$(window).bind('click', eventData, function(e){

					data = e.data;

					if((!$(e.target).hasClass('opened') && $(e.target).parents('.opened').length == 0) && $(data.modal).is(':visible')){
						hideModal(data.toggle, data.modal);
					}
				});

				/*$(_that).on('click', '.subModalToggle', function(){

						targetModal = $(this).data('target');
						showModal(null, targetModal);
					});*/


			}

						$(document).on('click', '.subModalToggle', function(){

						targetModal = $(this).data('target');
						showModal(null, targetModal);
					});



		});

	}

	$('.modal-popup').cModal();


	$.fn.bubbleMessage = function(options){

		/*settings = $.extend({

				position: 'top'

		},options);
		    top: -45px;
    right: -80px;
*/

		return this.each(function(){

			_this = this;

			positions = {
				top : $(_this).attr('top') || 'auto',
				bottom : $(_this).attr('bottom') || 'auto',
				left : $(_this).attr('left') || 'auto',
				right : $(_this).attr('right') || 'auto'
			}


			$(_this).css('display', 'block')
						.css('top', positions.top)
						.css('bottom', positions.bottom)
						.css('left', positions.left)
						.css('right', positions.right);


		});

	}


	$.fn.interactive = function(){



		return this.each(function(){
		
		_this = this;


		options = {
				interactiveObjects : [],
				backgroundWidth : 0,
				backgroundHeight : 0,
				backgroundLeft : 0,
				backgroundTop : 0
						
		}

		image = new Image();

		image.onload = function(){

			init();

		}

		$(window).on('resize', init);

		image.src = $(_this).attr('src');


		function init(){
			console.log($(_this).parent());
			options.interactiveObjects = $(_this).parent().find('.interactiveObj');
			options.backgroundWidth	= $(_this).width();
			options.backgroundHeight = $(_this).height();
			options.backgroundLeft = $(_this).position().left + parseInt($(_this).css('marginLeft').replace('px', ''));
			options.backgroundTop = $(_this).position().top;

			frame = $('<div></div>').css({

				'width' : options.backgroundWidth+'px',
				'height' : options.backgroundHeight+'px',
				/*'height' : '100%',*/
				'top' : options.backgroundTop,
				'left' : options.backgroundLeft,
				'position' : 'absolute',
				/*'overflow' : 'hidden',*/

			 });

			$(options.interactiveObjects).detach().appendTo(frame);

			$(_this).parent().append(frame);

				options.interactiveObjects.each(function(k, obj){

					positions = {

							top : $(obj).attr('top') || 'auto',
							bottom : $(obj).attr('bottom') || 'auto',
							left : $(obj).attr('left') || 'auto',
							right : $(obj).attr('right') || 'auto',

					};

						$(obj)
						.css('top', positions.top)
						.css('bottom', positions.bottom)
						.css('left', positions.left)
						.css('right', positions.right);

						if(!$(obj).hasClass('modal-popup')){
							$(obj).css('display', 'block');
						}

						$(obj).find('.bubble').bubbleMessage();

				});

		}


		});

	}

	$('.interactiveBackground').interactive();	

})(jQuery);