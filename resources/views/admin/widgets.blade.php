@extends('admin.layout')

@section('content')

<div class="submenu">
                  
  <div class="searchform"> 
  <form action="">
    <a href=""> <i class="icon-angle-right"></i> </a>
    <input type="text" class="searchbox" />
  </form>
  </div>

  <ul>
    <li> <a href="{{ url('/admin/widgets') }}" class="active"> <i class="icon-line-grid"></i> Widgets </a> </li>    
    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
  </ul>

</div>


<div class="widgetswrapper">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<div class="widgetblock">
				<div class="row no-gutters">					
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="icon">
							<i class="icon-line-bar-graph-2"></i>
						</div>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<div class="widgetoption">		
								<div class="onoffswitch">        
						              <input type="checkbox" id="myonoffswitch4" class="onoffswitch-checkbox" checked />              
						              <label class="onoffswitch-label" for="myonoffswitch4"></label>
						        </div>
								<p> Post Poll</p>		
								<span> Status: Enabled </span>							        
						</div>
					</div>
				</div>
				
				
			</div>
		</div>	
	</div>
	
		
	</div>
</div>

@endsection