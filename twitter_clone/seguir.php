<?php 
	session_start();

	if(!isset($_SESSION['usuario'])){
		header("Location: index.php?erro=1");
	}

	require_once('bd.class.php');

	$id_usuario = $_SESSION['id_usuario'];
	$seguir_id_usuario = $_POST['seguir_id_usuario'];

	$objBd = new bd();
	$con = $objBd->conecta_mysql();

	$sql = "insert into usuarios_seguidores(id_usuario, seguindo_id_usuario) values ($id_usuario, $seguir_id_usuario) ";
	mysqli_query($con, $sql);

?>