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
                setTimeout("window.location='editar.php'", 2000);
            }
</script>
<?php
include '../php/conn.php';

    $id=$_POST['id'];
    
    $titulo=$_POST['titulo'];
    $texto=$_POST['texto'];
    $permitido=array('image/jpg','image/jpeg','image/png');
    $img=$_FILES["img"];
    $pasta='img/noticias/';
    $nome_temporario=$img["tmp_name"];
    $nome_real=$img["name"];
    $type=$img["type"];

$sql="SELECT * FROM noticia WHERE not_id='$id'";
    $consulta=mysqli_query($conexao,$sql);
    $dados=mysqli_fetch_array($consulta);

$img_link=$dados['not_image-link'];

if($nome_real != null)
    {
    unlink("../".$img_link);
    
    if(!empty($nome_real) && in_array($type, $permitido))
    {
        $nome_real=$img_link;
        move_uploaded_file($nome_temporario,"../$nome_real");
        $local=$nome_real;

        $update = "UPDATE noticia SET not_titulo='$titulo', not_texto='$texto', `not_image-link`='$local' WHERE not_id='$id'";
        mysqli_query($conexao, $update) or die (mysqli_error($conexao));

        echo "<center><p>Noticia editada com sucesso!</p></center>";
        echo"<script language='javascript'>sucesso()</script>";
    }
    else{
        echo "<center><p>Falha em editar a noticia</p></center>";
        echo"<script language='javascript'>falha()</script>";
    }
}
else{
    if($nome_real == null){
    $update = "UPDATE noticia SET not_titulo='$titulo', not_texto='$texto' WHERE not_id='$id'";
        mysqli_query($conexao, $update) or die (mysqli_error($conexao));

        echo "<center><p>Noticia editada com sucesso!</p></center>";
        echo"<script language='javascript'>sucesso()</script>";
        }

    else{
        echo "<center><p>Falha em editar a noticia</p></center>";
        echo"<script language='javascript'>falha()</script>";
        }
}
include '../php/close.php';
?>
</html>