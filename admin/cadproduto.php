<?php

if (isset($_SESSION['inadmin'])) {
} else {
    header('Location: index.php');
}
include 'conecta.php';

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$quantidade = $_POST['quantidade'];
$valor = $_POST['valor'];
$sql = "INSERT INTO tb_produtos(nome,descricao,quantidade,valor) VALUE ('$nome','$descricao','$quantidade','$valor')";
if (mysqli_query($conn, $sql)) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Registro não foi inserido!');
    window.location.href='index.php'
    </script>";
} else {
    echo  "<script language='javascript' type='text/javascript'>
    alert('Registro não foi inserido!');
    window.location.href='index.php'
    </script>";
}



if (isset($_FILES['foto1'])) {
    $arquivo = $_FILES['foto1'];
    if ($arquivo['error'])
        die("Falha ao enviar o arquivo");


    if ($arquivo['size'] > 2097152)
        die("Arquivo muito grande!!Max:2MB");

    $pasta = "assets/imagens/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != 'png')
    die ("tipo de arquivo não aceito");
    $path = $pasta . $novoNomeDoArquivo . ".". $extensao;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    if($deu_certo){
        $ultimo = mysqli_query($conn,"SELECT MAX(idprodutos) AS maior FROM tb_produtos");
        $row = mysqli_fetch_array($ultimo); 
        $maior = $row['maior'];
        $mysqli = "INSERT INTO tb_arquivos(nome_arquivo, path, data_upload, id_produtos) VALUES ('$nomeDoArquivo','$path',NOW(),'$maior')";
        mysqli_query($conn,$mysqli);
        echo "<p>Arquivo enviado com sucesso!</p>";
    }
    else
        echo "Falha ao enviar o arquivo!";
    
}
mysqli_close($conn);    