<!doctype html>
<html lang="br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--BOTSTRAP-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--FONTAWESOME-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- MY JS-AJAX -->
        <script src="../js/video.js"></script>
        <!-- AJAX -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <?php
            session_start();
            $rowAnimeUnico = $_SESSION['video'];
        ?>
        <title><?php echo $rowAnimeUnico['nome']?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
            <div class="container">
                <a class="navbar-brand" href="animeBlack.php">Animes Black</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Minha Conta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <div class="container">
            <h1 class="my-4"> <?php echo $rowAnimeUnico['nome'] ?> </h1>
            <!-- Portfolio Item Row -->
            <div class="row">
                <div class="col-md-8">
                    <?php
                        echo "<video class='img-fluid' width='750' height='500' controls='controls'>";
                            echo "<source src='" .$rowAnimeUnico['URL']. "' type='video/mp4'>";
                        echo "</video>";
                    ?>
                </div>
                <div class="col-md-4">
                    <h3 class="my-3">Descrição: </h3>
                    <p><?php echo $rowAnimeUnico['descricao'];?></p>
                </div>
            </div>
            <div class="my-4">
                <h3 class="my-3">Comentarios: </h3>
                <!--Comentarios INPUTS !-->
                <div class="container" id="setTime">
                    <div class="row">
                        <?php
                            $rowComent = $_SESSION['rowComentario'];
                            print_r($rowComent);
                        ?>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="comment">Comentar:</label>
                <textarea class="form-control" rows="5" id="comment" placeholder="DIGITE SEU COMENTÁRIO"></textarea>
                <br>
                <input type="button" onclick="uploadComment()" value="Comentar" class="btn btn-secondary float-right">
            </div>
        </div>
    </body>
</html>