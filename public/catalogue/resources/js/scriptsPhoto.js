function handleFiles(files) {
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
    
        if (!file.type.startsWith('image/')){ continue }
            
        var img = document.createElement('img');
        img.file = file;
        removeAllChildNodes(document.getElementById("preview"));
        document.getElementById("preview").appendChild(img);
        
        const reader = new FileReader();
        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
        reader.readAsDataURL(file);
    }
}

var uploadButton = document.getElementById("upload");
if(uploadButton!=null)
{
    uploadButton.addEventListener("change", 
    function(e)
    { 
        handleFiles(e.currentTarget.files); 
    }
);
}


function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}
