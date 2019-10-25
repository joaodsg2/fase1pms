<?php 
session_start();
include "formulario/conexao.php";  
	
	                                             
//verificaçao dos dados do login
	$password = $_POST['password'];
	$username = $_POST['username'];
	
	$sql = mysql_query ("SELECT * FROM websiteminecraft.utilizadores WHERE password = '$password' and username  = '$username'");
	if(mysql_num_rows($sql)==true){
		while($ln = mysql_fetch_array($sql)){
			$_SESSION['username'] = $ln['username'];
			$_SESSION['password'] = $ln['password'];
			
			header("Location: areareservada.php");
		}
	}else{
		//quando o email ou a passe estao errados
		echo "<meta http-equiv='refresh' content='0; URL=login-formulario.php'>
		<script type=\"text/javascript\">
		alert(\"Username ou Password estao errados\");
		</script>
		";

	}
	
	mysql_close($con);

?>