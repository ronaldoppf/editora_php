<?php include("restrito.php") ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<title>Pure CSS3 Menu</title>
		<link rel="stylesheet" type="text/css" href="editora/view/data_table/media/css/iconic.css">
        <link rel="stylesheet" type="text/css" href="editora/view/data_table/media/css/style_menu.css">
		<script type="text/javascript" src="editora/view/data_table/media/js/prefix-free.js"></script>
	</head>

<body>
	<div class="wrap">
	
	<nav>
		<ul class="menu">
			<li><a href="home.php"><span class="iconic home"></span> Home</a></li>
			<li><a href="editora/view/pessoa.php"><span class="iconic plus-alt"></span> Pessoa</a>
				<ul>					
				</ul>
			</li>
			<li><a href="editora/view/livraria.php"><span class="iconic plus-alt"></span> Livraria</a>
				<ul>
				</ul>
			</li>
			<li><a href="editora/view/departamento.php"><span class="iconic plus-alt"></span> Departamento</a>
				<ul></ul>
			</li>
			<li><a href="editora/view/exemplar.php"><span class="iconic plus-alt"></span> Exemplar</a>
				<ul>					
				</ul>
			</li>
			<li><a href="editora/view/funcionario.php"><span class="iconic plus-alt"></span> Funcionario</a>
				<ul>					
				</ul>
			</li>
			<li><a href="editora/view/autor.php"><span class="iconic plus-alt"></span> Autor</a>
				<ul>					
				</ul>
			</li>
			<li><a href="editora/view/usuario.php"><span class="iconic plus-alt"></span> Usu&aacute;rio</a>
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
					header("Location:editora/view/login.php");
				}

			 ?>
	</div>
	
	<div class="conteudo">
			<img alt="" src="editora/view/data_table/media/img/logo.png">
	</div>
</body>

</html>