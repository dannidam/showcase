@extends ('Shopping/layout/layout')

@section('content')
<div class="mainBox">
	@if ($message = Session::get('success'))
		 
		    <div class="alert alert-success alert-block">
		 
		        <button type="button" class="close" data-dismiss="alert">×</button>
		 
		            <strong>{{ $message }}</strong>
		 
		    </div>
		    <br>
		    @endif
		    <div class="container">
		    	<div class="wrapper">
		    		<div class="title row">
		    			<div class="thumbnail"><img src='{{ asset("shoppingImages/".$data["product"]->image_url)}}'></div>
		    			<div class="content">
		    				<form method="post" action="/shopping/updateProduct">
		    					{{ csrf_field() }}
		    				<div>
		    					<input type="hidden" name="prodId" value="{{$data['product']->product_id}}">
		    				</div>
		    				<div class="row">
		    					<label>Name:</label>
		    					<input type="text" placeholder="{{$data['product']->name}}" name="name">
		    				</div>
		    				<div class="row">
		    					<label>Kategori:</label>
		    					<select name="category" >
		    						<option selected="selected">{{$data['product']->category}} </option>
		    						@foreach($data['cats'] as $c)
										<option>{{ucfirst($c)}}</option>
									@endforeach
		    					</select>
		    				</div>
		    				<div class="row">
		    					<label>Variation:</label>
		    					<input type="text" placeholder="{{$data['product']->variation}}" name="variation">
		    				</div>
		    				<div class="row">
		    					<label>Pris:</label>
		    					<input type="text" placeholder="{{$data['product']->price}}" name="price">
		    				</div>
		    				<div class="row">
		    					<label>mængde:</label>
		    					<input type="text" placeholder="{{$data['product']->amount}}" name="amount">
		    				</div>
		    				<div class="row">
		    					<label>Mål:</label>
		    					<input type="text" placeholder="{{$data['product']->volume_type}}" name="volume_type">
		    				</div>

		    				<div class="button_spacing">
		    					<input class="btn btn_primary" type="submit" name="update" value="opdater">
		    				</div>
		    			</form>

		    			</div>
		    		</div>
		    	</div>
		    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		//set messages to fade out
   			setTimeout(function(){ $('.alert').fadeOut(1000) }, 1500);
		 
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

	.wrapper{
		width: 100%;
		padding: 15px;
	}

	.title{
		background-color: #ffffff;
		padding: 10px 50px;
	}

	.thumbnail{
		padding: 5px;
		border: 1px solid #000000;
	}

	.content{
		padding: 5px 25px;
	}

	label{
		width: 80px;
		text-align: left;
	}

	input{
		border: none !important;
		border-bottom: 1px solid #000000 !important;
		width: 150px;
	}

	select{
		border: none;
		border-bottom: 1px solid #000000;
		color: #6e7a75;
		padding: 0; 
		width: 150px;
	}

	select:focus{
		outline: none;
	}

	option:not(first-child){
		color: #000000;
		padding: 0;	
	}

	.button_spacing{
		margin: 25px 0;
	}


</style>
