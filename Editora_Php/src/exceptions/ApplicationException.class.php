<?php
/**
 *
 *Classe responsável por todas exceções de Aplicação no sistema
 */
final class ApplicationException extends Exception{
	
	public  function __construct($mensagem){
		parent::__construct($mensagem);
	}

	public function __construct($mensagem,$codigo){
		parent::__construct($mensagem, $codigo);
	}

}

?>