function CriarUsuario(params) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    xmlhttp.open("GET", "../controller/controller.php?req=registrar", true);
    xmlhttp.send();
}