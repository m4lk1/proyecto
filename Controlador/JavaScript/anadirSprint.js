var nombre;
var finicio;
var ffin;

var datosSprint = { //metodos de geston de paquetes y datos de la pagina
    comprobarDatosEntrada : function () {
        nombre = document.getElementById("nombreSprint").value;
        finicio = document.getElementById("fInicio").value;
        ffin = document.getElementById("fFin").value;
        console.log(nombre, finicio, ffin);
        if (nombre.length != 0 && ffin != 0 && finicio != 0){
            conexion.siObtengoResultado(datosSprint.leerDatosRetornados);
            var paqueteDeEnvio = {
                operacion : "insert",
                tabla : "Sprint",
                objeto : {
                    nombre : nombre,
                    finicio : finicio,
                    ffin : ffin
                }
            };
            conexion.enviarDatos(paqueteDeEnvio);
        } else {
            var error = document.getElementById("error");
            var texto = document.createElement("p");
            texto.innerHTML = "Hay campos vacios en el formulario";
            error.appendChild(texto);
        }
    },
    leerDatosRetornados : function (resolucion) {
        if(!resolucion.hasOwnProperty("e")){
            pintarSprint.mostrar(resolucion);
        }else{
            alert(resolucion.e);
        }
    }
};
var pintarSprint = { //metodos para mostrar los datos en la pagina
    mostrar : function (datos) {
        var nombre = document.createElement("h4");
        var finicio = document.createElement("p");
        var ffin = document.createElement("p");
        var caja = document.getElementById("sprint");
        // Añadimos la informacion a las variables
        nombre.innerHTML = datos.nombre;
        finicio.innerHTML = datos.finicio;
        ffin.innerHTML = datos.ffin;
        // Creamos la caja movil
        var contenedor = document.createElement("div");
        contenedor.setAttribute("class", "sprint");
        contenedor.setAttribute("id", "Sprint"+datos.id);
        // Añadimos los datos a loa caja movil y la caja movil a la columna de backlog
        contenedor.appendChild(nombre);
        contenedor.appendChild(finicio);
        contenedor.appendChild(ffin);
        caja.appendChild(contenedor);
    }
};
var botonSprint = {
    funcionalidad : function () {
        var btnanadir = document.getElementById("anadirSprint");
        btnanadir.addEventListener("click", datosSprint.comprobarDatosEntrada);
    }
};

botonSprint.funcionalidad();