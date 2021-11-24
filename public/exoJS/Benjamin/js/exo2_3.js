"use strict";

function modify(e)
{
    var mainDiv = document.getElementById(e.currentTarget.parentNode.id),
    childDiv = mainDiv.getElementsByTagName('p')[0];

    document.getElementById('textarea').value =  childDiv.textContent;
   // childDiv.textContent="Modified";
}

function modify(e, str)
{
    var mainDiv = document.getElementById(e.currentTarget.parentNode.id),
    childDiv = mainDiv.getElementsByTagName('p')[0];

    
    childDiv.textContent=str;
}

function deleter(e)
{
    document.getElementById( e.currentTarget.parentNode.id).remove();
}

document.getElementById("addNew").addEventListener("click", function(e){
    var html_to_insert = "<div id='user"+
    + (parseInt(users.lastElementChild.id.substring(4)) + 1).toString()
    +"'><h4>Yumi Sawamura</h4><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><button class='modify'>Modify Comment</button><button class='remove'>Remove Comment</button></div> ";

    document.getElementById('users').insertAdjacentHTML('beforeend', html_to_insert);
})

document.getElementById("addNew2").addEventListener("click", function(e){
    let textArea = document.getElementById('textarea').value.toString();

    // var html_to_insert = "<div id='user"+
    // + (parseInt(users.lastElementChild.id.substring(4)) + 1).toString()
    // +"'><h4>Yumi Sawamura</h4><p>"
    // +textArea
    // +"</p><button class='modify'>Modify Comment</button><button class='remove'>Remove Comment</button></div> ";

    if(textArea.length >0){
      //  document.getElementById('users').insertAdjacentHTML('beforeend', html_to_insert);
        //childDiv.textContent=textArea;
    }else {
        alert("texte vide");
    }
})

let modifiers = document.getElementsByClassName("modify");
Array.from(modifiers).forEach(m => m.addEventListener("click",modify));

let remover = document.getElementsByClassName("remove");
Array.from(remover).forEach(m => m.addEventListener("click",deleter));