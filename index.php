<?php 
	session_start();

	//eliminar datos de accesos anteriores
	session_unset();
	
	//acciones a realizar al entrar en la aplicación
	header("Location: servicios/consulta_personas.php");
