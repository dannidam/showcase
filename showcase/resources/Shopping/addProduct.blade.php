@extends ('Shopping/layout/layout')

@section('content')
<div class="mainBox">
	<div class="add_product">
			@if ($message = Session::get('success'))
	 
	    <div class="alert alert-success alert-block">
	 
	        <button type="button" class="close" data-dismiss="alert">×</button>
	 
	            <strong>{{ $message }}</strong>
	 
	    </div>
	    <br>
	    @endif
	    @if (count($errors) > 0)
	 
	        <div class="alert alert-danger">
	 
	            <strong>Opps!</strong> There were something went wrong with your input.
	 
	            <ul>
	 
	                @foreach ($errors->all() as $error)
	 
	                    <li>{{ $error }}</li>
	 
	                @endforeach
	 
	            </ul>
	 
	        </div>
	      <br>
	    @endif
			<div class="box-header">
				<h5>Opret Nyt Produkt</h5>
			</div>
			<form action="/shopping/add_product" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="main-option-group top">
					<div class="option-group">
						<label for="category">Kategori: </label>
						<select name="category">
							<option>None</option>
							@foreach($data['cats'] as $c)
								<option>{{ucfirst($c)}}</option>
							@endforeach
						</select>
					</div>
					<div class="option-group">
						<label for="name">Navn: </label>
						<input type="text" name="name" placeholder="hvilket navn?">
					</div>
					<div class="option-group">
						<label for="name">Producent: </label>
						<input type="text" name="brand" placeholder="hvilke producent?">
					</div>
				</div>

				<div class="main-option-group middle">
					<div class="option-group">
						<label for="variant">Variant: </label>
						<input type="text" name="variant" placeholder="hvilken variant? f.eks light/normal">
					</div>
					<div class="option-group">
						<label for="price">Pris: </label>
						<input type="text" name="price" placeholder="hvad koster varen?">
					</div>
					<div class="option-group">
						<label for="discount_price">tilbuds pris: </label>
						<input type="text" name="discount_price" placeholder="tilføjes kun hvis denne eksisterer?">
					</div>
				</div>

				<div class="main-option-group middle">
					<div class="option-group">
						<label for="shop">Butik: </label>
						<select name="shop">
							<option>none</option>
							@foreach($data['shops'] as $s)
								<option>{{ucfirst($s)}}</option>
							@endforeach
						</select>
					</div>
					<div class="option-group">
						<label for="amount">mængde: </label>
						<input type="text" name="amount" placeholder="hvor meget indeholder produktet">
					</div>
					<div class="option-group">
						<label for="weight">vægt type: </label>
						<input type="text" name="weight_type" placeholder="hvilken type kg/g/l?">
					</div>
					<div class="option-group"></div>
				</div>

				<div class="main-option-group bottom">
					<div class="option-group">
						<label for="imageUpload">Upload billede:</label>
						<input type="file" id="image" name="image" onchange="readURL(this);" accept=".png, .jpg, .jpeg" />
					</div>
				</div>

					<div class="option-group button">
						<input class="btn btn-primary" type="submit" name="save" value="Opret">
					</div>

			</form>
		</div>
</div>

@endsection

<style type="text/css">
	.add_product{
		width: 80%;
		color: black;
		box-shadow: 2px 2px 5px 2px #82c91e;
		background-color: rgba(255,255,255,1);
		margin: auto;
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

	}

	.btn:hover{
		background-color: #c0e48e !important;
		color: rgba(0,0,0,1) !important;
		font-weight: 600;
	}

	.button{
		width: 100% !important;
		text-align: center;
		padding: 0 25px;
	}

</style>