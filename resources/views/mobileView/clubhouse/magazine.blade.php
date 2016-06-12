@extends('clubhouse.layout')

@section('content-list')

<!--Display the magazine data -->

{!! $questionpage !!}

<!--Display the magazine data -->

@endsection

@section('script')

<script>

  $(function(){

  var obj = <?=$questions?>;
  
  for (i = 0; i < obj.length; i++) { 
    
    theCtrlr = 'question_'+obj[i].id;
    value = 'Question'+obj[i].id; 
    id = 'user_'+obj[i].id;
    var r = $('<input type="button" value='+theCtrlr+' class='+id+'    data-id='+id+'>');
    $(".addButton").append(r);
    final_id = '.'+id;
    question_id = 'question_id_'+obj[i].id;
     App.controller(theCtrlr, function(page){

      this.transition = 'slide-left';
    
      $(page).find('.chooseAnswer').on('click', function(e){
        question_id = $(this).parents('.choiceContainer').data('id');
        choice_id = $(this).data('id');
        follow_id = $(this).data('follow-id');
        response = $(this).data('response');
        //alert('Hello World');
        data_result = $(this).parents('.choiceContainer').html('You answered '+$(this).text()+" "+response);
        /*console.log(question_id);
        console.log(choice_id);
        console.log(response);
        console.log(data_result);*/
          if(follow_id != '0'){

            $(page).find('.follow_up_'+follow_id).css('display', 'block');
          }
        sendMagazine(question_id, choice_id);
        

      });
    });
  }

  /********************* SENDING DATA TO QUESTION USER ANSWER ******************************/
  function sendMagazine(question_id, choice_id) {
      $.ajax({
        url : '{{ url("question/answer") }}',
        data : { _token : CSRF_TOKEN, question_id : question_id, choice_id : choice_id },
        dataType: "json",
        type: "POST",
        success: function(data){
          console.log(data);
        },
        error: function(error){
          console.log(error.responseText);
        }
      });
  } 
  /********************* SENDING DATA TO QUESTION USER ANSWER ******************************/
 App.load('question_1'); 
});


</script>

@endsection