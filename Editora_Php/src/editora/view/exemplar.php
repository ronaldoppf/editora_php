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
	
	if (isset ( $_GET ['codexemplar'] )) {
		$codexemplar = intval ( $_GET ['codexemplar'] );
		$instancia = ExemplarFacade::getInstance ();
		try {
			$instancia->excluir ( $codexemplar );
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
<title>Exemplar</title>

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
function excluirExemplar(codexemplar, linha) {
	  if (confirm("Deseja realmente excluir este exemplar?")) {

	$.get("exemplar.php?acao=deletar&codexemplar="+codexemplar+"&acaoo=excluir&ajax=1").done(function(){
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
			
			$instancia = ExemplarFacade::getInstance ();
			$codexemplar = intval ( $_GET ['codexemplar'] );
			$retorno   = $instancia->buscarPorCodigo ( $codexemplar );
			
			if ($retorno == null) {
				echo "Esse exemplar não existe";
			} else {
				$po = new ExemplarPO ();
				$po->setCodexemplar ( $retorno [0] ['codexemplar'] );
				$po->setTitulo ( $retorno [0] ['titulo'] );
				$po->setNumpaginas ( $retorno [0] ['numpaginas'] );
				$po->setTipo ( $retorno [0] ['tipo'] );
				?>
				
				<?php
				if (isset ( $_GET ['sucesso'] ) && $_GET ['sucesso'] == 1) {
					echo "<script>alert('alterado com sucesso!')</script>";
				}
				?>
			
			<form method="post" id="contactform" class="rounded">
			<h3>Alterar de Exemplar</h3>
				<div class="field">
					<label>Titulo:</label>
				    <input type="text" name="titulo" required="required" class="input" value="<?php echo $po->getTitulo(); ?>">
				</div>
				
				<div class="field">
					<label>N. P&aacute;ginas:</label>
					<input type="text" name="numpaginas" required="required" class="input" value="<?php echo $po->getNumpaginas(); ?>">
				</div>
				
				<div class="field">
					<label>Tipo: </label>
					<input	type="text" name="tipo" required="required" class="input" value="<?php echo $po->getTipo(); ?>">
				</div>
				
				<div class="field">
					<input	type="hidden" name="editar" class="input"	value="<?php echo $po->getCodexemplar();?>">
				</div>

				<input type="submit" name="Submit" id="btn_cad" class="button" value="Atualizar" />
			</form>
			<!-- Fim da alteração -->


			<!-- Para cadastrar -->
			<?php } }else{ ?>
			<form method="post" id="contactform" class="rounded">
			<h3>Cadastro de Exemplar</h3>
				<div class="field">
					<label>Titulo:</label>
					<input type="text" name="titulo" required="required" class="input">
					<p class="hint">Digite o Titulo!</p>
				</div>
				
				<div class="field">
					<label>N. P&aacute;ginas:</label>
					<input type="text" name="numpaginas" required="required" class="input"> 
					<p class="hint">Digite o N�mero de Paginas!</p>
				</div>
				
				<div class="field">
					<label>Tipo: </label>
					<input type="text" name="tipo" required="required" class="input"> 
					<p class="hint">Digite a Tipo!</p>
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
				<th id="campo_menor">Titulo:</th>
				<th id="campo_medio">N&uacute;mero de P&aacute;ginas:</th>
				<th id="campo_medio">Tipo:</th>
				<th id="campo_medio">Opção:</th>
			</tr>
		</thead>
		
		<tbody>
		<?php
		// realiza a listagem
		$instancia = ExemplarFacade::getInstance ();
		$retorno = $instancia->buscarTodos();
		
		if ($retorno == null) {
			echo 'Nenhum registro foi encontrado';
		} else {
			$po = new ExemplarPO ();
			$numLinha = 0;
			for($i = 0; $i < count ( $retorno ); $i ++) {
				$po->setCodexemplar ( $retorno [$i] ['codexemplar'] );
				$po->setTitulo ( $retorno [$i] ['titulo'] );
				$po->setNumpaginas ( $retorno [$i] ['numpaginas'] );
				$po->setTipo ( $retorno [$i] ['tipo'] );
				?>
			<tr id="linha<?php echo $numLinha;?>">
				<td><?php echo $po->getCodexemplar(); ?></td>
				<td><?php echo $po->getTitulo(); ?></td>
				<td><?php echo $po->getNumpaginas(); ?></td>
				<td><?php echo $po->getTipo(); ?></td>
       				<td>
				<a class="editar" href="exemplar.php?acao=editar&codexemplar=<?php echo $po->getCodexemplar(); ?>">Editar</a>
				<a class="apagar" href="exemplar.php?acao=deletar&codexemplar=<?php echo $po->getCodexemplar(); ?>"
				   onClick="return excluirExemplar(<?php echo $po->getCodexemplar(), ', ', $numLinha ?>);">Apagar</a>
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
	
	$titulo = $_POST['titulo'];
	$numpaginas = $_POST['numpaginas'];
	$tipo = $_POST['tipo'];
	
	try {
		$instancia= ExemplarFacade::getInstance()->inserir($titulo, $numpaginas, $tipo);
		echo "Inserido com sucesso ";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=exemplar.php'>";		
	} catch (Exception $e) {
		echo "Falha ao inserir ".$e->getMessage();
	}
}

if(isset($_POST['editar'])) {
	$codexemplar = $_POST['editar'];
	$titulo = $_POST['titulo'];
	$numpaginas = $_POST['numpaginas'];
	$tipo = $_POST['tipo'];
	
	if ($codexemplar>0) {
		try {
			$instancia = ExemplarFacade::getInstance();
			$instancia->alterar( $codexemplar, $titulo, $numpaginas, $tipo );
			echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=exemplar.php'>";
		} catch ( Exception $e ) {
			echo "Falha ao alterar ".$e->getMessage();
		}
	}
}
?>
		
		