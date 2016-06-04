<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Usuario</title>



<link rel="stylesheet" type="text/css" href="data_table/media/css/estilo.css">
<link rel="stylesheet" type="text/css" href="data_table/media/css/style_menu.css">


</head>
<body>


<div class="container_for">
			<!-- Para cadastrar -->
			<form method="post" id="contactform" class="rounded">
			<h3>Login</h3>
				<div class="field">
					<label>Usuario:</label>
					<input type="text" name="usuario" required="required" class="input">
					<p class="hint">Digite o Nome!</p>
				</div>
				
				<div class="field">
					<label>Senha:</label>
					<input type="password" name="senha" required="required" class="input"> 
					<p class="hint">Digite a Senha!</p>
				</div>
				
				<input type="submit" name="entrar" id="btn_cad" class="button" value="Entrar" />
			</form>
	</div>
	
	<div class="logomenu">
			<img alt="editora" width="300" src="data_table/media/img/logo.png">
	</div>
</body>
</html>

<?php
require '../../utilidades/autoLoad.php';
if(isset($_POST['entrar'])) {
	
	$usuario = $_POST['usuario'];
	$senha   = $_POST['senha'];
	
	
	try {
		$instancia= UsuarioFacade::getInstance()->autenticar($usuario, $senha);
	} catch (Exception $e) {
		echo "Falha ao inserir ".$e->getMessage();
	}
}?>


		
		