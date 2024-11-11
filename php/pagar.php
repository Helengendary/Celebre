<?php 
include_once('conexao.php');

if ($conexao) {

$sqlCreateTable = "CREATE TABLE IF NOT EXISTS Pagamento (
    idPagamento integer AUTO_INCREMENT primary Key,
    valor integer,
    dataPagamento DATETIME,
    usuario integer,
    FOREIGN KEY (usuario) REFERENCES Usuario (idUsuario)
);";

if (mysqli_query($conexao, $sqlCreateTable)) {

    session_start();
    $usuario_id = $_SESSION['id'];
    $valor_compra = $_GET['total'];

    $sqlInsert = "INSERT INTO Pagamento 
        (valor, dataPagamento, usuario) 
        VALUES 
        ( $valor_compra, NOW(), $usuario_id)";

    if (mysqli_query($conexao, $sqlInsert)) {

        


        header('Location: ../usuario/index.php');
        exit();
    }

} else {
    echo "Erro ao criar a tabela: " . mysqli_error($conexao);
}
} else {
    echo "Erro na conexão com o banco de dados.";
}
?> 