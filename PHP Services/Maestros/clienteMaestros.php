<?php
    require_once('../nusoap/lib/nusoap.php');
    
    if(isset($_POST['enviar']))
    {
        $parametros = array('datos_alta_maestro' => array(
                            'nombre' => $_POST['nombre'],
                            'appaterno' => $_POST['appaterno'],
                            'apmaterno' => $_POST['apmaterno'],
                            'telefono' => $_POST['telefono'],
                            'celular' => $_POST['celular'],
                            'clases_impartidas' => $_POST['clases_impartidas'],
                            'rfc' => $_POST['rfc']));
        
        $servicio = "http://localhost/championFactory/Maestros/servicioMaestros.php";

        $cliente = new nusoap_client($servicio);
        $result = $cliente->call('altaMaestros',$parametros);
        
        header("Location: indexMaestros.php");
    }
?>