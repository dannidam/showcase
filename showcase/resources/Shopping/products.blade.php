@extends ('Shopping/layout/layout')

@section('content')

<div class="mainBox row">
	@if ($message = Session::get('success'))
	 
	    <div class="alert alert-success alert-block">
	 
	        <button type="button" class="close" data-dismiss="alert">×</button>
	 
	            <strong>{{ $message }}</strong>
	 
	    </div>
	    <br>
	    @endif
	<div class="product_wrapper">
		<div class="product_container">
			<table class="column_wrapper">
				<tr>
					<th>Billede</th>
					<th>Navn</th>
					<th>Kategori</th>
					<th>Variant</th>
					<th>Mængde</th>
					<th>Mængde-forhold</th>
					<th>Pris</th>
					<th>Butik</th>
					<th>Opdateret</th>
					<th>tilføj</th>
					@if($data['user']->role == 1)
						<th>rediger</th>
					@endif
				</tr>
				@foreach($data['products'] as $product)
				<tr>
					<td><img src='{{ asset("shoppingImages/".$product->image_url) }}'/></td>
					<td id="{{$product->id}}">{{$product->name}}</td>
					<td>{{$product->category}}</td>
					<td>{{$product->variation}}</td>
					<td>{{$product->amount}}</td>
					<td>{{$product->volume_type}}</td>
					<td>{{number_format($product->price, 2)}}</td>
					<td>{{$product->shop}}</td>
					<td>{{substr($product->updated_at,0,10)}}</td>
					<form action="/shopping/add_to_temp" method="post">
						{{ csrf_field() }}
						<td class="add_to_list">
							<button type="submit" name="add_product" value="{{$product->product_id}}" class="btn_custom"><i class="btn btn-success fa fa-shopping-bag"></i></button>
						</td>
					</form>
					@if($data['user']->role == 1)
					<td><a href="/shopping/editProduct={{$product->product_id}}"><i class="btn btn-success fa fa-edit"></i></a></td>
					@endif
				</tr>
				@endforeach
			</table>
		</div>
	</div>

	<div class="tempList_wrapper">
		<div class="tempList_Container">
			<div class="box-header"><h6>Midlertidige Varer</h6></div>
			<div class="list_view"> 
				<h6>Dagens Liste</h6>
				<table>
					@foreach($data['dailyTempList'] as $p)
					@if($p['quantity'] != 0)
					<tr>
						<form action="/shopping/deduct_to_temp" method="post">
						{{ csrf_field() }}
							<td class="small_td">
								<button type="submit" name="deduct_product" value="{{$p['id']}}" class="btn_custom"><i class="btn btn-success fa fa-minus small_btn"></i></button>
							</td>
						</form>
						<td class="tempLItems">{{$p['name']}}</td>
						<td class="tempLItems">{{$p['quantity']}} x</td>
						<td class="tempLItems temp_price">{{$p['price']}},- DKK</td>
					</tr>
					@endif
					@endforeach
				</table>
				<div class="temp_total">Total: {{$data['total']}},- DKK</div>
			</div>
			<form>
				<div class="btn_container">
					<button class="btn btn-success">Tilføj til liste</button>
				</div>
			</form>
		</div>
	</div>
</div>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		//set total get each field and add them up
		 
	});

</script> 

