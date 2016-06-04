<?php
/**
 *
 *Classe responsável por todas exceções de exclusão no sistema
 */
final class ExcluirException extends Exception{

	public  function __construct($mensagem){
		parent::__construct($mensagem);
	}

	public function __construct($mensagem,$codigo){
		parent::__construct($mensagem, $codigo);
	}
}
?>