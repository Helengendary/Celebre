<?php
include("php/conexao.php")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastrar-se</title>
</head>

<body>
    <div class="container">
        <img src="imagens/celebre2.png" class="imgCelebre">
        <div class="containerCadastro">
            <form id="dadosPessoais" action="php/cadastroUsuarios.php" method="post">
                <h1>Criar conta</h1>
                
                <div class="form-sections">
                    <div class="cadastroleft">
                        <p>Preencha seus dados pessoais:</p>

                        <label for="nome">
                            <input type="text" name="nome" id="nome" placeholder="Nome">
                        </label>

                        <label for="sobrenome">
                            <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome">
                        </label>

                        <label for="email">
                            <input type="email" name="email" id="email" placeholder="Email">
                        </label>

                        <label for="celular">
                            <input type="tel" name="celular" id="celular" placeholder="Celular">
                        </label>

                        <label for="senha">
                            <input type="password" name="senha" id="senha" placeholder="Senha">
                        </label>

                        <label for="confirmarSenha">
                            <input type="password" name="confirmarSenha" id="confirmarSenha" placeholder="Confirmar senha">
                        </label>
                    </div>

                    <!-- Seção direita: Endereço -->
                    <div class="cadastroright">
                        <p>Preencha seu endereço:</p>
                        
                        <label for="cep">
                            <input type="number" name="cep" id="cep" placeholder="CEP">
                        </label>

                        <label for="cidade">
                            <input type="text" name="cidade" id="cidade" placeholder="Cidade">
                        </label>

                        <label for="endereco">
                            <input type="text" name="endereco" id="endereco" placeholder="Endereço">
                        </label>

                        <label for="bairro">
                            <input type="text" name="bairro" id="bairro" placeholder="Bairro">
                        </label>

                        <label for="numero">
                            <input type="text" name="numero" id="numero" placeholder="Número">
                        </label>

                        <label for="estado">
                            <input type="text" name="estado" id="estado" placeholder="Estado">
                        </label>

                        <label for="pais">
                            <input type="text" name="pais" id="pais" placeholder="País">
                        </label>
                    </div>
                </div>

                <!-- Seção inferior: Gênero e botão -->
                <div class="cadastroleftfooter">
                    <p>Selecione seu gênero:</p>
                    <label for="genero">
                        <input type="radio" name="genero" id="generofeminino" value="Feminino"> Feminino
                        <input type="radio" name="genero" id="generomasculino" value="Masculino"> Masculino
                        <input type="radio" name="genero" id="generoOutros" value="Outros"> Outros
                        <input type="radio" name="genero" id="prefironaodizer" value="Prefiro não dizer"> Prefiro não dizer
                    </label>
                </div>

                <button type="submit" class="btn" value="Cadastrar"></button>

                <p class="direcionarLogin">Já possui cadastro? <a href="login.html">Entrar</a></p>
            </form>
        </div>
    </div>
</body>

</html>