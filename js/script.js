function autoGrown(element){
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}

function divFocus(target){
    document.getElementById(target).focus();
}

function divShow(target){
    document.getElementById(target).style.display = 'block';
    document.getElementById(target).focus();
}

function divHide(target){
    document.getElementById(target).style.display = 'none';
}

function link(target){
    window.location.href = target;
}
