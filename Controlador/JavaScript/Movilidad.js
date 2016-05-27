var movilidad = {
    empieza : function(e){
        var id=e.target.getAttribute("id");
        e.dataTransfer.setData("idCaja", id);
    },
    entraCaja : function(e){
        this.setAttribute("class","encima");
    },
    saleCaja : function(e){
        this.setAttribute("class", "relleno");
    },
    encima : function(e){
        e.preventDefault();
    },
    soltar : function(e){
        e.preventDefault();
        var idCaja=e.dataTransfer.getData("idCaja");
        var caja=document.getElementById(idCaja);
        this.appendChild(caja);
        this.setAttribute("class", "relleno");
        cambiarEstado.tomardatos(caja);
    }
};
var cajas = {
    funcionalidad : function(){
        var dragables=document.querySelectorAll(".cajamovil");
        var dropzones=document.querySelectorAll(".relleno");
        for(var i=0;i<dragables.length;i++){
            dragables[i].addEventListener("dragstart", movilidad.empieza);
        }
        for(var i=0;i<dropzones.length;i++){
            dropzones[i].addEventListener("dragenter", movilidad.entraCaja);
            dropzones[i].addEventListener("dragleave", movilidad.saleCaja);
            dropzones[i].addEventListener("dragover", movilidad.encima);
            dropzones[i].addEventListener("drop", movilidad.soltar);
        }
    }
};

cajas.funcionalidad();