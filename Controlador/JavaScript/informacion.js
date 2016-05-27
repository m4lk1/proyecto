var popup = {
    cargarDatos : function(e){
        var caja = e.target.parentNode;
        var hijos = caja.childNodes;
        var id = caja.getAttribute("id");
        var nombre = hijos[0].innerHTML;
        var descripcion = hijos[2].childNodes[0].innerHTML;
        var valor = hijos[1].innerHTML;
        var estado = caja.getAttribute("estado");
        objeto = {
            "id" : id,
            "nombre" : nombre,
            "descripcion" : descripcion,
            "valor" : valor,
            "estado" : estado
        };
        vistaInfo.mostrarDatos(objeto);
    }
};

var vistaInfo = {
    mostrarDatos : function(datos){
        var contenedorPadre = document.getElementById("popupBtnInfo");
        var borrar = contenedorPadre.childNodes[1].childNodes[1].childNodes[1];
        var contenedor = document.createElement("div");
        contenedor.setAttribute("class", "modal-header");
        var despues = contenedorPadre.childNodes[1].childNodes[1].childNodes[2];
        var btnCerrar = document.createElement("button");
        btnCerrar.setAttribute("type", "button");
        btnCerrar.setAttribute("class", "close");
        btnCerrar.setAttribute("data-dismiss", "modal");
        btnCerrar.setAttribute("arial-label", "close");
        var tmp = document.createElement("span");
        tmp.setAttribute("aria-hiden", "true");
        tmp.innerHTML = "&times;";
        btnCerrar.appendChild(tmp);
        var titulo = document.createElement("h4");
        titulo.setAttribute("value", datos.nombre);
        titulo.setAttribute("class", "modal-title");
        titulo.innerHTML = "Detalles de la historia de usuario "+datos.nombre;
        var info = document.createElement("p");
        info.innerHTML = datos.descripcion;
        var valor = document.createElement("p");
        valor.setAttribute("id", "valor");
        valor.setAttribute("value", datos.valor);
        valor.innerHTML= "Valor: "+datos.valor;
        var botones = document.createElement("div");
        botones.setAttribute("class", "modal-footer");
        var boton1 = document.createElement("button");
        var boton2 = document.createElement("button");
        boton1.setAttribute("type", "button");
        boton1.setAttribute("class", "btn btn-default");
        boton1.setAttribute("id", "btnModificar");
        boton1.innerHTML = "Modificar";
        boton2.setAttribute("type", "button");
        boton2.setAttribute("class", "btn btn-default");
        boton2.setAttribute("id", "btnEliminar");
        boton2.innerHTML = "Eliminar";
        botones.appendChild(boton1);
        botones.appendChild(boton2);
        //añado los elementos a la caja y la misma a la pantalla
        contenedor.setAttribute("id", datos.id);
        contenedor.setAttribute("estado", datos.estado);
        contenedor.appendChild(btnCerrar);
        contenedor.appendChild(titulo);
        contenedor.appendChild(info);
        contenedor.appendChild(valor);
        contenedor.appendChild(botones);
        contenedorPadre.childNodes[1].childNodes[1].removeChild(borrar);
        contenedorPadre.childNodes[1].childNodes[1].insertBefore(contenedor, despues);
        ControladorHU.funcionalidad();
    }
};

var verInfo = {
    funcionalidad : function(){
        var botones = document.querySelectorAll("#btnVerMas");
        for(var i=0; i<botones.length; i++){
            botones[i].addEventListener("click", popup.cargarDatos);
        }
    }
};

verInfo.funcionalidad();