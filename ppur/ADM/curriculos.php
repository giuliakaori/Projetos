<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
    $session_id=$_SESSION["id"];
    if($session_id==null)
    header ("location:login.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta property="og:url" content="http://www.prudenteurbano.com/" />
    <link rel="icon" href="../img\icon.svg">
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
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="edit.linhas.php">Editar Linhas</a>
          </li>
          <li>
            <a href="edit.noticias.php">Editar Notícias</a>
          </li>
          <li>
              <a href="ouvidoria.php">Ouvidoria</a>
          </li>
          <li>
              <a href="curriculos.php">Análise de Currículos</a>
          </li>
          <li>
            <a href="logout.php" onclick="return confirm('Deseja fazer logout?');" title="logout">Logout</a>
          </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
      <script type="text/javascript" src="../js/app.js"></script>
    </nav>
    <div id="control">
        <br><h1 align="center">Análise de Currículos</h1>
    </div>
</body>
</html>