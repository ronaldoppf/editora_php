<?php
/**
 * Interface responsável por representar os métodos de um CRUD.
 * Interface usada para exemplificar na pratica o uso de Interfaces.
 */
interface DepartamentoInterfaceCRUD {
	
	/**
	 * Método responsável por inserir registro na base de dados
	 */
	public function inserir(DepartamentoAbstractPO $po);
	
	/**
	 * Método responsável por alterar registro na base de dados
	 */
	public function alterar(DepartamentoAbstractPO $po);
	
	/**
	 * Método responsável por excluir registro da base de dados
	 */
	public function excluir(DepartamentoAbstractPO $po);
	
	/**
	 * Método responsável por buscar todos registros da base de dados
	 */
	public function buscarTodos();
	
	/**
	 * Método responsável por buscar por código registros da base de dados
	 */
	public function buscarPorCodigo(DepartamentoAbstractPO $po);
	
	/**
	 * Método responsável por abrir uma conexão com o banco de dados.
	 */
	public function abrirConexao($persistencia);
	
	/**
	 * Método responsável por fechar uma conexão com o banco de dados.
	 */
	public function fecharConexao();
}
?>