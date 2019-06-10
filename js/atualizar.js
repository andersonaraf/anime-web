$(function() {
    setTime();
    function setTime() {
        var date = new Date().getTime();
        var string = "Timestamp: "+date;
        setTimeout(setTime, 3240000); //A CADA 15 MINUTOS
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