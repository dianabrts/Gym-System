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

        <table id="info">
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Telefono</td>
                <td>Celular</td>  
                <td>Clases Impartidas</td>   
                <td>RFC</td>                                
                <td>Editar Maestro</td>  
                <td>Eliminar Maestro</td>  
            </tr>
            <?php
                require_once('../nusoap/lib/nusoap.php');
                $servicio = "http://localhost/championFactory/Maestros/servicioMaestros.php";
                
                $cliente = new nusoap_client($servicio);
                
                $cliente->soap_defencoding = 'utf-8'; 
                $cliente->encode_utf8 = false;
                $cliente->decode_utf8 = false;
                
                $result = $cliente->call('mostrarMaestros');
                
                for ($i=0;$i<count($result);$i++)
                {
            ?>  
                <tr>
                    <td> <?php print( $result[$i]['id'] ); ?> </td>
                    <td> <?php print( $result[$i]['nombre'] ); ?> </td>
                    <td> <?php print( $result[$i]['appaterno'] ); ?> </td>
                    <td> <?php print( $result[$i]['apmaterno'] ); ?> </td>
                    <td> <?php print( $result[$i]['telefono'] ); ?> </td>
                    <td> <?php print( $result[$i]['celular'] ); ?> </td>
                    <td> <?php print( $result[$i]['clases_impartidas'] ); ?> </td>
                    <td> <?php print( $result[$i]['rfc'] ); ?> </td>                    
                    <td> <a href="updateMaestro.php?id=<?php print( $result[$i]['id'] ); ?>"> Editar </a> </td>
                    <td> <a href="deleteMaestro.php?id=<?php print( $result[$i]['id'] ); ?>"> Eliminar </a> </td>
                </tr>                
            <?php
                }
            ?>
        </table>
    </body>
</html>