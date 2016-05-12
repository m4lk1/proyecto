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
        <div class="container" id="indexcontainer">
            <div class="row">
                <div class="col-lg-4"></div>
                    <div class="col-lg-4"><img id="logoProyectos" src="../Controlador/Recursos/logo.png" /></div>
                        <div id="btnProyecto" class="col-lg-4">
                            <button  class="btn btn-lg btn-primary btn-block" type="button" data-toggle="modal" data-target="#popupBtnProyecto">Añadir Proyecto</button>
                            <button  class="btn btn-lg btn-primary btn-block" type="button" >Borrar Proyecto</button>
                            <button  class="btn btn-lg btn-primary btn-block" type="button" type="submit" onclick = "location='../index.php'" >Atras</button>
                        </div>
                    </div>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle btn-lg btn-primary btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Proyectos
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu btn-block" aria-labelledby="dropdownMenu1" id="proyectos">
                    <!-- espacio reservado para la lectura de proyectos en php !-->
                    
                </ul>
            </div>
        </div> 
 
        <div id="popupBtnProyecto" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Añadir Proyecto</h4>
                        <form class="form-signin" action="" method="post">
                            <br />
                            <label for="nombreProyecto" class="sr-only">Nombre Proyecto</label>
                            <input type="text" id="nombreProyecto" class="form-control" name="nombreProyecto" placeholder="Nombre del Proyecto" required autofocus>
                        </form>
                        <br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" id="anadir">Añadir Proyecto</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 
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
