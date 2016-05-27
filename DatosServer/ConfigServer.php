<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * 
 */

namespace ProyectoScrum\DatosServer;

class ConfigServer {
    
    protected $direccion;
    protected $usuario;
    protected $passwd;
    protected $nombreBD;
    
    function __construct() {
        $this->direccion = "projectscrum.servehttp.com";
        $this->usuario = "josembarboteo";
        $this->passwd = "pepito123";
        $this->nombreBD = "proyecto";
    }
    
    function getDireccion() {
        return $this->direccion;
    }
    function setDireccion($direccion) {
        $this->direccion=$direccion;
    }
    
    function getUsuario() {
        return $this->usuario;
    }
    function setUsuario($usuario) {
        $this->usuario=$usuario;
    }
    
    function getPasswd() {
        return $this->passwd;
    }
    function setPasswd($passwd) {
        $this->passwd=$passwd;
    }
    
    function getNombreBD() {
        return $this->nombreBD;
    }
    function setNombreBD($nombreBD) {
        $this->nombreBD=$nombreBD;
    }
}