<?php
/**
 *
 *Classe respons�vel por todas exce��es de exclus�o no sistema
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