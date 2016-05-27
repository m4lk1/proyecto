var conexion = { //metodos de conexion, envio y recepcion de datos al servidor
    http_request : false,
    siObtengoResultado : function (callback) {
        this.callback = callback;
    },
    respondeBD : function (objeto) {
        conexion.callback(objeto);
    },
    enviarDatos : function (paquete) {
        var url = "http://localhost/proyecto1/EntradaDatos.php";
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