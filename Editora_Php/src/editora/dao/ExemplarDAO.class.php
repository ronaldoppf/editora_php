<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 * Classe que representa a camada de persist�ncia de nosso Equipamento.
 * Esta classe recebe os dados da camada de Negocio (MODEL) e com eles monta as
 * SQLs e as QUERYs necessrias para o funcionamento correto do processo solicitado.
 */
require_once '../../interfaces/ExemplarInterfaceCRUD.php';
final class ExemplarDAO extends AbstractDAO implements ExemplarInterfaceCRUD {
	public function __construct() {
	}
	/**
	 *
	 * @see InterfaceCRUD::inserir()
	 */
	public function inserir(ExemplarAbstractPO $po) {
		if ($po == null) {
			throw new InserirException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj � do tipo ExemplarPO
			if ($po instanceof ExemplarPO) {
				$meuPo = $po;
			} else {
				throw new InserirException ( "Objeto n�o condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "INSERT INTO edt_exemplar SET titulo=?, numpaginas=?, tipo=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam (1, $meuPo->getTitulo());
			$stmt->bindParam (2, $meuPo->getNumpaginas());
			$stmt->bindParam (3, $meuPo->getTipo());
			
			// executa a sql
			$stmt->execute ();
			$this->fecharConexao ();
		} catch ( InserirException $e ) {
			throw new InserirException ( "Falha ao inserir: " . $e );
		}
	}
	
	/**
	 *
	 * @see InterfaceCRUD::alterar()
	 */
	public function alterar(ExemplarAbstractPO $po) {
		if ($po == null) {
			throw new AlterarException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj � do tipo ExemplarPO
			if ($po instanceof ExemplarPO) {
				$meuPo = $po;
			} else {
				throw new AlterarException ( "Objeto n�o condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "UPDATE edt_exemplar SET titulo=?, numpaginas=?, tipo=? WHERE codexemplar=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam (1, $meuPo->getTitulo());
			$stmt->bindParam (2, $meuPo->getNumpaginas());
			$stmt->bindParam (3, $meuPo->getTipo());
			$stmt->bindParam (4, $meuPo->getCodexemplar () );
			
			
			// executa a sql
			$stmt->execute ();
			$this->fecharConexao ();
		} catch ( InserirException $e ) {
			throw new InserirException ( "Falha ao editar: " . $e );
		}
	}
	
	/**
	 *
	 * @see InterfaceCRUD::buscarTodos()
	 */
	public function buscarTodos() {
		$meuPo = null;
		try {
			// define a sql
			$sql = "SELECT codexemplar, titulo, numpaginas, tipo FROM edt_exemplar LIMIT 30000 ";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->query ( $sql );
			
			// executa a sql
			$stmt->execute ();
			
			// conta o n�mero de ocorr�ncias da consulta
			$linhas = $stmt->rowCount ();
			if ($linhas < 1) {
				return $meuPo;
			}
			
			$meuPo = $stmt->fetchAll ();
			// fecha a conex�o
			$this->fecharConexao ();
			return $meuPo;
		} catch ( Exception $e ) {
			throw new FiltrarException ( "Falha ao pesquisar registros: ", $e );
		}
	}
	
	/**
	 *
	 * @see InterfaceCRUD::buscarPorCodigo()
	 */
	public function buscarPorCodigo(ExemplarAbstractPO $po) {
		if ($po == null) {
			throw new FiltrarException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj � do tipo ExemplarPO
			if ($po instanceof ExemplarPO) {
				$meuPo = $po;
			} else {
				throw new FiltrarException ( "Objeto n�o condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		try {
			// define a sql
			$sql = "SELECT codexemplar, titulo, numpaginas, tipo FROM edt_exemplar WHERE codexemplar=? ";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCodexemplar () );
			
			// executa a sql
			$stmt->execute ();
			
			// conta o n�mero de ocorr�ncias da consulta
			$linhas = $stmt->rowCount ();
			if ($linhas < 1) {
				return $meuPo;
			}
			
			$meuPo = $stmt->fetchAll ();
			// fecha a conex�o
			$this->fecharConexao ();
			return $meuPo;
		} catch ( Exception $e ) {
			throw new FiltrarException ( "Falha ao pesquisar registros: ", $e );
		}
	}
	
	/**
	 *
	 * @see InterfaceCRUD::excluir()
	 */
	public function excluir(ExemplarAbstractPO $po) {
		if ($po == null) {
			throw new ExcluirException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj � do tipo ExemplarPO
			if ($po instanceof ExemplarPO) {
				$meuPo = $po;
			} else {
				throw new ExcluirException ( "Objeto n�o condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			
			$sql = "DELETE FROM edt_exemplar WHERE codexemplar=? ";
			// abre a conex�o e prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCodexemplar () );
			$stmt->execute ();
			$this->fecharConexao ();
		} catch ( Exception $e ) {
			throw new ExcluirException ( "Falha ao deletar ", $e );
		}
	}
}
?>