<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta property="og:url" content="http://www.prudenteurbano.com/" />
    <link rel="icon" href="img\icon.svg">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Prudente Urbano</title>
  </head>
  <body>
   <nav>
        <div class="logo">
            <a href="index.php"><h4>Prudente Urbano</h4></a>
        </div>
        <div></div><!--div moscando-->
        <ul class="nav-links">
          <li>
            <a href="#">Linhas / Itinerários</a>
          </li>
          <li>
            <a href="aonde-esta-meu-onibus.html">Aonde Está Meu Ônibus?</a>
          </li>
          <li>
            <a href="informacoes.html">Informações</a>
          </li>
          <li>
            <a href="institucional.html">Institucional</a>
          </li>
          <li>
            <a href="noticias.php">Notícias</a>
          </li>
          <li>
            <a href="fale_conosco.html">Fale Conosco</a>
          </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
      <script type="text/javascript" src="js/app.js"></script>
    </nav>
    <div id="main">
      </div>
    <div class="noticias">
      <div style="height:40px;"></div>
      <h1 style="font-weight:bold;text-align: center;">Notícias</h1>
      <div class='container'>
<?php 
      include 'php/conn.php';
        $sql="SELECT * FROM noticia ORDER BY not_id desc";
        $consulta=mysqli_query($conexao,$sql);
      while($mostrar=mysqli_fetch_assoc($consulta))
        {
          echo "<div class='noticia_box'>";

          $img=$mostrar['not_image-link'];
          echo "<center><img src='".$img."' class='noticia_img'></center>";
          echo "<h3>".substr($mostrar['not_titulo'],0,30)."  ...</h3><br>";
          echo "<p>".substr($mostrar['not_texto'],0,100)." ...</p><br>";
          echo "<p><center>".$mostrar['not_data']." | ".$mostrar['not_hora']."</center></p><br>";

            $id=$mostrar['not_id'];

          echo "<form action='php/leitor.php' method='get'>
                          <input type='hidden' name='noticia_numero' value=".$id.">
                          <center><input type='submit' name='ler' value='Ler Mais' class='ler_mais'></center>
                        </form></div>";
        }
      include 'php/close.php';
?>
    </div>
  </div>
    <div class="rodape1">
        <div style="margin:20px; height: 250px; width: 12vh" class="rodape_box">
          <p style="color: #ffd91e">Home</p>
              <li>
                <a href="noticias.php">
                  Notícias
                </a>
              </li>
        </div>
        <div style="margin:20px; height: 250px; width: 30vh">
          <p style="color: #ffd91e"><a href="informacoes.html" class="rodape_box">Informações</a></p>
              <li>
                <a href="informacoes.html#cartao-estudante">
                  Cartão Estudante
                </a>
              </li>
              <li>
                <a href="informacoes.html#pontos-de-recarga">
                  Pontos de Recarga
                </a>
              </li>
              <li>
                <a href="informacoes.html#cartao-transporte">
                  Cartão Vale Transporte
                </a>
              </li>
              <li>
                <a href="informacoes.html#biometria-facial">
                  Biometria Facial
                </a>
              </li>
              <li>
                <a href="informacoes.html#acessibilidade">
                  Acessibilidade
                </a>
              </li>
              <li>
                <a href="informacoes.html#app-meu-onibus">
                  App Prudente Urbano
                </a>
              </li>
              <li>
                <a href="informacoes.html#cartao-gratuidade">
                  Cartão Gratuidade
                </a>
              </li>
        </div>
        <div style="margin:20px; height: 250px; width: 30vh" class="rodape_box">
          <p><a href="institucional.html">Institucional</a></p>
              <li>
                <a href="institucional.html#historico">
                  Histórico da Empresa
                </a>
              </li>
              <li>
                <a href="institucional.html#missao">
                  Missão
                </a>
              </li>
              <li>
                <a href="institucional.html#visao">
                  Visão
                </a>
              </li>
              <li>
                <a href="institucional.html#valores">
                  Valores
                </a>
              </li>
        </div>
        <div style="margin:20px; height: 250px; width: 25vh" class="rodape_box">
          <p><a href="fale_conosco.html">Fale Conosco</a></p>
              <li>
                <a href="duvidas_frequentes.html">
                  Perguntas Frequentes
                </a>
              </li>
              <li>
                <a href="trabalhe_conosco.html">
                  Trabalhe Conosco
                </a>
              </li>
              <li>
                <a href="ouvidoria.html">
                  Ouvidoria
                </a>
              </li>
        </div>

          <div style="border-left:1px solid #fff;height:200px;"></div>

        <div style="margin:30px; height: 250px; width: 40vh"  class="rodape_box">
          <img src="img\pu-logo-yellow.png">
            <div style="height: 10px"></div>
          <p style="color:#fff; font-size:14px;">PPU – Prático Prudente Urbano<br>
          Terminal Urbano<br> 
          Av. Brasil, 936<br>
          Pres. Prudente – SP</p>
          <p style="color:#ffd91e; font-size:12px;">Atendimento: Segunda à Sexta | 08h às 17h</p>
        </div>
    </div>
    <div class="rodape2">
    <br><p style="text-align: center">Todos os direitos reservados ®  Prudente Urbano</p>
    </div>
</body>
</html>