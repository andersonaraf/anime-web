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

$(function() {
    setTime();
    function setTime() {
        var date = new Date().getTime();
        var string = "Timestamp: "+date;
        setTimeout(setTime, 3000);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                $("#atualizarDiv").load("animeBlackVideo.php #atualizarDiv");
            }
        };
        xmlhttp.open("GET", "../controller/controller.php?req=refreshComent", true);
        xmlhttp.send();



    }
});