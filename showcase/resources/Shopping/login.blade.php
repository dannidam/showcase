<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Indkøbs App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!--CSS-->
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <link rel="stylesheet" href="<?php echo asset('css/shopping/main.css')?>" type="text/css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <!--JS-->

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    </head>
    
    <body>        
        <div class="row primary_container">
            <div class="main-container scrollBar">
                <div class="mainBox">
					<div class="loginForm">
						<h5>Login as a registered user</h5>
						<div class="form_content">
							<form method="post" action="/shopping/handleLogin">
							{{ csrf_field() }}
								<div class="loginFormGroup">
									<div class="input_icon">
										<i class="fas fa-user"></i>
									</div>
									<input type="text" name="username" placeholder="Username" autocomplete="off">
								</div>
								<div class="loginFormGroup">
									<div class="input_icon">
										<i class="fas fa-user-lock"></i>
									</div>
									<input type="password" name="password" placeholder="Password">
								</div>
								<div class="loginFormGroup">
									<input type="submit" name="submit" value="Log In">
								</div>
							</form>
						</div>
					</div>
				</div>
            </div>
        </div>
    </body>

    </html>

    <style>

        .scrollBar{
            overflow-y: none;
        }

        .scrollBar::-webkit-scrollbar {
                width: 10px;
        }

        .scrollBar::-webkit-scrollbar-thumb {
                background: black;
                border-radius: 5px;
                border-top: 70px solid transparent;
                border-bottom: 70px solid transparent;
                background-clip: padding-box;   /* THIS IS IMPORTANT */

        }

        .scrollBar::-webkit-scrollbar-track {
                background: rgb(180,180,180);
                border-left: 4px solid transparent;
                border-right: 4px solid transparent;
                border-top: 60px solid transparent;
                border-bottom: 60px solid transparent;
                background-clip: padding-box;   /* THIS IS IMPORTANT */
        }

        /*LoginForm CSS*/

        .loginForm{
			text-align: center;
			border-top: 2px solid #82c91e;
			width: 400px;
			/*margin: auto;*/
			margin: 0;
  			margin: 0;
  			position: absolute;
  			top: 50%;
  			left: 50%;
  			-ms-transform: translate(-50%, -50%);
  			transform: translate(-50%, -50%);
			background: linear-gradient(45deg, #82c91e 0%,#ffffff 85%);
			/*background: -moz-linear-gradient(45deg,  #35394a 0%, #1f222e 100%);
    		background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#35394a), color-stop(100%,#1f222e));
    		background: -webkit-linear-gradient(45deg,  #35394a 0%,#1f222e 100%); 
    		background: -o-linear-gradient(45deg,  #35394a 0%,#1f222e 100%);
    		background: -ms-linear-gradient(45deg,  #35394a 0%,#1f222e 100%);
    		background: linear-gradient(45deg,  rgba(255, 166, 77, 1) 0%,rgba(0,0,0,1) 100%);*/
		}

		.loginForm h5{
			margin-top: 25px;
			height: 60px;
			color: #000000;
		}

		.box-header{
			color: rgba(255, 166, 77, 1);
			padding: 5px;
			background-color: rgba(255,255,255,1);
		}

		.form_content{
			//padding: 35px;
		}

		.loginForm form{
			//margin-top: 50px;
		}

		.loginFormGroup{
			text-align: left;
			position: relative;
			display: flex;
			justify-content: space-around;
		}

		.loginFormGroup label{
			width: 80%;
			text-transform: capitalize;
		}
		.loginFormGroup input{
			text-align: center;
			width: 100%;
			height: 30px;
			border-top: 2px solid #393d52;
	    	border-bottom: 2px solid #393d52;
	    	border-right: none;
	    	border-left: none;
			padding: 10px 65px;
			//margin-bottom: 30px;
			margin-top: -2px;
			color: rgba(0, 0, 0, 0.8);
			font-weight: 500;
			font-size: 13px;
			background: rgba(255,255,255,0.8); 
			outline: none; 
		}

		.input_icon{
			position: absolute;
	    	z-index: 999;
	    	left: 125px;
	    	top: 0;
	    	opacity: .6;
		}

		.input_icon img{
			color: #000000;
		}

		.loginFormGroup input[type='submit']{
			width: 60%;
			color: #000000;
	    	background: transparent;
	    	padding: 5px 50px 10px 50px;
	    	border: 2px solid rgba(0,0,0,0.6);
	    	border-radius: 50px;
	    	text-transform: uppercase;
	    	font-size: 11px;
	    	margin-top: 25px;
	    	margin-bottom: 25px;
	    	margin-left: auto;
	    	margin-right: auto;
	    	transition-property: background,color;
	    	transition-duration: .5s;
		}

		.loginFormGroup input[type='submit']:hover{
			//margin-top: 30px;
			background-color: #82c91e;
			color: white;
		}

		::-webkit-input-placeholder{
			text-align: center;
			color: rgba(0, 0, 0, 0.5);
			font-weight: 600;
			font-size: 13px;
		}

		::-moz-placeholder { /* Firefox 19+ */
			text-align: center;
			color: rgba(0, 0, 0, 0.5);
			font-weight: 600;
			font-size: 13px;
		}
		:-ms-input-placeholder { /* IE 10+ */
			text-align: center;
			color: rgba(0, 0, 0, 0.5);
			font-weight: 600;
			font-size: 13px;
		}
		:-moz-placeholder { /* Firefox 18- */
			text-align: center;
			color: rgba(0, 0, 0, 0.5);
			font-weight: 600;
			font-size: 13px;
		}

    </style>
