<?php
    include 'conecta.php';
    $id = $_GET['idprodutos'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $sql = "UPDATE tb_produtos SET nome=?, descricao=?, quantidade=?, valor=? WHERE idprodutos=?";
    $stmt = $conn->prepare($sql) or die($conn->error);
    if(!$stmt){
        echo "Erro na atualização: ".$conn->errno." - ".$conn->error;
    }
    $stmt->bind_param('ssisi', $nome, $descricao , $quantidade, $valor, $id);
    $stmt->execute();
    $conn->close();
    echo  "<script language='javascript' type='text/javascript'>
    alert('Produto Atualizado com sucesso!');
    window.location.href='produtos.php'
    </script>";
?>