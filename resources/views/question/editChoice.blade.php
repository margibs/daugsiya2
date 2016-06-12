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
                            <h2> Edit Choice </h2>
                            <div class="categform">
                              <form class="form-inline" method="POST" action="{{ url('admin/question/choices/edit') }}/{{ $choice->id }}">
                                 {!! csrf_field() !!}
                                 <div class="form-group">
                                     <h6> Choice </h6> 
                                    <input type="text" class="form-control" name="choice" value="{{ $choice->choice }}">
                                </div>

                                @if($choice->question->follow_up == 0)
                                <div class="form-group">
                                     <h6> Follow Up Question </h6> 

                                     
                                        
                                        <select class="form-control" name="follow_id">
                                             <option value="0" selected></option>
                                            

                                        @foreach($follow_up_questions as $f)
                                            <option value="{{ $f->id }}" {{ $f->id == $choice->follow_id ? 'selected' : '' }} >{{ $f->question }}</option> 
                                        @endforeach
                                        </select>  
                                </div>

                                @else
                                    <input type="hidden" value="0" name="follow_id">
                                  @endif

                                <div class="form-group">
                                     <h6> Response </h6> 
                                    <input type="text" class="form-control" name="response" value="{{ $choice->response }}">
                                </div>          

                                <input type="submit" value="Submit">
                              </form>
                            </div>

                        </div>

                 </div>
                
                </div>

              


@endsection