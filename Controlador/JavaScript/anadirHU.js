var nombre;
var descripcion;
var valor;
var error = document.getElementById("error");

var datosHU = { //metodos de geston de paquetes y datos de la pagina
    comprobarDatosEntrada : function () {
        error.setAttribute("class", "errorOculto");
        nombre = document.getElementById("nombreHu").value;
        descripcion = document.getElementById("info").value;
        valor = document.getElementById("valor").value;
        if (nombre.length != 0 && valor != 0 ){
            conexion.siObtengoResultado(datosHU.leerDatosRetornados);
            var paqueteDeEnvio = {
                operacion : "insert",
                tabla : "Historias",
                objeto : {
                    nombre : nombre,
                    descripcion : descripcion,
                    valor : valor
                }
            };
            conexion.enviarDatos(paqueteDeEnvio);
            error.setAttribute("class", "errorOculto");
        } else {
            error.setAttribute("class", "errorVisible");
        }
    },
    leerDatosRetornados : function (resolucion) {
        if(!resolucion.hasOwnProperty("e")){
            pintarHU.mostrar(resolucion);
        }else{
            alert(resolucion.e);
        }
    }
};
var pintarHU = { //metodos para mostrar los datos en la pagina
    mostrar : function (datos) {
        var nombre = document.createElement("h4");
        var info = document.createElement("p");
        var descripcion = document.createElement("div");
        var valor = document.createElement("p");
        var btninfo = document.createElement("button");
        var caja = document.getElementById("backlog");
        descripcion.setAttribute("id", "detalles");
        // Añado al boton la clase y los atributos para las funcionalidades
        btninfo.setAttribute("id", "btnVerMas");
        btninfo.setAttribute("class", "btn btn-lg btn-primary btn-block");
        btninfo.setAttribute("data-toggle", "modal");
        btninfo.setAttribute("data-target", "#popupBtnInfo");
        btninfo.setAttribute("type", "button");
        btninfo.innerHTML = "Ver más";
        // Añadimos la informacion a las variables
        nombre.innerHTML = datos.nombre;
        info.innerHTML = datos.descripcion;
        descripcion.appendChild(info);
        valor.innerHTML = datos.valor;
        // Creamos la caja movil
        var cajaMovil = document.createElement("div");
        cajaMovil.setAttribute("class", "cajamovil");
        cajaMovil.setAttribute("id", datos.id);
        cajaMovil.setAttribute("estado", "0");
        cajaMovil.setAttribute("draggable", "true");
        // Añadimos los datos a loa caja movil y la caja movil a la columna de backlog
        cajaMovil.appendChild(nombre);
        cajaMovil.appendChild(valor);
        cajaMovil.appendChild(descripcion);
        cajaMovil.appendChild(btninfo);
        caja.appendChild(cajaMovil);
        cajas.funcionalidad();
        verInfo.funcionalidad();
    }
};
var botonHU = {
    funcionalidad : function () {
        var btnanadir = document.getElementById("anadirHU");
        btnanadir.addEventListener("click", datosHU.comprobarDatosEntrada);
    }
};

botonHU.funcionalidad();
