
<!DOCTYPE html>
<html>
<head>
 <title>Gaussianos Cotizaciones</title>
</head>
<body>
 
<h1>Hola, {{ $name }} </h1>

<p>Desde Gaussianos-App, Hemos Recivido tu Tarea, Como realizaste una cotizacion le hemos asignado un valor y un Asesor</p>
<p>Te Mostramos esos Datos:</p>
 <h1>Valor Tarea</h1> <span>${{ $price }} Pesos</span>
 <h1>Fecha de Entrega</h1> <span>{{ $date }}</span>
 <br><br>

 <h4>Desde Gaussianos te Apoyamos en tu proceso de Formacion</h4>
 <p>Si tienes una duda Escribenos</p><span>3008933494</span> 
 <p>gaussianosoficial@gmail.com</p>

 De igual forma puedes ingresar a nuestro sitio web <a href="www.losgaussianos.com">Los Gaussioanos</a> como Usuario con las Siguientes Credenciales
 <p>Usuaio: {{ $mail}} </p>
 <p>Contrasena: {{ $mobile}} </p>
</body>
</html> 