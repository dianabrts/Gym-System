<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">  -->
    <link rel="stylesheet" href="../CSS/formularios.css">
    <title>Formulario</title>
</head>
<body>
    <div class="contenedor-formulario">
        <div class="wrap">
            <form action="clienteProductos.php" class="formulario" name="formulario_registro" method="POST">
            <div>
                <div class="input-group">
                    <input type="text" id="nombre" name="nombre">
                    <label class="label" for="nombre">Nombre: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="cantidad" name="cantidad">
                    <label class="label" for="cantidad">Cantidad: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="sucursal" name="sucursal">
                    <label class="label" for="sucursal">Sucursal: </label>
                </div>
                

                <div class="input-group">
                    <input type="text" id="precio" name="precio">
                    <label class="label" for="precio">Precio: </label>
                </div>            
            
                <input type="submit" id="btn-submit" name="enviar" value="Enviar">
            </div>
            </form>
        </div>
        </div>
<script src="../js/formulario.js"></script>        
</body>
</html>