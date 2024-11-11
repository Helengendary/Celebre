<?php 
include_once('conexao.php');

if ($conexao) {

    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS Evento (
        id integer AUTO_INCREMENT primary Key,
        nome VARCHAR(100),
        obs VARCHAR(255),
        dataEvento VARCHAR(100),
        valor VARCHAR(100),
        localidade VARCHAR(100),
        horario VARCHAR(100)
    );";
    
    if (mysqli_query($conexao, $sqlCreateTable)) {
        $sqlInsert = "INSERT INTO Evento 
            (obs, dataEvento, valor, localidade, horario) VALUES 
            ('{$_POST['obs']}', '{$_POST['dataEvento']}', '{$_POST['valor']}', '{$_POST['localidade']}', '{$_POST['horario']}')";

        if (mysqli_query($conexao, $sqlInsert)) {
            echo "Sucesso!";
            header('Location: ../admin/apresentadorRegistrar.html');
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