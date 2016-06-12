<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> 

@extends('admin.layout')

@section('content')

@include('admin.navigations.homeImageNav')



<hr>
<center> Desktop </center>
 <table class="table table-condensed table-bordered table-striped" id="users-table">
        <thead>
            <tr>
                <th>Image</th>
				<th>Link</th>
                <th>Redirect Link</th>
				<th>Position</th>
                <th>Show Add</th>
				<th>Action</th>
            </tr>
        </thead>
    </table>


<center> Mobile </center>
<hr>
 <table class="table table-condensed table-bordered table-striped" id="users-table2">
        <thead>
            <tr>
                <th>Image</th>
                <th>Link</th>
                <th>Redirect Link</th>
                <th>Position</th>
                <th>Show Add</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>



@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('homeimagedatatable.data') !!}',
        columns: [
           
            { data: 'image', name: 'image' },
            { data: 'link', name: 'link' },
            { data: 'redirect_link', name: 'redirect_link' },
            { data: 'position', name: 'position' },
            { data: 'show_add', name: 'show_add' },
          /*  { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },*/
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

      $('#users-table2').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/get_mobile_adds',
        columns: [
           /* { data: 'id', name: 'id' },*/
            { data: 'image', name: 'image' },
            { data: 'link', name: 'link' },
            { data: 'redirect_link', name: 'redirect_link' },
            { data: 'position', name: 'position' },
            { data: 'show_add', name: 'show_add' },
         /*   { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },*/
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endsection