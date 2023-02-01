const   form = document.querySelector("#textarea"),
        txtBox = form.querySelector("#textbox"),
        botao = form.querySelector("#botao");

botao.onclick = () =>{
    let xhr = new XMLHttpRequest();
        xhr.open("POST", "inserir.php", true);
        xhr.onload = () =>{
            if (xhr.readyState === XMLHttpRequest.DONE){
                if (xhr.status === 200){
                    txtBox.value = "";
                }
            }
        }
    let formData = new FormData(form);
    xhr.send(formData);
}