<?php
    include("php/conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Acessar conta</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="container">
            <div class="leftContent">
                <img src="imagens/celebre1.png">
            </div>
            <div class="rightContent">
                <form action="./controllers/login.php" method="POST">
                    <div class="headerForm">
                        <h1>Acessar conta</h1>
                    </div>
                    <div class="bodyForm">
                        <input type="email" placeholder="Email" name="email" class="svgSenha">
                        <input type="password" placeholder="Senha" name="senha">
                    </div>
                    <div class="footerForm" >
                        <a href="esqueceuSenha.html">Esqueceu sua senha?</a>
                        <button class="botaoEntrar" type="submit">Entrar</button>
                        <p>Não possui conta?</p>
                        <a href="cadastro.php">Cadastre-se!</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>