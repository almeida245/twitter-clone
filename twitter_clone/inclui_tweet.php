<?php 
	session_start();

	if(!isset($_SESSION['usuario'])){
		header("Location: index.php?erro=1");
	}

	require_once('bd.class.php');

	$tweet = $_POST['txt_tweet'];
	$id_usuario = $_SESSION['id_usuario'];

	$objBd = new bd();
	$con = $objBd->conecta_mysql();

	$sql = "insert into tweet(id_usuario, tweet) values ('$id_usuario', '$tweet') ";
	mysqli_query($con, $sql);

?>