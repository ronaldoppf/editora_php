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
abstract class DepartamentoAbstractPO {
	private $coddep;
	
	/**
	 * Método contrutor do objeto
	 */
	public function __construct($coddep) {
		$this->setCoddep ( $coddep );
	}
	
	/**
	 * Método responsável por setar o id
	 */
	public function setCoddep($coddep) {
		$this->coddep = $coddep;
	}
	
	/**
	 * Método get reponsável por retornar o atributo id
	 */
	public function getCoddep() {
		return $this->coddep;
	}
	
	/**
	 * Método mágico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "coddep:" . $this->coddep;
	}
}
?>
