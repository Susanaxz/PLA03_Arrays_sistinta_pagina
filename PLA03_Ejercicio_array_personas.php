<?php
	session_start();

	
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
		      <input type="text" class="form-control" id="nif" name='nif'>
		    </div>
		  </div>
		  <div class="row mb-3">
		    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nombre" name="nombre">
		    </div>
		  </div>
		  <div class="row mb-3">
		    <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="direccion" name="direccion">
		    </div>
		  </div>
		  <label for="nombre" class="col-sm-2 col-form-label"></label>
		  <button type="submit" class="btn btn-success" name='alta'>Alta persona</button>
		  <br><br>
		  <span></span>
		</form><br>

		<table class="table table-striped">
			<tr class='table-dark'><th scope="col">NIF</th><th scope="col">Nombre</th><th scope="col">Dirección</th><th scope="col"></th></tr>
			<?php 
				
			?>
			<!--tr>
		      <td>40000000A</td>
		      <td><input type='text' value='O-Ren Ishii' class='nombre'></td>
		      <td><input type='text' value='Graveyard avenue, 66' class='direccion'></td>
		      <td>
		      	<form method='post' action='#'>
		      		<input type='hidden' name='nifBaja' value='40000000A'>
		      		<button type="submit" class="btn btn-warning" name='bajaPersona'>Baja</button>
		      	</form>
		      	<button type="button" class="btn btn-primary" name='modiPersona'>Modificar</button>
		      </td>
		    </tr-->
		</table>

		<form method='post' action='servicios/baja_personas.php' id='formularioBaja'>
			<input type='hidden' id='baja' name='baja'></input>
			<button type="submit" class="btn btn-danger" id='baja' name='baja'>Baja personas</button>
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
</body>
</html>
<?php echo("<pre>".print_r($personas,true)."</pre>"); ?>