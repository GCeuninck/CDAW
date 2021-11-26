"use strict";
function buttonLike(e){ 

    e.target.classList.toggle('press');
    e.stopPropagation();
};

var likeButton = document.getElementsByClassName("like-b")[0];

likeButton.addEventListener("click", buttonLike);