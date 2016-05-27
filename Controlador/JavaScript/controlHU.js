var id;

var funciones = {
    modificar : function(e){
        var borrar = e.target.parentNode.parentNode;
        var id = borrar.getAttribute("id");
        var estado = borrar.getAttribute("estado");
        var nombre = borrar.childNodes[1].getAttribute("value");
        var info = borrar.childNodes[2].innerHTML;
        var valor = borrar.childNodes[3].getAttribute("value");
        var contenedor = document.createElement("div");
        contenedor.setAttribute("class", "modal-header");
        contenedor.setAttribute("id", id);
        contenedor.setAttribute("estado", estado);
        var despues = e.target.parentNode.parentNode.parentNode.childNodes[2];
        var btnCerrar = document.createElement("button");
        btnCerrar.setAttribute("type", "button");
        btnCerrar.setAttribute("class", "close");
        btnCerrar.setAttribute("data-dismiss", "modal");
        btnCerrar.setAttribute("arial-label", "close");
        var tmp = document.createElement("span");
        tmp.setAttribute("aria-hiden", "true");
        tmp.innerHTML = "&times;";
        btnCerrar.appendChild(tmp);
        var form = document.createElement("form");
        form.setAttribute("class", "form-singin");
        var error = document.createElement("div");
        error.setAttribute("class", "errorOculto");
        error.innerHTML = "<p>Hay campos vacios en el formulario</p>";
        var input1 = document.createElement("input");
        input1.setAttribute("type", "text");
        input1.setAttribute("id", "cambioNombre");
        input1.setAttribute("class", "form-control");
        input1.setAttribute("name", "nombreHU");
        input1.setAttribute("value", nombre);
        var input2 = document.createElement("input");
        input2.setAttribute("type", "number");
        input2.setAttribute("id", "cambioValor");
        input2.setAttribute("class", "form-control");
        input2.setAttribute("name", "valor");
        input2.setAttribute("value", valor);
        var input3 = document.createElement("input");
        input3.setAttribute("type", "text");
        input3.setAttribute("id", "cambioInfo");
        input3.setAttribute("class", "form-control");
        input3.setAttribute("name", "info");
        input3.setAttribute("value", info);
        form.appendChild(error);
        form.appendChild(input1);
        form.appendChild(input2);
        form.appendChild(input3);
        var botones = document.createElement("div");
        botones.setAttribute("class", "modal-footer");
        var boton1 = document.createElement("button");
        var boton2 = document.createElement("button");
        boton1.setAttribute("type", "button");
        boton1.setAttribute("class", "btn btn-default");
        boton1.setAttribute("id", "btnGuardar");
        boton1.innerHTML = "Guardar";
        boton2.setAttribute("type", "button");
        boton2.setAttribute("class", "btn btn-default");
        boton2.setAttribute("id", "btnEliminar");
        boton2.innerHTML = "Eliminar";
        botones.appendChild(boton1);
        botones.appendChild(boton2);
        //añado los elementos a la caja y la misma a la pantalla
        contenedor.appendChild(btnCerrar);
        contenedor.appendChild(form);      
        contenedor.appendChild(botones);
        var cajaPadre = e.target.parentNode.parentNode.parentNode;
        cajaPadre.removeChild(borrar);
        cajaPadre.insertBefore(contenedor, despues);
        ControladorHU.funcionalidad();
    },
    eliminar : function(e){
        var id= e.target.parentNode.parentNode.getAttribute("id");
        conexion.siObtengoResultado(editor.eliminar);
        var paqueteDeEnvio = {
            "operacion" : "delete",
            "tabla" : "Historias",
            objeto : {
                "id" : id
            }
        };
        conexion.enviarDatos(paqueteDeEnvio);
    },
    guardar : function(e){
        var caja = e.target.parentNode.parentNode;
        var id = caja.getAttribute("id");
        var nombre = document.getElementById("cambioNombre").value;
        var info = document.getElementById("cambioInfo").value;
        var valor = document.getElementById("cambioValor").value;
        var estado = caja.getAttribute("estado");
        conexion.siObtengoResultado(editor.modificar)
        var paqueteDeEnvio = {
            "operacion" : "update",
            "tabla" : "Historias",
            objeto : {
                "id" : id,
                "nombre" : nombre,
                "descripcion" : info,
                "valor" : valor,
                "estado" : estado
            }
        };
        conexion.enviarDatos(paqueteDeEnvio);
    }
};

var editor = {
    eliminar : function(id){
        alert("Eliminada la historia de usuario");
        var caja = document.getElementById(id);
        var cajaPadre = caja.parentNode;
        cajaPadre.removeChild(caja);
    },
    modificar : function(datos){
        var caja = document.getElementById(datos.id);
        caja.childNodes[0].innerHTML = datos.nombre;
        caja.childNodes[2].childNodes[0].innerHTML = datos.descripcion;
        caja.childNodes[1].innerHTML = datos.valor;
    }
};

var ControladorHU = {
    funcionalidad : function(){
        if(document.getElementById("btnModificar")){
            var btnModificar = document.getElementById("btnModificar");
            btnModificar.addEventListener("click", funciones.modificar);
        }
        if(document.getElementById("btnEliminar")){
            var btnEliminar = document.getElementById("btnEliminar");
            btnEliminar.addEventListener("click", funciones.eliminar);
        }
        if(document.getElementById("btnGuardar")){
            var btnGuardar = document.getElementById("btnGuardar");
            btnGuardar.addEventListener("click", funciones.guardar);
        }
    }
};