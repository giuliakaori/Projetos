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
    <div id="geral">
      <div class="geral_txt">
  <?php 
      include '../php/conn.php';
        $id=$_POST['noticia_numero'];

        $sql = "SELECT * FROM noticia where not_id = '$id'";
        $consulta=mysqli_query($conexao,$sql);

        while($mostrar=mysqli_fetch_assoc($consulta))
        {
          echo "<h2 align='center' style='font-weight:bold'>".$mostrar['not_titulo']."</h2>";
          echo "<p><center>".$mostrar['not_data']." | ".$mostrar['not_hora']."</center></p><br>";

          $img=$mostrar['not_image-link'];
          echo "<img src='../".$img."' style='width:550px;height:400px;float:left;display:block;margin-right:30px;margin-bottom:20px;'>";

          $text=$mostrar['not_texto'];
          echo "<p style='font-size:16px;'>".nl2br($text)."</p></div>";

          echo "<div class='noticias' style='background-color:#333;'><div class='container'><form action='editar.php' method='post' class='form_editar'>
                <input type='hidden' name='noticia_numero' value=".$id.">
                <input type='submit' name='editar' value='Editar' class='submit_editar' style='width:350px;border:1px solid #666;'>
          </form>
          <form action='deletar.php' method='post' class='form_deletar'>
                <input type='hidden' name='noticia_numero' value=".$id.">
                <input type='hidden' name='img' value=".$img.">
                <input type='submit' name='deletar' value='Deletar' class='submit_deletar' style='width:350px;border:1px solid #666;' onclick='return pergunta();'>
          </form></div></div>";
        }

      include '../php/close.php';
  ?>

    </div>
</body>
</html>