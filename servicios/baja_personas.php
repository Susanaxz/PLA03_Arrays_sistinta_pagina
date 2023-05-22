<?php
session_start();



//recuperar las personas del array
$personas = $_SESSION['personas'];

//inicializar el array
$errores = array();
$personas = array();

//compactaremos en un array el array vacio de personas
$_SESSION['personas'] = $personas;


if (isset($_SESSION['personas'][$_POST['baja']])) {
    // Si es así, lo borramos
    unset($_SESSION['personas'][$_POST['baja']]);
}

// Redireccionamos al usuario de vuelta a la página principal
header('Location: consulta_personas.php');
