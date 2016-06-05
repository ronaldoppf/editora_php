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
abstract class PessoaAbstractPO {
	private $codpessoa;
	
	/**
	 * M�todo contrutor do objeto
	 */
	public function __construct($codpessoa) {
		$this->setCodpessoa ($codpessoa);
	}
	
	/**
	 * M�todo respons�vel por setar o id
	 */
	public function setCodpessoa($codpessoa) {
		$this->codpessoa = $codpessoa;
	}
	
	/**
	 * M�todo get repons�vel por retornar o atributo id
	 */
	public function getCodpessoa() {
		return $this->codpessoa;
	}
	
	/**
	 * M�todo m�gico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codpessoa:" . $this->codpessoa;
	}
}
?>