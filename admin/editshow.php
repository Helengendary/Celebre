<?php
    $consulta = "SELECT * FROM Evento E INNER JOIN Imagens I ON I.id = E.imagem";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Editar Show</title>
</head>

<body>
    <div class="container">
        <img src="../imagens/celebre2.png" class="imgCelebre">
        <div class="containerCadastro">
            <form id="dadosPessoais" action="../php/cadastroShow.php" method="post" enctype="multipart/form-data">
                <h1>Editar Show</h1>
                <?php
                    if (isset($_GET['id'])){
                    $show_id = mysqli_real_scape_string($conexao, $_GET['id']);
                    $sql = "SELECT * FROM Evento WHERE id='$show_id";
                    $query = mysqli_query($conexao, $sql);
                    
                    if(mysqli_num_rows($query)>0){
                        $evento = mysqli_fetch_array($query);
                ?>
                <div class="form-sections">
                    <div class="cadastroleft">
                        <label for="nome">
                            <input type="text" name="nome" value="<?=$evento=['nome']?>" id="nome" placeholder="Nome do evento">
                        </label>

                        <label for="obs">
                            <input type="text" name="obs" value="<?=$evento=['obs']?>" id="obs" placeholder="Observações">
                        </label>

                        <label for="dataEvento">
                            <input type="text" name="dataEvento" value="<?=$evento=['dataEvento']?>" id="dataEvento" placeholder="Data do evento">
                        </label>

                        <label for="valor">
                            <input type="email" name="valor" value="<?=$evento=['valor']?>" id="valor" placeholder="Valor">
                        </label>

                        <label for="localidade">
                            <input type="tel" name="localidade" value="<?=$evento=['localidade']?>" id="localidade" placeholder="localidade">
                        </label>

                        <label for="horario">
                            <input type="password" name="horario" value="<?=$evento=['horario']?>" id="horario" placeholder="horario">
                        </label>
                        <?php
                            } else {
                                echo "<h5>Registro não econtrado!</h5>";
                            }
                        }
                        ?>
                        <div>
                            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
                            <input type="file" name="arquivo[]" multiple="multiple" />
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn" value="Adicionar Apresentador"> <!-- se o form não chegar, mude aqui para button type submit-->

                <a href="index.html">cancelar</a>
            </form>
        </div>
    </div>
</body>

</html>