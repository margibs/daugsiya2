jQuery(document).ready(function($){
	//check if a .cd-tour-wrapper exists in the DOM - if yes, initialize it
	$('.cd-tour-wrapper').exists() && initTour();

	function initTour() {
		var tourWrapper = $('.cd-tour-wrapper'),
			tourSteps = tourWrapper.children('li'),
			stepsNumber = tourSteps.length,
			coverLayer = $('.cd-cover-layer'),
			tourStepInfo = $('.cd-more-info'),
			tourTrigger = $('#cd-tour-trigger');

		//create the navigation for each step of the tour
		createNavigation(tourSteps, stepsNumber);

		//custom event for starting tour immediately
		$(document).on('start_tour', function(){
			if(!tourWrapper.hasClass('active')) {
				tourWrapper.addClass('active');
				showStep(tourSteps.eq(0), coverLayer);
			}
		});
		
		tourTrigger.on('click', function(){
			//start tour
			if(!tourWrapper.hasClass('active')) {
				//in that case, the tour has not been started yet
				tourWrapper.addClass('active');
				showStep(tourSteps.eq(0), coverLayer);
			}
		});

		//change visible step
		tourStepInfo.on('click', '.cd-prev', function(event){
			//go to prev step - if available
			( !$(event.target).hasClass('inactive') ) && changeStep(tourSteps, coverLayer, 'prev');
		});
		tourStepInfo.on('click', '.cd-next', function(event){
			//go to next step - if available
			( !$(event.target).hasClass('inactive') ) && changeStep(tourSteps, coverLayer, 'next');
		});

		//close tour
		tourStepInfo.on('click', '.cd-close', function(event){
			closeTour(tourSteps, tourWrapper, coverLayer);
		});

		//detect swipe event on mobile - change visible step
		tourStepInfo.on('swiperight', function(event){
			//go to prev step - if available
			if( !$(this).find('.cd-prev').hasClass('inactive') && viewportSize() == 'mobile' ) changeStep(tourSteps, coverLayer, 'prev');
		});
		tourStepInfo.on('swipeleft', function(event){
			//go to next step - if available
			if( !$(this).find('.cd-next').hasClass('inactive') && viewportSize() == 'mobile' ) changeStep(tourSteps, coverLayer, 'next');
		});

		//keyboard navigation
		$(document).keyup(function(event){
			if( event.which=='37' && !tourSteps.filter('.is-selected').find('.cd-prev').hasClass('inactive') ) {
				changeStep(tourSteps, coverLayer, 'prev');
			} else if( event.which=='39' && !tourSteps.filter('.is-selected').find('.cd-next').hasClass('inactive') ) {
				changeStep(tourSteps, coverLayer, 'next');
			} else if( event.which=='27' ) {
				closeTour(tourSteps, tourWrapper, coverLayer);
			}
		});
	}

	function createNavigation(steps, n) {
		

		steps.each(function(index){
			var tourNavigationHtml = '<div class="cd-nav"><span><b class="cd-actual-step">1</b> of '+n+'</span><ul class="cd-tour-nav"><li><a href="#0" class="cd-prev">&#171; Previous</a></li><li><a href="#0" class="cd-next">Next &#187;</a></li></ul></div><a href="#0" class="cd-close">Close</a>',
				 step = $(this),
				stepNumber = index + 1,
				/*nextClass = ( stepNumber < n ) ? (( stepNumber == steps.length -1 ) ? 'complete' : '' ) : 'inactive',*/
				/*prevClass = ( stepNumber == 1 ) ? 'inactive' : '';*/


				//custom changes for buttons
				
				nextClass = '',
				prevClass = '';
				if(parseInt(step.index()) === 0){
					tourNavigationHtml = '<div class="cd-nav"><span><b class="cd-actual-step">1</b> of '+n+'</span><ul class="cd-tour-nav"><li><a href="#0" class="skip">Skip</a></li><li><a href="#0" class="cd-next start">Start Tour</a></li></ul></div><a href="#0" class="cd-close">Close</a>';
				}else if(stepNumber == steps.length){
					tourNavigationHtml = '<div class="cd-nav"><span><b class="cd-actual-step">1</b> of '+n+'</span><ul class="cd-tour-nav"><li><a href="#0" class="cd-prev">Previous</a></li><li><a href="#0" class="complete">Finish</a></li></ul></div><a href="#0" class="cd-close">Close</a>';
				}

			var nav = $(tourNavigationHtml).find('.cd-next').addClass(nextClass).end().find('.cd-prev').addClass(prevClass).end().find('.cd-actual-step').html(stepNumber).end().appendTo(step.children('.cd-more-info'));
		});
	}

	function showStep(step, layer) {
		step.addClass('is-selected').removeClass('move-left');
		smoothScroll(step.children('.cd-more-info'));
		showLayer(layer);
	}

	function smoothScroll(element) {
		(element.offset().top < $(window).scrollTop()) && $('body,html').animate({'scrollTop': element.offset().top}, 100);
		(element.offset().top + element.height() > $(window).scrollTop() + $(window).height() ) && $('body,html').animate({'scrollTop': element.offset().top + element.height() - $(window).height()}, 100); 
	}

	function showLayer(layer) {
		layer.addClass('is-visible').on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
			layer.removeClass('is-visible');
		});
	}

	function changeStep(steps, layer, bool) {
		var visibleStep = steps.filter('.is-selected'),
			delay = (viewportSize() == 'desktop') ? 300: 0; 
		visibleStep.removeClass('is-selected');

		(bool == 'next') && visibleStep.addClass('move-left');

		setTimeout(function(){
			( bool == 'next' )
				? showStep(visibleStep.next(), layer)
				: showStep(visibleStep.prev(), layer);
		}, delay);
	}

	function closeTour(steps, wrapper, layer) {
		steps.removeClass('is-selected move-left');
		wrapper.removeClass('active');
		layer.removeClass('is-visible');
	}

	function viewportSize() {
		/* retrieve the content value of .cd-main::before to check the actua mq */
		return window.getComputedStyle(document.querySelector('.cd-tour-wrapper'), '::before').getPropertyValue('content').replace(/"/g, "").replace(/'/g, "");
	}
});

//check if an element exists in the DOM
jQuery.fn.exists = function(){ return this.length > 0; }