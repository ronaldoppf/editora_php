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
final class PessoaPO extends PessoaAbstractPO {
	private $cpf;
	private $nome;
	private $estado;
	private $cidade;
	private $logradouro;
	private $cep;
	
	/**
	 * Método construtor
	 */
	public function __construct($codpessoa = null, $cpf = null, $nome = null, $estado = null, $cidade = null, $logradouro = null, $cep = null) {
		parent::__construct ( $codpessoa );
		$this->setCodpessoa ( $codpessoa );
		$this->setCpf ( $cpf );
		$this->setNome ( $nome );
		$this->setEstado ( $estado );
		$this->setCidade ( $cidade );
		$this->setLogradouro ( $logradouro );
		$this->setCep ( $cep );
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function setEstado($estado) {
		$this->estado = $estado;
	}
	public function getCidade() {
		return $this->cidade;
	}
	public function setCidade($cidade) {
		$this->cidade = $cidade;
	}
	public function getLogradouro() {
		return $this->logradouro;
	}
	public function setLogradouro($logradouro) {
		$this->logradouro = $logradouro;
	}
	public function getCep() {
		return $this->cep;
	}
	public function setCep($cep) {
		$this->cep = $cep;
	}
}
?>