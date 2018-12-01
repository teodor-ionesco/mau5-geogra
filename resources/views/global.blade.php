<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>

		<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>	

		@yield('head')	

		<style>@yield('style')</style>
	</head>
	<body>
		@yield('body')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>-->
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
		 <script>
		 	$(document).ready(function(){
		 		$("a[link='yes']").attr('href', this.next().attr('src'));
		 	});
		 	
		 </script>
		<script>@yield('js')</script>
	</body>
</html>