<?php
/**
 * Classe que representa a interligação do Sistema com a camada de Front-end.
 *
 * Aqui entende-se como camada de Front-end toda classe e/ou arquivos criados
 * especialmente para a visualização.
 *
 * Ex: Framework Zend, Framework CI, php GTK,Magento
 * etc...
 */
class ExemplarFacade {
	/**
	 * Atributo responsável por possibilitar o acesso da Camada Controller a
	 * Camada MODEL
	 */
	private $service;
	
	/**
	 * Declaração do atributo que auxilia o <b>SINGLETON</b>
	 */
	private static $instance;
	
	// **************************************************** \\
	// ************ APLICANDO SINGLETON ******************* \\
	// **************************************************** \\
	
	/**
	 * Método construtor resposável por inicializar os atributos e/ou executar
	 * qualquer ação no momento da criação da classe.
	 *
	 * <b>SINGLETON</b> Construtor privado que permite apenas que a propria
	 * classe se instancie. Isso para garantir o SINGLETON.
	 */
	private function __construct() {
		$this->service = new ExemplarService ( null );
	}
	
	/**
	 * <b>SINGLETON</b> Método responsável por retornar uma instancia de
	 * ExemplarFacade.
	 *
	 * @return ExemplarFacade instance - Uma instancia da própria Classe.
	 */
	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new ExemplarFacade ();
		}
		return self::$instance;
	}
	
	// ************************FIM********************** \\
	// ************ APLICANDO SINGLETON ***************** \\
	// **************************FIM********************** \\
	
	/**
	 * Método responsável por iniciar o processo de inserção com a aplicação.
	 * Este método tem como objetivo pegar os dados vindo como parametro e
	 * realizar conversões para seus respectivos tipo na Camada de Negócio.
	 *
	 * Este método faz parte da classe Facade que esta localizada na camada de
	 * Controle da Aplicação; as classes localizadas nesta camada são
	 * responsável por interligar a camada de Visualização(V) com a camada de
	 * Negocio(M).
	 */
	public function inserir($titulo, $numpaginas, $tipo) {
		try {
			$po = new ExemplarPO ( null, $titulo, $numpaginas, $tipo );
			$this->service->inserir ( $po );
		} catch ( AlterarException $e ) {
			throw new AlterarException ( "Falha ao inserir", $e );
		}
	}
	
	/**
	 * Método responsável por iniciar o processo de alterar com a aplicação.
	 * Este método tem como objetivo pegar os dados vindo como parametro e
	 * realizar conversões para seus respectivos tipo na Camada de Negócio.
	 *
	 * Este método faz parte da classe Facade que esta localizada na camada de
	 * Controle da Aplicação; as classes localizadas nesta camada são
	 * responsável por interligar a camada de Visualização(V) com a camada de
	 * Negocio(M).
	 */
	public function alterar($codexemplar, $titulo, $numpaginas, $tipo) {
		try {
			$po = new ExemplarPO ( $codexemplar, $titulo, $numpaginas, $tipo);
			$this->service->alterar ( $po );
		} catch ( AlterarException $e ) {
			throw new AlterarException ( "Falha ao alterar", $e );
		}
	}
	
	/**
	 * Método responsável por buscar todos registros
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
	 * Método responsável por buscar por codigo(id)
	 *
	 * @return the bare_field_name
	 */
	public function buscarPorCodigo($codexemplar) {
		try {
			$po = new ExemplarPO ( $codexemplar );
			$retorno = $this->service->buscarCodigo ( $po );
			return $retorno;
		} catch ( Exception $e ) {
			throw new FiltrarException ( "Falha ao buscar", $e );
		}
	}
	/**
	 * Método responsável por exceluir
	 *
	 * @return the bare_field_name
	 */
	public function excluir($codexemplar) {
		$po = new ExemplarPO ( $codexemplar );
		$this->service->excluir ( $po );
	}
}
?>