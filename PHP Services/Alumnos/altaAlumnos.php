<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <link rel="stylesheet" href="../CSS/formularios.css">
    <title>Formulario</title>
</head>
<body>
    <div class="contenedor-formulario">
        <div class="wrap">
            <form action="clienteAlumno.php" class="formulario" name="formulario_registro" method="POST">
            <div>
                <div class="input-group">
                    <input type="text" id="nombre" name="nombre">
                    <label class="label" for="nombre">Nombre: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="appaterno" name="appaterno">
                    <label class="label" for="appaterno">Apellido Paterno: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="apmaterno" name="apmaterno">
                    <label class="label" for="apmaterno">Apellido Materno: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="edad" name="edad">
                    <label class="label" for="edad">Edad: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="domicilio" name="domicilio">
                    <label class="label" for="domicilio">Domicilio: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="telefono" name="telefono">
                    <label class="label" for="telefono">Telefono: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="celular" name="celular">
                    <label class="label" for="celular">Celular: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="fecha_inscripcion" name="fecha_inscripcion">
                    <label class="label" for="fecha_inscripcion">Fecha de Inscripcion: </label>
                </div>
            
                <input type="submit" id="btn-submit" name="enviar" value="Enviar">
            </div>
            </form>    
        </div>
        </div>
<script src="../js/formulario.js"></script>   
</body>
</html>