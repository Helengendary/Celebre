<?php
    include("celebre/conexao.php")

    $consulta = "SELECT * FROM Evento";
    $con = $mysqli->query ($consulta) or die($mysqli->error);
?>


<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
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
            <div class="buscar">
                <img id="lupa" src="../imagens/lupa.svg" alt="Pesquisar">
                <input id="pesquisa" type="text" placeholder="Buscar evento">
            </div>

            <h1>Bem-vindo(a)</h1>
            <h1>ao</h1>

            <img id="logo-inicio" src="../imagens/logo-slogan.svg" alt="Celebre: sua porta de acesso para o entretenimento!">

            <p id="subtitulo">a sua porta de acesso para o entretenimento!</p>
        </div>

        <div class="destaques">
            <p id="titulo-destaques">Destaques</p>

            <!-- cards -->
            <div class="card-elementos">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../imagens/bruninho.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title">Bruno Mars</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Música</h6>
                        <p class="card-text data">DOM, 31/10    21:00</p>
                        <p class="card-text">Curitiba - PR</p>
                        <div class="button-compra">
                            <button>Comprar</button>
                        </div>
                    </div>
                </div>
    
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../imagens/bruninho.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title">Bruno Mars</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Música</h6>
                        <p class="card-text data">DOM, 31/10    21:00</p>
                        <p class="card-text">Curitiba - PR</p>
                        <div class="button-compra">
                            <button>Comprar</button>
                        </div>
                    </div>
                </div>
    
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../imagens/bruninho.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title">Bruno Mars</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Música</h6>
                        <p class="card-text data">DOM, 31/10    21:00</p>
                        <p class="card-text">Curitiba - PR</p>
                        <div class="button-compra">
                            <button>Comprar</button>
                        </div>
                    </div>
                </div>
    
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../imagens/bruninho.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title">Bruno Mars</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Música</h6>
                        <p class="card-text data">DOM, 31/10    21:00</p>
                        <p class="card-text">Curitiba - PR</p>
                        <div class="button-compra">
                            <button>Comprar</button>
                        </div>
                    </div>
                </div>
    
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../imagens/bruninho.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title">Bruno Mars</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Música</h6>
                        <p class="card-text data">DOM, 31/10    21:00</p>
                        <p class="card-text">Curitiba - PR</p>
                        <div class="button-compra">
                            <button>Comprar</button>
                        </div>
                    </div>
                </div>
    
                <?php while($dado = $con->fetch_array){ ?>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../imagens/bruninho.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $dado ["nome"]?></h5>
                        <h6 class="card-subtitle mb-2 text-muted" ><?php echo $dado ["obs"]?></h6>
                        <p class="card-text data"><?php echo $dado ["dataEvento"]?><?php echo $dado ["horario"]?></p>
                        <p class="card-text"><?php echo $dado ["localidade"]?></p>
                        <div class="button-compra">
                            <button>Comprar</button>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
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