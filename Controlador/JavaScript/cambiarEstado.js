var modificador = {
    modificarEstado : function(resultado){
        var elemento = document.getElementById(resultado.id);
        elemento.setAttribute("estado", resultado.estado);
    },
    comprobarRespuesta : function(resultado){
        if(!resultado.hasOwnProperty("e")){
            modificador.modificarEstado(resultado);
        }else{
            alert(resultado.e);
        }
    }
};

var columna = {
    escojer : function(padre){
        switch (padre){
            case "backlog":
                return 0;
                break;
            case "pendiente":
                return 1;
                break;
            case "proceso":
                return 2;
                break;
            case "fin":
                return 3;
                break;
        }
    }
}

var cambiarEstado = {
    tomardatos : function(caja){
        var hijos = caja.childNodes;
        var id = caja.getAttribute("id");
        var nombre = hijos[0].innerHTML;
        var descripcion = hijos[2].childNodes[0].innerHTML;
        var valor = hijos[1].innerHTML;
        var padre = caja.parentNode.getAttribute("id");
        var estado = columna.escojer(padre);
        conexion.siObtengoResultado(modificador.comprobarRespuesta)
        var paqueteDeEnvio = {
            "operacion" : "update",
            "tabla" : "Historias",
            objeto : {
                "id" : id,
                "nombre" : nombre,
                "descripcion" : descripcion,
                "valor" : valor,
                "estado" : estado
            }
        };
        conexion.enviarDatos(paqueteDeEnvio);
    }
};