function showinfo(){
    document.getElementById("tipo").style.opacity = "100%";
    document.getElementById("tipo").style.visibility = "visible";
}

function hideinfo(){
    document.getElementById("tipo").style.opacity = "0";
    document.getElementById("tipo").style.visibility = "hidden";
}

setTimeout( function error(){
    document.getElementById('error').style.opacity = '0';

    setTimeout( function(){
        document.getElementById('error').style.display = 'none';
    }, 1000);

}, 3500);

setTimeout( function erro(){
    document.getElementById('erro').style.opacity = '0';

    setTimeout( function(){
        document.getElementById('erro').style.display = 'none';
    }, 1000);

}, 3500);

document.getElementById("image").onchange = function(){
    var reader = new FileReader();

    reader.onload = function (e){
        document.getElementById("preview").src = e.target.result;
    };

    reader.readAsDataURL(this.files[0]);
}

function dropdown(el){
    var display = document.getElementById(el).style.display;
    if (display == "none"){
        document.getElementById(el).style.display = "block";
    }
    else{
        document.getElementById(el).style.display = "none";
    }

    if (el == "email"){
        document.getElementById('senha').style.display = "none";
        document.getElementById('excluir').style.display = "none";
    }
    else if (el == "senha"){
        document.getElementById('email').style.display = "none";
        document.getElementById('excluir').style.display = "none";
    }
    else if (el == "excluir"){
        document.getElementById('email').style.display = "none";
        document.getElementById('senha').style.display = "none";
    }
}