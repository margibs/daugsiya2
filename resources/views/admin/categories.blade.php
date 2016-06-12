@extends('admin.layout')

@section('content')

<style>
  .right table tbody tr td{
    padding-top: 13px;
  }
  .hiddenmen{
    display: none;
  }
</style>
  
<div class="submenu">
                  
                  <div class="searchform"> 
                  <form action="">
                    <a href=""> <i class="icon-angle-right"></i> </a>
                    <input type="text" class="searchbox" />
                  </form>
                  </div>

                  <ul>
                    <li> <a href="{{ url('admin/categories') }}"> <i class="icon-line-square-plus"></i> New Category </a> </li>
                    <li> <a href="{{ url('admin/categories') }}"> <i class="icon-paperclip"></i> All </a> </li>                    
                    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
                  </ul>
                </div>

                <div class="row">
                  
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <div class="panel">
                        <h6> Add new category </h6>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif                        

                        <div class="categform">
                          <form class="form-inline" method="POST" action="{{ url('admin/categories') }}">
                             {!! csrf_field() !!}
                            <input type="hidden" name="category_id" id="category_id"  value="">
                            <div class="form-group">                            
                              <input type="text" name="name" id="edit_me"  value="{{ old('name') }}">
                            </div>
                            <input type="submit" value="Submit">
                            <button class="hiddenmen" id="cancel_button">Cancel</button>
                          </form>
                        </div>

                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                      <table>
                        <thead>
                          <td style="width: 6%;"> <input type="checkbox"> </td>
                          <td> Category </td>
                          <td> Slug </td>
                          <td> Action </td>                    
                        </thead>
                        <tbody>

                       @foreach($categories as $category)
                            <tr>            
                              <td> <input type="checkbox"> </td>                                
                              <td> <a href="#" class="category_name" get-this="{{$category->id}}">{{$category->name}}</a> </td>                                          
                              <td class="subTD"><a href="/{{$category->slug}}" target="_blank">{{$category->slug}}</a>  </td>    
                              <td class="del"> <a href=""> <i class="icon-line-cross"></i> </a> </td>                          
                            </tr>
                        @endforeach
                      
                        </tbody>
                      </table>

                  </div>


                </div>

<script>
$(document).ready(function(){

  $('.category_name').on('click',function(){
    var category_id_men = $(this).attr('get-this');
    var category_name_men = $(this).text();
    $('#edit_me').val(category_name_men);
    $('#category_id').val(category_id_men);
    $('#cancel_button').removeClass('hiddenmen');
  });

  $('#cancel_button').on('click',function(e){
    e.preventDefault();
    $('#category_id').val('');
    $('#edit_me').val('');
    $('#cancel_button').addClass('hiddenmen');
  })

});

</script>



@endsection



