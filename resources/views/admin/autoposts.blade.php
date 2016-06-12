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
                <th style="width: 30%">Description</th>
              <!--   <th>Image</th> -->
                <!-- <th style="width: 30%">Link</th> -->
               <!--  <th>Video Link</th> -->
               <!-- <th>Categories</th> -->
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>





@endsection
@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/getAutopostAll',
        columns: [
            { data: 'description', name: 'description' },
           /* { data: 'custom_image', name: 'custom_image' },*/
            // { data: 'link', name: 'link' },
            // { data: 'name', name: 'name' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endsection