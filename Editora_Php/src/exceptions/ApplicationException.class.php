<?php
/**
 *
 *Classe respons�vel por todas exce��es de Aplica��o no sistema
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