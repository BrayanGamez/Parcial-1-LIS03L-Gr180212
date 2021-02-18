function solonumeros(e){
    //almacena los datos
    key=e.keycode || e.which;
    teclado=String.fromCharCode(key);
    numeros="0123456789";
    especiales="8-37-38-46-43";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
        }
    }
        if(numeros.indexOf(teclado)==-1 && !teclado_especial){
            return false;

        }
    }