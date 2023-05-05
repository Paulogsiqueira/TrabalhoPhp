<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}
?>
<?php include 'header.php'; ?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    </head>
<?php


    $local = '127.0.0.1:3307'; 
    $user = 'root';
    $pwd = '';
    $db = 'loja'; 
    
    $con = new mysqli($local, $user, $pwd, $db);

    if ($con->connect_error){ 
        echo $con->connect_error; 
    }

    $sql ="select * from usuario";

    $result = $con->query($sql); 
?>


<main>
    <div class="p-4">
        <h1>Clientes</h1>
        <a class="btn btn-success" href='novo.php'>Adicionar</a>
        <a href="index.php" class="btn btn-primary">Produtos</a>
        <form action="deslogar.php" method="post">
            <input type="hidden" name="logout" value="true">
            <button type="submit" class="btn btn-danger">Deslogar</button>
        </form>
        <table class="table table-dark">
            <thead>
                <td>Id</td>
                <td>Nome</td>
                <td>Usuario</td>
                <td>Senha</td>
                <td>Email</td>
                <td>Chave</td>
            </thead>
            <tbody>
                <?php   
                    while($row = $result ->fetch_assoc())
                    {
                        echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['nome']."</td>
                                <td>".$row['usuario']."</td>
                                <td>".$row['senha']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['chave']."</td>
                            </tr>
                            ";
                        }
                    ?>
        
            </tbody>
        </table>
  </div>
</main>

<br>
<br>
<?php
    $con->close();
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/37479ac35a.js" crossorigin="anonymous"></script>
    </body>
    </html>
