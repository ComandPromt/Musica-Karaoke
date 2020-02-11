<?php

function eliminar_espacios($cadena){
	
	$cadena=trim($cadena);
	
	$cadena=str_replace("'"," ",$cadena);
	
	$cadena=str_replace("  "," ",$cadena);

	return $cadena;
}

function leer_fichero_completo($nombre_fichero,$delimitador=null){
	
	$file = fopen("lista.txt", "r") or exit("Unable to open file!");

	$texto="";
	
	while(!feof($file)){
		
		$texto=fgets($file);
		
		$texto=eliminar_espacios($texto);
		
		if(!empty($texto)){
			
			if($delimitador!=null && strpos($texto,$delimitador)>0){
				
				$cantante=substr($texto,0,strpos($texto,$delimitador));
		
				$cancion=substr($texto,strpos($texto,$delimitador)+1,strlen($texto));

				$cantante=eliminar_espacios($cantante);
				
				$cancion=eliminar_espacios($cancion);	
				
			}
			
			print "INSERT INTO canciones (Cantante,Cancion,Genero) VALUES('".$cantante."','".$cancion."','Pop');<br/>";
		
		}

	}
	
	fclose($file);
} 

leer_fichero_completo("lista.txt","-");

?>