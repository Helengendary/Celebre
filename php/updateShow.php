<?php 
include_once('conexao.php');

if ($conexao) {
    $show_id = $_GET['id'];

    $sqlInsert = "UPDATE Evento SET
        nome='{$_POST['nome']}', obs= '{$_POST['obs']}', dataEvento='{$_POST['dataEvento']}', preco='{$_POST['valor']}', localidade='{$_POST['localidade']}', horario='{$_POST['horario']}' WHERE idEvento = $show_id";

    if (mysqli_query($conexao, $sqlInsert)) {
        echo "Sucesso!";
        header('Location: ../admin/index.php');
        exit();
    } else {
        echo "Erro ao realizar o cadastro: " . mysqli_error($conexao);
    }

} else {
    echo "Erro na conexão com o banco de dados.";
}
?>