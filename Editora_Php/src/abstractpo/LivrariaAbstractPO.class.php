<?php
/**
 * 
 *Classe representa a mãe de todos po's do sistema 
 */
abstract class LivrariaAbstractPO {
	private $codlivraria;
	
	/**
	 * Método contrutor do objeto
	 */
	public function __construct($codlivraria) {
		$this->setCodlivraria ($codlivraria);
	}
	
	/**
	 * Método responsável por setar o id
	 */
	public function setCodlivraria($codlivraria) {
		$this->codlivraria = $codlivraria;
	}
	
	/**
	 * Método get reponsável por retornar o atributo id
	 */
	public function getCodlivraria() {
		return $this->codlivraria;
	}
	
	/**
	 * Método mágico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codlivraria:" . $this->codlivraria;
	}
}
?>