<?php
/**
 *Classe que representa todos da'os do sistema
 */
abstract class AbstractDAO {
	
	/**
	 * Atributo utilizado para armazenar uma conexгo
	 */
	private $conexao;
	
	/* usado para saber quando uma conexгo deve ser comitada ou nгo */
	private $persistencia;
	public static $PERSISTENCIA = true;
	public static $CONSULTA = false;
	
	/**
	 * Mйtodo responsбvel por adquirir uma conexгo vбlida e nгo auto-commit.
	 * boolean persistencia - Informa se a conexгo criada sera de transaзгo.
	 * 
	 * @throws ConexaoException persistencia
	 */
	public function abrirConexao($persistencia) {
		$this->persistencia = $persistencia;
		// Se o a instancia nгo existe eu faзo uma
		if (! isset ( $this->conexao )) {
			try {
				$this->conexao = new PDO ( "mysql:host=localhost;dbname=editora", "root", "21110818" );
				//echo "Conexao aberta com sucesso";
			} catch ( ConexaoException $e ) {
				throw new ConexaoException ( "Possivel problema ao adquirir uma conexгo." . $e );
			}
		}
		
		// define que a conexгo nгo serб commitada automaticamente
		
		// Se jб existe instancia na memуria eu retorno ela
		return $this->conexao;
	}
	
	/**
	 * Mйtodo responsбvel por fechar a conexгo corrente (conexao).
	 *
	 * @throws ConexaoException - Caso ocorra um erro ao fechar a conexгo
	 */
	public function fecharConexao() {
		try {
			if ($this->conexao != null && ! $this->conexao->errorInfo ()) {
				try {
					/**
					 * se for persistкncia, realiza o commit
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