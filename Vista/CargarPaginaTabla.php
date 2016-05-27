<?php

namespace ProyectoScrum\Vista;

require '../vendor/autoload.php';

use ProyectoScrum\Modelo\GestionMySQL;

/**
 * Cargador inicial de la aplicacion
 * 
 * Este archivo es el utilizado para cargar todos los datos de la base de datos en el momento del ingreso del usuario.
 * 
 * @author josembarboteo<josembarboteo@gmail.com>
 * @version 0.1
 */

class CargarPaginaTabla{
    
    protected $gestor;
    
    public function __construct() {
        $this->gestor = new GestionMySQL();
        
    }
    
    /**
     * 
     * Cargador de las cajas
     * 
     * Carga los distintos tipos de cajas de dentro de la pagina con los valores de la base de datos asociados a la tabla y el tipo indicados
     * 
     * @param type $tabla
     * @param type $estado
     * @return string
     */
    protected function cargarCajas($tabla, $estado){
        $salida="";
        switch($tabla){
            case "Historias":
                $datos = $this->gestor->leer($tabla, $estado);
                if($datos["0"]){
                    foreach($datos as $i){
                        $salida.='<div id="'.$i["idHistorias"].'" class="cajamovil" estado="'.$i["estado"].'" draggable="true"><h4>'.$i["nombre"].'</h4><p>'.$i["valor"].'</p><div id="detalles"><p>'.$i["descripcion"].'</p></div><button id="btnVerMas" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#popupBtnInfo" type="button">Ver más</button></div>';
                    }
                }
                break;
            case "Sprint":
                $datos = $this->gestor->leer($tabla, $estado);
                if($datos["0"]){   
                    foreach($datos as $i){
                        $salida.='<div id="'.$i["idSprint"].'" class="sprint"><h4>'.$i["nombre"].'</h4><p>'.$i["fecha_inicio"].'</p><p>'.$i["fecha_final"].'</p></div>';
                    }
                }
                break;
        }
        return $salida;
    } 
    
    /**
     * Carga el cuerpo de la pagina
     * 
     * Cargador de la parte central de la pagina
     */
    public function cargaInicial(){
        echo '   <div class="col-lg-2">
                    <div class="cabecera">Backlog</div>
                    <div class="relleno" id="backlog">'.$this->cargarCajas("Historias", "0").'</div> 
                </div>
                <div class="col-lg-2">
                    <div class="cabecera">Sprints</div>
                    <div class="rellenoSprint" id="sprint">'.$this->cargarCajas("Sprint", "0").'</div>     
                </div>
                <div class="col-lg-2">
                    <div class="cabecera">Por hacer</div>
                    <div class="relleno" id="pendiente">'.$this->cargarCajas("Historias", "1").'</div> 
                </div>
                <div class="col-lg-2">
                    <div class="cabecera">En proceso</div>
                    <div class="relleno" id="proceso">'.$this->cargarCajas("Historias", "2").'</div> 
                </div>
                <div class="col-lg-2">
                    <div class="cabecera">Hecho</div>
                    <div class="relleno" id="fin">'.$this->cargarCajas("Historias", "3").'</div>
                </div>';
    }
    
}