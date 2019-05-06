function buscaAnime() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(document.getElementById("bodyBuscaAnime").style.display == 'none'){
                //DANDO VALORES AOS CAMPOS PELO ID
                var corte = this.responseText.search('-');
                document.getElementById("bodyBuscaAnime").style.display = 'block';
                document.getElementById("tituloAnime").innerHTML = this.responseText.substr(0, corte-1);
                document.getElementById("descAnime").innerHTML = this.responseText.substr(corte+2);
                
            }
            else{
                document.getElementById("tituloAnime").innerHTML = this.responseText.substr(0, corte-1);
                document.getElementById("descAnime").innerHTML = this.responseText.substr(corte+2);
            }
        }
    };
    var searchAnime = document.getElementById("buscaAnime").value;
    xmlhttp.open("GET", "php/index/buscaAnime.php?busca="+ searchAnime, true);
    xmlhttp.send();
}

/*function teste() {
    var responseText = "Kimi no Wa - Kimi";
    var corte1 = responseText.search('-');
    
    //alert(responseText.substr(corte1+2));
    //alert(responseText.substr(0, corte1 - 1));
    var corte2; 
}
*/

function cadastrarUser() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response == "Prencha todos os Campos!") {
                alert("Prencha todos os Campos!");
            }
            else if(this.response == "Cadastrado"){
                alert("Cadastrado");
                location.href="index.html";
            }
        }
    };
    var nick = document.getElementById("recipient-nick").value;
    var usuario = document.getElementById("recipient-login").value;
    var senha = document.getElementById("recipient-senha").value;
    xmlhttp.open("GET", "php/index/cadUsuario.php?nick=" + nick + "&usuario=" + usuario + "&senha=" + senha, true);
    xmlhttp.send();
}

