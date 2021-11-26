function handleFiles(files) {
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
    
        if (!file.type.startsWith('image/')){ continue }
            
        var img = document.createElement('img');
        img.file = file;
        document.getElementById("preview").appendChild(img);
        
        const reader = new FileReader();
        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
        reader.readAsDataURL(file);
    }
}

var uploadButton = document.getElementById("upload");

uploadButton.addEventListener("change", 
    function(e)
    { 
        handleFiles(e.currentTarget.files); 
    });