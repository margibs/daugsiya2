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

</style>
            @include('prize.navigation')

                    
                <div class="row">

                 <div class="col-sm-8">
                     
                     <div class="panel">
                            <h6> Edit Prize Category </h6>

                            <div class="categform">
                              <form class="form-inline" method="POST" action="{{ url('admin/prize/editCategory') }}/{{ $prizeCategory->id }}">
                                 {!! csrf_field() !!}
                                <div class="form-group">                            
                                  <input type="text" name="name" value="{{ $prizeCategory->name }}" style="width: 100%;">
                                </div>
                                <input type="submit" value="Submit">
                              </form>
                            </div>

                        </div>
                 </div>
                    

                </div>

              
<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		
	});
</script>

@endsection