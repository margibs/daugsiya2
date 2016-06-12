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

.actions{
    width:20%;
    text-align: center;
}
</style>
            @include('prize.navigation')

                    
                <div class="row">

                 <div class="col-sm-8">
                     
                     <div class="panel">
                            <h6> Add new Prize Category </h6>

                            <div class="categform">
                              <form class="form-inline" method="POST" action="{{ url('admin/prize/category') }}">
                                 {!! csrf_field() !!}
                                <div class="form-group">                            
                                  <input type="text" name="name" value="" style="width: 100%;">
                                </div>
                                <input type="submit" value="Submit">
                              </form>
                            </div>

                        </div>

                        <table style="text-align:left">
                                <thead>
                                    <tr>
                                        <th width="80%"> Category Name </th>                            
                                        <th colpan="2" class="actions"> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($prizeCategories as $cat)
                                    <tr>
                                        <td>{{ $cat->name }}</td>
                                        <td colspan="2" class="actions"><a href="{{ url('admin/prize/deleteCategory/') }}/{{ $cat->id }}"> <i class="fa fa-times"></i>  </a>
                                    <a href="{{ url('admin/prize/editCategory') }}/{{ $cat->id }}" style="margin-left: 10px;"> <i class="fa fa-pencil"></i> </a> </td>

                                    </tr>

                                @endforeach
                                    
                                </tbody>
                            </table>
                 </div>
                    

                </div>

              
<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		
	});
</script>

@endsection