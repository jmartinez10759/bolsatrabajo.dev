 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- obtengo la ruta de mi proyecto -->
    <meta name="ruta-general" content="{{ $_SERVER['PHP_SELF'] }}">

    <link rel="icon" href="{{asset( 'images/logo.png' )}}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{asset( 'images/logo.png' )}}" type="image/x-icon" />
    
    <title>Solicitud de Empleo - BLM </title>

     <link href="{{asset('plugins/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- Icons -->
    <link href="{{ asset('plugins/font-awesome/font-awesome.css' )}}" rel="stylesheet">
    <link href="{{ asset('plugins/line-font/line-font.css')}}" rel="stylesheet">
    <!-- Dropzone Style-->
    <link href="{{asset('plugins/css/dropzone.css')}}" rel="stylesheet" />
    <!-- Bootstrap Editor-->
    <link href="{{ asset('plugins/css/bootstrap-wysihtml5.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{ asset('plugins/css/custom.css') }}" rel="stylesheet" />
   
    <!-- estilos del desarrollador -->
    @stack('styles')
