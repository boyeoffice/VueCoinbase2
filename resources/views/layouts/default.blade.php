<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- =======================================================
        Theme Name: Adcomfort
        Theme URL: 
        Author: Olakunle Boye
        Author URL: 
    ======================================================= -->
	<link rel="stylesheet" href="{{ mix('adcom/css/app.css') }}">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="OLAKUNLE BOYE">
	<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top navbar-transparent">
		<div class="container">
			<div class="navbar-translate">
				<a class="navbar-brand" href="{{ url('/') }}" rel="tooltip" data-placement="top" data-original-title="Adcomfort Nigeria Limited">Adcomfort</a>
				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	               <span class="navbar-toggler-icon"></span>
	              </button>
			</div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="">
            	<ul class="navbar-nav">
            		<li class="nav-item">
            			<a href="#" class="nav-link">home</a>
            		</li>
            		<li class="nav-item">
            			<a href="#" class="nav-link">about</a>
            		</li>
            		<li class="nav-item">
            			<a href="#" class="nav-link">portfolio</a>
            		</li>
            		<li class="nav-item">
            			<a href="#" class="nav-link">services</a>
            		</li>
            		<li class="nav-item">
            			<a href="#" class="nav-link">contact</a>
            		</li>
            		<li class="nav-item">
            			<a href="#" class="nav-link" rel="tooltip" data-placement="top" data-original-title="Like us on facebook">
            				<i class="fa fa-facebook"></i>
            			</a>
            		</li>
            		<li class="nav-item">
            			<a href="#" class="nav-link" rel="tooltip" data-placement="top" data-original-title="Follow us on twitter">
            				<i class="fa fa-twitter"></i>
            			</a>
            		</li>
            		<li class="nav-item">
            			<a href="#" class="nav-link">
            				<i class="fa fa-whatsapp"></i>
            			</a>
            		</li>
            	</ul>
            </div>
		</div> 
    </nav>
   <div id="app" class="wrapper">
   	 @yield('content')
   </div>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('adcom/js/main.js') }}"></script>
</body>
</html>