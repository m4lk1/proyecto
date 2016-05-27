<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProyectoScrum</title>
 
    <!-- CSS de Bootstrap -->
    <link href="Controlador/CSS/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- CUSTOM CSS -->
    <link href="Controlador/CSS/custom.css" rel="stylesheet">
 
 
  </head>
  <body>
        <div class="container" id="indexcontainer">
            <div class="form-signin">
                <img id="logo" src="Controlador/Recursos/logo.png" />
                <br />
                <label for="email" class="sr-only">Dirección de correo</label>
                <input type="email" id="email" class="form-control" name="correo" placeholder="Direccion de correo" required autofocus>
                <label for="password" id="passwd" class="sr-only">Contraseña</label>
                <input type="password" id="password" class="form-control" name="password" Pattern="[A-Za-z0-9]{4,20}" placeholder="(a~Z0~9)min 4 y max 20" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="recuerdame"> Recordarme
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" id="conectar" type="submit" value="enviar" onclick = "location='Controlador/ControlLogin.php'">Conectar</button>
            </div>
            <div class="form-signin">
                <button id="btnRegistrar" class="btn btn-lg btn-primary btn-block" type="submit" value="enviar" onclick = "location='Vista/Registro.php'">Registrar</button>
            </div>
    </div> 
 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    
    <script src="Controlador/JavaScript/bootstrap.min.js"></script>
    <script src="Controlador/JavaScript/custom.js"></script>
  </body>
</html>