<?php
/**
 * fun��o autoload para incluir classes de v�rios diret�rios sem precisar incluir manualmente
 */
 function __autoload($classes) {
 	
    /* diret�rio principal das classes */
 	
 	/**
 	exten��o dos meus arquivos
 	 */
 	$extencao 	  = ".class";
 	$exetencaoFim = ".php";
 	
 	//subdiret�rios
    $diretorios = array('../../abstractdao/','../../abstractpo/','../../exceptions/','../controller/','../dao/','../model/');
    
    foreach ($diretorios as $valor) {
        if (file_exists($valor . $classes .$extencao.$exetencaoFim)) {
            require_once $valor . $classes .$extencao.$exetencaoFim;
        }
        
    }
}
?>