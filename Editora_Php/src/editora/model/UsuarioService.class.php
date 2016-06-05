<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 * Classe responsсvel por conter as regras de negѓcios do nosso sistema. Esta
 * classe representa a camada Model(M) do MVC. Serс nesta Classe que iremos
 * pegar os dados dos campos da tela( V ) e preencher o nosso PO(M) enviando-o с
 * camada DAO para consultas e persistencias. Neste nosso sistema, todos os
 * tratamentos de exceчуo estarуo centralizados aqui, juntamente com as
 * possэveis validaчѕes de campos e regras.
 */
class UsuarioService {
	/**
	 * Atributo responsсvel por possibilitar o acesso da Camada Model a Camada
	 */
	private $dao;
	public function __construct($codusuario) {
		$this->dao = new UsuarioDAO ();
	}
	
	/**
	 * Mщtodo responsсvel por trabalhar os dados antes de mandar para a Camada de persitъncia(DAO).
	 */
	public function inserir(UsuarioPO $po) {
		/**
		 * Criando um Bloco de Transaчуo
		 */
		try {
			/* Abre a conexуo */
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
	 * Mщtodo responsсvel por trabalhar os dados antes de mandar para a Camada
	 * de persitъncia(DAO).
	 */
	public function alterar(UsuarioPO $po) {
		/**
		 * Criando um Bloco de Transaчуo
		 */
		try {
			/* Abre a conexуo */
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
	 * Mщtodo responsсvel por buscar todos registros
	 */
	public function buscarTodos() {
		/**
		 * Criando um Bloco de Transaчуo
		 */
		try {
			/* Abre a conexуo */
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
	 * Mщtodo responsсvel por buscar registro por id(codigo)
	 */
	public function buscarCodigo(UsuarioPO $po) {
		/**
		 * Criando um Bloco de Transaчуo
		 */
		try {
			/* Abre a conexуo */
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
	 * Mщtodo responsсvel por excluir registros da base de dados
	 */
	public function excluir(UsuarioPO $po) {
		/**
		 * Criando um Bloco de Transaчуo
		 */
		try {
			/* Abre a conexуo */
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
		 * Criando um Bloco de Transaчуo
		 */
		try {
			/* Abre a conexуo */
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