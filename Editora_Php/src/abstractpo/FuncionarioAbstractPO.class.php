<?php
/**
 * 
 *Classe representa a m�e de todos po's do sistema 
 */
abstract class FuncionarioAbstractPO {
	private $codfun;
	
	/**
	 * M�todo contrutor do objeto
	 */
	public function __construct($codfun) {
		$this->setCodfun ($codfun);
	}
	
	/**
	 * M�todo respons�vel por setar o id
	 */
	public function setCodfun($codfun) {
		$this->codfun = $codfun;
	}
	
	/**
	 * M�todo get repons�vel por retornar o atributo id
	 */
	public function getCodfun() {
		return $this->codfun;
	}
	
	/**
	 * M�todo m�gico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codfun:" . $this->codfun;
	}
}
?>