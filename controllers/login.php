<?php
include("../php/conexao.php");
session_start();
$usuario = $_POST["email"];
$senha = $_POST["senha"];
$query = mysqli_query($conexao, "SELECT * FROM usuario where email = '$usuario';");

if ($exibe = mysqli_fetch_array($query)){
    if($_POST["email"] == $exibe[3] && $_POST["senha"] == $exibe[5]){
        session_start();
        $_SESSION['id'] = $exibe[0];
        $_SESSION['email']= $exibe[3];
        $_SESSION['senha']= $exibe[5];

        $caracteres = str_split($usuario);
        $arroba = false;
        $dominio = "";

        foreach ($caracteres as $caractere) {
            if ($caractere == "@") {
                $arroba = true;
            } else if ($arroba) {
                $dominio .= $caractere;
            }
        }

        if ($dominio == "admin") {
            echo '<script>window.location.href="../admin/index.php"; alert("Logado como '. $exibe[0] . ' ' . $exibe[1] .'"); </script>';    
        } else {
            echo '<script>window.location.href="../usuario/index.php"; alert("Logado como '. $exibe[0] . ' ' . $exibe[1] .'"); </script>';    
        }


    } else {
        echo '<script>window.location.href="../"; alert("Senha inválida!"); </script>';    
    }
} else {
    echo '<script>window.location.href="../"; alert("Usuário inexistente!"); </script>';    
}
?>