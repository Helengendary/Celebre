<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Celebe</title>
    <link rel="stylesheet" href="../css/comprar.css">
</head>
<body>
    <header>
        <div class="leftHeader">
            <img id="logo-inicio" src="../imagens/logo-slogan.svg" alt="Celebre: sua porta de acesso para o entretenimento!">
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

    <?php
        if (isset($_GET['id'])){
        $show_id = mysqli_real_scape_string($conexao, $_GET['id']);
        $sql = "SELECT * FROM Evento WHERE id='$show_id INNER JOIN Imagens I ON I.id = E.imagem";
        $query = mysqli_query($conexao, $sql);
        $mysql = "SELECT * FROM Apresentador WHERE evento='$show_id'";
        $queryapresentador = mysqli_query($conexao, $sql);
        
        if(mysqli_num_rows($query)>0){
            $evento = mysqli_fetch_array($query);
            $apresentador = mysqli_fetch_array($queryapresentador);
     ?>

    <form class="container" action="addCarrinho.php" method="POST">
        <div>
            <img src="<?=$evento=['imgNomeAleatorio']?>" alt="Imagem do evento">
            <input type="hidden" name="id" value="<?= $evento['id'] ?>">
        </div>

        <div>
            <div class="options">
                <p><?=$evento=['nome']?></p>
                <small><?=$evento=['obs']?></small>
                <?php while($dado = $con->fetch_array()){ ?>
                    <small><?=echo $apresentador ["nome"]?></small>
                <?php } ?>
            </div>
            <div class="options">
                <p style="color: #800080;"><?=$evento=['dataEvento']?>  -  <?=$evento=['horario']?></p>
                <small><?=$evento=['localidade']?></small>
            </div>                   
            <p>Valor: R$<?=$evento=['valor']?>,00</p>
        </div>
        
        <div class="cadastroleftfooter">
            <p>Tipo do ingresso:</p>
            <label for="genero">
                <input type="radio" name="tipo" value="meia"> Meia
                <input type="radio" name="tipo" value="inteira"> inteira
            </label>
        </div>

        <button class="buttonCont" type="submit">Adionar ao carrinho</button>
    </form>

    <<?php
        } else {
            echo "<h5>Registro não econtrado!</h5>";
        }
    }
    ?>
</body>
</html>