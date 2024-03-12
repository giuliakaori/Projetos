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
    </nav>
    <center>
        <div id="form">
            <div class="bar_40">
                <br><br>
                <h3>Seja Bem-Vindo a Administração<br>
                Insira suas credencias para continuar</h3>
            </div>
        <form method="post" action="adm_autenticar.php">
            <input type="text" name="adm_user" placeholder="Usuário" required><br>
            <input type="password" name="adm_senha" placeholder="Senha" required><br>
            <input type="submit" value="Logar">
        </form>
        <div class="bar_40">
        </div>
    </center>
</body>
</html>