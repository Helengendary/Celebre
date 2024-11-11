<?php
    include("../php/conexao.php");

    session_start();
    $usuario_id = $_SESSION['id'];

    $consulta = "SELECT * FROM Carrinho C INNER JOIN Evento E ON E.idEvento = C.evento INNER JOIN Imagens I ON I.idImagem = E.imagem WHERE usuario = $usuario_id and comprado = 0";
    $con = $conexao->query ($consulta) or die($conexao->error);

    $valor = "SELECT SUM(valor) as total FROM Carrinho C WHERE usuario = $usuario_id and comprado = 0";
    $valorTotal = $conexao->query ($valor) or die($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Celebe</title>
    <link rel="stylesheet" href="../css/carrinho.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="leftHeader">
            <svg width="53" height="42" viewBox="0 0 53 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M52.8848 9.46888L46.7206 29.0456C46.2598 30.4398 45.05 31.3693 43.6098 31.3693H19.8174C18.4348 31.3693 17.1098 30.4979 16.6489 29.2199L7.54674 4.6473H2.30435C1.03696 4.6473 0 3.60166 0 2.32365C0 1.04564 1.03696 0 2.30435 0H9.15978C10.1391 0 11.0033 0.639004 11.3489 1.56846L20.7391 26.722H42.6304L47.5272 11.0373H20.3935C19.1261 11.0373 18.0891 9.9917 18.0891 8.71369C18.0891 7.43568 19.1261 6.39004 20.3935 6.39004H50.6957C51.4446 6.39004 52.1359 6.79668 52.5391 7.37759C53 7.95851 53.1152 8.77178 52.8848 9.46888ZM20.9696 34.4481C19.9902 34.4481 19.0109 34.8548 18.3196 35.5519C17.6283 36.249 17.225 37.2365 17.225 38.2241C17.225 39.2116 17.6283 40.1992 18.3196 40.8963C19.0109 41.5934 19.9902 42 20.9696 42C21.9489 42 22.9283 41.5934 23.6196 40.8963C24.3109 40.1992 24.7141 39.2116 24.7141 38.2241C24.7141 37.2365 24.3109 36.249 23.6196 35.5519C22.9283 34.8548 21.9489 34.4481 20.9696 34.4481ZM41.6511 34.4481C40.6717 34.4481 39.6924 34.8548 39.0011 35.5519C38.3098 36.249 37.9065 37.2365 37.9065 38.2241C37.9065 39.2116 38.3098 40.1992 39.0011 40.8963C39.6924 41.5934 40.6717 42 41.6511 42C42.6304 42 43.6098 41.5934 44.3011 40.8963C44.9924 40.1992 45.3957 39.2116 45.3957 38.2241C45.3957 37.2365 44.9924 36.249 44.3011 35.5519C43.6098 34.8548 42.6304 34.4481 41.6511 34.4481Z" fill="black"/>
            </svg>
            <b>Meu carrinho</b>
        </div>
    </header>
    <div class="container">
        <div class="leftContent">

        <?php if ($con->num_rows > 0): ?>
            <?php while($dado = $con->fetch_array()){ ?>
                <form class="card" method="post" action="../php/excluirCarrinho.php">
                    <div class="leftCard">
                        <img style="height: 100px; width: 100px;" src="../imagens/<?php echo $dado ["imgNomeAleatorio"]?>" alt="Foto do evento">
                        <input type="hidden" name="id" value="<?php echo $dado['idCarrinho'] ?>">
                    </div>
                    <div class="rightCard">
                        <div class="options">
                            <p><?php echo $dado ["nome"]?></p>
                        </div>
                        <div class="options">
                            <p style="color: #800080;"><?php echo $dado ["dataEvento"]?>  -  <?php echo $dado ["horario"]?></p>
                            <small><?php if ($dado ["valor"] == $dado ["preco"]/2) {
                                echo "meia";
                            } else {
                                echo "inteira";
                            }?></small>
                        </div>                   
                        <p>valor: R$<?php echo $dado ["valor"]?></p>
                        <button type="submit">Excluir</button>
                    </div>
                </form>
            <?php } ?>
        <?php else: ?>
            <p>Nenhum evento encontrado.</p>
        <?php endif; ?>

            <div class="total">
                <h1>Total:</h1>
                <?php
                    if ($row = $valorTotal->fetch_assoc()) {
                        $total = $row['total'];
                    } else {
                        $total = 0; // Define um valor padrão caso não haja resultados
                    }
                ?>

                <h1><?php echo $total; ?></h1>
            </div>
        </div>
        <div class="rightContent">
            <h1>Finalizar Pagamento</h1>
            <p>Forma de pagamento:</p>
            <div class="paymentMethods">
                <button class="method" data-toggle="modal" data-target="#debito">
                    <p>Débito</p>
                    <div class="methodDescription">
                        <small>Selecionar</small>
                        <svg width="37" height="50" viewBox="0 0 37 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M31.3174 26.4813L14.9947 37.5101C14.3182 37.9672 13.4318 37.9672 12.7553 37.5101L11.9678 36.978C10.794 36.185 10.794 34.4567 11.9678 33.6637L22.325 26.6655C23.4987 25.8725 23.4987 24.1442 22.325 23.3512L11.9678 16.353C10.794 15.56 10.794 13.8317 11.9678 13.0387L12.7553 12.5066C13.4318 12.0495 14.3182 12.0495 14.9947 12.5066L31.3174 23.5354C31.8954 23.9261 32.2201 24.4559 32.2201 25.0083C32.2201 25.5608 31.8954 26.0906 31.3174 26.4813Z" fill="#231F20" fill-opacity="0.84"/>
                        </svg>    
                    </div>
                   
                </button>
                <button class="method" data-toggle="modal" data-target="#credito">
                    <p>Crédito</p>
                    <div class="methodDescription">
                        <small>Selecionar</small>
                        <svg width="37" height="50" viewBox="0 0 37 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M31.3174 26.4813L14.9947 37.5101C14.3182 37.9672 13.4318 37.9672 12.7553 37.5101L11.9678 36.978C10.794 36.185 10.794 34.4567 11.9678 33.6637L22.325 26.6655C23.4987 25.8725 23.4987 24.1442 22.325 23.3512L11.9678 16.353C10.794 15.56 10.794 13.8317 11.9678 13.0387L12.7553 12.5066C13.4318 12.0495 14.3182 12.0495 14.9947 12.5066L31.3174 23.5354C31.8954 23.9261 32.2201 24.4559 32.2201 25.0083C32.2201 25.5608 31.8954 26.0906 31.3174 26.4813Z" fill="#231F20" fill-opacity="0.84"/>
                        </svg>    
                    </div>  
                </button>
                <button class="method" data-toggle="modal" data-target="#boleto">
                    <p>Boleto</p>
                    <div class="methodDescription">
                        <small>Selecionar</small>
                        <svg width="37" height="50" viewBox="0 0 37 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M31.3174 26.4813L14.9947 37.5101C14.3182 37.9672 13.4318 37.9672 12.7553 37.5101L11.9678 36.978C10.794 36.185 10.794 34.4567 11.9678 33.6637L22.325 26.6655C23.4987 25.8725 23.4987 24.1442 22.325 23.3512L11.9678 16.353C10.794 15.56 10.794 13.8317 11.9678 13.0387L12.7553 12.5066C13.4318 12.0495 14.3182 12.0495 14.9947 12.5066L31.3174 23.5354C31.8954 23.9261 32.2201 24.4559 32.2201 25.0083C32.2201 25.5608 31.8954 26.0906 31.3174 26.4813Z" fill="#231F20" fill-opacity="0.84"/>
                        </svg>    
                    </div>  
                  </button>
                <button class="method" data-toggle="modal" data-target="#pix">
                    <p>Pix</p>
                    <div class="methodDescription">
                        <small>Selecionar</small>
                        <svg width="37" height="50" viewBox="0 0 37 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M31.3174 26.4813L14.9947 37.5101C14.3182 37.9672 13.4318 37.9672 12.7553 37.5101L11.9678 36.978C10.794 36.185 10.794 34.4567 11.9678 33.6637L22.325 26.6655C23.4987 25.8725 23.4987 24.1442 22.325 23.3512L11.9678 16.353C10.794 15.56 10.794 13.8317 11.9678 13.0387L12.7553 12.5066C13.4318 12.0495 14.3182 12.0495 14.9947 12.5066L31.3174 23.5354C31.8954 23.9261 32.2201 24.4559 32.2201 25.0083C32.2201 25.5608 31.8954 26.0906 31.3174 26.4813Z" fill="#231F20" fill-opacity="0.84"/>
                        </svg>    
                    </div>  
                </button>
            </div>
        </div>
    </div>

    <!-- modal crédito -->
  <div class="modal fade" id="credito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form class="modal-content" action="../php/pagar.php?total=<?php echo $dado ["valor"]?>">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Crédito
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </form>
    </div>
  </div>
    
  <!-- modal débito -->
  <div class="modal fade" id="debito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Débito
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- modal boleto -->
  <div class="modal fade" id="boleto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Boleto
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- modal pix -->
  <div class="modal fade" id="pix" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Pix
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>