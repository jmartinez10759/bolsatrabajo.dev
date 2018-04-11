<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   @include('layouts.includes-header')
</head>
<body>
    <div id="app" class="wrapper">
        @include('layouts.page-header')
        @include('busqueda.form')
        @include('layouts.page-footer')
	</div>
</body>
</html>
