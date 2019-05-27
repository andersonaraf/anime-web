function CriarUsuario(params) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "../controller/controller.php?req=registrar", true);
    xmlhttp.send();
}

function uploadComment(params) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

        }
    };
    var comment = document.getElementById('comment').value;
    document.getElementById('comment').value = "";
    xmlhttp.open("GET", "../controller/controller.php?req=comentar&comment=" + comment, true);
    xmlhttp.send();
}