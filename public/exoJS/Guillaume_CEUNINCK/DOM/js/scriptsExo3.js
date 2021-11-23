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
    let title = document.createElement('h4');
    title.innerHTML = "Bloc ajouté";

    let paragraph = document.createElement('p');
    paragraph.innerHTML = "Commentaire ajouté";

    let buttonEdit = document.createElement('button');
    buttonEdit.innerHTML = "Modify Comment";
    buttonEdit.className = "modify";

    let buttonRemove = document.createElement('button');
    buttonRemove.innerHTML = "Remove Comment";
    buttonRemove.className = "remove";

    let content = document.createElement('div');
    content.id = "user" + newId;
    content.append(title);
    content.append(paragraph);
    content.append(buttonEdit);
    content.append(buttonRemove);

    users.appendChild(content);
})

let modifiers = document.getElementsByClassName("modify");
Array.from(modifiers).forEach(m => m.addEventListener("click",modify));

let remover = document.getElementsByClassName("remove");
Array.from(remover).forEach(m => m.addEventListener("click",deleter));