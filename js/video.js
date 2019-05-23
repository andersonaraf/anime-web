function uploadComment(params) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == true){

            }
            else{

            }
        }
    };
    var comment = document.getElementById('comment').value;
    xmlhttp.open("GET", "../controller/controller.php?req=comentar&comment="+comment, true);
    xmlhttp.send();
}

$(function() {
    setTime();
    function setTime() {
        var xmlhttp = new XMLHttpRequest();
        var date = new Date().getTime();
        var string = "Timestamp: "+date;
        setTimeout(setTime, 3000);
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("foi");
            }
        };
        var comment = document.getElementById('comment').value;
        xmlhttp.open("GET", "../controller/controller.php?req=getComentario", true);
        xmlhttp.send();

    }
});