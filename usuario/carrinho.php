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
        <div class="rightHeader">
            <div class="topics">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:5px">
                    <path d="M10.6966 0C4.79206 0 0 4.928 0 11C0 17.072 4.79206 22 10.6966 22C16.601 22 21.3931 17.072 21.3931 11C21.3931 4.928 16.601 0 10.6966 0ZM10.6966 19.8C5.97937 19.8 2.13931 15.851 2.13931 11C2.13931 6.149 5.97937 2.2 10.6966 2.2C15.4137 2.2 19.2538 6.149 19.2538 11C19.2538 15.851 15.4137 19.8 10.6966 19.8ZM9.6269 15.4H11.7662V17.6H9.6269V15.4ZM11.349 4.444C9.14555 4.114 7.19878 5.511 6.61047 7.513C6.41793 8.151 6.88858 8.8 7.54107 8.8H7.755C8.19356 8.8 8.54655 8.481 8.6963 8.063C9.03859 7.084 10.0548 6.413 11.1565 6.655C12.1727 6.875 12.9214 7.898 12.8359 8.965C12.7289 10.439 11.103 10.758 10.2152 12.133C10.2152 12.144 10.2045 12.144 10.2045 12.155C10.1938 12.177 10.1831 12.188 10.1724 12.21C10.0762 12.375 9.97988 12.562 9.90501 12.76C9.89431 12.793 9.87292 12.815 9.86222 12.848C9.85152 12.87 9.85152 12.892 9.84083 12.925C9.71247 13.299 9.6269 13.75 9.6269 14.3H11.7662C11.7662 13.838 11.8839 13.453 12.0657 13.123C12.0871 13.09 12.0978 13.057 12.1192 13.024C12.2048 12.87 12.3117 12.727 12.4187 12.595C12.4294 12.584 12.4401 12.562 12.4508 12.551C12.5578 12.419 12.6754 12.298 12.8038 12.177C13.8306 11.176 15.2212 10.362 14.9324 8.261C14.6757 6.347 13.2102 4.73 11.349 4.444Z" fill="black"/>
                </svg>
                suporte
            </div>
            <div class="topics">
                <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg"  style="margin-right:5px">
                    <path d="M11.4239 19.3258L11.4446 19.3465L19.8822 10.9088C22.0026 8.78854 22.0026 5.351 19.8822 3.23078C17.7621 1.11056 14.3246 1.11058 12.2043 3.23078L11.4239 4.01121L10.6438 3.23105C8.52341 1.11069 5.08564 1.11069 2.96527 3.23105C0.844909 5.35142 0.844909 8.78922 2.96527 10.9096L11.4027 19.3469L11.4239 19.3258Z" stroke="black" stroke-width="2"/>
                </svg>
                favoritos
            </div>
            <div class="topics">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"  style="margin-right:5px">
                    <path d="M12.5 0C9.18593 0.00370554 6.00866 1.32186 3.66526 3.66526C1.32186 6.00866 0.00370554 9.18593 0 12.5C0.0055527 15.8135 1.3243 18.9897 3.6673 21.3327C6.0103 23.6757 9.1865 24.9944 12.5 25C15.8152 25 18.9946 23.683 21.3388 21.3388C23.683 18.9946 25 15.8152 25 12.5C25 9.18479 23.683 6.00537 21.3388 3.66117C18.9946 1.31696 15.8152 0 12.5 0ZM20.103 19.713C19.401 18.297 18.3172 17.1054 16.974 16.2726C15.6307 15.4397 14.0815 14.9989 12.501 14.9997C10.9206 15.0005 9.37177 15.443 8.02941 16.2773C6.68705 17.1115 5.60453 18.3043 4.904 19.721C3.03491 17.7825 1.99344 15.1928 2 12.5C2 9.71523 3.10625 7.04451 5.07538 5.07538C7.04451 3.10625 9.71523 2 12.5 2C15.2848 2 17.9555 3.10625 19.9246 5.07538C21.8938 7.04451 23 9.71523 23 12.5C23.0063 15.189 21.9675 17.7753 20.103 19.713ZM12.5 5C11.61 5 10.74 5.26392 9.99993 5.75839C9.25991 6.25285 8.68314 6.95566 8.34254 7.77792C8.00195 8.60019 7.91283 9.50499 8.08647 10.3779C8.2601 11.2508 8.68868 12.0526 9.31802 12.682C9.94736 13.3113 10.7492 13.7399 11.6221 13.9135C12.495 14.0872 13.3998 13.9981 14.2221 13.6575C15.0443 13.3169 15.7471 12.7401 16.2416 12.0001C16.7361 11.26 17 10.39 17 9.5C17 8.90905 16.8836 8.32389 16.6575 7.77792C16.4313 7.23196 16.0998 6.73588 15.682 6.31802C15.2641 5.90016 14.768 5.56869 14.2221 5.34254C13.6761 5.1164 13.0909 5 12.5 5Z" fill="black"/>
                </svg>
                <svg width="13" height="9" viewBox="0 0 13 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.6725 1.91382L6.50005 7.08623L1.32764 1.91382" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                     
            </div>
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
                        <p>valor: R$<?php echo $dado ["valor"]?>,00</p>
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
            <p style="margin-top: 10vh; margin-left: 3vh;">Total: R$625</p>
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
      <div class="modal-content">
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
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
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