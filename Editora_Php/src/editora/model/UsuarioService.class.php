<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 * Classe respons�vel por conter as regras de neg�cios do nosso sistema. Esta
 * classe representa a camada Model(M) do MVC. Ser� nesta Classe que iremos
 * pegar os dados dos campos da tela( V ) e preencher o nosso PO(M) enviando-o �
 * camada DAO para consultas e persistencias. Neste nosso sistema, todos os
 * tratamentos de exce��o estar�o centralizados aqui, juntamente com as
 * poss�veis valida��es de campos e regras.
 */
class UsuarioService {
	/**
	 * Atributo respons�vel por possibilitar o acesso da Camada Model a Camada
	 */
	private $dao;
	public function __construct($codusuario) {
		$this->dao = new UsuarioDAO ();
	}
	
	/**
	 * M�todo respons�vel por trabalhar os dados antes de mandar para a Camada de persit�ncia(DAO).
	 */
	public function inserir(UsuarioPO $po) {
		/**
		 * Criando um Bloco de Transa��o
		 */
		try {
			/* Abre a conex�o */
			$this->dao->abrirConexao ( AbstractDAO::$PERSISTENCIA );
			$this->dao->inserir( $po );
			$this->dao->fecharConexao ();
		} catch ( ConexaoException $e ) {
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( InserirException $e ) {
			
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( Exception $e ) {
			
			throw new ApplicationException ( "Erro desconhecido", $e );
		}
	} // fim do inserir
	
	/**
	 * M�todo respons�vel por trabalhar os dados antes de mandar para a Camada
	 * de persit�ncia(DAO).
	 */
	public function alterar(UsuarioPO $po) {
		/**
		 * Criando um Bloco de Transa��o
		 */
		try {
			/* Abre a conex�o */
			$this->dao->abrirConexao ( AbstractDAO::$PERSISTENCIA );
			$this->dao->alterar ( $po );
			$this->dao->fecharConexao ();
		} catch ( ConexaoException $e ) {
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( AlterarException $e ) {
			
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( Exception $e ) {
			
			throw new ApplicationException ( "Erro desconhecido", $e );
		}
	} // fim do inserir
	
	/**
	 * M�todo respons�vel por buscar todos registros
	 */
	public function buscarTodos() {
		/**
		 * Criando um Bloco de Transa��o
		 */
		try {
			/* Abre a conex�o */
			$this->dao->abrirConexao ( AbstractDAO::$CONSULTA );
			$this->dao->fecharConexao ();
			return $this->dao->buscarTodos ();
		} catch ( ConexaoException $e ) {
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( FiltrarException $e ) {
			throw new ApplicationException ( $e->getMessage (), $e );
		}
	}
	/**
	 * M�todo respons�vel por buscar registro por id(codigo)
	 */
	public function buscarCodigo(UsuarioPO $po) {
		/**
		 * Criando um Bloco de Transa��o
		 */
		try {
			/* Abre a conex�o */
			$this->dao->abrirConexao ( AbstractDAO::$CONSULTA );
			$this->dao->fecharConexao ();
			return $this->dao->buscarPorCodigo ( $po );
		} catch ( ConexaoException $e ) {
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( FiltrarException $e ) {
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( Exception $e ) {
			throw new ApplicationException ( "Erro desconhecido", $e );
		}
	}
	
	/**
	 * M�todo respons�vel por excluir registros da base de dados
	 */
	public function excluir(UsuarioPO $po) {
		/**
		 * Criando um Bloco de Transa��o
		 */
		try {
			/* Abre a conex�o */
			$this->dao->abrirConexao ( AbstractDAO::$PERSISTENCIA );
			$this->dao->excluir ( $po );
			$this->dao->fecharConexao ();
		} catch ( ConexaoException $e ) {
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( ExcluirException $e ) {
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( Exception $e ) {
			
			throw new ApplicationException ( "Erro desconhecido", $e );
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	public function autenticar(UsuarioPO $po) {
		/**
		 * Criando um Bloco de Transa��o
		 */
		try {
			/* Abre a conex�o */
			$this->dao->abrirConexao ( AbstractDAO::$PERSISTENCIA );
			$this->dao->autenticar( $po );
			$this->dao->fecharConexao ();
		} catch ( ConexaoException $e ) {
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( InserirException $e ) {
				
			throw new ApplicationException ( $e->getMessage (), $e );
		} catch ( Exception $e ) {
				
			throw new ApplicationException ( "Erro desconhecido", $e );
		}
	}
}
?>