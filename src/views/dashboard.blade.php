@extends(env('ANALYTICS_LAYOUT'))

@section('content')
<style>
.hideOverFlow{
	max-width: 300px;
	white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
	<div class="container">
		<div class="row">
			<h3>
				<span style="color:#DF7171">Page Views</span>
				<span style="color:#9A9A9A">/Visitors</span>
			</h3>

			<div id="pageViews" class="col-md-12" style="height: 250px">
		
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
							<h4> MOST VISITED PAGES</h4>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<tr>
								<th>Url</th>
								<th>Views</th>
							</tr>
							@foreach($topViews as $t)
							
							<tr>
								<td class="hideOverFlow">{{$t['url']}}</td>
								<td>{{$t['pageViews']}}</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
							<h4> TOP 10 PRODUCTS ADDED TO CART</h4>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<tr>
								<th>Name</th>
								<th>Count</th>
							</tr>
							@foreach($productAddsToCart as $t)
							
							<tr>
								<td class="hideOverFlow">{{$t['pageTitle']}}</td>
								<td>{{$t['visitors']}}</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
							<h4> TOP 50 PRODUCTS VIEWS</h4>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<tr>
								<th>Name</th>
								<th>Count</th>
							</tr>
							@foreach($topProductViews as $t)
							
							<tr>
								<td class="hideOverFlow">{{$t['pageTitle']}}</td>
								<td>{{$t['visitors']}}</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	
@endsection

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 <script type="text/javascript">
 	var chart1Data ={!! $chart1Data->toJson() !!};

 	function drawChart1(){
 		var chart1=new Morris.Line({
			  element: 'pageViews',
			  data: chart1Data,
			  xkey: 'date', 
			  ykeys: ['pageViews','visitors'],
			  labels: ['Page Views','Visitors'],
			  lineColors:['#DF7171',"#9A9A9A"],
			  resize:true,
			  redraw:true,
			  hideHover:true
			});
 		$('#pageViews').resize(function () {
			  chart1.redraw();
	
		});
 	}
 	$(document).ready(function(){

 		setTimeout(function(){
 			drawChart1();
 		},3000);
 	
 	});
 </script>