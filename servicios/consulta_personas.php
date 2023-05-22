<?php
session_start();

// Creación del array de personas si no existe
if (!isset($_SESSION['personas'])) {
    $_SESSION['personas'] = array();
}

//recuperar las personas del array
$personas = $_SESSION['personas'];


//ordenar el array por nif (si se destruye la sesión, se pierde el orden)
usort($personas, function ($a, $b) {
    return $a['nif'] <=> $b['nif'];
});


//compactar el array en una varaible de sesión
$_SESSION['personas'] = $personas;

//Retornar a la página principal (la página con el documento HTML)
header("Location: ../PLA03_Ejercicio_array_personas.php");
