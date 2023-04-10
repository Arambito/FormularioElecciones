<?php 
	require_once 'core/config.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Votación</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="/assets/js/script.js"></script>



</head>

<body>
    <header>
        <h1>Formulario de votación</h1>
    </header>
    <main>

    <?php if (isset($_SESSION['votacion'])) {
			echo '<div class="alert alert-success">' . $_SESSION['votacion'] . '</div>';
			unset($_SESSION['votacion']);
		} ?>


        <form method="post" action="/functions/guardar.php" id="formulario" class="card">
            <div class="form-group">

                <label for="nombre">Nombre y Apellido</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
                <span id="nombre-error" class="error"></span>
            </div>
            <div class="form-group">

                <label for="alias">Alias</label>
                <input type="text" class="form-control" id="alias" name="alias">
                <span id="alias-error" class="error"></span>
            </div>
            <div class="form-group">

                <label for="rut">RUT</label>
                <input type="text" class="form-control" id="rut" name="rut">
                <span id="rut-error" class="error"></span>
            </div>

            <div class="form-group">
                <div class="columna">
                    <label for="region">Región:</label>
                    <select id="region" name="region" onchange="cargarComunas()">
                        <!-- Opciones de regiones -->
                        <option value="0" selected>Selecciona una región</option>
                        <?php
								$consulta = "SELECT * FROM region";
								$resultado = $db->query($consulta);
								while ($fila = $resultado->fetch_assoc()) {
								?>
                        <option value="<?php echo $fila['id_region'] ?>"><?php echo $fila['nombre_region'] ?></option>
                        <?php } ?>
                    </select>
                    <span id="region-error" class="error"></span>
                </div>
                <div class="columna">
                    <label for="comuna">Comuna:</label>
                    <select id="comuna" name="comuna">
                        <option value="0">Selecciona una comuna</option>
                        <!-- Opciones de comunas -->
                    </select>
                    <span id="comuna-error" class="error"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="comuna">Candidatos:</label>
                <select id="candidato" name="candidato">
                    <option value="0">Seleccionar candidato</option>
                    <?php
								$query = "SELECT * FROM candidato";
								$resultado = $db->query($query);
								while ($row = $resultado->fetch_assoc()) {
								?>
                    <option value="<?php echo $row['id_candidato']; ?>"><?php echo $row['nombre_candidato']; ?></option>
                    <?php } ?>
                </select>
                <span id="candidato-error" class="error"></span>
            </div>

            <label>¿Cómo se enteró de nosotros?</label>
            <div class="checkbox-group">
                <div>
                    <input type="checkbox" name="como_se_entero[]" value="Web">
                    <label for="web">Web</label>
                </div>
                <div>
                    <input type="checkbox" name="como_se_entero[]" value="TV">
                    <label for="tv">TV</label>
                </div>
                <div>
                    <input type="checkbox" name="como_se_entero[]" value="Redes Sociales">
                    <label for="redessociales">Redes Sociales</label>
                </div>
                <div>
                    <input type="checkbox" name="como_se_entero[]" value="Amigo">
                    <label for="amigo">Amigo</label>
                </div>
            </div>
            <span id="enterado-error" class="error"></span>


            <!-- Resto del formulario -->
            <button type="submit" class="btn btn-primary" id="btn-votar">Votar</button>
        </form>
    </main>
</body>

</html>