<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> 

@extends('admin.layout')

@section('content')

<div class="submenu">
                
  <ul>
    <li> <a href="{{ url('/admin/users') }}" class="active"> <i class="icon-line-head"></i> All </a> </li>
    <li> <a href=""> <i class="icon-line-star"></i> Admins </a> </li>                    
    <li> <a href=""> <i class="icon-line-cross"></i> Banned </a> </li>            
  </ul>

</div>


 <table class="table table-condensed table-bordered table-striped" id="users-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Group</th>
                <th>Created At</th>
                <th>Updated At</th>
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
        ajax: '{{url('userdatatable/data')}}',
        columns: [
            { data: 'full_name', name: 'full_name' },
            { data: 'email', name: 'email' },
            { data: 'is_admin', name: 'is_admin' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush