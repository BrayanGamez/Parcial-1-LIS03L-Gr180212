window.onload=function(){
    document.getElementById("periodo").addEventListener("click",periodo,false);

}
function periodo(){
    var lista= document.getElementById("periodo");
    var indiceseleccionado=lista.selectedIndex;
    var opcionseleccionada=lista.options[indiceseleccionado];
    var textoseleccionado=opcionseleccionada.text;
    document.getElementById("interes").innerText="interés "+textoseleccionado+":";
    document.getElementById("plazo").innerText="Plazo "+textoseleccionado+":";
}
