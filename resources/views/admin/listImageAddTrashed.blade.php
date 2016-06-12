<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> 

@extends('admin.layout')

@section('content')

@include('admin.navigations.homeImageNav')




 <table class="table table-condensed table-bordered table-striped" id="users-table">
        <thead>
            <tr>
            	<th>Id</th>
                <th>Image</th>
				<th>Link</th>
				<th>Position</th>
				<th>Created</th>
				<th>Updated</th>
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
        ajax: '/admin/homeads/list/trashedData',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'link', name: 'link' },
            { data: 'position', name: 'position' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endsection