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
        <div class="contanier" style="width: 600px">
<?php 
  function format($mask,$string)
{
    return  vsprintf($mask, str_split($string));
}
$telMask="(%s%s) %s%s%s%s%s-%s%s%s%s";

      include '../php/conn.php';
        $id=$_POST['id'];

        $sql = "SELECT * FROM ouvidoria where ouv_id = '$id'";
        $consulta=mysqli_query($conexao,$sql);
        while($mostrar=mysqli_fetch_assoc($consulta))
        {
          echo '<p><strong><br>Nome</strong></p>
                  <p>'.$mostrar['ouv_nome'].'</p>';

          echo '<p><strong><br>E-Mail</strong></p>
                  <p>'.$mostrar['ouv_email'].'</p>';

    $tel=$mostrar['ouv_telefone'];

          echo '<p><strong><br>Telefone</strong></p>
                  <p>'.format($telMask,$tel).'</p>';

      $motivo=$mostrar['ouv_motivo'];
        if($motivo==0){
          $motivo_texto="Indefinido";
        }
        if($motivo==1){
          $motivo_texto="Reclamação";
        }
        if($motivo==2){
          $motivo_texto="Sugestão";
        }
        if($motivo==3){
          $motivo_texto="Elogio";
        }

        
        echo '<p><strong><br>Motivo</strong></p>
                  <p>'.$motivo_texto.'</p>';

        echo '<p><strong><br>Mensagem</strong></p>
                  <p>'.nl2br($mostrar['ouv_mensagem']).'</p>';
}
      include '../php/close.php';
?>
</div>
</div>
</body>
</html>