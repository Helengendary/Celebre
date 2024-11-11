<?php 
include_once('conexao.php');

if ($conexao) {

$sqlCreateTable = "CREATE TABLE IF NOT EXISTS Carrinho (
    id integer AUTO_INCREMENT primary Key,
    usuario integer,
    FOREIGN KEY (usuario) REFERENCES Usuario (id),
    comprado bit,
    evento integer,
    FOREIGN KEY (evento) REFERENCES Evento (id),
    valor float,
    compra integer
);";

if (mysqli_query($conexao, $sqlCreateTable)) {

    session_start();
    $usuario_id = $_SESSION['id'];

    $queryEvento = mysqli_query($conexao, "SELECT * FROM evento WHERE id = '{$_POST['id']}';");
    
    if ($exibe = mysqli_fetch_array($queryEvento)) {
        if ({$_POST['tipo']} == 'meia') {
            $valor = ($exibe[4])/2;
        } else {
            $valor = $exibe[4];
        }
    }    

    $sqlInsert = "INSERT INTO Carrinho 
        (usuario, comprado, evento, valor) 
        VALUES 
        ( $usuario_id, 0, '{$_POST['id']}', $valor)";

    if (mysqli_query($conexao, $sqlInsert)) {
        echo "Sucesso!";
        header('Location: ../admin/index.html');
        exit();
    }

} else {
    echo "Erro ao criar a tabela: " . mysqli_error($conexao);
}
} else {
    echo "Erro na conexão com o banco de dados.";
}
?> 