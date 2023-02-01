const tx = document.getElementsByTagName("textarea");
for (let i = 0; i < tx.length; i++) {
    tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px; overflow-y:hidden;");
    tx[i].addEventListener("input", OnInput, false);
}

function OnInput() {
    this.style.height = 0;
    this.style.height = (this.scrollHeight) + "px";
}

function showInfo(id){
    document.getElementById('info').style.display = "block";
    document.getElementById('s-alimento').style.display = "block";
    document.getElementById('body').style.overflow = "hidden";

    fetch("http://localhost/TCC/php/principal/alimentos/info.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `id=${id}`, 
    })
    .then((response) => response.text())
    .then((res) => (document.getElementById("info").innerHTML = res));
}

function hideInfo(){
    document.getElementById('info').style.display = "none";
    document.getElementById('s-alimento').style.display = "none";
    document.getElementById('body').style.overflow = "auto";
}

document.getElementById("image").onchange = function(){
    var reader = new FileReader();

    reader.onload = function (e){
        document.getElementById("preview").src = e.target.result;
    };

    reader.readAsDataURL(this.files[0]);
}