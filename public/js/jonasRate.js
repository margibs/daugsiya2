(function(window, document, $){


		$.fn.jRate = function(value, callback){


			return this.each(function(){


					_this = $(this);

					_this.addClass('jRate').html('');

					container = $('<ul>').addClass('rateContainer');
					_this.append(container);

						li = $('<li>');
							container.append(li);

					if(!value){
						value = _this.attr('data-value');
					}

						setTimeout(function(){

								d = li.width()+'px';
								li.css({ 'height' : d }).append(
										$('<input type="radio">').attr('name', 'rate').attr('value', 1).css({ 'height' : d })
									)
									.append(
										$('<span>').addClass('star' +(value && value >= 1 ? ' selected' : '')).css({ 'height' : d })
										)

								for(i = 2 ; i <=5; i ++){
									clone = li.clone();
									clone.find('input').attr('value', i);
									if(value && value >= i){
										clone.find('.star').addClass('selected');
									}else{
										clone.find('.star').removeClass('selected');
									}
									clone.appendTo(container);
								}
							},0);


						$(container).on('change', 'input[type="radio"]', function(){

							$(this).parents('ul').find('.star').removeClass('selected');

							if(this.checked){
								$(this).parent('li').prevAll().each(function(){
										$(this).find('.star').addClass('selected');
								});

								if(callback) callback($(this).val());
							}

							
						});


			});
		}


/* <ul class="rateContainer"> 
                <li> <input type="radio" name="rate_1"><span class="star"></span></li>
                <li> <input type="radio" name="rate_2"><span class="star"></span></li>
                <li> <input type="radio" name="rate_3"><span class="star"></span></li>
                <li> <input type="radio" name="rate_4"><span class="star"></span></li>
                <li> <input type="radio" name="rate_5"><span class="star"></span></li>
            </ul>*/

})(window, document, jQuery);