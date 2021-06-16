<div class="topbar">
	<div class="row teamOption">
		<div class="user row">
			<h6 style="line-height: 45px;">Velkommen {{$data['user']->username}}</h6> <i class="fas fa-user"></i><i class="options_show fa fa-arrow-down"></i>
			<div class="options">
				<ul>
					<li><a href="#">Account</a></li>
					<li><a href="#">Settings</a></li>
					<li>
						<form action="/shopping/logout" method="post">
							{{ csrf_field() }}
							<input type="submit" name="logout" value="Logout">
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.user{
		position: absolute;
		right: 35;

	}

	.user i{
		padding-left: 10px;
		padding-top: 15px;
	}

	.user .options{
		min-width: 160px;
		border: 1px solid #82c91e;
		background: #82c91e;
		position: absolute;
		top: 35px;
		right: 0;
		display: none;
	}

	.user .options_show{
		padding-left: 2px;
	}

	.user:hover .options{
		display: block;
	}

	.options ul{
		padding: 0;
		margin: 0; 
	}

	.options ul > li{
		list-style: none;
		padding: 5px 0 5px 15px; 
	}

	.options ul > li:hover{
		background-color: rgba(0,0,0,0.3);
		color: #ffffff;
	}

	.options ul > li > form{
		margin: 0;
	}

	.options ul > li > form > input[type=submit]{
		background: none;
		border: none;
		text-align: left;
		padding: 0;
	}

	.options ul > li > form > input[type=submit]:hover{
		color: #ffffff;
	}
</style>
