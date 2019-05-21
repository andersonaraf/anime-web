<!DOCTYPE html>
<html lang="pt-br">

<head>
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

    <title>Anime Black</title>
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

    <!-- Page Content -->
    <div class="container ">

        <!-- Page Heading -->
        <h1 class="my-4">Lançamentos</h1>
        <div class="row">
            <?php
                session_start();
                echo "<pre>";
                   //print_r($_SESSION['rowAnime']);
                echo "</pre>";
            ?>
            <!-- VIDEO!-->
            <!--
                https://drive.google.com/file/d/1vZepZENjNCCQfw4bVlQj0EVF8wJtb1qn/view?usp=sharing
                https://drive.google.com/open?id=1vZepZENjNCCQfw4bVlQj0EVF8wJtb1qn
                https://drive.google.com/open?id=1_LLHh9bZC_115NcLGPeXrfEZe6MceQTe
                https://drive.google.com/open?id=1yVqkYJDSQ-1prlkeRCJwly3g6IEVb457
                https://drive.google.com/uc?export=download&id= COLOCAR O ID DO LINK COMPARTILHADO
                Shingeki No Kyojin - Episodio 1
                https://drive.google.com/open?id=1zS0Xf58HqqtzmfqUlTIVD5jukmaVIQxp



                <video width="700" height="400" controls="controls" poster="https://drive.google.com/uc?export=download&id=1vZepZENjNCCQfw4bVlQj0EVF8wJtb1qn">
                    <source src="https://drive.google.com/uc?export=download&id=1vZepZENjNCCQfw4bVlQj0EVF8wJtb1qn" type='video/mp4'>
                </video>
            !-->
            <?php
            $rowAnime = $_SESSION['rowAnime'];
            $countRow = count($_SESSION['rowAnime']);
            $i = 0;
            while ($i <= $countRow - 1){
                echo "<div class='col-lg-4 col-sm-6 mb-4'>";
                    echo "<div class='card h-100'>";
                        echo "<a href='#'><img class='card-img-top' src='http://placehold.it/700x400' alt=''></a>";
                        echo "<div class='card-body'>";
                            echo "<h4 class='card-title'>";
                                echo "<a href='../controller/controller.php?req=escolherVideo&idVideo=".$rowAnime[$i]['idAnime']."'>". $rowAnime[$i]['nome'] ."</a>";
                            echo "</h4>";
                            echo "<p class='card-text'>" .$rowAnime[$i]['descricao']. "</p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                $i = $i + 1;
            }


            ?>
        </div>
            <!--
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">Project One</a>
                        </h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                    </div>
                </div>
            </div>
            !-->


        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>

    </div>
    <!-- /.container -->
</body>

</html>