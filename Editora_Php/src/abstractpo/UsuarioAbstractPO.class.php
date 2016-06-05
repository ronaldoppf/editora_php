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
abstract class UsuarioAbstractPO {
	private $codusuario;
	
	/**
	 * Método contrutor do objeto
	 */
	public function __construct($codusuario) {
		$this->setCodusuario ($codusuario);
	}
	
	/**
	 * Método responsável por setar o id
	 */
	public function setCodusuario($codusuario) {
		$this->codusuario = $codusuario;
	}
	
	/**
	 * Método get reponsável por retornar o atributo id
	 */
	public function getCodusuario() {
		return $this->codusuario;
	}
	
	/**
	 * Método mágico toString
	 *
	 * @return atributos do objeto
	 */
	public function __toString() {
		return "codusuario:" . $this->codusuario;
	}
}
?>