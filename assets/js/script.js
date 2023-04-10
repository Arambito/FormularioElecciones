document.addEventListener("DOMContentLoaded",  () => {
  document
    .getElementById("formulario")
    .addEventListener("submit", validarFormulario);
});

//  Función para obtener los datos de un archivo externo usando AJAX
const cargarComunas = () => {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/functions/obtener_comunas.php?region=" + document.getElementById("region").value);
        xhr.onload = function() {
          if (xhr.status === 200) {
            document.getElementById("comuna").innerHTML = xhr.responseText;
            console.log(xhr.responseText);
          }
        };
        xhr.send();
}


// Función para mostrar un mensaje de error en un elemento
const mostrarError = (elemento, mensaje) => {
  elemento.textContent = mensaje;
  elemento.style.display = "block";
}

// Función para validar el campo Nombre
const validarNombre = () => {
  const nombreInput = document.getElementById('nombre');
  const nombreError = document.getElementById('nombre-error');

  if (!nombreInput.value.trimStart()) {
      mostrarError(nombreError, 'El nombre no puede quedar en blanco');
      return false;
  }

  nombreError.textContent = '';
  nombreError.style.display = 'none';
  return true;
}

// Función para validar el campo Alias
const validarAlias = () => {
  const alias = document.getElementById('alias');
  const aliasError = document.getElementById('alias-error');

  const aliasRegex = /^[a-zA-Z0-9]+$/;

  if (!aliasRegex.test(alias.value)) {
      mostrarError(aliasError, 'El alias debe contener letras y números');
      return false;
  } else if (alias.value.length < 6) {
      mostrarError(aliasError, 'El alias debe tener al menos 6 caracteres');
      return false;
  }

  aliasError.textContent = '';
  aliasError.style.display = 'none';
  return true;
}

// Función para validar el campo RUT
const validarRut = () => {
  const rutInput = document.getElementById('rut');
  const rutError = document.getElementById('rut-error');

  if (rutInput.value.trim() === '') {
      rutError.textContent = 'El rut no puede quedar en blanco';
      rutError.style.display = 'block';
      return false;
  }

  // Validar que el RUT tenga un formato válido
  const regex = /^0*(\d{1,3}(\.?\d{3})*)\-?([\dkK])$/;
  if (!regex.test(rutInput.value)) {
      rutError.textContent = 'El RUT ingresado no tiene un formato válido';
      rutError.style.display = 'block';
      return false;
  }

  // Separar el RUT en su número y dígito verificador
  const rutSplit = rutInput.value.replace(/\./g, '').split('-');
  let rutNum = parseInt(rutSplit[0], 10);
  let rutDv = rutSplit[1];

  // Calcular el dígito verificador esperado
  let m = 0;
  let s = 1;
  for (; rutNum; rutNum = Math.floor(rutNum / 10)) {
      s = (s + rutNum % 10 * (9 - m++ % 6)) % 11;
  }
  const dvEsperado = s > 0 ? String(s - 1) : 'K';

  // Comparar el dígito verificador ingresado con el esperado
  if (rutDv.toUpperCase() !== dvEsperado) {
      rutError.textContent = 'El RUT ingresado es inválido';
      rutError.style.display = 'block';
      return false;
  }

  // El RUT es válido
  rutError.textContent = '';
  rutError.style.display = 'none';
  return true;
}

// Función para comprobar si el usuario ha seleccionado una región
const validarRegion = () => {
  const region = document.getElementById('region');
  const regionError = document.getElementById('region-error');

  if (region.value == 0) {
    mostrarError(regionError, "Debes seleccionar una región");
    return false;
  }

  regionError.textContent = "";
  regionError.style.display = "none";
  return true;

}

// Función para comprobar si el usuario ha seleccionado una comuna
const validarComuna = () => {
  const comuna = document.getElementById('comuna');
  const comunaError = document.getElementById('comuna-error');

  if (comuna.value == 0) {
    mostrarError(comunaError, "Debes seleccionar una comuna");
    return false;
  }

  comunaError.textContent = "";
  comunaError.style.display = "none";
  return true;


}

// Función para comprobar si el usuario ha seleccionado un candidato de una lista desplegable. 
const validarCandidato = () => {
  const candidato = document.getElementById('candidato');
  const candidatoError = document.getElementById('candidato-error');

  if(candidato.value == 0){
      mostrarError(candidatoError, 'Debes seleccionar un candidato');
      return false;
  }

  candidatoError.textContent = '';
  candidatoError.style.display = 'none';
  return true;
}


// Función para comprobar si el usuario ha seleccionado al menos 2 opciones. 
const validarCheckbox = () => {
  const comoSeEntero = document.querySelectorAll('input[name="como_se_entero[]"]:checked');
  const enteradoError = document.getElementById('enterado-error');
  if (comoSeEntero.length < 2) {
    mostrarError(enteradoError, "Debe seleccionar al menos dos opciones");
    return false;
  }

  enteradoError.textContent = "";
  enteradoError.style.display = "none";
  return true;

}

// Función para validar el envio del formulario.
const validarFormulario = (e) => {
  e.preventDefault();

  
  const nombreValido = validarNombre();
  const aliasValido = validarAlias();
  const rutValido = validarRut();
  const regionValido = validarRegion();
  const comunaValido = validarComuna();
  const candidatoValido = validarCandidato();
  const checkboxValido = validarCheckbox();


  if (!nombreValido) {
    return;
  } else if (!aliasValido) {
    return;
  } else if (!rutValido) {
    return;
  } else if (!regionValido) {
    return;
  } else if(!comunaValido){
    return;
  } else if(!candidatoValido){
    return;
  } else if(!checkboxValido){
    return;
  }
  
  e.target.submit();
}

