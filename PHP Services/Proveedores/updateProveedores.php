<html>
    <head>
        <meta charset="UTF-8">
        <title> Proveedores </title>
        <link rel="stylesheet" type="text/css" href="CSS/altaProveedores.css">
    </head>
    <body>
        <?php
            $id = $_GET['id'];
            $servername = "localhost:3306";
            $username = "root";
            $password = "";
            $dbname = "championfactory";

            $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());

            $query = "SELECT id,nombre,domicilio,telefono,celular,productos,precios FROM proveedores WHERE id=".$id;
            
            $result =  mysqli_query($conn, $query);
            $num_reg = mysqli_num_rows($result);
            
            if($num_reg == 1)
            {
                while($row = mysqli_fetch_assoc($result))
                {
            
        ?>
        <form action="updateProveedoresFull.php" method="POST">
            <input type="hidden" name="id" value='<?php print $row['id'] ?>'/>
            
            <label>Nombre: </label>
            <input type="text" name="nombre" value='<?php print $row['nombre'] ?>'/>
            <br>
            
            <label>Domicilio: </label>
            <input type="text" name="domicilio" value="<?php print $row['domicilio'] ?>"/>
            <br>
          
            <label>Telefono: </label>
            <input type="text" name="telefono" value="<?php print $row['telefono'] ?>"/>
            <br> 
            
            <label>Celular: </label>
            <input type="text" name="celular" value="<?php print $row['celular'] ?>"/>
            <br>  
            
            <label>Productos: </label>
            <input type="text" name="productos" value="<?php print $row['productos'] ?>"/>
            <br> 
            
            <label>Precios: </label>
            <input type="text" name="precios" value="<?php print $row['precios'] ?>"/>
            <br> 
            
            <input type="submit" name="enviar" value="Enviar"/>
            <br> 
        </form>
        
        <?php 
        
                }
                
                mysqli_free_result($result);        
                mysqli_close($conn);
            }
        ?>
    </body>
</html>