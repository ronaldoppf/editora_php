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
abstract class ExemplarAbstractPO {
	private $codexemplar;
	
	/**
	 * Método contrutor do objeto
	 */
	public function __construct($codexemplar) {
		$this->setCodexemplar ($codexemplar);
	}
	
	/**
	 * Método responsável por setar o id
	 */
	public function setCodexemplar($codexemplar) {
		$this->codexemplar = $codexemplar;
	}
	
	/**
	 * Método get reponsável por retornar o atributo id
	 */
	public function getCodexemplar() {
		return $this->codexemplar;
	}
	
	/**
	 * Método mágico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codexemplar:" . $this->codexemplar;
	}
}
?>