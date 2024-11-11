<?php
    include("../php/conexao.php");

    $consulta = "SELECT * FROM Evento E INNER JOIN Imagens I ON I.id = E.imagem";
    $con = $conexao->query ($consulta) or die($conexao->error);
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styleadmin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">

    <title>Celebre</title>
</head>

<body>
    <header>

        <div class="navbar navbar-light shadow-sm">
          <div class="container d-flex justify-content-between">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a href="#" class="navbar-brand d-flex align-items-center">
              <strong>Álbum</strong>
            </a>
          </div>
        </div>
    </header>

    <main>  
        <div class="inicio">
            <a id="registrar" href="showRegistro.html">Registrar evento</a>
            <a id="registrar" href="cadastro.html">Novo administrador</a>
        </div>

        <div class="destaques">
            <p id="titulo-destaques">Destaques</p>

            <!-- cards -->
            <?php if ($con->num_rows > 0): ?>
                <?php while($dado = $con->fetch_array()){ ?>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../imagens/<?php echo $dado ["imgNomeAleatorio"]?>" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $dado ["nome"]?></h5>
                        <h6 class="card-subtitle mb-2 text-muted" ><?php echo $dado ["obs"]?></h6>
                        <p class="card-text data"><?php echo $dado ["dataEvento"]?><?php echo $dado ["horario"]?></p>
                        <p class="card-text"><?php echo $dado ["localidade"]?></p>
                        <div class="button-compra">
                            <a href="editshow.php">Editar</a>
                            <button>Excluir</button>
                        </div>
                    </div>
                </div>
                <?php } ?>
            <?php else: ?>
                <p>Nenhum evento encontrado.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>© Helena & Ana</p>
    </footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>