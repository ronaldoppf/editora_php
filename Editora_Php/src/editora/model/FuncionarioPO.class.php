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
final class FuncionarioPO extends FuncionarioAbstractPO {
	private $cpf;
	private $cargo;
	private $coddep;
	private $salario;
	
	/**
	 * Método construtor
	 */
	public function __construct($codfun = null, $cpf = null, $cargo = null, $coddep = null, $salario = null) {
		parent::__construct ( $codfun );
		$this->setCodfun ( $codfun );
		$this->setCpf ( $cpf );
		$this->setCargo ( $cargo );
		$this->setCoddep ( $coddep );
		$this->setSalario ( $salario );
	}
	
	public function getCpf() {
		return $this->cpf;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	public function getCargo() {
		return $this->cargo;
	}
	public function setCargo($cargo) {
		$this->cargo = $cargo;
	}
	public function getCoddep() {
		return $this->coddep;
	}
	public function setCoddep($coddep) {
		$this->coddep = $coddep;
	}
	public function getSalario() {
		return $this->salario;
	}
	public function setSalario($salario) {
		$this->salario = $salario;
	}

}
?>