<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 * Classe que representa a interliga��o do Sistema com a camada de Front-end.
 *
 * Aqui entende-se como camada de Front-end toda classe e/ou arquivos criados
 * especialmente para a visualiza��o.
 *
 * Ex: Framework Zend, Framework CI, php GTK,Magento
 * etc...
 */
class DepartamentoFacade {
	/**
	 * Atributo respons�vel por possibilitar o acesso da Camada Controller a
	 * Camada MODEL
	 */
	private $service;
	
	/**
	 * Declara��o do atributo que auxilia o <b>SINGLETON</b>
	 */
	private static $instance;
	
	// **************************************************** \\
	// ************ APLICANDO SINGLETON ******************* \\
	// **************************************************** \\
	
	/**
	 * M�todo construtor respos�vel por inicializar os atributos e/ou executar
	 * qualquer a��o no momento da cria��o da classe.
	 *
	 * <b>SINGLETON</b> Construtor privado que permite apenas que a propria
	 * classe se instancie. Isso para garantir o SINGLETON.
	 */
	private function __construct() {
		$this->service = new DepartamentoService ( null );
	}
	
	/**
	 * <b>SINGLETON</b> M�todo respons�vel por retornar uma instancia de
	 * DepartamentoFacade.
	 *
	 * @return DepartamentoFacade instance - Uma instancia da pr�pria Classe.
	 */
	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new DepartamentoFacade ();
		}
		return self::$instance;
	}
	
	// ************************FIM********************** \\
	// ************ APLICANDO SINGLETON ***************** \\
	// **************************FIM********************** \\
	
	/**
	 * M�todo respons�vel por iniciar o processo de inser��o com a aplica��o.
	 * Este m�todo tem como objetivo pegar os dados vindo como parametro e
	 * realizar convers�es para seus respectivos tipo na Camada de Neg�cio.
	 *
	 * Este m�todo faz parte da classe Facade que esta localizada na camada de
	 * Controle da Aplica��o; as classes localizadas nesta camada s�o
	 * respons�vel por interligar a camada de Visualiza��o(V) com a camada de
	 * Negocio(M).
	 */
	public function inserir($nomedep) {
		try {
			$po = new DepartamentoPO ( null, $nomedep);
			$this->service->inserir ( $po );
		} catch ( AlterarException $e ) {
			throw new AlterarException ( "Falha ao inserir", $e );
		}
	}
	
	/**
	 * M�todo respons�vel por iniciar o processo de alterar com a aplica��o.
	 * Este m�todo tem como objetivo pegar os dados vindo como parametro e
	 * realizar convers�es para seus respectivos tipo na Camada de Neg�cio.
	 *
	 * Este m�todo faz parte da classe Facade que esta localizada na camada de
	 * Controle da Aplica��o; as classes localizadas nesta camada s�o
	 * respons�vel por interligar a camada de Visualiza��o(V) com a camada de
	 * Negocio(M).
	 */
	public function alterar($coddep, $nomedep) {
		try {
			$po = new DepartamentoPO ( $coddep, $nomedep );
			$this->service->alterar ( $po );
		} catch ( AlterarException $e ) {
			throw new AlterarException ( "Falha ao alterar", $e );
		}
	}
	
	/**
	 * M�todo respons�vel por buscar todos registros
	 *
	 * @return the bare_field_name
	 */
	public function buscarTodos() {
		try {
			$retorno = $this->service->buscarTodos ();
			return $retorno;
		} catch ( Exception $e ) {
			throw new FiltrarException ( "Falha ao buscar", $e );
		}
	}
	
	/**
	 * M�todo respons�vel por buscar por codigo(id)
	 *
	 * @return the bare_field_name
	 */
	public function buscarPorCodigo($coddep) {
		try {
			$po = new DepartamentoPO ( $coddep );
			$retorno = $this->service->buscarCodigo ( $po );
			return $retorno;
		} catch ( Exception $e ) {
			throw new FiltrarException ( "Falha ao buscar", $e );
		}
	}
	/**
	 * M�todo respons�vel por exceluir
	 *
	 * @return the bare_field_name
	 */
	public function excluir($coddep) {
		$po = new DepartamentoPO ( $coddep );
		$this->service->excluir ( $po );
	}
}
?>