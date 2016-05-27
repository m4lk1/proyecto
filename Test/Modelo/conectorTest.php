<?php

namespace ProyectoScrum\Modelo;

require "vendor/autoload.php";
use ProyectoScrum\DatosServer\ConfigServer;
use ProyectoScrum\Modelo\conector;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-05-25 at 16:42:05.
 */
class conectorTest extends \PHPUnit_Framework_TestCase {

    protected $object;
    protected $config;
    protected $idPrueba;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->config = new ConfigServer();
        $this->object = new conector($this->config);
        $this->idPrueba = "Probando";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Controlador\conector\conector::conectar
     * @todo   Implement testConectar().
     */
    public function testConectar() {
        $this->object->conectar();
        $this->assertTrue($this->object->getEstadoConectado(), "El conectar no esta conectado");
    }

    /**
     * @covers Controlador\conector\conector::desconectar
     * @todo   Implement testDesconectar().
     */
    public function testDesconectar() {
        $this->object->desconectar();
        $this->assertFalse($this->object->getEstadoConectado(), "La sesion no se ha desconectado");
    }

}
