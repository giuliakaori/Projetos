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
<script language="javascript">
            function sucesso()
            {
                setTimeout("window.location='edit.noticias.php'", 2000);
            }
            function falha()
            {
                setTimeout("window.location='nova_noticia.php'", 2000);
            }
</script>
<?php
include '../php/conn.php';

    $titulo=$_POST['titulo'];
    $texto=$_POST['texto'];
    $permitido=array('image/jpg','image/jpeg','image/png');
    $img=$_FILES["img"];
    $pasta='img/noticias/';
    $nome_temporario=$img["tmp_name"];
    $nome_real=$img["name"];
    $type=$img["type"];

    $sql="SELECT * FROM noticia";
    
    $consulta=mysqli_query($conexao,$sql);

    if(!empty($nome_real) && in_array($type, $permitido))
    {
        if($type == 'image/png')
        {
            $nome_real='img-'.md5(uniqid(rand(),true)).'.png';
            move_uploaded_file($nome_temporario,"../".$pasta.$nome_real);
        $local=$pasta.$nome_real;

        $inserir = "INSERT INTO noticia (not_titulo,not_texto,not_data,not_hora,`not_image-link`) VALUES ('$titulo','$texto',CURDATE(),CURTIME(),'$local');";
        mysqli_query($conexao, $inserir) or die (mysqli_error($conexao));

        echo "<center><p>Noticia enviada!</p></center>";
        echo"<script language='javascript'>sucesso()</script>";
        }
        
        if($type == 'image/jpg' || $type == 'image/jpeg')
        {
            $nome_real='img-'.md5(uniqid(rand(),true)).'.jpg';
            move_uploaded_file($nome_temporario,"../".$pasta.$nome_real);
            $local=$pasta.$nome_real;

        $inserir = "INSERT INTO noticia (not_titulo,not_texto,not_data,not_hora,`not_image-link`) VALUES ('$titulo','$texto',CURDATE(),CURTIME(),'$local');";
        mysqli_query($conexao, $inserir) or die (mysqli_error($conexao));

        echo "<center><p>Noticia enviada!</p></center>";
        echo"<script language='javascript'>sucesso()</script>";
        }
    }
    else{
        echo "<center><p>Tipo de arquivo invalido, envie .jpg/.jpeg ou .png</p></center>";
        echo"<script language='javascript'>falha()</script>";
    }
include '../php/close.php';
?>
</html>