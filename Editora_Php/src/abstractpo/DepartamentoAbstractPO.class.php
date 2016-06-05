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
abstract class DepartamentoAbstractPO {
	private $coddep;
	
	/**
	 * M�todo contrutor do objeto
	 */
	public function __construct($coddep) {
		$this->setCoddep ( $coddep );
	}
	
	/**
	 * M�todo respons�vel por setar o id
	 */
	public function setCoddep($coddep) {
		$this->coddep = $coddep;
	}
	
	/**
	 * M�todo get repons�vel por retornar o atributo id
	 */
	public function getCoddep() {
		return $this->coddep;
	}
	
	/**
	 * M�todo m�gico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "coddep:" . $this->coddep;
	}
}
?>
