<?php
	
	//========= IMPORTANDO O ARQUIVO AONDE CONTÉM A CLASSE DE ACESSO AO BANCO ======
	require_once('db.class.php');


	//================ RECUPERANDO OS DADOS DO FORMULÁRO DE CADASTRO =============
	//==== POST OU GET SÃO ARRAYS ASSOCIATIVOS, E OS INDICES DO ARRAY SERÃO OS "name" INFORMADOS NO FORMULÁRIO
	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];	

	//=== INSTANCIANDO A CLASSE QUE CHAMAMOS ANTERIORMENTE ===
	$objDb = new db();
	//=== EXECUTANDO A FUNÇÃO DE CONEXÃO ===
	//=== CRIANDO UMA VARIAVEL ($link) PARA RECEBER O RETORNO DA FUNÇÃO "concecta_mysql()" QUE É "$con"
	$link = $objDb->conecta_mysql();
	
	//==== QUERY/INSTRUÇÃO DE INSERT DO BANCO DE DADOS ====
	$sql = " insert into usuarios(usuario, email, senha) values('$usuario','$email','$senha') "; //=== ASPAS DUPLAS VERIFICA SE HÁ ALGUMA VARIÁVEL DENTRO DA STRING

	//==== EXECUTANDO A QUERY DE INSERT CRIADO ACIMA ATRAVÉS DE UMA FUNÇÃO nativa PHP ====
	//== ESSA FUNÇÃO RECEBE DOIS PARAMETROS, 1° = É A CONEXÃO, O 2° = A QUERY QUE SERÁ EXECUTADO
	//== A "CONEXÃO" É O $link, A VARIAVEL QUE CONTÉM A CONEXÃO AO BANCO DE DADOS ==
	if(mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
	} else {
		echo 'Erro ao registrar o usuário!';
	}
	//=========== O if FOI USADO PARA TRATATIVA DE SE  REGISTRO FOI FEITO OU NAO NO BANCO ==============
?>