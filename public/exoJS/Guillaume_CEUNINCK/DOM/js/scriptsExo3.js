"use strict";

function modify(e)
{
    document.getElementById(e.currentTarget.parentNode.id).getElementsByTagName('p')[0].textContent = "Chaîne modifiée!!";
    
}

function deleter(e)
{
    document.getElementById(e.currentTarget.parentNode.id).remove();
}

document.getElementById("addNew").addEventListener("click", function(e){
    let users = document.getElementById("users");
    let newId;

    if(users.lastElementChild != null)
    {
        newId = parseInt(users.lastElementChild.id.substring(4)) + 1;
    }
    else
    {
        newId = 1;
    }
    let content = "<div id='user" + newId + "'><h4>Bloc ajouté</h4><p>Commentaire ajouté</p><button class='modify'>Modify Comment</button><button class='remove'>Remove Comment</button></div>";
    users.innerHTML += content;
})

let modifiers = document.getElementsByClassName("modify");
Array.from(modifiers).forEach(m => m.addEventListener("click",modify));

let remover = document.getElementsByClassName("remove");
Array.from(remover).forEach(m => m.addEventListener("click",deleter));