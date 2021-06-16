@extends ('Shopping/layout/layout')

@section('content')

<div class="mainBox">
	<h1>Indkøbs App Forside</h1>
	<div class="box">
		<h3>Nyeste produkter tilføjet</h3>
		<div class="container">
		@foreach($data['latestProducts'] as $p)
			<div class="cardContainer">
				<div class="card">
					<div class="product_image"><img src='{{ asset("shoppingImages/".$p->image_url) }}'></div>
					<div class="product_name">{{$p->name}} {{$p->amount}} {{$p->volume_type}}</div>
					<div class="product_type"><i>{{number_format($p->price, 2)}},- DKK</i></div>
					<div class="product_shop">{{$p->shop}}</div>
					<button class="btn btn-primary" style="background-color: #82c91e; font-size: 12px; margin-top: 10px; width: 100% !important; ">Add To List</button>
				</div>
			</div>
		@endforeach
		</div>
	</div>
	<div class="box">
		<h3>Mest Populære Retter</h3>
	</div>
	<div class="box">
		<h3>Senest Tilføjede Retter</h3>
	</div>
</div>

@endsection

<style>
	.mainBox{
		margin-top: 25px;
		padding: 10px 35px;
		text-align: center;
		//display: flex;
		//justify-content: center;
	}

	.mainBox > h1{
		margin-bottom: 50px;
	}

	.box{
		padding: 10px;
		text-align: center;
		//box-shadow: 0px -3.2px 2px -3px #82c91e;
		width: 100%;
		//min-height: 225px;
	}

	.box > h3{
		width: 500px;
		margin: auto;
		/*background-color: #82c91e;*/
		padding: 7px;
		/*border-top-right-radius: 20px;
		border-bottom-left-radius: 20px;*/
	}
	.container{
		width: 100%;
		padding: 15px;
		display: flex;
		justify-content: center;
	}

	.cardContainer{
		width: 15%;
		padding: 5px;
	}

	.card{
		background-color: rgba(255,255,255,1);
		box-shadow: 2px 2px 5px 1px #82c91e;
		padding: 10px;
	}

	.product_image img{
		padding: 10px;
		width: 100px;
	}

	.product_price{
		
	}

	.product_shop{
		font-weight: 600;
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>