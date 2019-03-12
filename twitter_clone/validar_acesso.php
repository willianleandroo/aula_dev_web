<?php
	
	//IMPORTANTE UTILIZAR A FUNÇÃO NO INICIO DO CÓD, PQ CASO HAJA ALGUMA FUNÇÃO DE OUTPUT ANTES DA SESSION, ACARRETARÁ EM UM PROBLEMA
	session_start();

	//========= IMPORTANDO O ARQUIVO AONDE CONTÉM A CLASSE DE ACESSO AO BANCO ======
	require_once('db.class.php');

	//=== RECUPERANDO O USUARIO E SENHA DIGITADO NO "index" PARA ENTRAR NA APLICAÇÃO
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];


	//=== QUERY PARA CONSULTAR SE O USUARIO DIGITADO EXISTE NO BANCO DE DADOS
	$sql = "SELECT usuario, email FROM usuarios WHERE usuario='$usuario' AND senha='$senha' "; //SE ATENTAR AO OPERADOR "AND" POIS SÓ IRÁ RETORNAR SE AS DUAS CONDIÇÕES "usuario" E "senha" FOREM VERDADEIRAS

	
	//=== INSTANCIANDO A CLASSE QUE CHAMAMOS ANTERIORMENTE ===
	$objDb = new db();
	//=== EXECUTANDO A FUNÇÃO DE CONEXÃO ===
	//=== CRIANDO UMA VARIAVEL ($link) PARA RECEBER O RETORNO DA FUNÇÃO "concecta_mysql()" QUE É "$con"
	//== ESSA FUNÇÃO RECEBE DOIS PARAMETROS, 1° = É A CONEXÃO, O 2° = A QUERY QUE SERÁ EXECUTADO
	//== A "CONEXÃO" É O $link, A VARIAVEL QUE CONTÉM A CONEXÃO AO BANCO DE DADOS ==
	$link = $objDb->conecta_mysql();


	
	// update = RETORNARÁ true OU false PARA UMA FALHA NO PROCESSO DE UPDATE
	// insert = RETORNARÁ true OU false PARA UMA FALHA NO PROCESSO DE INSERÇÃO
	// select = RETORNARÁ false OU resource (REFERENCIA PARA UMA INFORMAÇÃO EXTERNA DO PHP), É COM ELE QUE PODEMOS RECUPERAR OS DADOS DA NOSSA CONSULTA ATRAVÉS DE UMA ESTRUTURA DE OBJETOS OU ATRAVÉS DE ARRAYS 
	// delete = RETORNARÁ true OU false PARA UMA FALHA NO PROCESSO DE DELETE



	//=== EXECUTANDO A CONSULTADA AO BANCO ===
	//=== RECUPERANDO A REFERENCIA DO resource E EXPLORAR ATRAVÉS DE OUTRAS FUNÇÕES DA BIBLIOTECA ===
	$resultado_id = mysqli_query($link, $sql);

	//TESTANDO CONDIÇÕES DO LOGIN

	if($resultado_id){

		//RECEBENDO O RETORNO DO resource EM UMA ESTRUTURA DE ARRAY E ATRIBUINDO A UMA VARIAVEL
		$dados_usuario = mysqli_fetch_array($resultado_id);

			//A FUNÇÃO "isset()" É UTILIZADA PARA VERIFICAR SE UMA VARIÁVEL É EXISTENTE OU FOI INICIADA E SE ELA É "NULL"
			//SE O ARRAY "dados usuario" E O "usuario" ESTIVER PREENCHIDO
			if(isset($dados_usuario['usuario'])){

				//==== SUPER GLOBAL "$_SESSION[]"
				$_SESSION['usuario'] = $dados_usuario['usuario'];
				$_SESSION['email'] = $dados_usuario['email'];


				header('Location: home.php');
			} else {
				//== FORAÇANDO REDIRECIONAMENTO PARA OUTRA PÁG "index";
				header('Location: index.php?erro=1');
			};


	}else{
		
		echo 'Erro na execução da consulta, favor entrar em contato com o admin'; 
	}

	


?>