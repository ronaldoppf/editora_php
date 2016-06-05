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
require_once '../../interfaces/UsuarioInterfaceCRUD.php';



final class UsuarioDAO extends AbstractDAO implements UsuarioInterfaceCRUD {
	public function __construct() {
	}
	/**
	 *
	 * @see InterfaceCRUD::inserir()
	 */
	public function inserir(UsuarioAbstractPO $po) {
		if ($po == null) {
			throw new InserirException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo UsuarioPO
			if ($po instanceof UsuarioPO) {
				$meuPo = $po;
			} else {
				throw new InserirException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "INSERT INTO edt_usuario SET nome=?, usuario=?, senha=?, email=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam ( 1, $meuPo->getNome () );
			$stmt->bindParam ( 2, $meuPo->getUsuario () );
			$stmt->bindParam ( 3, $meuPo->getSenha () );
			$stmt->bindParam ( 4, $meuPo->getEmail () );
			
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
	public function alterar(UsuarioAbstractPO $po) {
		if ($po == null) {
			throw new AlterarException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo UsuarioPO
			if ($po instanceof UsuarioPO) {
				$meuPo = $po;
			} else {
				throw new AlterarException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			// define a sql
			$sql = "UPDATE edt_usuario SET nome=?, usuario=?, senha=?, email=? WHERE codusuario=?";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			// substitui os ? pelos valores
			$stmt->bindParam ( 1, $meuPo->getNome () );
			$stmt->bindParam ( 2, $meuPo->getUsuario () );
			$stmt->bindParam ( 3, $meuPo->getSenha () );
			$stmt->bindParam ( 4, $meuPo->getEmail () );
			$stmt->bindParam ( 5, $meuPo->getCodusuario () );
			
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
			$sql = "SELECT codusuario, nome, usuario, senha, email FROM edt_usuario LIMIT 30000 ";
			
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
	public function buscarPorCodigo(UsuarioAbstractPO $po) {
		if ($po == null) {
			throw new FiltrarException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo UsuarioPO
			if ($po instanceof UsuarioPO) {
				$meuPo = $po;
			} else {
				throw new FiltrarException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		try {
			// define a sql
			$sql = "SELECT codusuario, nome, usuario, senha, email FROM edt_usuario WHERE codusuario=? ";
			
			// prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCodusuario () );
			
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
	public function excluir(UsuarioAbstractPO $po) {
		if ($po == null) {
			throw new ExcluirException ( "Objeto encontra-se nulo.", $po );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo UsuarioPO
			if ($po instanceof UsuarioPO) {
				$meuPo = $po;
			} else {
				throw new ExcluirException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			
			$sql = "DELETE FROM edt_usuario WHERE codusuario=? ";
			// abre a conexão e prepara a consulta
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
			
			$stmt->bindParam ( 1, $meuPo->getCodusuario () );
			$stmt->execute ();
			$this->fecharConexao ();
		} catch ( Exception $e ) {
			throw new ExcluirException ( "Falha ao deletar ", $e );
		}
	}
	public function autenticar(UsuarioAbstractPO $po) {
		if ($po == null) {
			throw new InserirException ( "Objeto encontra-se nulo." );
		}
		
		try {
			// objeto
			$meuPo = null;
			// Verificando se o obj é do tipo UsuarioPO
			if ($po instanceof UsuarioPO) {
				$meuPo = $po;
			} else {
				throw new InserirException ( "Objeto não condiz com o contexto: " . $po );
			}
		} catch ( Exception $e ) {
			throw new Exception ( " Erro desconhecido " . $e->getMessage () );
		}
		
		try {
			$sql = " SELECT * FROM edt_usuario WHERE usuario=? AND senha=? ";
			
			$stmt = $this->abrirConexao ( true )->prepare ( $sql );
				
			// substitui os ? pelos valores
			$stmt->bindParam ( 1, $po->getUsuario() );
			$stmt->bindParam ( 2, $po->getSenha() );
				
			// executa a sql
			$stmt->execute ();
			
			$linhas = $stmt->rowCount();
			
			if ($linhas < 1) {
				echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
				//die();
			}else{
				session_start(); //inicia a sessão
				$_SESSION["usuario"] = $po->getUsuario();
				$_SESSION["senha"] = $po->getSenha();
				header("Location:../../home.php");
			}
		}catch (Exception $e ){
			
		}
	}
}
?>