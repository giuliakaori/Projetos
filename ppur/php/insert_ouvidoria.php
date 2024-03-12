<script language="javascript">
            function sucesso()
            {
                setTimeout("window.location='../ouvidoria.html'", 2000);
            }
</script>
<?php
include 'conn.php';

    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $telefone=$_POST['telefone'];
    $motivo=$_POST['motivo'];
    $mensagem=$_POST['mensagem'];

    $sql="SELECT * FROM ouvidoria";
    $consulta=mysqli_query($conexao,$sql);

    $inserir = "INSERT INTO ouvidoria (ouv_nome, ouv_email, ouv_telefone, ouv_motivo, ouv_mensagem) VALUES ('$nome', '$email', '$telefone','$motivo','$mensagem');";
		mysqli_query($conexao, $inserir) or die (mysqli_error($conexao));
		echo "<center><p>Sua Mensagem foi enviada</p></center>";
		echo"<script language='javascript'>sucesso()</script>";
include 'close.php';
?>