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
    <link rel="icon" href="../img\icon.svg">
    <meta property="og:url" content="http://www.prudenteurbano.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Prudente Urbano - Admin</title>
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
    <script type="text/javascript">

    function limite_textarea(valor) {
    quant = 7000;
    total = valor.length;
    if(total <= quant) {
        resto = quant - total;
        document.getElementById('cont').innerHTML = resto;
    } else {
        document.getElementById('conteudo').value = valor.substr(0,quant);
    }
}
    
</script>
    <div class="geral">
      <div class="geral_txt" style="min-height:700px">
        <div id="form2">
          <form enctype="multipart/form-data" method="post" action="adicionar_noticia.php">
            <h2>Título da Notícia</h2>
             <input type="text" name="titulo" placeholder="Digite o título da nova notícia" required maxlength="100" style="width: 90vw;">

            <h2>Imagem</h2>
            <p>Somente arquivos .png, .jpg e .jpeg.</p>
             <input type="file" required name="img">
             <br><br><br>

            <h2>Conteúdo</h2>
             <textarea onkeyup="limite_textarea(this.value)" id="conteudo" name="texto" placeholder="Digite o conteúdo da nova enquete" required maxlength="7000" style="width: 90vw;height: 400px;"></textarea>
              <span id="cont" style="margin-left: 10px">7000</span> Caracteres Restantes<br><br>
            <center><input type="submit" name="enviar" value="Adicionar Notícia" style="width: 90vw;"></center>
          </form>
      </div>
    </div>
</body>
</html>