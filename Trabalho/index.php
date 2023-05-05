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
    </head>
    <body>

<?php
    $local = '127.0.0.1:3307';
    $user = 'root';
    $pwd = '';
    $db = 'loja';

    $con = new mysqli($local, $user, $pwd, $db);

    if($con->connect_error){        
        echo $con->connect_error;
    }
   // var_dump($con);
    
    $sql = "SELECT * FROM produto";

    $result = $con->query($sql);        
    
?>
<h1>Cadastro de produtos</h1>

<a href="novo_produto.php" class="btn btn-primary">Novo produto</a>
<a href="tabela.php" class="btn btn-primary">Clientes</a>
<form action="deslogar.php" method="post">
    <input type="hidden" name="logout" value="true">
    <button type="submit" class="btn btn-danger">Deslogar</button>
</form>

<br>
<br>
<table class="table table-bordered table-dark">
    <thead>
        <td>Id</td>
        <td>Nome</td>
        <td>Preço</td>
        <td>Quantidade</td>
        <td>Peso</td>
    </thead>
    <tbody>
        <?php
            while($row = $result->fetch_assoc())
            {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['nome'] . "</td>
                        <td>" . $row['preco'] . "</td>
                        <td>" . $row['quantidade'] . "</td>
                        <td>" . $row['peso'] . "</td>
                        <td>
                            <a href='alterar_produto.php?id=" . $row['id'] . "'> 
                                ✏️ 
                            </a>
                            
                            <a href='excluir_produto.php?id=" . $row['id'] . "'>
                                🗑️
                            </a>
                        </td>
                     </tr>
                ";
            }        
        ?>
    </tbody>
</table>

<?php
    $con->close();
    include("layout/baixo.php");
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
