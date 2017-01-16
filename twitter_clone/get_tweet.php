<?php 
	session_start();

	if(!isset($_SESSION['usuario'])){
		header("Location: index.php?erro=1");
	}

	require_once('bd.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objBd = new bd();
	$con = $objBd->conecta_mysql();

	$sql = "select t.id_tweet, t.id_usuario, t.tweet, DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') as data_inclusao, u.usuario
	        from tweet t
	          left join usuarios u on t.id_usuario = u.id
	        where t.id_usuario = $id_usuario 
	          or id_usuario in(select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario)
	        order by t.data_inclusao desc";
	$resultado_id = mysqli_query($con, $sql);

	if($resultado_id){

		while($tweet = mysqli_fetch_array($resultado_id)){
			echo '<a href="#" class="list-group-item">';
			echo '<h4 class="list-group-item-heading">' . $tweet['usuario'] . '<small> - ' . $tweet['data_inclusao']. '</small></h4>';
			echo '<p class="list-group-item-text">' . $tweet['tweet'] . '</p>';
			echo '</a>';
		}

	}
	else{
		echo "Erro na execução da consulta";
	}

?>