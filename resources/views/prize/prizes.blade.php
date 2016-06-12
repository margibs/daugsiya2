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

#searchResults{
        position: absolute;
        background: #fff;
        width: 100%;
        border: 1px solid #ccc;
        padding: 3px 7px;
        z-index: 2;
        display: none;
}

#clearResult,
#clearResult:hover,
#clearResult:visited
{
    position: absolute;
    display: none;
    top: 33px;
    right: 9px;
    color:#000;
    text-decoration: none;
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
            @include('prize.navigation')

                    
                <div class="row">

                 

                    <div class="col-lg-9">

                          <div class="panel col-sm-6">
                            <h2> Add new prize </h2>
                            <div class="categform">
                              <form class="form-inline" method="POST" action="{{ url('admin/prize') }}">
                                 {!! csrf_field() !!}
                                <div class="form-group">
                                     <h6> Name </h6> 
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                     <h6> Prize Category </h6> 
                                    <select name="prize_category_id" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach($prizeCategories as $cat)
                                            <option value="{{$cat->id}}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                     <h6> Prize Link </h6> 
                                    <input type="text" class="form-control" name="prize_link">
                                </div>
                                <div class="form-group">
                                     <h6> Quantity </h6> 
                                    <input type="number" class="form-control" min="1" max="20" name="qty">
                                </div>

                                <input type="submit" value="Submit">
                              </form>
                            </div>

                        </div>

                          <table style="text-align:left">
                                <thead>
                                    <tr>
                                        <th> Prize </th>                            
                                        <th> Stock </th>
                                        <th> Total Won </th>
                                        <th> &nbsp; </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($prizes as $prize)
                                        <tr>
                                            <td>{{ $prize->name }}</td>
                                            <td> {{ $prize->qty }} </td>
                                            <td> 0 </td>
                                            <td> <a href="" title="Restock"> <i class="fa fa-refresh"></i> </a> </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                    </div>

                        <div class="col-lg-3">

                        <div class="panel winnerlist">
                            <h6> Winner List </h6>

                            <ul>
                                <li> <a href=""> Gweneth Palthrow </a> </li>
                                <li> <a href=""> Evie Justina </a> </li>
                                <li> <a href=""> Gracelyn Caroline </a> </li>
                                <li> <a href=""> Florence Titty </a> </li>
                                <li> <a href=""> Patrice Jessalyn </a> </li>
                                <li> <a href=""> Evie Justina </a> </li>
                                <li> <a href=""> Patrice Jessalyn </a> </li>
                                <li> <a href=""> Patrice Jessalyn </a> </li>
                            </ul>

                        </div>  

                       

                        

                    </div>

                    

                </div>

              
<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		
	});
</script>

@endsection