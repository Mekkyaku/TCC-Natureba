function hideside(){
    document.getElementById('bside').onclick = showside;
    document.getElementById('side').style.display = "none";
    document.getElementById('small').style.display = "block";
    document.getElementById('base').style.marginLeft = "96px";

    fetch("http://localhost/TCC/php/side/estado.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `act=1`,
    });
}

function showside(){
    document.getElementById('bside').onclick = hideside;
    document.getElementById('side').style.display = "block";
    document.getElementById('small').style.display = "none";
    document.getElementById('base').style.marginLeft = "196px";

    fetch("http://localhost/TCC/php/side/estado.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `act=2`,
    });
}

function shownoti(){
    document.getElementById('bnoti').onclick = hidenoti;
    document.getElementById('inoti').src = "../../../img/site/noti-off.png";
    document.getElementById('noti').style.display = "block";
    document.getElementById('snoti').style.display = "block";
    document.getElementById('bperfil').onclick = showperfil;
    document.getElementById('perfil').style.display = "none";
    document.getElementById('sperfil').style.display = "none";

    fetch("http://localhost/TCC/php/header/le.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `act=1`,
    });
    
}

function hidenoti(){
    document.getElementById('bnoti').onclick = shownoti;
    document.getElementById('noti').style.display = "none";
    document.getElementById('snoti').style.display = "none";
}

function showperfil(){
    document.getElementById('bperfil').onclick = hideperfil;
    document.getElementById('perfil').style.display = "block";
    document.getElementById('sperfil').style.display = "block";
    document.getElementById('bnoti').onclick = shownoti;
    document.getElementById('noti').style.display = "none";
    document.getElementById('snoti').style.display = "none";
}

function hideperfil(){
    document.getElementById('bperfil').onclick = showperfil;
    document.getElementById('perfil').style.display = "none";
    document.getElementById('sperfil').style.display = "none";
}