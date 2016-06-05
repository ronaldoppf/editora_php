<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

require '../../utilidades/autoLoad.php';
include("../../restrito.php");

if (isset ( $_GET ['acao'] ) && $_GET ['acao'] == 'deletar') {
	
	if (isset ( $_GET ['codusuario'] )) {
		$codusuario = intval ( $_GET ['codusuario'] );
		$instancia = UsuarioFacade::getInstance ();
		try {
			$instancia->excluir ( $codusuario );
		} catch ( Exception $e ) {
			echo "Falha ao excluir " . $e->getMessage ();
		}
		if (isset ( $_GET ['ajax'] ) && $_GET ['ajax'] == '1') {
			exit ( '1' );
		}
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Usuario</title>

<script type="text/javascript" src="data_table/media/js/jquery.js"></script>
<script type="text/javascript" src="data_table/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="data_table/media/js/prefix-free.js"></script>


<link rel="stylesheet" type="text/css"	href="data_table/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="data_table/media/css/estilo.css">
<link rel="stylesheet" type="text/css" href="data_table/media/css/iconic.css">
<link rel="stylesheet" type="text/css" href="data_table/media/css/style_menu.css">


<script type="text/javascript">
/*quando o documento html for carregado, executa uma função*/
$(document).ready(function() {
/*Essa função pega o elemento com id = tabela e o transforma numa dataTable*/
  $('#tabela').dataTable();  
});
</script>


<!-- Script responsalvel por ocultar a linha na hora de ecluir -->
<script type="text/javascript">
function excluirUsuario(codusuario, linha) {
	  if (confirm("Deseja realmente excluir este usuario?")) {

	$.get("usuario.php?acao=deletar&codusuario="+codusuario+"&acaoo=excluir&ajax=1").done(function(){
				var objLinha = $("#linha" + linha);
				objLinha.hide({
					effect: "fade",
					complete: function() {
						oTable1.fnDeleteRow(oTable1.fnGetPosition(this));
					}
				});
			}).fail(function() {
				$(".page-content:eq(0)").prepend('<div class="alert alert-danger">Ocorreu um erro.</div>');
			});
	     }
			return false;
		}

</script>
</head>
<body>
<!-- Menu -->
	<div class="wrap">
	
	<nav>
		<ul class="menu">
			<li><a href="../../home.php"><span class="iconic home"></span> Home</a></li>
			<li><a href="pessoa.php"><span class="iconic plus-alt"></span> Pessoa</a>
				<ul>					
				</ul>
			</li>
			<li><a href="livraria.php"><span class="iconic plus-alt"></span> Livraria</a>
				<ul>
				</ul>
			</li>
			<li><a href="departamento.php"><span class="iconic plus-alt"></span> Departamento</a>
				<ul></ul>
			</li>
			<li><a href="exemplar.php"><span class="iconic plus-alt"></span> Exemplar</a>
				<ul>					
				</ul>
			</li>
			<li><a href="funcionario.php"><span class="iconic plus-alt"></span> Funcionario</a>
				<ul>					
				</ul>
			</li>
			<li><a href="autor.php"><span class="iconic plus-alt"></span> Autor</a>
				<ul>					
				</ul>
			</li>
			<li><a href="usuario.php"><span class="iconic plus-alt"></span> Usu&aacute;rio</a>
				<ul>					
				</ul>
			</li>
			<li><a href="?logout=sim"><span class="iconic user"></span>Logout</a>
				<ul>					
				</ul>
			</li>
		</ul>
		<div class="clearfix"></div>
	</nav>
	</div>
	
	<div class="bemvindo">
			 <?php 
			 	echo 'Bem Vindo: '.$_SESSION["usuario"];  
			 	
				if(isset($_GET["logout"])) {
					session_destroy();
					header("Location:login.php");
				}

			 ?>
	</div>
	
	
<!-- Fim do Menu -->

<div class="container_for">
			<!-- Para alteração -->
		<?php
		if (isset ( $_GET ['acao'] ) && $_GET ['acao'] == 'editar') {
			
			$instancia = UsuarioFacade::getInstance ();
			$codusuario = intval ( $_GET ['codusuario'] );
			$retorno   = $instancia->buscarPorCodigo ( $codusuario );
			
			if ($retorno == null) {
				echo "Esse usu&aacute;rio não existe";
			} else {
				$po = new UsuarioPO ();
				$po->setCodusuario ( $retorno [0] ['codusuario'] );
				$po->setNome ( $retorno [0] ['nome'] );
				$po->setUsuario ( $retorno [0] ['usuario'] );
				$po->setSenha ( $retorno [0] ['senha'] );
				$po->setEmail ( $retorno [0] ['email'] );
				?>
				
				<?php
				if (isset ( $_GET ['sucesso'] ) && $_GET ['sucesso'] == 1) {
					echo "<script>alert('alterado com sucesso!')</script>";
				}
				?>
			
			<form method="post" id="contactform" class="rounded">
			<h3>Alterar de Usu&aacute;rio</h3>
				<div class="field">
					<label>Nome:</label>
				    <input type="text" name="nome" required="required" class="input" value="<?php echo $po->getNome(); ?>">
				</div>
				
				<div class="field">
					<label>Usu&aacute;rio:</label>
					<input type="text" name="usuario" required="required" class="input" value="<?php echo $po->getUsuario(); ?>">
				</div>
				
								
				<div class="field">
					<label>Senha: </label>
					<input	type="text" name="senha" required="required" class="input" value="<?php echo $po->getSenha(); ?>">
				</div>
				
				<div class="field">
					<label>E-mail:</label>
					<input type="text" name="email" required="required" class="input" value="<?php echo $po->getEmail(); ?>">
				</div>
				
				<div class="field">
					<input	type="hidden" name="editar" class="input"	value="<?php echo $po->getCodusuario();?>">
				</div>
				
				<input type="submit" name="Submit" id="btn_cad" class="button" value="Atualizar" />
			</form>
			<!-- Fim da alteração -->


			<!-- Para cadastrar -->
			<?php } }else{ ?>
			<form method="post" id="contactform" class="rounded">
			<h3>Cadastro de Usu&aacute;rio</h3>
				<div class="field">
					<label>Nome:</label>
					<input type="text" name="nome" required="required" class="input">
					<p class="hint">Digite o Nome</p>
				</div>
				
				<div class="field">
					<label>Usu&aacute;rio:</label>
					<input type="text" name="usuario"  required="required" class="input"> 
					<p class="hint">Digite o Usu�rio!</p>
				</div>
				
				<div class="field">
					<label>Senha: </label>
					<input type="text" name="senha" required="required" class="input"> 
					<p class="hint">Digite a Senha!</p>
				</div>
				 
				 <div class="field">
					<label>E-mail:</label>
					<input type="text" name="email" required="required" class="input"> 
					<p class="hint">Digite o E-mail!</p>
				</div>
				
				<input type="submit" name="cadastrar" id="btn_cad" class="button" value="Cadastrar" />
			</form>
			<?php }?>
	</div>
	<!-- ###################Fim do cadastrar###################### -->

	<!--Inicio da tabela de listagem-->
<div class="container_tab">
	<table id="tabela" class="display" >
		<!--cabeçalho-->
		<thead>
			<tr>
				<th id="campo_menor">Id:</th>
				<th id="campo_menor">Nome:</th>
				<th id="campo_medio">Usu&aacute;rio:</th>
				<th id="campo_medio">Senha:</th>
				<th id="campo_medio">E-mail:</th>
				<th id="campo_medio">Opção:</th>
			</tr>
		</thead>
		
		<tbody>
		<?php
		// realiza a listagem
		$instancia = UsuarioFacade::getInstance ();
		$retorno = $instancia->buscarTodos();
		
		if ($retorno == null) {
			echo 'Nenhum registro foi encontrado';
		} else {
			$po = new UsuarioPO ();
			$numLinha = 0;
			for($i = 0; $i < count ( $retorno ); $i ++) {
				$po->setCodusuario ( $retorno [$i] ['codusuario'] );
				$po->setNome ( $retorno [$i] ['nome'] );
				$po->setUsuario ( $retorno [$i] ['usuario'] );
				$po->setSenha ( $retorno [$i] ['senha'] );
				$po->setEmail ( $retorno [$i] ['email'] );
				?>
			<tr id="linha<?php echo $numLinha;?>">
				<td><?php echo $po->getCodusuario(); ?></td>
				<td><?php echo $po->getNome(); ?></td>
				<td><?php echo $po->getUsuario(); ?></td>
				<td><?php echo $po->getSenha(); ?></td>
				<td><?php echo $po->getEmail(); ?></td>
				<td>
				<a class="editar" href="usuario.php?acao=editar&codusuario=<?php echo $po->getCodusuario(); ?>">Editar</a>
				<a class="apagar" href="usuario.php?acao=deletar&codusuario=<?php echo $po->getCodusuario(); ?>"
				   onClick="return excluirUsuario(<?php echo $po->getCodusuario(), ', ', $numLinha ?>);">Apagar</a>
				</td>
			</tr>
			<?php
				$numLinha ++;
			}
		}
		?>
		</tbody>
	</table>
	</div>
	<!-- Fim da listagem dos dados -->

</body>
</html>

<!-- Para cadastrar e editar -->
<?php
if(isset($_POST['cadastrar'])) {
	
	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];
	
	try {
		$instancia= UsuarioFacade::getInstance()->inserir($nome, $usuario, $senha, $email );
		echo "Inserido com sucesso ";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=usuario.php'>";		
	} catch (Exception $e) {
		echo "Falha ao inserir ".$e->getMessage();
	}
}

if(isset($_POST['editar'])) {
	$codusuario = $_POST['editar'];
	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];
	
	if ($codusuario>0) {
		try {
			$instancia = UsuarioFacade::getInstance();
			$instancia->alterar( $codusuario, $nome, $usuario, $senha, $email );
			echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=usuario.php'>";
		} catch ( Exception $e ) {
			echo "Falha ao alterar ".$e->getMessage();
		}
	}
}
?>
		
		