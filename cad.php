<?php 
    include 'conecta.php';
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $cidade = $_POST['cidade'];
    $data_nascimento = $_POST['data_nascimento'];
    $sql= "INSERT INTO pessoa(nome,email,celular,cidade,data_nascimento) VALUES ('$nome','$email','$celular','$cidade','$data_nascimento')";
    if(mysqli_query($conn,$sql)){
        echo "<script language='javascript' type='text/javascript'> 
          alert('Registro inserido com sucesso!');
          window.location.href='index.php';
          </script>";
    }
    else {
        echo "<script language='javascript' type='text/javascript'> 
          alert('Não foi possível inserir este registro!');
          window.location.href='index.php'
          </script>";
    }
    mysqli_close($conn);
?>