//activar listener del boton de baja de todas las personas (si no se ha utilizado un onclick en linea)
document.addEventListener("DOMContentLoaded", function () {
  modificarPersonas();
});

//activar listener de los botones de modificación de persona (si no se ha utilizado un onclick en linea)


//definir función de confirmación de baja

//definir función para trasladar los datos de la persona a modificar al formulario oculto
function modificarPersonas() {
  document.querySelectorAll(".modiPersona").forEach((item) => {
    item.addEventListener("click", (event) => {

      // Obtén el id del botón que fue clickeado
      const nif = event.target.id;

      // Obtén los valores modificados
      const nombre = document.querySelector(`#nombre-${nif}`).value;
      const direccion = document.querySelector(`#direccion-${nif}`).value;

          // Asigna los valores modificados al formulario oculto
      document.querySelector("input[name='nifModi']").value = nif;
      document.querySelector("input[name='nombreModi']").value = nombre;
      document.querySelector("input[name='direccionModi']").value = direccion;
      // Envia el formulario

      document.getElementById("formularioModi").submit();
    });
  });
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
    document.querySelector("#baja").value = nif;
    document.querySelector("#formularioBaja").submit();
  }
}