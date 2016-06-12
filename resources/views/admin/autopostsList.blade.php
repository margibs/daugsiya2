<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> 
@extends('admin.layout')

@section('content')

<style type="text/css">
.serverp{
    margin-top: 30px;
    text-align: center;
    margin-bottom: 30px;
}

</style>

<!-- SUB NAVIGATION -->
  @include('admin.navigations.autopostNav')
<!-- END SUB NAVIGATION -->
        
    <p class="serverp">  Server Time: <span>  {{ $datetime->format('Y-m-d H:i:s') }} </span> </p>

    
    <div class="table-responsive">
         <table class="table table-condensed table-bordered table-striped"  cellspacing="0" width="100%" id="users-table">
            <thead>
                <tr>
                    <th>Description</th>
                   <th>FB</th>
                   <th>Twitter</th>
                   <th>Pinterest</th>
                   <th>Instagram</th>
                  <!--   <th>Google Plus</th> -->
                   <th>Date Posting</th>
                   <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
   
   <!--
   <table style="text-align:left">
       <thead>
           <tr>
               <th width="40%">Description</th>
               <th>FB</th>
               <th>Twitter</th>
               <th>Pinterest</th>
               <th>Instagram</th>
                <th>Google Plus</th>
               <th>Date Posting</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           
           @foreach($autoposts as $a)
                   <tr>
                       <td>
                       {{ $a->description }}                                
                   </td>
                   <td>
                       @if($a->fb == 1)
                           <span style="color:yellow;">Not Posted</span>
                       @elseif($a->fb == 2)
                           <span style="color:red;">ERROR POSTING</span>
                       @elseif($a->fb == 3)
                           <span style="color:green;">POSTED</span>
                       @else
   
                       @endif
                   </td>
                   <td>
                       @if($a->twitter == 1)
                           <span style="color:yellow;">Not Posted</span>
                       @elseif($a->twitter == 2)
                           <span style="color:red;">ERROR POSTING</span>
                       @elseif($a->twitter == 3)
                           <span style="color:green;">POSTED</span>
                       @else
   
                       @endif
                   </td>
                   <td>
                       @if($a->pinterest == 1)
                           <span style="color:yellow;">Not Posted</span>
                       @elseif($a->pinterest == 2)
                           <span style="color:red;">ERROR POSTING</span>
                       @elseif($a->pinterest == 3)
                           <span style="color:green;">POSTED</span>
                       @else
   
                       @endif
                   </td>
                   <td>
                       @if($a->instagram == 1)
                           <span style="color:yellow;">Not Posted</span>
                       @elseif($a->instagram == 2)
                           <span style="color:red;">ERROR POSTING</span>
                       @elseif($a->instagram == 3)
                           <span style="color:green;">POSTED</span>
                       @else
   
                       @endif
                   </td>
                   <td>{{ $a->date_posting }}</td>
                       <td>
                           <a href="{{ url('admin/autoposts') }}/{{ $a->id }}/delete"> <i class="fa fa-times"></i>  </a>
                           <a href="{{ url('admin/autoposts') }}/{{ $a->id }}/edit" style="margin-left: 10px;"> <i class="fa fa-pencil"></i> </a>
                       </td>
                   </tr>
               @endforeach
       </tbody>
   </table>
    -->
@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/autopostsListTable',
        columns: [
            { data: 'description', name: 'autoposts.description' },
            { data: 'fb', name: 'autopost_checkers.fb' },
            { data: 'twitter', name: 'autopost_checkers.twitter' },
            { data: 'pinterest', name: 'autopost_checkers.pinterest' },
            { data: 'instagram', name: 'autopost_checkers.instagram' },
            { data: 'date_posting', name: 'autopost_checkers.date_posting' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endsection