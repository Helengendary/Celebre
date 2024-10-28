<?php 
include_once('conexao.php');

if ($conexao) {

    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS Usuario (
        id integer AUTO_INCREMENT primary Key,
        nome VARCHAR(100),
        sobrenome VARCHAR(100),
        email VARCHAR(100),
        celular VARCHAR(100),
        senha VARCHAR(100),
        cep VARCHAR(100),
        cidade VARCHAR(100),
        endereco VARCHAR(100),
        bairro VARCHAR(100),
        numero VARCHAR(100),
        estado VARCHAR(100),
        pais VARCHAR(100),
        genero VARCHAR(100)
    )";
    
    if (mysqli_query($conexao, $sqlCreateTable)) {
        $sqlInsert = "INSERT INTO Usuario 
            (nome, sobrenome, email, celular, senha, cep, cidade, endereco, bairro, numero, estado, pais, genero) 
            VALUES 
            ('{$_POST['nome']}', '{$_POST['sobrenome']}', '{$_POST['email']}', '{$_POST['celular']}', '{$_POST['senha']}', '{$_POST['cep']}', '{$_POST['cidade']}', '{$_POST['endereco']}', '{$_POST['bairro']}', '{$_POST['numero']}', '{$_POST['estado']}', '{$_POST['pais']}', '{$_POST['genero']}')";

        if (mysqli_query($conexao, $sqlInsert)) {
            echo "Sucesso!";
            header('Location: ../index.html');
            exit();
        } else {
            echo "Erro ao realizar o cadastro: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro ao criar a tabela: " . mysqli_error($conexao);
    }
} else {
    echo "Erro na conexão com o banco de dados.";
}
?>
Ob