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
abstract class PessoaAbstractPO {
	private $codpessoa;
	
	/**
	 * Método contrutor do objeto
	 */
	public function __construct($codpessoa) {
		$this->setCodpessoa ($codpessoa);
	}
	
	/**
	 * Método responsável por setar o id
	 */
	public function setCodpessoa($codpessoa) {
		$this->codpessoa = $codpessoa;
	}
	
	/**
	 * Método get reponsável por retornar o atributo id
	 */
	public function getCodpessoa() {
		return $this->codpessoa;
	}
	
	/**
	 * Método mágico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codpessoa:" . $this->codpessoa;
	}
}
?>