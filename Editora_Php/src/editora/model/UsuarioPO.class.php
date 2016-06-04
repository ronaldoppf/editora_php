<?php
/**
 *Classe que representa o po do sistema
 */
final class UsuarioPO extends UsuarioAbstractPO {
	private $nome;
	private $usuario;
	private $senha;
	private $email;
	
	
	/**
	 * Método construtor
	 */
	public function __construct($codusuario = null, $nome = null, $usuario = null, $senha = null, $email = null) {
		parent::__construct ( $codusuario );
		$this->setCodusuario ( $codusuario );
		$this->setNome ( $nome );
		$this->setUsuario ( $usuario );
		$this->setSenha ( $senha );
		$this->setEmail ( $email );
		
	}
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getUsuario() {
		return $this->usuario;
	}
	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}
	public function getSenha() {
		return $this->senha;
	}
	public function setSenha($senha) {
		$this->senha = $senha;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	
}
?>