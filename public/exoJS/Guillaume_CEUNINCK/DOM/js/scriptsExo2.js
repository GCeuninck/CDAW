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

colorClassDescr();
colorCaroussel();
