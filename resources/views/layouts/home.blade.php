<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width , initial-scale=1, maximum-scale=1,user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<link href="{{asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png"  href="{{asset('images/favicon.png') }}" />
</head>
<body>
<div id="outer">
<!--header-->
	@include('includes.header')
    	
	    <!--main-->
     	@yield('content')
	    <!--//main-->

	 @include('includes.footer')
</div>
<script src="{{asset('js/jquery-1.11.2.min.js') }}" type="text/javascript"></script> 
<script src="{{asset('js/bootstrap.min.js') }}" type="text/javascript"></script> 
<script src="{{asset('js/jquery.ieresponsify-1.1.js') }}" type="text/javascript"></script>
</body>
</html>