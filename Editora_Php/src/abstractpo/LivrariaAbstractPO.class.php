<?php
/**
 * 
 *Classe representa a m�e de todos po's do sistema 
 */
abstract class LivrariaAbstractPO {
	private $codlivraria;
	
	/**
	 * M�todo contrutor do objeto
	 */
	public function __construct($codlivraria) {
		$this->setCodlivraria ($codlivraria);
	}
	
	/**
	 * M�todo respons�vel por setar o id
	 */
	public function setCodlivraria($codlivraria) {
		$this->codlivraria = $codlivraria;
	}
	
	/**
	 * M�todo get repons�vel por retornar o atributo id
	 */
	public function getCodlivraria() {
		return $this->codlivraria;
	}
	
	/**
	 * M�todo m�gico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codlivraria:" . $this->codlivraria;
	}
}
?>