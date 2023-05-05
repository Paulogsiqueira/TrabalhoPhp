<header>
  <div class="container">

  <div class="login">
    Email: 
      <?php echo $_SESSION['email']; ?>
  </div>
</div>

  <style>
    .login{
      display: flex;
      padding: 4px 8px;
      width: max-content;
      font-weight: bold;
      border: 1px solid black;
      border-radius:5px;
    }

    .container{
      display: flex;
      justify-content: end;
      padding: 5px 10px;
  
     }

  </style>
  
  
</header>
  