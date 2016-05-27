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
    <link href="../Controlador/CSS/movilidad.css" rel="stylesheet">
    <link href="../Controlador/CSS/error.css" rel="stylesheet">
 
 
  </head>
  <body>
        <div class="container">
            <div class="row">
                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', '1');
                ?>
                <?php
                    require './CargarPaginaTabla.php';
                    use ProyectoScrum\Vista\CargarPaginaTabla;
                    $mostrar = new CargarPaginaTabla();
                    $mostrar->cargaInicial();
                ?>
                <div class="col-lg-2" id="botonesTabla">
                    <button class="btn btn-lg btn-primary btn-block" type="button" data-toggle="modal" data-target="#popupBtnTabla">Añadir HU</button>
                    <button class="btn btn-lg btn-primary btn-block" type="button" data-toggle="modal" data-target="#popupBtnSprint">Añadir Sprint</button>
                    <button class="btn btn-lg btn-primary btn-block" type="button" id="atras">Atras</button>
                </div>
              </div>
        </div>
        <div id="popupBtnTabla" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Añadir HU</h4>
                        <form class="form-signin" action="" method="post">
                            <br />
                            <div id="error" class="errorOculto"><p>Hay campos vacios en el formulario</p></div>
                            <label for="nombreHu" class="sr-only">Nombre HU</label>
                            <input type="text" id="nombreHu" class="form-control" name="nombreHu" placeholder="Nombre HU" required autofocus>
                            <label for="valor" class="sr-only">Valor</label>
                            <input type="number" id="valor" class="form-control" name="valor" placeholder="Valor" required>
                            <label for="nick" class="sr-only">Más informacion</label>
                            <input type="text" class="form-control" placeholder="Detalles" id="info">
                            <br />
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="anadirHU">Guardar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 
        </div>
       
       
        <div id="popupBtnSprint" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Añadir Sprint</h4>
                        <form class="form-signin" action="" method="post">
                            <br />
                            <label for="numeroSprint" class="sr-only">Nombre Sprint</label>
                            <input type="text" id="nombreSprint" class="form-control" name="numeroSprint" placeholder="Nombre Sprint" required autofocus>
                            <label for="fInicio" class="sr-only">Fecha de Inicio</label>
                            <input type="text" id="fInicio" class="form-control" name="fInicio" placeholder="Fecha de inicio" required>
                            <label for="fFin" class="sr-only">Fecha de Fin</label>
                            <input type="text" id="fFin" class="form-control" name="fFin" placeholder="Fecha de fin" required>
                            <br />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="anadirSprint">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
       
        
        <div id="popupBtnInfo" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="btnModificar">Modificar</button>
                            <button type="button" class="btn btn-default" id="btnEliminar">Eliminar</button>
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
    <script src="../Controlador/JavaScript/anadirHU.js"></script>
    <script src="../Controlador/JavaScript/Movilidad.js"></script>
    <script src="../Controlador/JavaScript/cambiarEstado.js"></script>
    <script src="../Controlador/JavaScript/informacion.js"></script>
    <script src="../Controlador/JavaScript/conector.js"></script>
    <script src="../Controlador/JavaScript/anadirSprint.js"></script>
    <script src="../Controlador/JavaScript/controlHU.js"></script>
    <script src="../Controlador/JavaScript/DragDropTouch.js"></script>
    </body>
</html>