<?php
    var_dump($_POST);

    $local = '127.0.0.1:3307';
    $user = 'root';
    $pwd = '';
    $db = 'loja';

    $con = new mysqli($local, $user, $pwd, $db);

    if($con->connect_error){        
        echo $con->connect_error;
    }

    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $chave = $_POST['chave'];

    $sql = "INSERT INTO usuario
            (nome, usuario, senha, email,chave)
            VALUES
            ('{$nome}','{$usuario}','{$senha}','{$email}','{$chave}')";

    echo $sql;
    $con->query($sql);
    $con->close();
    
    header('location: tabela.php');
   
?>

