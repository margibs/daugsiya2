<div class="submenu">
                  
  <div class="searchform"> 
  <form action="{{url('admin/posts')}}" method="get">
    <!-- <a href=""> <i class="icon-angle-right"></i> </a> -->
    <input type="text" name="q" class="searchbox" value="{{Request::input('q')}}"/>
    <input type="hidden" name="orderby" value="{{Request::input('orderby')}}"/>
    <input type="hidden" name="categories" value="{{Request::input('categories')}}" />
    <input type="hidden" name="date" value="{{Request::input('date')}}" />
  </form>
  </div>

  <ul>
    <li> <a href="{{ url('admin/casino/mask-link') }}"> <i class="icon-line-square-plus"></i> Mask Link </a> </li>
    <li> <a href="{{ url('admin/casino') }}"> <i class="icon-line-square-plus"></i> Casino Profile </a> </li>
    <li> <a href="{{ url('admin/article_banner') }}"> <i class="icon-line-square-plus"></i> Article Banner </a> </li>
    <li> <a href="{{ url('admin/skyscraper_banner') }}"> <i class="icon-line-square-plus"></i> Skypscraper Banner </a> </li>
    <li> <a href="{{ url('admin/casino_preference') }}"> <i class="icon-line-square-plus"></i> Casino Preferences </a> </li>
  </ul>

</div>