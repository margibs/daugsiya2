<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> 
@extends('admin.layout')

@section('content')

<style type="text/css">
.serverp{
    margin-top: 30px;
    text-align: center;
    margin-bottom: 30px;
}
.right table {
    margin: 20px auto;
    font-family: '';
    width: 93%;
}
</style>


<!-- SUB NAVIGATION -->
  @include('admin.navigations.autopostNav')
<!-- END SUB NAVIGATION -->
                
    <p class="serverp">  Server Time: <span>  {{ $datetime->format('Y-m-d H:i:s') }} </span> </p>


    <div class="table-responsive">
     <table class="table table-condensed table-bordered table-striped" id="users-table">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>On Pool</th>
                <th>Need Per Day</th>
                <th>Difference</th>
                <th>Cycle</th>
            </tr>
        </thead>
        @foreach($check_pools as $check_pool)
            <tr>
                <td>{{$check_pool->name}}</td>
                <td>{{$check_pool->ADDED}}</td>
                <td>{{$check_pool->max_per_day}}</td>
                <td>
                    @if($check_pool->ADDED < $check_pool->max_per_day)
                        <span style="color:red;">{{$check_pool->ADDED - $check_pool->max_per_day}}</span>
                    @else
                        <span style="color:green;">{{$check_pool->ADDED - $check_pool->max_per_day}}</span>
                    @endif
                </td>
                <td>
                    @if($check_pool->ADDED != 0 || $check_pool->max_per_day != 0)
                        
                        <span>{{floor($check_pool->ADDED / $check_pool->max_per_day)}}</span>

                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection
