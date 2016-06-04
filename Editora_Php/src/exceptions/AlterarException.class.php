<?php
/**
 *
 *Classe responsável por todas exceções de alteração no sistema
 */
final class AlterarException extends Exception{
	
 public  function __construct($mensagem){
 	parent::__construct($mensagem);
 }
 	
public function __construct($mensagem,$codigo){
	parent::__construct($mensagem, $codigo);
}
	
}
?>