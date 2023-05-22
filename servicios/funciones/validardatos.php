<?php

$_SESSION['errores'] = array();

    //FUNCION DE VALIDACION DE DATOS COMUNES
	function validarDatos($nif, $nombre, $direccion) {
		try {
			if (empty($nif)) {
				array_push($_SESSION['errores'], "El NIF no puede estar vacío");
			} 
			if (empty($nombre)) {
				array_push($_SESSION['errores'], "El nombre no puede estar vacío");
			} 
			
			if (empty($direccion)) {
				array_push($_SESSION['errores'], "La dirección no puede estar vacía");
			}
			
		} catch (Exception $e) {
			//relanzar la excepción
			throw $e = new Exception("Error en la validación de datos");
			
		}
	}