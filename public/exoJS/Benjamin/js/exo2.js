function SetBackgroundToRed(){
    document.body.style.backgroundColor = "red";
}

function changeColorById() {
    let collection = document.getElementsByClassName('descr');

    for (const element of collection) {
        element.style.backgroundColor="blue";
    }
}

function changeColorOfFirstChild() {
    let monCaroussel = document.getElementById("caroussel");
    monCaroussel.firstElementChild.style.backgroundColor="green";
}

function hide() {
    document.getElementById("p3").hidden=true;
}
