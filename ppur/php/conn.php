<?php 
$servidor="localhost";
$bancodados="ppur";
$usuario="root";
$senha="";
$conexao = mysqli_connect($servidor, $usuario, $senha, $bancodados);
mysqli_select_db($conexao, $bancodados) or die (mysqli_error());
mysqli_set_charset($conexao,"utf8");
?>