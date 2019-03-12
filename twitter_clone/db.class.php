<?php
// ================ CLASSE DE CONEXÃO COM BANCO DE DADOS ========================
// ================ CLASSE DE CONEXÃO COM BANCO DE DADOS ========================
// ================ CLASSE DE CONEXÃO COM BANCO DE DADOS ========================
// ================ CLASSE DE CONEXÃO COM BANCO DE DADOS ========================

class db{

	//host
		//AONDE ESTÁ INSTALADO 
			private $host = 'localhost';

	//usuario
		//USUARIO QUE VAI ACESSAR O BANCO
			private $usuario = 'root';

	//senha
		//AQUI NO CASO SERÁ VAZIA, POIS É COMO VEM DE PADRÃO NA INSTALAÇÃO
			private $senha = '';

	//banco de dados
		//RECEBE O NOME DO BANCO AONDE SERÁ CRIADO AS TABELAS
			private $database = 'twitter_clone';


	// ============= FUNÇÃO PARA CONECTAR AO BANCO ===========
	// ============= FUNÇÃO PARA CONECTAR AO BANCO ===========
	// ============= FUNÇÃO PARA CONECTAR AO BANCO ===========
	// ============= FUNÇÃO PARA CONECTAR AO BANCO ===========
		public function conecta_mysql(){
			//FUNÇÃO NATIVA PARA CRIAR CONEXÃO.. ELA ESPERA 4 PARAMETROS
				//mysqli_connect( localização do banco, usuario de acesso, senha, nome do banco)
			//O $this FAZ REFERENCIA À VARIAVEL DA CLASSE
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database); 


			//====== AJUSTANDO CHARSET DE COMUNICAÇÃO ENTRE A APALICAÇÃO E O BANCO =============
				// RECEBE DOIS PARAMETROS
					// PRIMEIRO PARAMETRO É A CONEXÃO COM O BANCO (TODOS OS DADOS PARA ESTABELECER A CONEXÃO)
					// SEGUNDO PARAMETRO É O CHARSET QUE SERÁ SETADO
			mysqli_set_charset($con, 'utf8');


			//===== VERIFICAÇÃO DE ERRO DURANTE A CONEXÃO COM O BANCO =======
			//===== VERIFICAÇÃO DE ERRO DURANTE A CONEXÃO COM O BANCO =======
			//===== VERIFICAÇÃO DE ERRO DURANTE A CONEXÃO COM O BANCO =======
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();
			}

			return $con;

		}
}




?>