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
abstract class ExemplarAbstractPO {
	private $codexemplar;
	
	/**
	 * M�todo contrutor do objeto
	 */
	public function __construct($codexemplar) {
		$this->setCodexemplar ($codexemplar);
	}
	
	/**
	 * M�todo respons�vel por setar o id
	 */
	public function setCodexemplar($codexemplar) {
		$this->codexemplar = $codexemplar;
	}
	
	/**
	 * M�todo get repons�vel por retornar o atributo id
	 */
	public function getCodexemplar() {
		return $this->codexemplar;
	}
	
	/**
	 * M�todo m�gico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codexemplar:" . $this->codexemplar;
	}
}
?>