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
<script type="text/javascript">
  function pergunta(){ 
  return confirm('Realmente deseja deletar a notícia?');
}
</script>
    
  </head>
  <body style="background-color: #F9F9F9">
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
    <div class="noticias">
      <div style="height:40px;"></div>
      <h1 style="font-weight:bold;text-align: center;">Notícias</h1>
        <center><div class="div_select_button">
            <a href="nova_noticia.php" class="box_select">
              <div style="height:10px;"></div>
            + Adicionar Notícia
              </a>
        </div>
      </center>
      <div class='container'>
<?php 
      include '../php/conn.php';
        $sql="SELECT * FROM noticia ORDER BY not_id desc";
        $consulta=mysqli_query($conexao,$sql);
      while($mostrar=mysqli_fetch_assoc($consulta))
        {
          echo "<div class='noticia_box'>";

          $img=$mostrar['not_image-link'];
          echo "<center><img src='../".$img."' class='noticia_img'></center>";
          echo "<h3>".substr($mostrar['not_titulo'],0,30)."...</h3><br>";
          echo "<p>".substr($mostrar['not_texto'],0,100)."...</p><br>";
          echo "<p><center>".$mostrar['not_data']." | ".$mostrar['not_hora']."</center></p><br>";

            $id=$mostrar['not_id'];

          echo "
          <div class='submit_org'>
          <form action='leitor.php' method='post' class='form_visualizar'>
                <input type='hidden' name='noticia_numero' value=".$id.">
               <input type='submit' name='ver' value='Visualizar' class='submit_visualizar'>
          </form>
          <form action='editar.php' method='post' class='form_editar'>
                <input type='hidden' name='noticia_numero' value=".$id.">
                <input type='submit' name='editar' value='Editar' class='submit_editar'>
          </form>
          <form action='deletar.php' method='post' class='form_deletar'>
                <input type='hidden' name='noticia_numero' value=".$id.">
                <input type='hidden' name='img' value=".$img.">
                <input type='submit' name='deletar' value='Deletar' class='submit_deletar' onclick='return pergunta();'>
          </form>
        </div>               
      </center>
    </div>";
        }
      include '../php/close.php';
?>
    </div>
  </div>
</body>
</html>