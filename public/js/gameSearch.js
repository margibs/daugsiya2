$(function(){

	$('#search').on('input', function(e){
		var searchField = $('#search').val(),
		timer = $('#search').data('timeout');

		$("#mainhead").css({
			"position":"relative",
			"z-index":"999",
		});

		$(".overlay").css({
			"background-color":"rgba(0, 0, 0, 0.41)",
			"position": "fixed",
			"top":"0",
			"left":"0",
			"width": "100%",
			"height": "100%",
			"z-index": "98"
		});

		$('#search_result').html('<div id="floatingCirclesG"  style="display:block;"><div class="f_circleG" id="frotateG_01"></div><div class="f_circleG" id="frotateG_02"></div><div class="f_circleG" id="frotateG_03"></div><div class="f_circleG" id="frotateG_04"></div><div class="f_circleG" id="frotateG_05"></div><div class="f_circleG" id="frotateG_06"></div><div class="f_circleG" id="frotateG_07"></div><div class="f_circleG" id="frotateG_08"></div></div>');

		$('.verytopHeader').css({
			"background-color":"#ffffff"
		})

		$("#search_result").css({
			"background": "#ffffff"          
		});

		if(timer) 
		{
			clearTimeout(timer);
			$('#search').removeData('timeout');
		}

		if( searchField == 0 || searchField == '' || searchField == null ) 
		{
			$('#search_result').html('<h6>NO RESULTS FOUND</h6>');
		} 
		else if (e.which == 13) 
		{
			e.preventDefault();
			get_search_result(searchField);
		}
		else 
		{
			$('#search').data('timeout', setTimeout(get_search_result, 1000 * 0.5,searchField));
		}

	});

	function get_search_result(searchField)
	{
		$.ajax({
			type: 'post',
			url: BASE_URL+'/home/ajax_get_posts',
			data: {_token: CSRF_TOKEN,'searchField' : searchField}, 
			success: function(response)
			{
				var parsed = JSON.parse(response),
				output = '';
				$.each( parsed, function( index, obj){

					output += '<a class="entry" tabindex="1" href="'+BASE_URL+'/' +obj.slug+ '" ><img src="'+BASE_URL+'/uploads/'+obj.icon_feature_image+'" width="100px" height="100px"> <p>' +obj.title+ '</p> <div class="searchratingouter"> <span class="searchrating" style="width:'+Math.floor(obj.total_rating)+'%;"> &nbsp; </span> </div> </a>';

				});

				if(output.trim() == '')
				{
					$('#search_result').html('<h6>NO RESULTS FOUND</h6>');
				}
				else
				{
					$('#search_result').html(output);
				}

			}
		});
	}


	$('#search').on('keyup', function(e){
		if(e.which == 40)
		{
			$('#search_result').find('.entry:first-child').focus().trigger('keydown');
		}
	});

	$('#search_result').on('focusin', '.entry', function(){

	    $(this).css({'outline' : 0, 'background' : '#E8E8E8'});

	}).on('focusout','.entry', function(){

	  	$(this).css({'background' : '#fff'});

	});

	$('#search_result').on('keydown','.entry:focus', function(e){

		if(e.which == 40 || e.which == 38)
		{
			if(e.which == 40)
			{
				$(this).next().focus();
			}
			else
			{
				if($(this).index() == 0)
				{
					$('#search').focus();
				}
				else
				{
					$(this).prev().focus();
				}
			}
			return false;
		}
	});

  $(".overlay").click(function(){
      $(this).css({
           "background":"none",
            "z-index": "0",
            "cursor" : "auto"
          }); 
      $('.verytopHeader').css({
			"background-color":"rgba(251, 251, 251, 0.92)"
		})
      $('#search_result').html('');
  });

});