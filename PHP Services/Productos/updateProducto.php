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
        <?php
            $id = $_GET['id'];
            $servername = "localhost:3306";
            $username = "root";
            $password = "";
            $dbname = "championfactory";

            $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());

            $query = "SELECT id,nombre,cantidad,sucursal,precio FROM productos WHERE id=".$id;
            
            $result =  mysqli_query($conn, $query);
            $num_reg = mysqli_num_rows($result);
            
            if($num_reg == 1)
            {
                while($row = mysqli_fetch_assoc($result))
                {
            
        ?>
        <form action="updateProductosFull.php" class="formulario" name="formulario_registro" method="POST">
        <div>
           
            <input type="hidden" name="id" value='<?php print $row['id'] ?>'/>

            <div class="input-group">
                    <input type="text" id="nombre" name="nombre" value='<?php print $row['nombre'] ?>'/>
                    <label class="label active" for="nombre">Nombre: </label>
            </div>
            
            <div class="input-group">
                    <input type="text" id="cantidad" name="cantidad" value="<?php print $row['cantidad'] ?>"/>
                    <label class="label active" for="cantidad">Cantidad: </label>
            </div>
            
            <div class="input-group">
                    <input type="text" id="sucursal" name="sucursal" value="<?php print $row['sucursal'] ?>"/>
                    <label class="label active" for="sucursal">Sucursal: </label>
            </div>

            <div class="input-group">
                    <input type="text" id="precio" name="precio" value="<?php print $row['precio'] ?>"/>
                    <label class="label active" for="precio">Precio: </label>
            </div>
            
            
            <input type="submit" name="enviar" value="Enviar"/>
            <br> 
            </div>
        </form>
        
        <?php 
        
                }
                
                mysqli_free_result($result);        
                mysqli_close($conn);
            }
        ?>
        </div>
        </div>
<script src="../js/formulario.js"></script>
    </body>
</html>