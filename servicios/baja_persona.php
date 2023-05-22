<?php 
    session_start();

    require_once 'funciones/validardatos.php';

    //recuperar las personas del array
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nif = $_POST['nifBaja'];
    }

    try {
        if (isset($_SESSION["personas"][$nif])) {
            // El NIF existe en el array, procede a borrarlo
            unset($_SESSION["personas"][$nif]);
            // Establece una variable de sesión para indicar que se realizó la baja correctamente
            $_SESSION["baja"] = true;
        } else {
            // Si el NIF no existe en el array, muestra un mensaje de error
            $_SESSION["errores"][] = "El NIF no existe en el array de personas.";
        }
    } catch (Exception $e) {
        $_SESSION["errores"][] = $e->getMessage();
    }



    // Retornar a la página principal
    header("Location: ../PLA03_Ejercicio_array_personas.php");
