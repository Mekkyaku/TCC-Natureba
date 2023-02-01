const tx = document.getElementsByTagName("textarea");
for (let i = 0; i < tx.length; i++) {
    tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px; overflow-y:hidden;");
    tx[i].addEventListener("input", OnInput, false);
}

function OnInput() {
    this.style.height = 0;
    this.style.height = (this.scrollHeight) + "px";
}

document.getElementById("image").onchange = function(){
    var reader = new FileReader();

    reader.onload = function (e){
        document.getElementById("preview").src = e.target.result;
    };

    reader.readAsDataURL(this.files[0]);
}

function onstrela(estrelado, estrelador){
    document.getElementById(estrelado).style.display = "none";
    document.getElementById(estrelado+'o').style.display = "block";

    fetch("http://localhost/TCC/php/principal/receitas/estrela.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `estrelado=${estrelado}&estrelador=${estrelador}`, 
    })
    .then((response) => response.text())
    .then((res) => (document.getElementById(estrelado+'r').innerHTML = res));
}

function offstrela(estrelado, estrelador){
    document.getElementById(estrelado).style.display = "block";
    document.getElementById(estrelado+'o').style.display = "none";

    fetch("http://localhost/TCC/php/principal/receitas/offstrela.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `estrelado=${estrelado}&estrelador=${estrelador}`, 
    })
    .then((response) => response.text())
    .then((res) => (document.getElementById(estrelado+'r').innerHTML = res));
}