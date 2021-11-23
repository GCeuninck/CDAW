function colorClassDescr(){
    let descrClass = document.getElementsByClassName("descr");
    for(element of descrClass){
        element.style.background = "red";
    }
}

function colorCaroussel(){
    let monCaroussel = document.getElementById("caroussel");
    monCaroussel.style.background = "blue";
}

function hide() {
    document.getElementById("p3").hidden=true;
}

colorClassDescr();
colorCaroussel();
hide();
