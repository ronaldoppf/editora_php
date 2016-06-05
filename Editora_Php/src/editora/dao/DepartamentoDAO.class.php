<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 * Classe que representa a camada de persistência de nosso Equipamento.
 * Esta classe recebe os dados da camada de Negocio (MODEL) e com eles monta as
 * SQLs e as QUERYs necessrias para o funcionamento correto do processo solicitado.
 */
require_once '../../interfaces/DepartamentoInterfaceCRUD.php';
final class DepartamentoDAO extends AbstractDAO implements DepartamentoInterfaceCRUD {
	public function __construct() {
	}
	/**
	 *
	 * @see InterfaceCRUD::inserir()
	 */
	public function inserir(DepartamentoAbstractPO $po) {
		if ($po == null) {
			throw new InserirException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo DepartamentoPO
			if ($po instanceof DepartamentoPO) {
				$meuPo = $po;
			} else {
				throw new InserirException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "INSERT INTO edt_departamento SET nomedep=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam (1, $meuPo->getNomedep());
			
			
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
	public function alterar(DepartamentoAbstractPO $po) {
		if ($po == null) {
			throw new AlterarException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo DepartamentoPO
			if ($po instanceof DepartamentoPO) {
				$meuPo = $po;
			} else {
				throw new AlterarException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "UPDATE edt_departamento SET nomedep=? WHERE coddep=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam ( 1, $meuPo->getNomedep () );
			$stmt->bindParam ( 2, $meuPo->getCoddep () );
			
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
			$sql = "SELECT coddep, nomedep FROM edt_departamento LIMIT 30000 ";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->query ( $sql );
			
			// executa a sql
			$stmt->execute ();
			
			// conta o número de ocorrências da consulta
			$linhas = $stmt->rowCount ();
			if ($linhas < 1) {
				return $meuPo;
			}
			
			$meuPo = $stmt->fetchAll ();
			// fecha a conexão
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
	public function buscarPorCodigo(DepartamentoAbstractPO $po) {
		if ($po == null) {
			throw new FiltrarException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo DepartamentoPO
			if ($po instanceof DepartamentoPO) {
				$meuPo = $po;
			} else {
				throw new FiltrarException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		try {
			// define a sql
			$sql = "SELECT coddep, nomedep FROM edt_departamento WHERE coddep=? ";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCoddep () );
			
			// executa a sql
			$stmt->execute ();
			
			// conta o número de ocorrências da consulta
			$linhas = $stmt->rowCount ();
			if ($linhas < 1) {
				return $meuPo;
			}
			
			$meuPo = $stmt->fetchAll ();
			// fecha a conexão
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
	public function excluir(DepartamentoAbstractPO $po) {
		if ($po == null) {
			throw new ExcluirException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo DepartamentoPO
			if ($po instanceof DepartamentoPO) {
				$meuPo = $po;
			} else {
				throw new ExcluirException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			
			$sql = "DELETE FROM edt_departamento WHERE coddep=? ";
			// abre a conexão e prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCoddep () );
			$stmt->execute ();
			$this->fecharConexao ();
		} catch ( Exception $e ) {
			throw new ExcluirException ( "Falha ao deletar ", $e );
		}
	}
}
?>