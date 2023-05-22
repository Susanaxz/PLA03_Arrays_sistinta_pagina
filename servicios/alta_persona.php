<?php 
    session_start();

    //incorporar función validación 
    require_once 'funciones/validardatos.php';

    // Creación del array de personas si no existe
    if (!isset($_SESSION['personas'])) {
        $_SESSION['personas'] = array();
    }

    // creación del array de errores
    $_SESSION['errores'] = array(); 
	
    //recuperar las personas del array
    $personas = $_SESSION['personas'];
    
  
    
    try {

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
        //recuperar los datos del formulario
        $nif = trim($_POST['nif']);
        $nombre = trim($_POST['nombre']);
        $direccion = trim($_POST['direccion']);

        // convertir las letras del dni en mayúsculas
        $nif = strtoupper($nif);

        // convertir la primera letra del nombre en mayúscula
        $nombre = ucwords(strtolower($nombre));

        // convertir la primera letra de la dirección en mayúscula
        $direccion = ucwords(strtolower($direccion));

        // Guardar los datos del formulario en la sesión
        $_SESSION['form_data'] = array(
            'nif' => $nif,
            'nombre' => $nombre,
            'direccion' => $direccion
        );

        // Validar datos
        validarDatos($nif, $nombre,
            $direccion
        );

        // Si hay errores después de la validación, redirigir a la página principal
        if (count($_SESSION['errores']) > 0) {
            header("Location: ../PLA03_Ejercicio_array_personas.php?errores=" . urlencode(json_encode($_SESSION['errores'])));
            exit();
        }

        // Verificar si el NIF ya existe
        foreach ($_SESSION["personas"] as $pax) {
            if ($pax["nif"] === $nif) {
                array_push($_SESSION['errores'], "El NIF ya existe.");
                break;
            }
        }

        // Si el NIF ya existe, redirigir a la página principal con el mensaje de error
        if (count($_SESSION['errores']) > 0) {
            header("Location: ../PLA03_Ejercicio_array_personas.php?errores=" . urlencode(json_encode($_SESSION['errores'])));
            exit();
        }

        // Agregar la nueva persona al array de la sesión
        $persona = array(
            "nif" => $nif,
            "nombre" => $nombre,
            "direccion" => $direccion
        );
        $_SESSION["personas"][$nif] = $persona;

        // Limpiar los datos del formulario en la sesión
        unset($_SESSION['form_data']);

        // Redireccionar a la página principal con mensaje de éxito
        $_SESSION["alta"] = true;
        header("Location: ../PLA03_Ejercicio_array_personas.php");
        exit();
    }


    } catch (Exception $e) {
        //capturar la excepción
        array_push($_SESSION['errores'], $e->getMessage());

        // Redirigir a la página principal con el mensaje de error
        header("Location: ../PLA03_Ejercicio_array_personas.php?errores=" . urlencode(json_encode($_SESSION['errores'])));
        exit();
}
        
    

   
    //Retornar a la página principal
    header("Location: ../PLA03_Ejercicio_array_personas.php");
    