<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Champions Factory</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <header>
        <div id="subheader">
            <div id="logotipo"><p><a href="../index.php">The Champions Factory</a></p></div>
            <nav>
                <ul>
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">Log In</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- <section id="wrap"> -->
        <table id="info">
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Edad</td>
                <td>Domicilio</td>
                <td>Telefono</td>
                <td>Celular</td>                
                <td>Fecha Inscripcion</td>                
                <td>Editar Alumno</td>  
                <td>Eliminar Alumno</td>  
            </tr>
            <?php
                require_once('../nusoap/lib/nusoap.php');
                $servicio = "http://localhost/championFactory/Alumnos/servicioAlumnos.php";
                
                $cliente = new nusoap_client($servicio);
                
                $cliente->soap_defencoding = 'utf-8'; 
                $cliente->encode_utf8 = false;
                $cliente->decode_utf8 = false;
                
                $result = $cliente->call('mostrarAlumnos');
                                
                for ($i=0;$i<count($result);$i++)
                {
            ?>  
                <tr>
                    <td> <?php print( $result[$i]['id'] ); ?> </td>
                    <td> <?php print( $result[$i]['nombre'] ); ?> </td>
                    <td> <?php print( $result[$i]['appaterno'] ); ?> </td>
                    <td> <?php print( $result[$i]['apmaterno'] ); ?> </td>
                    <td> <?php print( $result[$i]['edad'] ); ?> </td>
                    <td> <?php print( $result[$i]['domicilio'] ); ?> </td>
                    <td> <?php print( $result[$i]['telefono'] ); ?> </td>
                    <td> <?php print( $result[$i]['celular'] ); ?> </td>
                    <td> <?php print( $result[$i]['fecha_inscripcion'] ); ?> </td>
                    <td> <a href="updateAlumno.php?id=<?php print( $result[$i]['id'] ); ?>"> Editar </a> </td>
                    <td> <a href="deleteAlumno.php?id=<?php print( $result[$i]['id'] ); ?>"> Eliminar </a> </td>
                </tr>                
            <?php
                }
            ?>
        </table>
        
    <!-- </section> -->
    </body>
</html>