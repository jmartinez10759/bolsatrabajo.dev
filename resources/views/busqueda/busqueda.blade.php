<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   @include('layouts.includes-header')
</head>
<body>
    <div id="app" class="wrapper">
        @include('layouts.page-header')
        @include('busqueda.content')
        @include('busqueda.section')
        @include('layouts.page-footer')
	</div>
	@include('layouts.includes-footer')
</body>
</html>
