<?php
/**
 * Classe que representa a camada de persistência de nosso Equipamento.
 * Esta classe recebe os dados da camada de Negocio (MODEL) e com eles monta as
 * SQLs e as QUERYs necessrias para o funcionamento correto do processo solicitado.
 */
require_once '../../interfaces/PessoaInterfaceCRUD.php';
final class PessoaDAO extends AbstractDAO implements PessoaInterfaceCRUD {
	public function __construct() {
	}
	/**
	 *
	 * @see InterfaceCRUD::inserir()
	 */
	public function inserir(PessoaAbstractPO $po) {
		if ($po == null) {
			throw new InserirException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo PessoaPO
			if ($po instanceof PessoaPO) {
				$meuPo = $po;
			} else {
				throw new InserirException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "INSERT INTO edt_pessoa SET cpf=?, nome=?, estado=?, cidade=?, logradouro=?, cep=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam (1, $meuPo->getCpf());
			$stmt->bindParam (2, $meuPo->getNome());
			$stmt->bindParam (3, $meuPo->getEstado());
			$stmt->bindParam (4, $meuPo->getCidade());
			$stmt->bindParam (5, $meuPo->getLogradouro());
			$stmt->bindParam (6, $meuPo->getCep());
			
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
	public function alterar(PessoaAbstractPO $po) {
		if ($po == null) {
			throw new AlterarException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo PessoaPO
			if ($po instanceof PessoaPO) {
				$meuPo = $po;
			} else {
				throw new AlterarException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "UPDATE edt_pessoa SET cpf=?, nome=?, estado=?, cidade=?, logradouro=?, cep=? WHERE codpessoa=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam ( 1, $meuPo->getCpf () );
			$stmt->bindParam ( 2, $meuPo->getNome () );
			$stmt->bindParam ( 3, $meuPo->getEstado () );
			$stmt->bindParam ( 4, $meuPo->getCidade () );
			$stmt->bindParam ( 5, $meuPo->getLogradouro () );
			$stmt->bindParam ( 6, $meuPo->getCep () );
			$stmt->bindParam ( 7, $meuPo->getCodpessoa () );
			
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
			$sql = "SELECT codpessoa, cpf, nome, estado, cidade, logradouro, cep FROM edt_pessoa LIMIT 30000 ";
			
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
	public function buscarPorCodigo(PessoaAbstractPO $po) {
		if ($po == null) {
			throw new FiltrarException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo PessoaPO
			if ($po instanceof PessoaPO) {
				$meuPo = $po;
			} else {
				throw new FiltrarException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		try {
			// define a sql
			$sql = "SELECT codpessoa,cpf,nome,estado,cidade,logradouro,cep FROM edt_pessoa WHERE codpessoa=? ";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCodpessoa () );
			
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
	public function excluir(PessoaAbstractPO $po) {
		if ($po == null) {
			throw new ExcluirException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo PessoaPO
			if ($po instanceof PessoaPO) {
				$meuPo = $po;
			} else {
				throw new ExcluirException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			
			$sql = "DELETE FROM edt_pessoa WHERE codpessoa=? ";
			// abre a conexão e prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCodpessoa () );
			$stmt->execute ();
			$this->fecharConexao ();
		} catch ( Exception $e ) {
			throw new ExcluirException ( "Falha ao deletar ", $e );
		}
	}
}
?>