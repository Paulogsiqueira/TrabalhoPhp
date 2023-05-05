<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}
?>
<?php include 'header.php'; ?>

<?php 

 $id = $_GET["id"];

 $sql = "SELECT * FROM produto WHERE id=" . $id;
 
 include("database/database.php");

 $resultado = $con->query($sql);
 $dados = $resultado->fetch_assoc();
 //var_dump($dados);
?>

<h1>Alteração de poduto</h1>

<form method="post" action="salvar_alt_produto.php">
  <input type="hidden" 
          name="id" 
          value="<?php echo $dados['id']; ?>"
  >
      
  <div class="form-group">
    <label>Nome do produto</label>
    <input type="text" 
          name="nome" 
          class="form-control" 
          placeholder="Calça Jeans"
          value="<?php echo $dados['nome']; ?>"
      >
  </div>

  <div class="form-group">
    <label>Preço</label>
    <input type="text" name="preco" 
      class="form-control" 
      placeholder="50.89"
      value="<?php echo $dados['preco']; ?>"
    >
  </div>

  <div class="form-group">
    <label>Quantidade de estoque</label>
    <input type="text" 
        name="quantidade" 
        class="form-control" 
        placeholder="10"
        value="<?php echo $dados['quantidade']; ?>"
    >
  </div>  

  <div class="form-group">
    <label>Peso em Kg</label>
    <input type="text" 
          name="peso" 
          class="form-control" 
          placeholder="0.8"
          value="<?php echo $dados['peso']; ?>"
    >
  </div>  

  <button type="submit" class="btn btn-success">Salvar</button>
</form>


