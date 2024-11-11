<?php 
include_once('conexao.php');

if ($conexao) {

$sqlCreateTable = "CREATE TABLE IF NOT EXISTS Pagamento (
    idPagamento integer AUTO_INCREMENT primary Key,
    valor integer,
    dataPagamento varchar(255),
    usuario integer,
    FOREIGN KEY (usuario) REFERENCES Usuario (idUsuario)
);";

if (mysqli_query($conexao, $sqlCreateTable)) {

    session_start();
    $usuario_id = $_SESSION['id'];

    $queryEvento = mysqli_query($conexao, "SELECT * FROM evento WHERE idEvento = {$_POST['id']}  ;");
    
    if ($exibe = mysqli_fetch_array($queryEvento)) {
        if ($_POST['tipo'] == 'meia') {
            $valor = ($exibe[4])/2;
            echo $valor;
        } else {
            $valor = $exibe[4];
            echo $valor;
        }
    }    

    $sqlInsert = "INSERT INTO Carrinho 
        (usuario, comprado, evento, valor) 
        VALUES 
        ( $usuario_id, 0, {$_POST['id']}, $valor)";

    if (mysqli_query($conexao, $sqlInsert)) {
        echo "Sucesso!";
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