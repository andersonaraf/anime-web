function sair(params) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == "Apagado"){
                window.location.href = "../../index.html";
            }
        }
    };
    xmlhttp.open("GET", "../sair.php", true);
    xmlhttp.send();
}