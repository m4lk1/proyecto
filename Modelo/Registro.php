<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProyectoScrum</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../Controlador/CSS/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- CUSTOM CSS -->
    <link href="../Controlador/CSS/custom.css" rel="stylesheet">
 
 
  </head>
  <body>

        <form class="form-signin">
          <img id="logo" src="../Controlador/Recursos/logo.png" />
        <br />
        <label for="nombre" class="sr-only">Indique su nombre</label>
        <input type="text" id="nombre" class="form-control" placeholder="Indique su nombre" required autofocus>
         <label for="apellidos" class="sr-only">Indique su/s apellido/s</label>
        <input type="text" id="apellidos" class="form-control" placeholder="Indique su/s apellido/s" required>
         <label for="nick" class="sr-only">Indique su nick</label>
        <input type="text" id="nick" class="form-control" placeholder="Indique su nick" required>
        <label for="email" class="sr-only">Dirección de correo</label>
        <input type="email" id="email" class="form-control" placeholder="Direccion de correo" required>
        <label for="password" class="sr-only">Contraseña</label>
        <input type="password" id="password" class="form-control" placeholder="Contraseña" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
      </form>
      
      <div class="form-signin">
                <button id="btnVolver" class="btn btn-lg btn-primary btn-block" type="submit" value="enviar" onclick="location='../index.php'">Volver</button>
      </div>
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    
    <script src="../Controlador/JavaScript/bootstrap.min.js"></script>
     <script src="../Controlador/JavaScript/custom.js"></script>
  </body>
</html>