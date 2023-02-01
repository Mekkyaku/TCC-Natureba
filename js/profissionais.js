function onstrela(estrelado, estrelador){
    document.getElementById(estrelado).style.display = "none";
    document.getElementById(estrelado+'o').style.display = "block";

    fetch("http://localhost/TCC/php/principal/profissionais/estrela.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `estrelado=${estrelado}&estrelador=${estrelador}`, 
    })
    .then((response) => response.text())
    .then((res) => (document.getElementById(estrelado+'p').innerHTML = res));
}

function offstrela(estrelado, estrelador){
    document.getElementById(estrelado).style.display = "block";
    document.getElementById(estrelado+'o').style.display = "none";

    fetch("http://localhost/TCC/php/principal/profissionais/offstrela.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `estrelado=${estrelado}&estrelador=${estrelador}`, 
    })
    .then((response) => response.text())
    .then((res) => (document.getElementById(estrelado+'p').innerHTML = res));
}