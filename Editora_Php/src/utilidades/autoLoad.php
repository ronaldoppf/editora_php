<?php
/**
 *Desenvolvido por Ronaldo Pontes Pessoa Filho
 *ronaldoppf@hotmail.com
 *https://www.facebook.com/ronaldoppf
 *https://github.com/ronaldoppf
 **/

/**
 * funзгo autoload para incluir classes de vбrios diretуrios sem precisar incluir manualmente
 */
 function __autoload($classes) {
 	
    /* diretуrio principal das classes */
 	
 	/**
 	extenзгo dos meus arquivos
 	 */
 	$extencao 	  = ".class";
 	$exetencaoFim = ".php";
 	
 	//subdiretуrios
    $diretorios = array('../../abstractdao/','../../abstractpo/','../../exceptions/','../controller/','../dao/','../model/');
    
    foreach ($diretorios as $valor) {
        if (file_exists($valor . $classes .$extencao.$exetencaoFim)) {
            require_once $valor . $classes .$extencao.$exetencaoFim;
        }
        
    }
}
?>