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
require_once '../../interfaces/FuncionarioInterfaceCRUD.php';
final class FuncionarioDAO extends AbstractDAO implements FuncionarioInterfaceCRUD {
	public function __construct() {
	}
	/**
	 *
	 * @see InterfaceCRUD::inserir()
	 */
	public function inserir(FuncionarioAbstractPO $po) {
		if ($po == null) {
			throw new InserirException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo FuncionarioPO
			if ($po instanceof FuncionarioPO) {
				$meuPo = $po;
			} else {
				throw new InserirException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "INSERT INTO edt_funcionario SET cpf=?, cargo=?, coddep=?, salario=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam ( 1, $meuPo->getCpf () );
			$stmt->bindParam ( 2, $meuPo->getCargo () );
			$stmt->bindParam ( 3, $meuPo->getCoddep () );
			$stmt->bindParam ( 4, $meuPo->getSalario () );
			
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
	public function alterar(FuncionarioAbstractPO $po) {
		if ($po == null) {
			throw new AlterarException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo FuncionarioPO
			if ($po instanceof FuncionarioPO) {
				$meuPo = $po;
			} else {
				throw new AlterarException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "UPDATE edt_funcionario SET cpf=?, cargo=?, coddep=?, salario=? WHERE codfun=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam ( 1, $meuPo->getCpf () );
			$stmt->bindParam ( 2, $meuPo->getCargo () );
			$stmt->bindParam ( 3, $meuPo->getCoddep () );
			$stmt->bindParam ( 4, $meuPo->getSalario () );
			$stmt->bindParam ( 5, $meuPo->getCodfun () );
			
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
			$sql = "SELECT f.codfun, p.cpf, p.nome, p.estado, p.cidade, p.logradouro, p.cep, f.cargo, d.nomedep, f.salario FROM edt_funcionario f inner join edt_pessoa p on f.cpf = p.cpf inner join edt_departamento d on f.coddep = d.coddep ORDER BY p.nome";
			
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
	public function buscarPorCodigo(FuncionarioAbstractPO $po) {
		if ($po == null) {
			throw new FiltrarException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo FuncionarioPO
			if ($po instanceof FuncionarioPO) {
				$meuPo = $po;
			} else {
				throw new FiltrarException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		try {
			// define a sql
			$sql = "SELECT codfun, cpf, cargo, coddep, salario FROM edt_funcionario WHERE codfun=? ";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCodfun () );
			
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
	public function excluir(FuncionarioAbstractPO $po) {
		if ($po == null) {
			throw new ExcluirException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo FuncionarioPO
			if ($po instanceof FuncionarioPO) {
				$meuPo = $po;
			} else {
				throw new ExcluirException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			
			$sql = "DELETE FROM edt_funcionario WHERE codfun=? ";
			// abre a conexão e prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCodfun () );
			$stmt->execute ();
			$this->fecharConexao ();
		} catch ( Exception $e ) {
			throw new ExcluirException ( "Falha ao deletar ", $e );
		}
	}
}
?>