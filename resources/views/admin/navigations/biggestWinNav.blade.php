<ul>
  <li> <a href="{{ url('/admin/new_post') }}" @if(Request::is('admin/new_post')) class="active" @endif> <i class="icon-line-square-plus"></i> Blog Post </a> </li>
  <li> <a href="{{ url('/admin/biggest_wins') }}" @if(Request::is('admin/biggest_wins*')) class="active" @endif> <i class="fa fa-trophy"></i> Biggest Wins </a> </li>                   
  <li> <a href="{{ url('/admin/posts') }}"  @if(Request::is('admin/posts*')) class="active" @endif> <i class="icon-paperclip"></i> All </a> </li>
  <li> 
    <a href="{{ url('/admin/drafts') }}" @if(Request::is('admin/drafts*')) class="active" @endif> <i class="icon-line-marquee"></i> Draft </a>
  </li>
  <li> <a href="{{ url('/admin/trash') }}"  @if(Request::is('admin/trash*')) class="active" @endif > <i class="icon-trash"></i> Trash </a> </li>                    
  <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
</ul>