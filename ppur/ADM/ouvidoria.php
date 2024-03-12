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

<script type="text/javascript">
  function pergunta(){ 
  return confirm('Realmente deseja deletar a mensagem?');
}
</script>

  </head>
  <body style="background-color: #fff">
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
        <h1 align="center">Área de Ouvidoria</h1>
<div class="contanier">
  <center>
   <table>
    <tr>
      <td>
        <div style='width:30px;'>
          <p align="center"><strong><br>ID</strong></p>
        </div>
      </td>
      <td>
        <div style='width:250px;'>
          <p align="center" ><strong><br>Nome</strong></p>
        </div>
      </td>
      <td>
        <div style='width:230px;'>
          <p align="center"><strong><br>E-Mail</strong></p>
        </div>
      </td>
      <td>
        <div style='width:170px;'>
          <p align="center"><strong><br>Telefone</strong></p>
        </div>
      </td>
      <td>
        <div style='width:120px;'>
          <p align="center"><strong><br>Motivo</strong></p>
        </div>
      </td>
      <td>
        <div style='width:300px;'>
          <p align="center"><strong><br>Mensagem</strong></p>
        </div>
      </td>
      <td>
        <div style='width:100px;'>
          <p align="center"><strong><br>Opções</strong></p>
        </div>
      </td>
    </tr>
<?php
function format($mask,$string)
{
    return  vsprintf($mask, str_split($string));
}
$telMask="(%s%s) %s%s%s%s%s-%s%s%s%s";

  include '../php/conn.php';
  $sql="SELECT * from ouvidoria";
  $consulta=mysqli_query($conexao,$sql);
  while($mostrar=mysqli_fetch_assoc($consulta))
  {
    echo "<tr align='center'>";  
    echo "<td><div style='width:30px;'>".$mostrar['ouv_id']."</div></td>";
    echo "<td><div style='width:250px;'>".$mostrar['ouv_nome']."</div></td>";
    echo "<td><div style='width:230px;'>".$mostrar['ouv_email']."</div></td>";

$tel=$mostrar['ouv_telefone'];
echo "<td><div style='width:170px;'>".format($telMask,$tel)."</div></td>";

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

    echo "<td><div style='width:120px;'>".$motivo_texto."</div></td>";

    $msg=$mostrar['ouv_mensagem'];

    echo "<td><div style='width:300px;'>".substr($msg,0,33)."...</div></td>";
    
    $id=$mostrar['ouv_id'];

    echo "<td>
            <div style='width:100px;'>
            <form method='post' action='ler_ouvidoria.php'>
              <input type='hidden' name='id' value=".$id.">
              <input type='submit' value='Ver' style='float:left;margin:2px'>
            </form>
            <form method='post' action='deletar_ouvidoria.php'>
              <input type='hidden' name='id' value=".$id.">
              <input type='submit' value='Apagar' onclick='return pergunta();' style='float:left;margin:2px'>
            </form>
            </div>
          </td>
        </tr>";
  }
  include '../php/close.php';
?>
</table>
    </center></tr></div>
  </div>
</div>
</body>
</html>