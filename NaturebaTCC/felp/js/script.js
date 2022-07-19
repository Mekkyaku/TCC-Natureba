
function show(target){
    document.getElementById(target).style.display = 'block';
    document.getElementById(target).focus();
}

function hide(target){
    document.getElementById(target).style.display = 'none';
}

setTimeout( function msg(){
    document.getElementById('msg').style.visibility = 'hidden';
    document.getElementById('msg').style.opacity = 0;

    setTimeout( function display(){
        document.getElementById('msg').style.display = 'none';
    }, 500);
}, 3500);

document.getElementById("image").onchange = function(){
    var reader = new FileReader();

    reader.onload = function (e){
        document.getElementById("preview").src = e.target.result;
    };

    reader.readAsDataURL(this.files[0]);
}

function link(target){
    window.location.href = target;
}

function hideside(){
    document.getElementById("side").style.display = 'none';
    document.getElementById("hide").style.display = 'none';
    document.getElementById("show").style.display = 'block';
}

function showside(){
    document.getElementById("side").style.display = 'block';
    document.getElementById("show").style.display = 'none';
    document.getElementById("hide").style.display = 'block';
}

function grown(element){
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}

function showinfo(id){
    document.getElementById("info").style.display = 'block';

    fetch("http://localhost/Natureba/html/principal/alimentos/info.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `id=${id}`, 
    })
    .then((response) => response.text())
    .then((res) => (document.getElementById("result").innerHTML = res));
}

function hideinfo(){
    document.getElementById("info").style.display = 'none';
    
}