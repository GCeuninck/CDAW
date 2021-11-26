"use strict";
function buttonEvent(e){ 

    alert("Evénement déclenché par : " + e.target.innerHTML);
    if(e.target == b1){
        b2.addEventListener("click", buttonEvent);
        b1.removeEventListener("click", buttonEvent);
    }
    else if(e.target == b2){
        b1.addEventListener("click", buttonEvent);
        b2.removeEventListener("click", buttonEvent);
    }
    e.stopPropagation();
};

var b1 = document.getElementById("b1");
var b2 = document.getElementById("b2");

b1.addEventListener("click", buttonEvent);