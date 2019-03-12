<?php
	
	//==== QUANDO O USUARIO CLICAR EM SAIR NA PÁG "home.php" ELA IRÁ REDIRECIONAR PARA A INDEX E ENCERRAR A SESSÃO
	//==== QUEBRANDO A VARIAVEL $_SESSION =====
	session_start();

	//==== ELIMINANDO INDICE DE ARRAY, NO CASO O ARRAY É A SUPER GLOBAL $_SESSION
	unset($_SESSION['usuario']);
	unset($_SESSION['email']);
	header('Location: index.php');

?>						