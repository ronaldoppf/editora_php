<?php
/**
 *Classe que representa todos da'os do sistema
 */
abstract class AbstractDAO {
	
	/**
	 * Atributo utilizado para armazenar uma conex�o
	 */
	private $conexao;
	
	/* usado para saber quando uma conex�o deve ser comitada ou n�o */
	private $persistencia;
	public static $PERSISTENCIA = true;
	public static $CONSULTA = false;
	
	/**
	 * M�todo respons�vel por adquirir uma conex�o v�lida e n�o auto-commit.
	 * boolean persistencia - Informa se a conex�o criada sera de transa��o.
	 * 
	 * @throws ConexaoException persistencia
	 */
	public function abrirConexao($persistencia) {
		$this->persistencia = $persistencia;
		// Se o a instancia n�o existe eu fa�o uma
		if (! isset ( $this->conexao )) {
			try {
				$this->conexao = new PDO ( "mysql:host=localhost;dbname=editora", "root", "21110818" );
				//echo "Conexao aberta com sucesso";
			} catch ( ConexaoException $e ) {
				throw new ConexaoException ( "Possivel problema ao adquirir uma conex�o." . $e );
			}
		}
		
		// define que a conex�o n�o ser� commitada automaticamente
		
		// Se j� existe instancia na mem�ria eu retorno ela
		return $this->conexao;
	}
	
	/**
	 * M�todo respons�vel por fechar a conex�o corrente (conexao).
	 *
	 * @throws ConexaoException - Caso ocorra um erro ao fechar a conex�o
	 */
	public function fecharConexao() {
		try {
			if ($this->conexao != null && ! $this->conexao->errorInfo ()) {
				try {
					/**
					 * se for persist�ncia, realiza o commit
					 */
					if ($this->persistencia) {
						$this->conexao->commit ();
					}
				} catch ( Exception $e ) {
					
					try {
						$this->conexao->rollBack ();
					} catch ( Exception $e ) {
						$this->conexao = null;
						$this->persistencia = false;
						throw new RollbackException ( "Falha no rollback" . $e );
					}
				}
			}
		} catch ( Exception $e ) {
			throw new ConexaoException ( "Problema ao fechar conexao." . $e );
		}
	}
}

?>