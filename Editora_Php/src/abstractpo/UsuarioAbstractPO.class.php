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
abstract class UsuarioAbstractPO {
	private $codusuario;
	
	/**
	 * M�todo contrutor do objeto
	 */
	public function __construct($codusuario) {
		$this->setCodusuario ($codusuario);
	}
	
	/**
	 * M�todo respons�vel por setar o id
	 */
	public function setCodusuario($codusuario) {
		$this->codusuario = $codusuario;
	}
	
	/**
	 * M�todo get repons�vel por retornar o atributo id
	 */
	public function getCodusuario() {
		return $this->codusuario;
	}
	
	/**
	 * M�todo m�gico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codusuario:" . $this->codusuario;
	}
}
?>