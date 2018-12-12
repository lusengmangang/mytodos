<!DOCTYPE html>
<html>
	<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
		 <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 @include('templates.head')
	 </head>
<body>
@include('templates.header')

@yield('content')
@include('templates.footer')
@include('templates.script')

</body>
</html>
