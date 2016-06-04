<?php
require '../../utilidades/autoLoad.php';
include("../../restrito.php");

if (isset ( $_GET ['acao'] ) && $_GET ['acao'] == 'deletar') {
	
	if (isset ( $_GET ['codfun'] )) {
		$codfun = intval ( $_GET ['codfun'] );
		$instancia = FuncionarioFacade::getInstance ();
		try {
			$instancia->excluir ( $codfun );
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
<title>Funcionario</title>

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
function excluirFuncionario(codfun, linha) {
	  if (confirm("Deseja realmente excluir este funcionario?")) {

	$.get("funcionario.php?acao=deletar&codfun="+codfun+"&acaoo=excluir&ajax=1").done(function(){
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
			<li><a href="Pessoa.php"><span class="iconic plus-alt"></span> Pessoa</a>
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
			
			$instancia = FuncionarioFacade::getInstance ();
			$codfun = intval ( $_GET ['codfun'] );
			$retorno   = $instancia->buscarPorCodigo ( $codfun );
			
			if ($retorno == null) {
				echo "Esse funcionario não existe";
			} else {
				$poF = new FuncionarioPO();
				$poF->setCodfun ( $retorno [0] ['codfun'] );
				$poF->setCpf( $retorno [0] ['cpf'] );
				$poF->setCargo( $retorno [0] ['cargo'] );
				$poF->setCoddep( $retorno [0] ['coddep'] );
				$poF->setSalario( $retorno [0] ['salario'] );
				?>
				
				<?php
				if (isset ( $_GET ['sucesso'] ) && $_GET ['sucesso'] == 1) {
					echo "<script>alert('alterado com sucesso!')</script>";
				}
				?>
			
			<form method="post" id="contactform" class="rounded">
			<h3>Alterar de Funcionario</h3>
				<div class="field">
					<label>CPF:</label>
				    <input type="text" name="cpf" required="required" class="input" value="<?php echo $poF->getCpf(); ?>">
				</div>
				
				<div class="field">
					<label>Cargo:</label>
					<input type="text" name="cargo" required="required" class="input" value="<?php echo $poF->getCargo(); ?>">
				</div>
				
				<div class="field">
					<?php
					// realiza a listagem do departamento
					$instancia = DepartamentoFacade::getInstance ();
					$retorno = $instancia->buscarTodos();
					$poD = new DepartamentoPO ();?>
					<label>Departamento:</label>
					<select class="input" required="required" name="coddep" id="coddep_id" >
						 <option  value="departamento" >Selecione um departamento</option> 
						 <?php for($i = 0; $i < count ( $retorno ); $i ++) {
								$poD->setCoddep ( $retorno [$i] ['coddep'] );
								$poD->setNomedep ( $retorno [$i] ['nomedep'] );?>
 						 <option value="<?php echo $poD->getCoddep(); ?>"><?php echo $poD->getNomedep(); ?></option> 
 						 <?php }?>
					</select>
				</div>
				
				<div class="field">
					<label>Sal&aacute;rio: </label>
					<input	type="text" name="salario" required="required" class="input" value="<?php echo $poF->getSalario(); ?>">
				</div>
				
				<div class="field">
					<input	type="hidden" name="editar" class="input"	value="<?php echo $poF->getCodfun(); ?>">
				</div>

				<input type="submit" name="Submit" id="btn_cad" class="button" value="Atualizar" />
			</form>
			<!-- Fim da alteração -->


			<!-- Para cadastrar -->
			<?php } }else{ ?>
			<form method="post" id="contactform" class="rounded">
			<h3>Cadastro de Funcionario</h3>
				<div class="field">
					<label>CPF:</label>
					<input type="text" name="cpf" required="required" class="input">
					<p class="hint">Digite o CPF!</p>
				</div>
				
				<div class="field">
					<label>Cargo:</label>
					<input type="text" name="cargo"  required="required" class="input"> 
					<p class="hint">Digite o Cargo!</p>
				</div>
				
				<div class="field">
			<?php
			// realiza a listagem do departamento
			$instancia = DepartamentoFacade::getInstance ();
			$retorno = $instancia->buscarTodos();
			$po = new DepartamentoPO ();?>
					<label>Departamento:</label>
					<select class="input" required="required" name="coddep" id="coddep_id" >
						 <option  value="departamento" >Selecione um departamento</option> 
						 <?php for($i = 0; $i < count ( $retorno ); $i ++) {
								$po->setCoddep ( $retorno [$i] ['coddep'] );
								$po->setNomedep ( $retorno [$i] ['nomedep'] );?>
 						 <option value="<?php echo $po->getCoddep(); ?>"><?php echo $po->getNomedep(); ?></option> 
 						 <?php }?>
					</select>
					<p class="hint">Selecione o Departamento!</p>
				</div>
				
				<div class="field">
					<label>Sal&aacute;rio: </label>
					<input type="text" name="salario" required="required" class="input"> 
					<p class="hint">Digite o Sl�rio!</p>
				</div>
				 
				<input type="submit" name="cadastrar" id="btn_cad" class="button" value="Cadastrar" />
			</form>
			<?php }?>
	</div>
	<!-- ###################Fim do cadastrar###################### -->

	<!--Inicio da tabela de listagem-->
<div class="container_tab">
	<table id="tabela" class="display">
		<!--cabeçalho-->
		<thead>
			<tr>
				<th id="campo_menor">Id:</th>
				<th id="campo_menor">CPF:</th>
				<th id="campo_medio">Nome:</th>
				<th id="campo_medio">Estado:</th>
				<th id="campo_medio">Cidade:</th>
				<th id="campo_medio">Logradouro:</th>
				<th id="campo_medio">CEP:</th>
				<th id="campo_medio">Cargo:</th>
				<th id="campo_medio">Departamento:</th>
				<th id="campo_medio">Sal&aacute;rio:</th>
				<th id="campo_medio">Opção:</th>
			</tr>
		</thead>
		
		<tbody>
		<?php
		// realiza a listagem
		$instancia = FuncionarioFacade::getInstance ();
		$retorno = $instancia->buscarTodos();
		
		if ($retorno == null) {
			echo 'Nenhum registro foi encontrado';
		} else {
			$poF = new FuncionarioPO ();
			$poP = new PessoaPO ();
			$poD = new DepartamentoPO ();
			$numLinha = 0;
			for($i = 0; $i < count ( $retorno ); $i ++) {
				$poF->setCodfun ( $retorno [$i] ['codfun'] );
				$poF->setCpf ( $retorno [$i] ['cpf'] );
				$poP->setNome( $retorno [$i] ['nome'] );
				$poP->setEstado ( $retorno [$i] ['estado'] );
				$poP->setCidade ( $retorno [$i] ['cidade'] );
				$poP->setLogradouro ( $retorno [$i] ['logradouro'] );
				$poP->setCep ( $retorno [$i] ['cep'] );
				$poF->setCargo( $retorno [$i] ['cargo'] );
				$poD->setNomedep( $retorno [$i] ['nomedep'] );
				$poF->setSalario( $retorno [$i] ['salario'] );
				
				?>
			<tr id="linha<?php echo $numLinha;?>">
				<td><?php echo $poF->getCodfun(); ?></td>
				<td><?php echo $poF->getCpf(); ?></td>
				<td><?php echo $poP->getNome(); ?></td>
				<td><?php echo $poP->getEstado(); ?></td>
				<td><?php echo $poP->getCidade(); ?></td>
				<td><?php echo $poP->getLogradouro(); ?></td>
				<td><?php echo $poP->getCep(); ?></td>
				<td><?php echo $poF->getCargo(); ?></td>
				<td><?php echo $poD->getNomedep(); ?></td>
				<td><?php echo $poF->getSalario(); ?></td>
				<td>
				<a class="editar" href="funcionario.php?acao=editar&codfun=<?php echo $poF->getCodfun(); ?>">Editar</a>
				<a class="apagar" href="funcionario.php?acao=deletar&codfun=<?php echo $poF->getCodfun(); ?>"
				   onClick="return excluirFuncionario(<?php echo $poF->getCodfun(), ', ', $numLinha ?>);">Apagar</a>
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
	$cargo = $_POST['cargo'];
	$coddep = $_POST['coddep'];
	$salario = $_POST['salario'];
	
	try {
		$instancia= FuncionarioFacade::getInstance()->inserir($cpf, $cargo, $coddep, $salario );
		echo "Inserido com sucesso ";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=funcionario.php'>";		
	} catch (Exception $e) {
		echo "Falha ao inserir ".$e->getMessage();
	}
}

if(isset($_POST['editar'])) {
	$codfun = $_POST['editar'];
	$cpf = $_POST['cpf'];
	$cargo = $_POST['cargo'];
	$coddep = $_POST['coddep'];
	$salario = $_POST['salario'];
	
	if ($codfun>0) {
		try {
			$instancia = FuncionarioFacade::getInstance();
			$instancia->alterar( $codfun, $cpf, $cargo, $coddep, $salario );
			echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=funcionario.php'>";
		} catch ( Exception $e ) {
			echo "Falha ao alterar ".$e->getMessage();
		}
	}
}
?>
		
		