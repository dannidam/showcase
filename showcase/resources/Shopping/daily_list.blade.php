@extends ('Shopping/layout/layout')
@section('content')
<div class="mainBox">
	<div class="list">
		<div class="listInfo row">
			<div class="date">{{$data['today']}}</div>
		</div>

		<div class="list_info">
			<h5> Opskrifter</h5>
		</div>

		<div class="list_info">
			<h5> Varer</h5>
		</div>

		<div class="list_info">
			<h5> Basis Varer På Lager</h5>
		</div>
	</div>
</div>
@endsection

<style type="text/css">
	.list{
		width: 50%;
		height: 80%;
		background-color: #ffffff;
		box-shadow: 5px 10px 10px #888888;
		/*Position of the element*/
		margin: 0;
 		position: absolute;
  		top: 50%;
  		left: 50%;
  		transform: translate(-40%, -50%);
	}

	.listInfo{
		padding: 5px 15px;
	}

	.date{
		font-weight: 700;
	}

	.list_info{
		padding: 25px 15px;
	}

	.list_info h5{
		font-weight: 700;
		padding-bottom: 15px;
		border-bottom: 1px solid black;
	}
</style>