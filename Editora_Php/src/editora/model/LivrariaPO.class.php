<?php
/**
 *Classe que representa o po do sistema
 */
final class LivrariaPO extends LivrariaAbstractPO {
	private $cnpj;
	private $nome;
	private $estado;
	private $cidade;
	private $logradouro;
	private $cep;
	
	/**
	 * Método construtor
	 */
	public function __construct($codlivraria = null, $cnpj = null, $nome = null, $estado = null, $cidade = null, $logradouro = null, $cep = null) {
		parent::__construct ( $codlivraria );
		$this->setCodlivraria ( $codlivraria );
		$this->setCnpj ( $cnpj );
		$this->setNome ( $nome );
		$this->setEstado ( $estado );
		$this->setCidade ( $cidade );
		$this->setLogradouro ( $logradouro );
		$this->setCep ( $cep );
	}
	public function getCnpj() {
		return $this->cnpj;
	}
	public function setCnpj($cnpj) {
		$this->cnpj = $cnpj;
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