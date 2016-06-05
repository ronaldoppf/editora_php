<?php

/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 * 
 *Classe representa a m�e de todos po's do sistema 
 */
abstract class AutorAbstractPO {
	private $codautor;
	
	/**
	 * M�todo contrutor do objeto
	 */
	public function __construct($codautor) {
		$this->setCodautor ($codautor);
	}
	
	/**
	 * M�todo respons�vel por setar o id
	 */
	public function setCodautor($codautor) {
		$this->codautor = $codautor;
	}
	
	/**
	 * M�todo get repons�vel por retornar o atributo id
	 */
	public function getCodautor() {
		return $this->codautor;
	}
	
	/**
	 * M�todo m�gico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codautor:" . $this->codautor;
	}
}
?>