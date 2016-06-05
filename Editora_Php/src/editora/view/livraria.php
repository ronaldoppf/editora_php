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
	
	if (isset ( $_GET ['codlivraria'] )) {
		$codlivraria = intval ( $_GET ['codlivraria'] );
		$instancia = LivrariaFacade::getInstance ();
		try {
			$instancia->excluir ( $codlivraria );
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
<title>Livraria</title>

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
function excluirLivraria(codlivraria, linha) {
	  if (confirm("Deseja realmente excluir este livraria?")) {

	$.get("livraria.php?acao=deletar&codlivraria="+codlivraria+"&acaoo=excluir&ajax=1").done(function(){
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
			
			$instancia = LivrariaFacade::getInstance ();
			$codlivraria = intval ( $_GET ['codlivraria'] );
			$retorno   = $instancia->buscarPorCodigo ( $codlivraria );
			
			if ($retorno == null) {
				echo "Esse livraria não existe";
			} else {
				$po = new LivrariaPO ();
				$po->setCodlivraria ( $retorno [0] ['codlivraria'] );
				$po->setCnpj ( $retorno [0] ['cnpj'] );
				$po->setNome ( $retorno [0] ['nome'] );
				$po->setEstado ( $retorno [0] ['estado'] );
				$po->setCidade ( $retorno [0] ['cidade'] );
				$po->setlogradouro ( $retorno [0] ['logradouro'] );
				$po->setCep ( $retorno [0] ['cep'] );
				?>
				
				<?php
				if (isset ( $_GET ['sucesso'] ) && $_GET ['sucesso'] == 1) {
					echo "<script>alert('alterado com sucesso!')</script>";
				}
				?>
			
			<form method="post" id="contactform" class="rounded">
			<h3>Alterar de Livraria</h3>
				<div class="field">
					<label>CNPJ:</label>
				    <input type="text" name="cnpj" required="required" class="input" value="<?php echo $po->getCnpj(); ?>">
				</div>
				
				<div class="field">
					<label>Nome:</label>
					<input type="text" name="nome" required="required" class="input" value="<?php echo $po->getNome(); ?>">
				</div>
				
				<div class="field">
					<label>Estado:</label>
						<select class="input" name="estado" id="estado_id" >
						  <option value="<?php echo $po->getEstado(); ?>">Selecione o Estado</option> 
							<option value="ac">Acre</option> 
							<option value="al">Alagoas</option> 
							<option value="am">Amazonas</option> 
							<option value="ap">Amapá</option> 
							<option value="ba">Bahia</option> 
							<option value="ce">Ceará</option> 
							<option value="df">Distrito Federal</option> 
							<option value="es">Espírito Santo</option> 
							<option value="go">Goiás</option> 
							<option value="ma">Maranhão</option> 
							<option value="mt">Mato Grosso</option> 
							<option value="ms">Mato Grosso do Sul</option> 
							<option value="mg">Minas Gerais</option> 
							<option value="pa">Pará</option> 
							<option value="pb">Paraíba</option> 
							<option value="pr">Paraná</option> 
							<option value="pe">Pernambuco</option> 
							<option value="pi">Piauí</option> 
							<option value="rj">Rio de Janeiro</option> 
							<option value="rn">Rio Grande do Norte</option> 
							<option value="ro">Rondônia</option> 
							<option value="rs">Rio Grande do Sul</option> 
							<option value="rr">Roraima</option> 
							<option value="sc">Santa Catarina</option> 
							<option value="se">Sergipe</option> 
							<option value="sp">São Paulo</option> 
							<option value="to">Tocantins</option> 
						</select>
					<p class="hint">Digite o Estado!</p>
				</div>
								
				<div class="field">
					<label>Cidade: </label>
					<input	type="text" name="cidade" required="required" class="input" value="<?php echo $po->getCidade(); ?>">
				</div>
				
				<div class="field">
					<label>Logradouro:</label>
					<input type="text" name="logradouro" required="required" class="input" value="<?php echo $po->getLogradouro(); ?>">
				</div>
				
				<div class="field">
					<label>CEP: </label>
					<input type="text" name="cep" required="required" class="input" value="<?php echo $po->getCep(); ?>">
				</div>
				
				<div class="field">
					<input	type="hidden" name="editar" class="input"	value="<?php echo $po->getCodlivraria();?>">
				</div>

				<input type="submit" name="Submit" id="btn_cad" class="button" value="Atualizar" />
			</form>
			<!-- Fim da alteração -->


			<!-- Para cadastrar -->
			<?php } }else{ ?>
			<form method="post" id="contactform" class="rounded">
			<h3>Cadastro de Livraria</h3>
				<div class="field">
					<label>CNPJ:</label>
					<input type="text" name="cnpj" required="required" class="input">
					<p class="hint">Digite o CNPJ!</p>
				</div>
				
				<div class="field">
					<label>Nome:</label>
					<input type="text" name="nome" required="required" class="input"> 
					<p class="hint">Digite o Nome!</p>
				</div>
				
				<div class="field">
					<label>Estado:</label>
						<select class="input" name="estado" id="estado_id" >
						  <option value="estado">Selecione o Estado</option> 
							<option value="ac">Acre</option> 
							<option value="al">Alagoas</option> 
							<option value="am">Amazonas</option> 
							<option value="ap">Amapá</option> 
							<option value="ba">Bahia</option> 
							<option value="ce">Ceará</option> 
							<option value="df">Distrito Federal</option> 
							<option value="es">Espírito Santo</option> 
							<option value="go">Goiás</option> 
							<option value="ma">Maranhão</option> 
							<option value="mt">Mato Grosso</option> 
							<option value="ms">Mato Grosso do Sul</option> 
							<option value="mg">Minas Gerais</option> 
							<option value="pa">Pará</option> 
							<option value="pb">Paraíba</option> 
							<option value="pr">Paraná</option> 
							<option value="pe">Pernambuco</option> 
							<option value="pi">Piauí</option> 
							<option value="rj">Rio de Janeiro</option> 
							<option value="rn">Rio Grande do Norte</option> 
							<option value="ro">Rondônia</option> 
							<option value="rs">Rio Grande do Sul</option> 
							<option value="rr">Roraima</option> 
							<option value="sc">Santa Catarina</option> 
							<option value="se">Sergipe</option> 
							<option value="sp">São Paulo</option> 
							<option value="to">Tocantins</option> 
						</select>
					<p class="hint">Digite o Estado!</p>
				</div>
				
				<div class="field">
					<label>Cidade: </label>
					<input type="text" name="cidade" required="required" class="input"> 
					<p class="hint">Digite a Cidade!</p>
				</div>
				 
				 <div class="field">
					<label>Logradouro:</label>
					<input type="text" name="logradouro"  required="required" class="input"> 
					<p class="hint">Digite o Logradouro!</p>
				</div>
				
				<div class="field">
					<label>CEP: </label>
					<input type="text" name="cep" required="required" class="input">
					<p class="hint">Digite o CEP!</p>
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
				<th id="campo_menor">CNPJ:</th>
				<th id="campo_medio">Nome:</th>
				<th id="campo_medio">Estado:</th>
				<th id="campo_medio">Cidade:</th>
				<th id="campo_medio">Logradouro:</th>
				<th id="campo_maior">Cep:</th>
				<th id="campo_medio">Opção:</th>
			</tr>
		</thead>
		
		<tbody>
		<?php
		// realiza a listagem
		$instancia = LivrariaFacade::getInstance ();
		$retorno = $instancia->buscarTodos();
		
		if ($retorno == null) {
			echo 'Nenhum registro foi encontrado';
		} else {
			$po = new LivrariaPO ();
			$numLinha = 0;
			for($i = 0; $i < count ( $retorno ); $i ++) {
				$po->setCodlivraria ( $retorno [$i] ['codlivraria'] );
				$po->setCnpj ( $retorno [$i] ['cnpj'] );
				$po->setNome ( $retorno [$i] ['nome'] );
				$po->setEstado ( $retorno [$i] ['estado'] );
				$po->setCidade ( $retorno [$i] ['cidade'] );
				$po->setLogradouro ( $retorno [$i] ['logradouro'] );
				$po->setCep ( $retorno [$i] ['cep'] );
				?>
			<tr id="linha<?php echo $numLinha;?>">
				<td><?php echo $po->getCodlivraria(); ?></td>
				<td><?php echo $po->getCep(); ?></td>
				<td><?php echo $po->getNome(); ?></td>
				<td><?php echo $po->getEstado(); ?></td>
				<td><?php echo $po->getCidade(); ?></td>
				<td><?php echo $po->getLogradouro(); ?></td>
				<td><?php echo $po->getCep(); ?></td>
				<td>
				<a class="editar" href="livraria.php?acao=editar&codlivraria=<?php echo $po->getCodlivraria(); ?>">Editar</a>
				<a class="apagar" href="livraria.php?acao=deletar&codlivraria=<?php echo $po->getCodlivraria(); ?>"
				   onClick="return excluirLivraria(<?php echo $po->getCodlivraria(), ', ', $numLinha ?>);">Apagar</a>
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
	
	$cnpj = $_POST['cnpj'];
	$nome = $_POST['nome'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$logradouro = $_POST['logradouro'];
	$cep = $_POST['cep'];
	
	try {
		$instancia= LivrariaFacade::getInstance()->inserir($cnpj, $nome, $estado, $cidade, $logradouro, $cep );
		echo "Inserido com sucesso ";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=livraria.php'>";		
	} catch (Exception $e) {
		echo "Falha ao inserir ".$e->getMessage();
	}
}

if(isset($_POST['editar'])) {
	$codlivraria = $_POST['editar'];
	$cnpj = $_POST['cnpj'];
	$nome = $_POST['nome'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$logradouro = $_POST['logradouro'];
	$cep = $_POST['cep'];
	
	if ($codlivraria>0) {
		try {
			$instancia = LivrariaFacade::getInstance();
			$instancia->alterar( $codlivraria, $cnpj, $nome, $estado, $cidade, $logradouro, $cep );
			echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=livraria.php'>";
		} catch ( Exception $e ) {
			echo "Falha ao alterar ".$e->getMessage();
		}
	}
}
?>
		
		