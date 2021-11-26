"use strict";
function editVisibility(e){
    
    if(e.ctrlKey){
        if(e.key == "ArrowRight"){
            i = (i+1)%medias.length;
            currentFocus = document.getElementById('focus').removeChild(document.getElementById('focus').firstChild);
            currentFocus = document.getElementById('focus').appendChild(medias[i].cloneNode(true));
        }
        else if (e.key == "ArrowLeft"){
            i = (i-1)%medias.length;
            currentFocus = document.getElementById('focus').removeChild(document.getElementById('focus').firstChild);
            currentFocus = document.getElementById('focus').appendChild(medias[i].cloneNode(true));
        }
    }
    e.stopPropagation();
};

var i = 0;
var medias = document.getElementById('medias').children;
var currentFocus = document.getElementById('focus').appendChild(medias[i].cloneNode(true));
document.addEventListener("keydown", editVisibility);