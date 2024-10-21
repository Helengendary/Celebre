<?php
    include_once('conexao.php');

    try {
        //depois do INSERT INTO, mudar o nome da coluna,    
        //e caso as colunas sejam diferentes das que eu deixei especificado ali dps do INSERT INTO ExampleTable(params)
        $stmt = $db->prepare("INSERT INTO ExampleTable 
            (nome, sobrenome, email, celular, senha, confirmarSenha, cep, cidade, endereco, bairro, numero, estado, pais, genero) 
            VALUES 
            (:nome, :sobrenome, :email, :celular, :senha, :cep, :cidade, :endereco, :bairro, :numero, :estado, :pais, :genero)");

        $stmt->bindParam(':nome', $_POST['nome']);
        $stmt->bindParam(':sobrenome', $_POST['sobrenome']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':celular', $_POST['celular']);
        $stmt->bindParam(':senha', $_POST['senha']);
        $stmt->bindParam(':cep', $_POST['cep']);
        $stmt->bindParam(':cidade', $_POST['cidade']);
        $stmt->bindParam(':endereco', $_POST['endereco']);
        $stmt->bindParam(':bairro', $_POST['bairro']);
        $stmt->bindParam(':numero', $_POST['numero']);
        $stmt->bindParam(':estado', $_POST['estado']);
        $stmt->bindParam(':pais', $_POST['pais']);
        $stmt->bindParam(':genero', $_POST['genero']);

        if ($stmt->execute()) {
            echo "Sucesso!";
            header('Location: ../inicio.html'); //mudar o redirecionamento, exemplo: redirecionar para um arquivo para criar sessão do usuario, etc
            exit();
        } else {
            echo "Erro ao realizar o cadastro!";
        }

    } catch (PDOException $e) {
        echo "Erro ao conectar ou executar a query: " . $e->getMessage();
    }
?>
