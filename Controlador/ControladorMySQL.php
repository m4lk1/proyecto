<?php

namespace ProyectoScrum\Controlador;

use ProyectoScrum\Modelo\GestionMySQL;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Seleccion del tipo de ejecucion
 * 
 * Selecciona y realiza la ejecucion dada mediante el parametro operacion y devuelve el resultado de la misma
 *
 * @author josembarboteo<josembarbote@gmai.com>
 */
class ControladorMySQL {
    
    protected $gestor;
    protected $operacion;
    protected $tabla;
    protected $datos;
    
    public function __construct($operacion, $tabla, $datos) {
        $this->operacion = $operacion;
        $this->tabla = $tabla;
        $this->datos = $datos;
        $this->gestor = new GestionMySQL();
    }
    
    public function ejecutar($prueba){
        switch ($this->operacion){
            case "select":
                if($prueba){
                    return "select";
                }else{
                   $resultado = $this->gestor->leer($tabla);
                }
                break;
            case "insert":
                if($prueba){
                    return "insert";
                }else{
                    $resultado = $this->gestor->insertar($this->tabla, $this->datos);
                }
                break;
            case "update":
                if($prueba){
                    return "update";
                }else{
                    $resultado = $this->gestor->actualizar($this->tabla, $this->datos);
                }
                break;
            case "delete":
                if($prueba){
                    return "delete";
                }else{
                    $resultado = $this->gestor->borrar($this->tabla, $this->datos["id"]);
                }
                break;
        }
        echo json_encode($resultado, true);
    }
    
}
