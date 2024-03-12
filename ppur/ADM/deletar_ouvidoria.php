<?php

$id=$_POST['id'];

include '../php/conn.php';

	$result="delete from ouvidoria where ouv_id='$id'";

    if(mysqli_query($conexao,$result)){

       header("Location:ouvidoria.php");
        }
        else{
            
            die("Não foi possível realizar a alteração ".mysqli_error());
        }
include '../php/close.php';
?>