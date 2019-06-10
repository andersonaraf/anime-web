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
        <?php
            session_start();

        ?>
    </head>

    <body>
    <div class="my-4">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Comentários Recentes</h6>
            <?php
            $rowComentario = $_SESSION['rowComentCompleto'];
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

    </body>


</html>