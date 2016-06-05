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
	
	if (isset ( $_GET ['codautor'] )) {
		$codautor = intval ( $_GET ['codautor'] );
		$instancia = AutorFacade::getInstance ();
		try {
			$instancia->excluir ( $codautor );
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Autor</title>

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
function excluirAutor(codautor, linha) {
	  if (confirm("Deseja realmente excluir este autor?")) {

	$.get("autor.php?acao=deletar&codautor="+codautor+"&acaoo=excluir&ajax=1").done(function(){
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
			
			$instancia = AutorFacade::getInstance ();
			$codautor = intval ( $_GET ['codautor'] );
			$retorno   = $instancia->buscarPorCodigo ( $codautor );
			
			if ($retorno == null) {
				echo "Esse autor não existe";
			} else {
				$po = new AutorPO ();
				$po->setCodautor ( $retorno [0] ['codautor'] );
				$po->setCpf( $retorno [0] ['cpf'] );
				$po->setArealiteraria( $retorno [0] ['arealiteraria'] );
				$po->setFormacao( $retorno [0] ['formacao'] );
				?>
				
				<?php
				if (isset ( $_GET ['sucesso'] ) && $_GET ['sucesso'] == 1) {
					echo "<script>alert('alterado com sucesso!')</script>";
				}
				?>
			
			<form method="post" id="contactform" class="rounded">
			<h3>Alterar de Autor</h3>
				<div class="field">
					<label>CPF:</label>
				    <input type="text" name="cpf" required="required" class="input" value="<?php echo $po->getCpf(); ?>">
				</div>
				
				<div class="field">
					<label>	&Aacute;rea Literaria:</label>
					<input type="text" name="arealiteraria" required="required" class="input" value="<?php echo $po->getArealiteraria(); ?>">
				</div>
				
				<div class="field">
					<label>Forma&ccedil;&atilde;o: </label>
					<input	type="text" name="formacao" required="required" class="input" value="<?php echo $po->getFormacao(); ?>">
				</div>
				
				<div class="field">
					<input	type="hidden" name="editar" class="input"	value="<?php echo $po->getCodautor();?>">
				</div>

				<input type="submit" name="Submit" id="btn_cad" class="button" value="Atualizar" />
			</form>
			<!-- Fim da alteração -->


			<!-- Para cadastrar -->
			<?php } }else{ ?>
			<form method="post" id="contactform" class="rounded">
			<h3>Cadastro de Autor</h3>
				<div class="field">
					<label>CPF:</label>
					<input type="text" name="cpf" required="required" class="input">
					<p class="hint">Digite o CPF!</p>
				</div>
				
				<div class="field">
					<label>&Aacute;rea Literaria:</label>
					<input type="text" name="arealiteraria" required="required" class="input"> 
					<p class="hint">Digite o N�mero a �rea Literaria!</p>
				</div>
				
				<div class="field">
					<label>Forma&ccedil;&atilde;o:</label>
					<input type="text" name="formacao" required="required" class="input"> 
					<p class="hint">Digite a Forma��o!</p>
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
				<th id="campo_menor">CPF:</th>
				<th id="campo_medio">&Aacute;rea Literaria:</th>
				<th id="campo_medio">Forma&ccedil;&atilde;o:</th>
				<th id="campo_medio">Opção:</th>
			</tr>
		</thead>
		
		<tbody>
		<?php
		// realiza a listagem
		$instancia = AutorFacade::getInstance ();
		$retorno = $instancia->buscarTodos();
		
		if ($retorno == null) {
			echo 'Nenhum registro foi encontrado';
		} else {
			$po = new AutorPO ();
			$numLinha = 0;
			for($i = 0; $i < count ( $retorno ); $i ++) {
				$po->setCodautor ( $retorno [$i] ['codautor'] );
				$po->setCpf( $retorno [$i] ['cpf'] );
				$po->setArealiteraria( $retorno [$i] ['arealiteraria'] );
				$po->setFormacao( $retorno [$i] ['formacao'] );
				?>
			<tr id="linha<?php echo $numLinha;?>">
				<td><?php echo $po->getCodautor(); ?></td>
				<td><?php echo $po->getCpf(); ?></td>
				<td><?php echo $po->getArealiteraria(); ?></td>
				<td><?php echo $po->getFormacao(); ?></td>
       				<td>
				<a class="editar" href="autor.php?acao=editar&codautor=<?php echo $po->getCodautor(); ?>">Editar</a>
				<a class="apagar" href="autor.php?acao=deletar&codautor=<?php echo $po->getCodautor(); ?>"
				   onClick="return excluirAutor(<?php echo $po->getCodautor(), ', ', $numLinha ?>);">Apagar</a>
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
	
	$cpf = $_POST['cpf'];
	$arealiteraria = $_POST['arealiteraria'];
	$formacao = $_POST['formacao'];
	
	try {
		$instancia= AutorFacade::getInstance()->inserir($cpf, $arealiteraria, $formacao);
		echo "Inserido com sucesso ";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=autor.php'>";		
	} catch (Exception $e) {
		echo "Falha ao inserir ".$e->getMessage();
	}
}

if(isset($_POST['editar'])) {
	$codautor = $_POST['editar'];
	$cpf = $_POST['cpf'];
	$arealiteraria = $_POST['arealiteraria'];
	$formacao = $_POST['formacao'];
	
	if ($codautor>0) {
		try {
			$instancia = AutorFacade::getInstance();
			$instancia->alterar( $codautor, $cpf, $arealiteraria, $formacao );
			echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=autor.php'>";
		} catch ( Exception $e ) {
			echo "Falha ao alterar ".$e->getMessage();
		}
	}
}
?>
		
		