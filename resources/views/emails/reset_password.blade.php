<!DOCTYPE html>
<html>
<head>
	<title>Confirmar correo</title>
</head>
<body>
	<h2>Hola {{ $name }}, has recibido un correo de  <strong>Solicitud de Empleo</strong> !</h2>
    <p>Usted a recibido este correo porque reestablecio su contraseña,la cual es temporal y es la siguiente <strong>{{ $new_password }} </strong> </p>
    <p>Se le recomienda en cuanto ingrese, cambie su contraseña.</p>
    <!-- <a href="{{ url('/password/reset/' . $remember_token) }}">
        Clic para confirmar tu email
    </a> -->
	<!-- <a href="{{ url('/register/verify/'.$confirmed_code)}}">Verificar Correo</a> -->
</body>
</html>