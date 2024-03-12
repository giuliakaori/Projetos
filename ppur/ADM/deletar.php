<?php

$id=$_POST['noticia_numero'];
$img=$_POST['img'];

include '../php/conn.php';

	$result="delete from noticia where not_id='$id'";

    if(mysqli_query($conexao,$result)){
       unlink("../".$img);

       header("Location:edit.noticias.php");
        }
        else{
            
            die("Não foi possível realizar a alteração ".mysqli_error());
        }
include '../php/close.php';
?>