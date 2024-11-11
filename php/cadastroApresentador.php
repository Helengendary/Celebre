<?php 
include_once('conexao.php');

if ($conexao) {

    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS Apresentador (
        idApresentador integer AUTO_INCREMENT primary Key,
        evento integer,
        FOREIGN KEY (evento) REFERENCES Evento (idEvento)
		ON DELETE SET NULL,
        nome VARCHAR(100)
    );";
    
    if (mysqli_query($conexao, $sqlCreateTable)) {
        $queryIdEvento = mysqli_query($conexao, "SELECT idEvento FROM evento ORDER BY idEvento DESC LIMIT 1;");

        if ($exibe = mysqli_fetch_array($queryIdEvento)){
            $sqlInsert = "INSERT INTO Apresentador 
                (evento, nome) VALUES 
                ({$exibe[0]}, '{$_POST['nome']}')";

            if (mysqli_query($conexao, $sqlInsert)) {
                echo "Sucesso!";
                header('Location: ../admin/apresentadorRegistrar.html');
                exit();
            } else {
                echo "Erro ao realizar o cadastro: " . mysqli_error($conexao);
            }
        }

    } else {
        echo "Erro ao criar a tabela: " . mysqli_error($conexao);
    }
} else {
    echo "Erro na conexão com o banco de dados.";
}
?>