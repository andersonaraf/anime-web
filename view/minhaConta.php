<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--BOTSTRAP-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--FONTAWESOME-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <?php
        #VALIDAR SESSÃO
        session_start();
        if(empty($_SESSION['idUsuario'])){
            return header('Location: login.php');
        }
        $usuario = $_SESSION['row'];
        ?>
        <title>Minha Conta</title>
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
                            <a class="nav-link" href="../controller/controller.php?req=sair">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br><br><br><br>

        <div class="container">
            <form>
                <div class="form-group">
                    <label for="inputNick">Nick</label>
                    <input type="text" class="form-control" id="inputNick" aria-describedby="inputNick" placeholder="Seu nick" value="<?php echo $usuario['nick']; ?>">
                    <small id="inputNick" class="form-text text-muted">Seu Nick</small>
                </div>
                <div class="form-group">
                    <label for="inputSenha">Senha</label>
                    <input type="password" class="form-control" id="inputSenha" placeholder="Senha" value="<?php echo $usuario['senha']; ?>">
                    <small id="inputNick" class="form-text text-muted">Sua Senha</small>
                </div>
                <div class="form-group">
                    <label for="inputDesc">Descrição:</label>
                    <textarea class="form-control" rows="5" id="inputDesc" placeholder="Descrição Pessoal"><?php echo $usuario['descricao']; ?> </textarea>
                    <small id="inputNick" class="form-text text-muted">Sua Descrição</small>
                </div>
                <div class="form-group">
                    <label for="inputDataNas">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="inputSenha" placeholder="Senha" descricao>
                    <small id="inputNick" class="form-text text-muted">Sua Data de Nascimento</small>
                </div>
                <input type="submit" class="btn btn-primary" value="Alterar" value="<?php echo $usuario['dataNascimento']; ?>">
            </form>
        </div>
        <!-- UPDATE usuario SET nick = ?, senha = ?, descricao = ?, dataNascimento = ? WHERE usuario.id = ? -->
    </body>
</html>