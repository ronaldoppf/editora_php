<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 *Classe que representa o po do sistema
 */
final class AutorPO extends AutorAbstractPO {
	private $cpf;
	private $arealiteraria;
	private $formacao;
	
	/**
	 * Método construtor
	 */
	public function __construct($codautor = null, $cpf = null, $arealiteraria = null, $formacao = null) {
		parent::__construct ( $codautor );
		$this->setCodautor ( $codautor );
		$this->setCpf ( $cpf );
		$this->setArealiteraria ( $arealiteraria );
		$this->setFormacao ( $formacao );
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	public function getArealiteraria() {
		return $this->arealiteraria;
	}
	public function setArealiteraria($arealiteraria) {
		$this->arealiteraria = $arealiteraria;
	}
	public function getFormacao() {
		return $this->formacao;
	}
	public function setFormacao($formacao) {
		$this->formacao = $formacao;
	}
	
}
?>