<?php

	session_start();

	require_once('bd.class.php');

	$objBd = new bd();
	$con = $objBd->conecta_mysql();

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	$sql = "select id, usuario, email from usuarios where usuario = '$usuario' and senha = '$senha'";
	$resultado_id = mysqli_query($con, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['usuario'])){

			$_SESSION['id_usuario'] = $dados_usuario['id'];
			$_SESSION['usuario'] = $dados_usuario['usuario'];
			$_SESSION['email'] = $dados_usuario['email'];

			header('Location: home.php');
		}
		else{
			header('Location: index.php?erro=1');
		}
	}
	else{
		echo "erro na execução da consulta. Favor entrar em contato com o adm.";
	}

?>