<?php
    session_start();


    $local = '127.0.0.1:3307';
    $user = 'root'; 
    $pwd = ''; 
    $db = 'loja'; 
    
    $con = new mysqli($local, $user, $pwd, $db);

    if ($con->connect_error){
        echo $con->connect_error; 
    }


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql ="select * from usuario where email='{$email}' and senha='{$senha}'";

    $result = $con->query($sql);

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>CADASTRO</title>
</head>
<body>

<div class="p-4">
  <form method='post' action='verificar_login.php'>
  
    <div class="form-group">
      <label>Confirmar Email</label>
      <input type="text" name='email'class="form-control" >
    </div>
  
    <div class="form-group">
      <label>Confirmar Senha</label>
      <input type="password" name='senha'class="form-control" >
    </div>

    <?php
        if ($result ->fetch_assoc() == null) {
          echo '<div class="alert alert-danger text-center" role="alert">
                  Usuário não encontrado!
                </div>';
                unset ($_SESSION['login']);
                unset ($_SESSION['senha']);
        }else {
            echo '<div class="alert alert-success text-center" role="alert">
                  Usuário encontrado!
                </div>';
                header('Location: index.php');
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['logged_in'] = true;
                header('location:index.php');
        }
      ?>
  
    <button type="submit" class="btn btn-success">Faça login</button>
  </form>
</body>
</html>