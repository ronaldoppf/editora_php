<?php
require '../../utilidades/autoLoad.php';
include("../../restrito.php");

if (isset ( $_GET ['acao'] ) && $_GET ['acao'] == 'deletar') {
	
	if (isset ( $_GET ['coddep'] )) {
		$coddep = intval ( $_GET ['coddep'] );
		$instancia = DepartamentoFacade::getInstance ();
		try {
			$instancia->excluir ( $coddep );
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
<title>Departamento</title>

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
function excluirDepartamento(coddep, linha) {
	  if (confirm("Deseja realmente excluir este departamento?")) {

	$.get("departamento.php?acao=deletar&coddep="+coddep+"&acaoo=excluir&ajax=1").done(function(){
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
			
			$instancia = DepartamentoFacade::getInstance ();
			$coddep = intval ( $_GET ['coddep'] );
			$retorno   = $instancia->buscarPorCodigo ( $coddep );
			
			if ($retorno == null) {
				echo "Esse departamento não existe";
			} else {
				$po = new DepartamentoPO ();
				$po->setCoddep ( $retorno [0] ['coddep'] );
				$po->setNomedep ( $retorno [0] ['nomedep'] );
				?>
				
				<?php
				if (isset ( $_GET ['sucesso'] ) && $_GET ['sucesso'] == 1) {
					echo "<script>alert('alterado com sucesso!')</script>";
				}
				?>
			
			<form method="post" id="contactform" class="rounded">
			<h3>Alterar de Departamento</h3>
				<div class="field">
					<label>Departamento:</label>
				    <input type="text" name="nomedep" required="required" class="input" value="<?php echo $po->getNomedep(); ?>">
				</div>
				
				<div class="field">
					<input	type="hidden" name="editar" class="input"	value="<?php echo $po->getCoddep();?>">
				</div>

				<input type="submit" name="Submit" id="btn_cad" class="button" value="Atualizar" />
			</form>
			<!-- Fim da alteração -->


			<!-- Para cadastrar -->
			<?php } }else{ ?>
			<form method="post" id="contactform" class="rounded">
			<h3>Cadastro de Departamento</h3>
				<div class="field">
					<label>Departamento:</label>
					<input type="text" name="nomedep" required="required" class="input">
					<p class="hint">Digite o nome do Departamento!</p>
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
				<th id="campo_menor">Departamento:</th>
				<th id="campo_medio">Opção:</th>
			</tr>
		</thead>
		
		<tbody>
		<?php
		// realiza a listagem
		$instancia = DepartamentoFacade::getInstance ();
		$retorno = $instancia->buscarTodos();
		
		if ($retorno == null) {
			echo 'Nenhum registro foi encontrado';
		} else {
			$po = new DepartamentoPO ();
			$numLinha = 0;
			for($i = 0; $i < count ( $retorno ); $i ++) {
				$po->setCoddep ( $retorno [$i] ['coddep'] );
				$po->setNomedep( $retorno [$i] ['nomedep'] );
				?>
			<tr id="linha<?php echo $numLinha;?>">
				<td><?php echo $po->getCoddep(); ?></td>
				<td><?php echo $po->getNomedep(); ?></td>
				<td>
				<a class="editar" href="departamento.php?acao=editar&coddep=<?php echo $po->getCoddep(); ?>">Editar</a>
				<a class="apagar" href="departamento.php?acao=deletar&coddep=<?php echo $po->getCoddep(); ?>"
				   onClick="return excluirDepartamento(<?php echo $po->getCoddep(), ', ', $numLinha ?>);">Apagar</a>
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
	
	$nomedep = $_POST['nomedep'];
		
	try {
		$instancia= DepartamentoFacade::getInstance()->inserir($nomedep );
		echo "Inserido com sucesso ";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=departamento.php'>";		
	} catch (Exception $e) {
		echo "Falha ao inserir ".$e->getMessage();
	}
}

if(isset($_POST['editar'])) {
	$coddep = $_POST['editar'];
	$nomedep = $_POST['nomedep'];
	
	if ($coddep>0) {
		try {
			$instancia = DepartamentoFacade::getInstance();
			$instancia->alterar( $coddep, $nomedep);
			echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=departamento.php'>";
		} catch ( Exception $e ) {
			echo "Falha ao alterar ".$e->getMessage();
		}
	}
}
?>
		
		