<style>
	.mainBox{
		margin-top: 75px;
		padding: 0 35px;
		text-align: center;
		//display: flex;
		//justify-content: center;
	}

	.mainBox > h1{
		margin-bottom: 50px;
	}

	.list{
		display: flex;
		padding: 25px;
	}

	.list_item{
		padding: 5px;
		width: 150px;
		height: 250px;
		
	}

	.list_view{
		text-align: left;
		padding: 15px;
	}

	.single{
		width: 100%;
		height: 100%;
		background-color: white;
		border-radius: 5px;
		border: 1px solid rgba(255,255,255,1);
		box-shadow: 2px 2px 5px 2px #82c91e;
	}

	.column_wrapper{
		padding: 50px 15px 25px 15px !important;
		width: 100%;
		/*display: flex;
		justify-content: space-around;*/
	}

	.product_wrapper{
		width: 80%;
		padding-right: 5px; 
	}

	.product_container{
		width: 100%;
		box-shadow: 2px 2px 5px 2px #82c91e;
	}

	.tempList_wrapper{
		width: 20%;
		padding-left: 5px;
	}
	.tempList_Container{
		width: 100%;
		background-color: #ffffff;
		box-shadow: 2px 2px 5px 2px #82c91e;
	}

	table{
		width: 100%;
		text-align: center;
		border-radius: 5px;
	}

	tr{
		width: 100%;
	}

	th{
    	//background: linear-gradient(45deg, #82c91e 0%,transparent 85%);
    	background-color: #82c91e;
		color: rgba(255,255,255,1);
		padding: 5px 10px;
		border-bottom: 2px solid white;
		//border-top-right-radius: 5px;
		//border-top-left-radius: 5px;
	}

	td{
		background-color: rgba(255, 255, 255, 0.7);
		color: rgba(0,0,0,1);
		padding: 5px 10px;
		margin: 0; 
		font-weight: 500;
		//border: 1px solid rgba(255, 166, 77, 1);
	}

	.add_product{
		position: absolute;
		left: calc(100%/2 - 1400/2);
		top: 150px;
		z-index: 999;
		display: none;
		width: 70%;
		color: black;
		box-shadow: 2px 2px 5px 2px #82c91e;
		background-color: rgba(255,255,255,1);
		//margin: auto;
		border: 3px solid rgba(255,255,255,1);
		margin-top: 100px;
	}

	.add_product input{
		border: 2px solid #82c91e;
		padding: 5px 10px;
		width: 250px;
		border-radius: 8px;
		font-size: 14px; 
	}

	.add_product select{
		border: 2px solid #82c91e;
		padding: 5px;
		width: 250px;
		border-radius: 8px;
		font-size: 14px;
		outline: none;
	}

	.add_product label{
		margin-right: 5px;
		min-width: 100px;
	}

	.main-option-group{
		padding: 25px;
		margin: 25px;
		display: flex;
		justify-content: space-between;
	}

	.top{
		border-top-right-radius: 12px;
		border-top-left-radius: 12px;
		border: 3px solid #82c91e;
		//border-left: 3px solid #82c91e;
		//border-right: 3px solid #82c91e;
		//border-top: 3px solid #82c91e;
	}

	.middle{
		border: 3px solid #82c91e;
	}

	.bottom{
		border-bottom-right-radius: 12px;
		border-bottom-left-radius: 12px;
		border: 3px solid #82c91e;
		//border-left: 3px solid #82c91e;
		//border-right: 3px solid #82c91e;
		//border-bottom: 3px solid #82c91e;
	}

	.option-group{
		min-width: calc(100%/3);
	}

	.box-header{
		padding: 5px;
		background-color: #82c91e;
		color: rgba(255,255,255,1);
		font-weight: 700;
	}

	.btn{
		background-color: #82c91e !important;
		box-shadow: 1px 1px 3px 1px #82c91e;
		border: 1px solid rgba(255,255,255,1) !important;
		width: 100% !important;
		color: rgba(0,0,0,1) !important;

	}

	.btn:hover{
		background-color: #c0e48e !important;
		color: rgba(0,0,0,1) !important;
		font-weight: 600;
	}

	.button{
		width: 100% !important;
	}

	img{
		width: 45px;
	}

	.item_name{
		font-weight: 700;
		padding: 5px;
		font-size: 15px;
	}

	.item_price{
		font-size: 13px;
	}

	.item_shop{
		font-size: 13px;
	}

	.close{
		position: absolute;
		right: 5px;
		top: 5px;
		width: 30px;
		height: 30px;
		background-color: #FF605C;
		color: white !important;
		padding: 2px;
		border-radius: 3px; 
	}

	.btn_custom{
		border: none;
		background-color: #ffffff;
	}

	.btn_custom .small_btn{
		width: 20px !important;
		height: 20px !important;
		font-size: 7px;
		padding-left:7px;
	}

	.small_td{
		padding: 0;
	}

	.tempLItems{
		font-size: 11px;
		font-weight: 700;
	}

	.list_viev{

	}

	.list_view h6{
		padding: 2px;
		border-bottom: 2px solid #000000;
	}

	.btn_container{
		padding: 10px;
	}

	.temp_total{
		width: 100%;
		text-align: center;
		font-weight: 600;
		padding: 10px 0 0 0;
	}


</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>