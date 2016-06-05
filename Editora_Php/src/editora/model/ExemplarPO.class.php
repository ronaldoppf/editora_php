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
final class ExemplarPO extends ExemplarAbstractPO {
	private $titulo;
	private $numpaginas;
	private $tipo;
	
	/**
	 * Método construtor
	 */
	public function __construct($codexemplar = null, $titulo = null, $numpaginas = null, $tipo = null) {
		parent::__construct ( $codexemplar );
		$this->setCodexemplar ( $codexemplar );
		$this->setTitulo ( $titulo );
		$this->setNumpaginas ( $numpaginas );
		$this->setTipo ( $tipo );
	}
	public function getTitulo() {
		return $this->titulo;
	}
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	public function getNumpaginas() {
		return $this->numpaginas;
	}
	public function setNumpaginas($numpaginas) {
		$this->numpaginas = $numpaginas;
	}
	public function getTipo() {
		return $this->tipo;
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
}
?>