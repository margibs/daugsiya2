<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> 

@extends('admin.layout')

@section('content')

@include('admin.navigations.homeImageNav')

<br>
<center><h1>Articles Banner</h1></center>
 <table class="table table-condensed table-bordered table-striped" id="users-table">
        <thead>
            <tr>
            	<th>Id</th>
                <th>Banner</th>
                <th>Banner Link</th>
                <th>Show Banner</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

<br>

<hr>
 <center><h1>Skypsrapper Banner</h1></center>
<br>
<table class="table table-condensed table-bordered table-striped" id="skypescrapper-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Banner</th>
            <th>Banner Link</th>
            <th>Show Banner</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

<hr>
 <center><h1>Casino Banner</h1></center>
<br>

 <table class="table table-condensed table-bordered table-striped" id="casino-table">
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
        ajax: '/admin/article/get',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image_url', name: 'image_url' },
            { data: 'image_link', name: 'iamge_link' },
            { data: 'show_banner', name: 'show_banner' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});

$(function() {
    $('#skypescrapper-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/skypscrapper/get',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image_url', name: 'image_url' },
            { data: 'image_link', name: 'iamge_link' },
            { data: 'show_banner', name: 'show_banner' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});


$(function() {
    $('#casino-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/home-adds/get',
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