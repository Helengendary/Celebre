<?php 
include_once('conexao.php');

if ($conexao) {
  
    $sqlInsert = "DELETE FROM Carrinho WHERE idCarrinho = {$_POST['id']}";

    if (mysqli_query($conexao, $sqlInsert)) {
        header('Location: ../usuario/carrinho.php');
        exit();
    }

} else {
    echo "Erro ao criar a tabela: " . mysqli_error($conexao);
}
?> 