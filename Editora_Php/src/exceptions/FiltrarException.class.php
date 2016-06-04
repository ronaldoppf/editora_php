<?php
/**
 *
 *Classe responsável por todas exceções de pesquisa com banco de dados no sistema
 */
final class FiltrarException extends Exception{
	public  function __construct($mensagem){
		parent::__construct($mensagem);
	}

	public function __construct($mensagem,$codigo){
		parent::__construct($mensagem, $codigo);
	}

}
?>