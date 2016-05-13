var nombre;
var descripcion;
var valor;

var conexion = { //metodos de conexion, envio y recepcion de datos al servidor
    http_request : false,
    siObtengoResultado : function (callback) {
        this.callback = callback;
    },
    respondeBD : function (objeto) {
        conexion.callback(objeto);
    },
    enviarDatos : function (paquete) {
        var url = "http://localhost/proyecto2/Controlador/anadirHU.php";//falta saber como se llama el controlador
        this.envio(url, paquete);
    },
    envio : function (url, paquete) {
        this.http_request = false;
        if (window.XMLHttpRequest) { // Mozilla, Safari,...
            this.http_request = new XMLHttpRequest();
            if (this.http_request.overrideMimeType) {
                this.http_request.overrideMimeType('text/xml');
                // Ver nota sobre esta linea al final
            }
        } else if (window.ActiveXObject) { // IE
            try {
                this.http_request = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    this.http_request = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {}
            }
        }
        if (!this.http_request) {
            alert('Falla :( No es posible crear una instancia XMLHTTP');
            return false;
        }
        this.http_request.onreadystatechange = this.alertContents;
        this.http_request.open('POST', url, true);
        this.http_request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        this.http_request.send(JSON.stringify(paquete));
    },
    alertContents : function () {
        if (conexion.http_request.readyState == 4) {
            if (conexion.http_request.status == 200) {
                conexion.respondeBD(JSON.parse(conexion.http_request.responseText));
            } else {
                alert('Hubo problemas con la petición.');
            }
        }
    }
};
var datos = { //metodos de geston de paquetes y datos de la pagina
    comprobarDatosEntrada : function () {
        nombre = document.getElementById("nombreHu").value;
        descripcion = document.getElementById("info").value;
        valor = document.getElementById("valor").value;
        if (nombre.length != 0 && valor != 0 ){
            conexion.siObtengoResultado(vista.mostrar)
            var paqueteDeEnvio = {
                operacion : "insert",
                tabla : "Tareas",
                objeto : {
                    nombre : nombre,
                    descripcion : descripcion,
                    valor : valor
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
        if(!resolucion.hasOwnProperty(e)){
            vista.mostrar(resolucion);
        }else{
            alert(resolucion.e);
        }
    }
};
var vista = { //metodos para mostrar los datos en la pagina
    mostrar : function (datos) {
        var nombre = document.createElement("h4")
        var info = document.createElement("p");
        var descripcion = document.createElement("div");
        var valor = document.createElement("p");
        var btninfo = document.createElement("button");
        var caja = document.getElementById("backlog")
        descripcion.setAttribute("id", "detalles");
        // Añado al boton la clase y los atributos para las funcionalidades
        btninfo.setAttribute("id", "btnVerMas");
        btninfo.setAttribute("class", "btnVerMas");
        btninfo.innerHTML = "Ver más";
        // Añadimos la informacion a las variables
        nombre.innerHTML = datos.nombre;
        info.innerHTML = datos.descripcion;
        descripcion.appendChild(info);
        valor.innerHTML = "Valor "+datos.valor;
        // Creamos la caja movil
        var cajaMovil = document.createElement("div");
        cajaMovil.setAttribute("class", "cajamovil");
        cajaMovil.setAttribute("id", datos.id);
        // Añadimos los datos a loa caja movil y la caja movil a la columna de backlog
        cajaMovil.appendChild(nombre);
        cajaMovil.appendChild(valor);
        cajaMovil.appendChild(descripcion);
        cajaMovil.appendChild(btninfo);
        caja.appendChild(cajaMovil);
    }
};
var boton = {
    funcionalidad : function () {
        var btnanadir = document.getElementById("anadirHU");
        btnanadir.addEventListener("click", datos.comprobarDatosEntrada);
    }
};

boton.funcionalidad();
