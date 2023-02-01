setTimeout( function error(){
    document.getElementById('error').style.opacity = '0';

    setTimeout( function(){
        document.getElementById('error').style.display = 'none';
    }, 1000);

}, 3500);

document.getElementById("image").onchange = function(){
    var reader = new FileReader();

    reader.onload = function (e){
        document.getElementById("preview").src = e.target.result;
    };

    reader.readAsDataURL(this.files[0]);
}