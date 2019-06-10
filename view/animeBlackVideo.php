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
        <!-- AJAX GOOGLE -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- MY SCRIPT -->
        <script src="../js/registrar.js"></script>
        <script src="../js/atualizar.js"></script>
        <?php
            session_start();
            if(empty($_SESSION['idUsuario'])){
                return header('Location: login.php');
            }
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

            <div class="my-4" id="atualizarDiv">
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">Comentários Recentes</h6>
                    <?php
                    $rowComentario = $_SESSION['rowComentario'];
                    $i = 0;
                    if($rowComentario != 'Não tem comentários para esse anime'){
                        while ($i <= count($rowComentario) - 1) {
                            echo "<div class='media text-muted pt-3'>";
                                echo "<svg class='bd-placeholder-img mr-2 rounded' width='32' height='32' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' arial-label='Placeholder'> <title>Placeholder</title><rect width='100%' height='100%' fill='#007bff'></rect> <text x='50%' y='50%' fill='007bff' dy='.3em'></text></svg>";
                                echo "<p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>";
                                    echo "<strong class='d-block text-gray-dark'>@" . $rowComentario[$i]['nick'] . "</strong>";
                                    echo $rowComentario[$i]['comentario'];
                                    echo "<div class='float-right'>";
                                        echo $rowComentario[$i]['data'];
                                    echo "</div>";
                                echo "</p>";
                            echo "</div>";

                            $i++;
                        }
                    } else {
                        echo "<div class='media text-muted pt-3'>";
                            echo "<svg class='bd-placeholder-img mr-2 rounded' width='32' height='32' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' arial-label='Placeholder'> <title>Placeholder</title><rect width='100%' height='100%' fill='#007bff'></rect> <text x='50%' y='50%' fill='007bff' dy='.3em'></text></svg>";
                            echo "<p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>";
                                echo "<strong class='d-block text-gray-dark'>@Servidor</strong>";
                                echo "Ops! Este vídeo não possuí comentários";
                            echo "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>

                <small class="d-block text-right mt-3">
                    <a href="../controller/controller.php?req=comentarioCom">Mostrar Todos Comentários</a>
                </small>

                <!--Comentarios INPUTS !-->
                <div class="container">
                    <div class="row">

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