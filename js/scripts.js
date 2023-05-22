//activar listener del boton de baja de todas las personas (si no se ha utilizado un onclick en linea)

//activar listener de los botones de modificación de persona (si no se ha utilizado un onclick en linea)


//definir función de confirmación de baja

//definir función para trasladar los datos de la persona a modificar al formulario oculto
function modificarPersonas() {
	//situarnos en la etiqueta tr que corresponda a la fila donde se encuentra el botón

	//recuperar los datos de la persona
	
	//trasladar los datos al formulario oculto

	//submit del formulario
	
}



function borrarPersona(nif) {
  // Pregunta al usuario
  let respuesta = confirm("¿Estás seguro de que quieres borrar esta persona?");

  // Si el usuario acepta, borrar la persona
  if (respuesta) {
    document.querySelector("#baja_input").value = nif;
    document.querySelector("#formularioBaja").submit();
  }
}