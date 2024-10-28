<?php 
include_once('conexao.php');

if ($conexao) {

    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS Show (
        id integer AUTO_INCREMENT primary Key,
        obs VARCHAR(255),
        dataEvento VARCHAR(100),
        valor VARCHAR(100),
        localidade VARCHAR(100),
        horario VARCHAR(100),
    )
    
    CREATE TABLE IF NOT EXISTS Cantores (
        id integer AUTO_INCREMENT primary Key,
        show integer,
        FOREIGN KEY (show) REFERENCES Show(id),
        cantor VARCHAR(255)
    )";
    
    if (mysqli_query($conexao, $sqlCreateTable)) {
        $sqlInsert = "INSERT INTO Usuario 
            (obs, dataEvento, valor, localidade, horario) 
            VALUES 
            ('{$_POST['obs']}', '{$_POST['dataEvento']}', '{$_POST['valor']}', '{$_POST['localidade']}', '{$_POST['horario']}')";

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