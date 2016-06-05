<?php

/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 * 
 *Classe representa a mãe de todos po's do sistema 
 */
abstract class AutorAbstractPO {
	private $codautor;
	
	/**
	 * Método contrutor do objeto
	 */
	public function __construct($codautor) {
		$this->setCodautor ($codautor);
	}
	
	/**
	 * Método responsável por setar o id
	 */
	public function setCodautor($codautor) {
		$this->codautor = $codautor;
	}
	
	/**
	 * Método get reponsável por retornar o atributo id
	 */
	public function getCodautor() {
		return $this->codautor;
	}
	
	/**
	 * Método mágico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codautor:" . $this->codautor;
	}
}
?>