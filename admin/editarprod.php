<?php
    include 'conecta.php';
    $id = $_GET['idprodutos'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $nome = $_POST['nome'];
    $sql = "UPDATE tb_produtos SET quantidade=?, descricao=?, valor=?, nome=? WHERE idprodutos=?";
    $stmt = $conn->prepare($sql) or die($conn->error);
    if(!$stmt){
        echo "Erro na atualização: ".$conn->errno." - ".$conn->error;
    }
    $stmt->bind_param('ssi', $descricao, $quantidade , $valor, $nome, $id);
    $stmt->execute();
    $conn->close();
    header("Location: produtos.php");
?>