 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset( 'images/logo.png' )}}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{asset( 'images/logo.png' )}}" type="image/x-icon" />
    
    <title>Bolsa de Trabajo - BLM</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- estilos del desarrollador -->
    @stack('styles')
