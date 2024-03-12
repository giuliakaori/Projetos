<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
    $session_id=$_SESSION["id"];
    if($session_id==null)
    {
    header ("location:login.php");
    }
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
        <div class="bar_10"></div>
        <h1 align="center">Painel de Controle</h1>
        <div class="bar_10"></div>
            <div class="container">
                <div class="div_select">
                        <a href="edit.linhas.php" class="box_select">
                            <div class="bar_10"></div>
                    Editar Linhas
                    <img src="..\img\adm\bus.svg" class="svg">
                        </a>
                </div>
                <div class="div_select">
                        <a href="edit.noticias.php" class="box_select">
                            <div class="bar_10"></div>
                    Editar Notícias
                    <img src="..\img\adm\news.svg" class="svg">
                        </a>
                </div>
                <div class="div_select">
                        <a href="ouvidoria.php" class="box_select">
                            <div class="bar_10"></div>
                    Ouvidoria<br>
                    <img src="..\img\adm\headset.svg" class="svg">
                        </a>
                </div>
                <div class="div_select">
                        <a href="curriculos.php" class="box_select">
                            <div class="bar_10"></div>
                    Currículos<br>
                    <img src="..\img\adm\curriculo.svg" class="svg">
                        </a>
                </div>
            </div>
    </div>
</body>
</html>