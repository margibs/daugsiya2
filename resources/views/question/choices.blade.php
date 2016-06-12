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

.follow_up_question{
    display: none;
}

h2{
    font-size: 23px;
    margin-bottom: 30px;
}

</style>
            @include('question.navigation')

                    
                <div class="row">

                 <div class="panel">
                     <h2> {{ $question->question }} </h2>

                      <div class="panel col-sm-6">
                            <div class="categform">
                              <form class="form-inline" method="POST" action="{{ url('admin/question/choices') }}/{{ $question->id }}">
                                 {!! csrf_field() !!}
                                <div class="form-group">
                                     <h6> Choice </h6> 
                                    <input type="text" class="form-control" name="choice">
                                </div>

                                @if($question->follow_up == 0)
                                <div class="form-group">
                                     <h6> Follow Up Question </h6> 

                                     
                                        
                                        <select class="form-control" name="follow_id">
                                             <option value="0" selected></option>
                                            

                                        @foreach($follow_up_questions as $f)
                                            <option value="{{ $f->id }}">{{ $f->question }}</option> 
                                        @endforeach
                                        </select>  
                                </div>

                                @else
                                    <input type="hidden" value="0" name="follow_id">
                                  @endif

                                <div class="form-group">
                                     <h6> Response </h6> 
                                    <input type="text" class="form-control" name="response">
                                </div>

                                <input type="submit" value="Submit">
                              </form>
                            </div>

                        </div>

                 </div>
                    
                 <table style="text-align:left">
                                <thead>
                                    <tr>
                                        <th> Choice </th>                            
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($question->choices as $ch)
                                        
                                        <tr>
                                            <td>{{ $ch->choice }}</td>
                                            <td>
                                            <a href="{{ url('admin/question/choices/delete') }}/{{ $ch->id }}"> <i class="fa fa-times"></i>  </a>
                                            <a href="{{ url('admin/question/choices/edit') }}/{{ $ch->id }}" style="margin-left: 10px;"> <i class="fa fa-pencil"></i> </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                </div>

              


@endsection