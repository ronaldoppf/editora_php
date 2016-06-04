<?php
/**
 * 
 *Classe representa a mãe de todos po's do sistema 
 */
abstract class FuncionarioAbstractPO {
	private $codfun;
	
	/**
	 * Método contrutor do objeto
	 */
	public function __construct($codfun) {
		$this->setCodfun ($codfun);
	}
	
	/**
	 * Método responsável por setar o id
	 */
	public function setCodfun($codfun) {
		$this->codfun = $codfun;
	}
	
	/**
	 * Método get reponsável por retornar o atributo id
	 */
	public function getCodfun() {
		return $this->codfun;
	}
	
	/**
	 * Método mágico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codfun:" . $this->codfun;
	}
}
?>