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

    <link href="{{asset('templates/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('plugins/font-awesome/font-awesome.css' )}}" rel="stylesheet">
    <link href="{{ asset('plugins/line-font/line-font.css')}}" rel="stylesheet">
    <!-- Custom style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsiveness.css') }}" rel="stylesheet">
    <style type="text/css">

        .autocomplete-items {
          position: absolute;
          border: 3px solid #d4d4d4;
          border-bottom: none;
          border-top: none;
          z-index: 99;
          /*position the autocomplete items to be the same width as the container:*/
          top: 100%;
          left: 0;
          right: 0;
        }
        .autocomplete-items div {
          padding: 10px;
          cursor: pointer;
          background-color: #fff;
          border-bottom: 1px solid #d4d4d4;
        }
        .autocomplete-items div:hover {
          /*when hovering an item:*/
          background-color: #e9e9e9;
        }
        .autocomplete-active {
          /*when navigating through the items using the arrow keys:*/
          background-color: DodgerBlue !important;
          color: #ffffff;
        }
    </style>
    <!-- estilos del desarrollador -->
    @stack('styles')
