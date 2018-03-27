<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   @include('listado.header')
</head>
<body>
    <div id="app" class="wrapper">
        @include('listado.nav')
        @include('listado.content')
        @include('listado.section')
        @include('listado.footer')
	</div>
</body>
</html>
