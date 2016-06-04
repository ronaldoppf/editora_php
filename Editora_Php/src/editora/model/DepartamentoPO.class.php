<?php
/**
 *Classe que representa o po do sistema
 */
final class DepartamentoPO extends DepartamentoAbstractPO{
	private $nomedep;
	
	
	/**
	 * Método construtor
	 */
	public function __construct($coddep = null, $nomedep = null) {
		parent::__construct ( $coddep );
		$this->setCoddep ( $coddep );
		$this->setNomedep ( $nomedep );
		
	}
	public function getNomedep() {
		return $this->nomedep;
	}
	public function setNomedep($nomedepf) {
		$this->nomedep = $nomedepf;
	}
	
}
?>