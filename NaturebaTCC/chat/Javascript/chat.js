const form = document.querySelector("#msgbox"),
inputField = form.querySelector("#txtbox"),
enviarbt = form.querySelector("#enviarbt");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "mandarchat.php");

    console.log(xhr);
    xhr.onreadystatechange = function (){
        if (xhr.readyState == 4){
            console.log(xhr);
        }
    }

    var formData = new FormData(form);
    console.log(formData);
    xhr.send(formData);


