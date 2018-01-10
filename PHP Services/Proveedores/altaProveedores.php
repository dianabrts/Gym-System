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
            <form action="clienteProveedores.php" class="formulario" name="formulario_registro" method="POST">
            <div>
                <div class="input-group">
                    <input type="text" id="nombre" name="nombre">
                    <label class="label" for="nombre">Nombre: </label>
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
                    <input type="text" id="productos" name="productos">
                    <label class="label" for="productos">Nombre del Producto: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="precios" name="precios">
                    <label class="label" for="precios">Precio del Producto: </label>
                </div>
            
                <input type="submit" id="btn-submit" name="enviar" value="Enviar">
            </div>
            </form>
        </div>
        </div>
<script src="../js/formulario.js"></script>        
</body>
</html>