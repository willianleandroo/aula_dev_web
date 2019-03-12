<?php
	
	//==== UTILIZANDO O "IF TERNÁRIO", CASO A VARIAVEL EXISTA ELE RECUPERA, CASO CONTRÁRIO ELE MODIFICA O VALOR DO PARAMETRO PARA 0
	//==== CASO A CONDIÇÃO ESTABELECIDA FOR VERDADEIRA, ELE EXECUTA O QUE ESTÁ ANTES DOS DOIS PONTOS, CASO FALSA ELE EXECUTA O Q ESTÁ DPS DOS DOIS PONTOS;
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;


?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
		<script>
			// código javascript				
			$(document).ready(function(){

				//==== NÃO ENVIANDO O FORM CASO NÃO CUMPRA AS CONDIÇÕES DE PREENCHIMENTO
				var campo_vazio = false;
				
				//VERIFICAR SE OS CAMPOS DE USUARIO E SENHA FORAM PREENCHIDOS
				$('#btn_login').click(function(){
					if($('#campo_usuario').val() == ''){
						// ==== COLOCANDO BORDA CASO O CAMPO N SEJA PREENCHIDO, PARA CHAMAR A ATENÇÃO DO USUÁRIO AO CAMPO QUE PRECISA SER PREENCHIDO
						$('#campo_usuario').css({'border-color': '#A94442'});
						var campo_vazio = true;
					} else /*=== MUDANDO A BORDA CASO O CAMPO TENHA SIDO PRENCHIDA*/{
						$('#campo_usuario').css({'border-color': '#CCC'});
					}
				
					if($('#campo_senha').val() == ''){
						// ==== COLOCANDO BORDA CASO O CAMPO N SEJA PREENCHIDO, PARA CHAMAR A ATENÇÃO DO USUÁRIO AO CAMPO QUE PRECISA SER PREENCHIDO
						$('#campo_senha').css({'border-color': '#A94442'});
						var campo_vazio = true;
					}else /*=== MUDANDO A BORDA CASO O CAMPO TENHA SIDO PRENCHIDA*/{
						$('#campo_senha').css({'border-color': '#CCC'});
					}

					//===== CANCELANDO O DISPARO DO FORMULÁRIO =====
					if(campo_vazio) return false;
			


				});
			});
		</script>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="inscrevase.php">Inscrever-se</a></li>

	            <!-- UTILIZANDO O IF TERNÁRIO PARA VERIFICAR O PARAMETRO QUE ESTÁ SENDO PASSADO PELO MÉTODO GET, DA VARIAVEL "erro"
					 CASO "$erro" SEJA IGUAL A 1, FORÇAREMOS A CLASS DO "li" O VALOR "open", CASO CONTRÁRIO, ELA CONTINUARÁ NULL
	            -->
	            <li class="<?= $erro == 1 ? 'open' : '' ?> "> <!-- AQUI UTILIZAMOS A TAG CURTA DE IMPRESSÃO, POIS QUEREMOS APENAS "imprimir" UM VALOR A CLASSE EM QUESTÃO -->
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
				    		<br />
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />
								
							</form>

							<?php

								if($erro == 1){
									echo '<font color="#FF000">Usuário e ou senha inválido(s) </font>';
								}


							?>


						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h1>Bem vindo ao twitter clone</h1>
	        <p>Veja o que está acontecendo agora...</p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>