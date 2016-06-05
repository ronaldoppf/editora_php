<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 * Interface responsável por representar os métodos de um CRUD.
 * Interface usada para exemplificar na pratica o uso de Interfaces.
 */
interface UsuarioInterfaceCRUD {
	
	/**
	 * Método responsável por inserir registro na base de dados
	 */
	public function inserir(UsuarioAbstractPO $po);
	
	/**
	 * Método responsável por alterar registro na base de dados
	 */
	public function alterar(UsuarioAbstractPO $po);
	
	/**
	 * Método responsável por excluir registro da base de dados
	 */
	public function excluir(UsuarioAbstractPO $po);
	
	/**
	 * Método responsável por buscar todos registros da base de dados
	 */
	public function buscarTodos();
	
	/**
	 * Método responsável por buscar por código registros da base de dados
	 */
	public function buscarPorCodigo(UsuarioAbstractPO $po);
	
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