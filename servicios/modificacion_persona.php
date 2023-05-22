<?php 
    session_start();

    //función validación 
	require_once 'funciones/validardatos.php';


	try {

	//recuperar las personas del array
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nif = $_POST['nifModi'];
		$nombre = $_POST['nombreModi'];
		$direccion = $_POST['direccionModi'];

		// convertir las letras del dni en mayúsculas
		$nif = strtoupper($nif);

		// convertir la primera letra del nombre en mayúscula
		$nombre = ucwords(strtolower($nombre));

		// convertir la primera letra de la dirección en mayúscula
		$direccion = ucwords(strtolower($direccion));

		// validar datos
		validarDatos($nif, $nombre, $direccion);

		// Si todo está bien, modificar la persona en el array de la sesión
		$_SESSION["personas"][$nif] = array(
			'nif' => $nif,
			'nombre' => $nombre,
			'direccion' => $direccion
		);

		//mensaje de modificación efectuada
		$_SESSION['modificacion'] = true;
		header("Location: ../PLA03_Ejercicio_array_personas.php");
		exit();

	}

	} catch (Exception $e) {
		$_SESSION['errores'][] = $e->getMessage();
		header("Location: ../PLA03_Ejercicio_array_personas.php");
		exit();
	
	}
