<?php
/**
 *
 *Classe respons�vel por todas exce��es de commit no sistema
 */
final class CommitException extends Exception{
	public  function __construct($mensagem){
		parent::__construct($mensagem);
	}

	public function __construct($mensagem,$codigo){
		parent::__construct($mensagem, $codigo);
	}

}
?>