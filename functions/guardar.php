<?php

include_once '../core/config.php';

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$alias = $_POST["alias"];
$rut = $_POST["rut"];
$region = $_POST["region"];
$comuna = $_POST["comuna"];
$candidato = $_POST["candidato"];
$enterado = $_POST['como_se_entero'];
// Convierte las opciones seleccionadas en una cadena separada por comas
$enterado_str = implode(", ", $enterado);
$fecha_actual = date('Y-m-d H:i:s');


// Validar que no exista un voto duplicado por RUT
$sql = "SELECT * FROM voto WHERE rut_voto='$rut'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
  echo "Error: Ya existe un voto con este RUT";
  exit();
}


// Insertar el voto en la base de datos
$sql = "INSERT INTO voto (nombre_apellido_voto, alias_voto, rut_voto, candidato_id, region_id, comuna_id, enterado_voto, fecha_voto)
VALUES ('$nombre', '$alias', '$rut', '$candidato', '$region', '$comuna', '$enterado_str', '$fecha_actual')";

if ($db->query($sql) === TRUE) {
  echo "Voto guardado exitosamente";
} else {
  echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();

$_SESSION['votacion'] = '¡Voto ingresado correctamente!';
header("Location: /index.php");
exit;


?>