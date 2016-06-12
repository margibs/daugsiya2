@extends('admin.layout')

@section('content')

<style type="text/css">
.serverp{
    margin-top: 30px;
    text-align: center;
    margin-bottom: 30px;
}
.winnerlist ul li{
    margin-bottom: 5px;
}
.winnerlist ul li a{
    text-decoration: none;
}

.form-horizontal .form-group{
    width:100%;
    padding-bottom:10px;
    position: relative;
    font-family: Roboto;
    margin-bottom: 3px;
}

.form-horizontal .form-group .form-control{
    width:100%;
}
.form-group input[type=text], .form-group textarea, .form-group select{
    border: 1px solid #ddd;
    border-radius: 2px;
    font-family: Roboto;    
    width: 100%;
    padding: 10px;
    font-size: 15px;
}
.form-group .panel{
    margin: 0px;
    padding: 0px;
}
.form-group .panel h6{
    margin: 0px;
}
.form-group .panel a{
    font-size: 14px;
    padding: 15px 10px;
}

h2{
    font-size: 23px;
    margin-bottom: 30px;
}

</style>
            @include('question.navigation')

                    
                <div class="row">

                 <div class="col-sm-8">
                     
                     <div class="panel col-sm-6">
                            <h2> Edit Question </h2>
                            <div class="categform">
                              <form class="form-inline" method="POST" action="{{ url('admin/question/edit') }}/{{ $question->id }}">
                                 {!! csrf_field() !!}
                                <div class="form-group">
                                     <h6> Question </h6> 
                                    <input type="text" class="form-control" name="question" value="{{ $question->question }}">
                                </div>            
                                <div class="form-group">
                                     <h6> Follow Up </h6> 
                                    <input type="radio" name="follow_up" value="0" {{ $question->follow_up == 0 ? 'checked' : '' }}> No<input type="radio" name="follow_up" value="1" {{ $question->follow_up == 1 ? 'checked' : '' }}> Yes
                                </div>  
                                <div class="form-group">
                                     <h6> Order </h6> 
                                    <input type="number" class="form-control" name="order" min="0" value="{{ $question->order }}">
                                </div>   
                                <input type="submit" value="Submit">
                              </form>
                            </div>

                        </div>

                 </div>
                
                </div>

              


@endsection