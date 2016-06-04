<?php
/**
 * Interface respons�vel por representar os m�todos de um CRUD.
 * Interface usada para exemplificar na pratica o uso de Interfaces.
 */
interface PessoaInterfaceCRUD {
	
	/**
	 * M�todo respons�vel por inserir registro na base de dados
	 */
	public function inserir(PessoaAbstractPO $po);
	
	/**
	 * M�todo respons�vel por alterar registro na base de dados
	 */
	public function alterar(PessoaAbstractPO $po);
	
	/**
	 * M�todo respons�vel por excluir registro da base de dados
	 */
	public function excluir(PessoaAbstractPO $po);
	
	/**
	 * M�todo respons�vel por buscar todos registros da base de dados
	 */
	public function buscarTodos();
	
	/**
	 * M�todo respons�vel por buscar por c�digo registros da base de dados
	 */
	public function buscarPorCodigo(PessoaAbstractPO $po);
	
	/**
	 * M�todo respons�vel por abrir uma conex�o com o banco de dados.
	 */
	public function abrirConexao($persistencia);
	
	/**
	 * M�todo respons�vel por fechar uma conex�o com o banco de dados.
	 */
	public function fecharConexao();
}
?>