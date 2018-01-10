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

            $query = "SELECT id,nombre,appaterno,apmaterno,telefono,celular,clases_impartidas,rfc FROM maestros WHERE id=".$id;
            
            $result =  mysqli_query($conn, $query);
            $num_reg = mysqli_num_rows($result);
            
            if($num_reg == 1)
            {
                while($row = mysqli_fetch_assoc($result))
                {
            
        ?>
        <form action="updateMaestrosFull.php"  class="formulario" name="formulario_registro" method="POST">
            <input type="hidden" name="id" value='<?php print $row['id'] ?>'/>
            <div>
                <div class="input-group">
                    <input type="text" id="nombre" name="nombre" value='<?php print $row['nombre'] ?>'/>
                    <label class="label active" for="nombre">Nombre: </label>
                </div>
            
                <div class="input-group">
                    <input type="text" id="appaterno" name="appaterno" value="<?php print $row['appaterno'] ?>"/>
                    <label class="label active" for="appaterno">Apellido Paterno: </label>
                </div>
            
                <div class="input-group">
                    <input type="text" id="apmaterno" name="apmaterno" value="<?php print $row['apmaterno'] ?>"/>
                    <label class="label active" for="apmaterno">Apellido Materno: </label>
                </div>
            
                <div class="input-group">
                    <input type="text" id="telefono" name="telefono" value="<?php print $row['telefono'] ?>"/>
                    <label class="label active" for="telefono">Telefono: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="celular" name="celular" value="<?php print $row['celular'] ?>"/>
                    <label class="label active" for="celular">Celular: </label>
                </div>
            
                <div class="input-group">
                    <input type="text" id="clases_impartidas" name="clases_impartidas" value="<?php print $row['rfc'] ?>"/>
                    <label class="label active" for="clases_impartidas">Clases Impartidas: </label>
                </div>

                <div class="input-group">
                    <input type="text" id="rfc" name="rfc" value="<?php print $row['rfc'] ?>"/>
                    <label class="label active" for="rfc">RFC: </label>
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