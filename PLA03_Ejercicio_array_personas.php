<?php
session_start();

$errores = [];
$alta = false;


//comprobar si hay errores en la sesión
if (isset($_SESSION["errores"])) {
	$errores = $_SESSION["errores"];
} else {
	$errores = array();
	$_SESSION["errores"] = $errores;
}

if (isset($_SESSION['personas'])) {
	$personas = $_SESSION['personas'];
} else {
	$personas = array();
	$_SESSION['personas'] = $personas;
}


//Extraer los datos de la variable de sesión que utilizaremos en el documento html


?>
<html>

<head>
	<title>PLA03</title>
	<meta charset='UTF-8'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
	<main>
		<h1 class='centrar'>PLA03: MANTENIMIENTO PERSONAS</h1>
		<br>
		<form method='post' action='servicios/alta_persona.php'>
			<div class="row mb-3">
				<label for="nif" class="col-sm-2 col-form-label">Nif</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nif" name='nif' value="<?php echo isset($_SESSION['form_data']['nif']) ? $_SESSION['form_data']['nif'] : ''; ?>">
				</div>
			</div>
			<div class="row mb-3">
				<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($_SESSION['form_data']['nombre']) ? $_SESSION['form_data']['nombre'] : ''; ?>">
				</div>
			</div>
			<div class=" row mb-3">
				<label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo isset($_SESSION['form_data']['direccion']) ? $_SESSION['form_data']['direccion'] : ''; ?>">
				</div>
			</div>
			<label for=" nombre" class="col-sm-2 col-form-label"></label>
			<button type="submit" class="btn btn-success" name='alta'>Alta persona</button>
			<br><br>
			<span>
				<?php
				if (count($_SESSION['errores']) > 0) {
					echo "<p>Errores en el formulario:</p>";
					echo "<ul>";
					foreach ($_SESSION['errores'] as $error) {
						echo "<li>" . $error . "</li>";
					}
					echo "</ul>";
					unset($_SESSION['errores']);
				}
				if (isset($_SESSION["alta"]) && $_SESSION["alta"]) {
					echo "<div id = 'exito'>  <p>Persona dada de alta correctamente</p> </div>";
					$_SESSION["alta"] = false;
				}

				if (isset($_SESSION["baja"]) && $_SESSION["baja"]) {
					echo "<div id = 'exito'>  <p>Persona dada de baja correctamente</p> </div>";
					$_SESSION["baja"] = false;
				}

				if (isset($_SESSION["modificacion"]) && $_SESSION["modificacion"]) {
					echo "<div id = 'exito'>  <p>Persona modificada correctamente</p> </div>";
					$_SESSION["modificacion"] = false;
				}

				?>

			</span>
		</form><br>

		<table class="table table-striped">
			<tr class='table-dark'>
				<th scope="col">NIF</th>
				<th scope="col">Nombre</th>
				<th scope="col">Dirección</th>
				<th scope="col"></th>
			</tr>
			<?php
			if (isset($_SESSION["personas"])) :
				foreach ($_SESSION["personas"] as $persona) :

			?>
					<tr>
						<td> <?php echo $persona["nif"]; ?> </td>
						<td><input type='text' value='<?php echo $persona["nombre"]; ?>' id='nombre-<?php echo $persona["nif"]; ?>' class='nombre'></td>
						<td><input type='text' value='<?php echo $persona["direccion"]; ?>' id='direccion-<?php echo $persona["nif"]; ?>' class='direccion'></td>
						<td>
							<form method='post' action='servicios/baja_persona.php'>
								<input type='hidden' name='nifBaja' value="<?php echo $persona["nif"]; ?>">
								<button type="submit" class="btn btn-warning" onclick="borrarPersona('<?php echo $persona["nif"]; ?>')">Baja</button>

							</form>
							<button type="button" class="btn btn-primary modiPersona" id='<?php echo $persona["nif"]; ?>'>Modificar</button>
						</td>
						</td>

					</tr>
			<?php
				endforeach;
			endif;
			?>
		</table>

		<form method='post' action='servicios/baja_personas.php' id='formularioBaja'>
			<input type='hidden' id='baja' name='baja'></input>
			<button type="submit" class="btn btn-danger" id='baja' name='baja' onclick="bajaTodasLasPersonas()">Baja personas</button>
		</form>

		<!--FORMULARIO OCULTO PARA LA MODIFICACION-->
		<form method='post' action='servicios/modificacion_persona.php' id='formularioModi'>
			<input type='hidden' name='nifModi'>
			<input type='hidden' name='nombreModi'>
			<input type='hidden' name="direccionModi">
			<input type='hidden' name='modificar'>
		</form>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src='js/scripts.js'></script>
	<script>
		setTimeout(function() {
			var element = document.getElementById('exito');
			if (element) element.style.display = 'none';
		}, 2000);
	</script>
</body>

</html>
<?php echo ("<pre>" . print_r($_SESSION['personas'], true)  . "</pre>"); ?>