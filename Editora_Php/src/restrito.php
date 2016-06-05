<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

@session_start();

if(isset($_SESSION["usuario"])){
	
}else{
	header("Location:login.php");
	
}

?>
