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
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $peso = $_POST['peso'];

    $sql = "SELECT * FROM produto WHERE nome='${nome}'";
    
    $resultado = $con->query($sql)->fetch_assoc();
    if($resultado) 
    {
        echo "Ja existe";
    }
    else
    {
        $sql = "INSERT INTO produto 
        (nome, preco, quantidade, peso)
        VALUES
        ( '{$nome}', {$preco}, {$quantidade}, {$peso} )";

        $con->query($sql); //executar o insert no banco
        $con->close(); //fechar conexão

        header("location: index.php");
    }


    
?>
<script>
    setTimeout(200000, window.location.reload)
</script>