<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="../img\icon.svg">
    <meta property="og:url" content="http://www.prudenteurbano.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Prudente Urbano - Admin</title>
  </head>
  <body style="background-color: #444">
    <nav>
        <div class="logo">
            <a href="index.php"><h4>PPUR - ADMIN</h4></a>
        </div>
        <ul class="nav-links">
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
      <script type="text/javascript" src="../js/app.js"></script>
    </nav>
    <script language="javascript">
            function sucesso(){
                setTimeout("window.location='control.php'", 1500);
            }
            function failed(){
                setTimeout("window.location='index.php'", 3000);
            }
</script>
<?php
session_start();
    include '../php/conn.php';
    $adm_user = $_POST["adm_user"];
    $adm_senha = $_POST["adm_senha"];
    $senha_cript = md5(sha1($adm_senha));

    $sql="SELECT * FROM adm WHERE adm_user = '$adm_user' AND adm_senha = '$senha_cript'";
    $consulta=mysqli_query($conexao,$sql);
    $linhas = mysqli_num_rows($consulta);
    
    if($linhas == 0){
        echo"<center><h2 style='color:#fff'>Falha no Login. Tente novamente.</h2></center>";
        echo"<script language='javascript'>failed()</script>";
    }
    else {
        $_SESSION["id"]=md5(uniqid(rand(), true));
        echo"<center><h2 style='color:#fff;'>Redirecionando... Aguarde</h2></center>";
        echo"<script language='javascript'>sucesso()</script>";
    }
    include '../php/close.php';
?>
</body>
</html>