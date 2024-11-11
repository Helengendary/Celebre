<?php 
include_once('conexao.php');

if ($conexao) {

    $sqlCreateTableImagens = "CREATE TABLE IF NOT EXISTS Imagens (
        id INT PRIMARY KEY AUTO_INCREMENT,
        imgNome VARCHAR(250),
        imgNomeAleatorio VARCHAR(250)
    );";
    
    $sqlCreateTableEvento = "CREATE TABLE IF NOT EXISTS Evento (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255),
        obs VARCHAR(255),
        dataEvento VARCHAR(100),
        preco FLOAT,      
        localidade VARCHAR(100),
        horario VARCHAR(100),
        imagem INT,
        FOREIGN KEY (imagem) REFERENCES Imagens(id)
    );";
    
    if (mysqli_query($conexao, $sqlCreateTableImagens) && mysqli_query($conexao, $sqlCreateTableEvento)) {

        $diretorio = "../imagens/";
        $arquivo = isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['name']) ? $_FILES['arquivo'] : null;

        if ($arquivo) {
            // Verificar se estamos lidando com um único arquivo ou múltiplos
            $ImgName = is_array($arquivo['name']) ? $arquivo['name'][0] : $arquivo['name'];
            $tmpName = is_array($arquivo['tmp_name']) ? $arquivo['tmp_name'][0] : $arquivo['tmp_name'];
            
            $destino = $diretorio . "/" . $ImgName;
            $extension = pathinfo($destino, PATHINFO_EXTENSION);
            $ImgNameRandom = md5($ImgName) . "." . $extension;

            if (strtolower($extension) === "png") {  // Comparação de extensão em minúsculas
                if (move_uploaded_file($tmpName, $diretorio . "/" . $ImgNameRandom)) {
                    echo "Upload realizado com sucesso!";
                } else {
                    exit("Falha ao mover o arquivo.");
                }
            } else {
                exit("Arquivo não é compatível com o tipo 'PNG'");
            }
        } else {
            exit("Nenhum arquivo foi enviado.");
        }
        

        mysqli_query($conexao, "INSERT INTO Imagens (imgNome, imgNomeAleatorio) VALUES ('$ImgName', '$ImgNameRandom')");

        $id_imgTable_last = mysqli_insert_id($conexao);

        $sqlInsert = "INSERT INTO Evento 
            (nome, obs, dataEvento, preco, localidade, horario, imagem) VALUES 
            ('{$_POST['nome']}', '{$_POST['obs']}', '{$_POST['dataEvento']}', '{$_POST['valor']}', '{$_POST['localidade']}', '{$_POST['horario']}', $id_imgTable_last)";

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