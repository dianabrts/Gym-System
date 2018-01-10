<?php
    require_once('../nusoap/lib/nusoap.php');
    
    if(isset($_POST['enviar']))
    {
        $parametros = array('id' =>  $_POST['id'],
                            'nombre' => $_POST['nombre'],
                            'appaterno' => $_POST['appaterno'],
                            'apmaterno' => $_POST['apmaterno'],
                            'telefono' => $_POST['telefono'],
                            'celular' => $_POST['celular'],
                            'clases_impartidas' => $_POST['clases_impartidas'],
                            'rfc' => $_POST['rfc']);
                
        $servicio = "http://localhost:8080/championFactory/update?WSDL"; //URL del servicio
        
        $cliente = new SoapClient($servicio,$parametros);
        $result = $cliente->updateMaestro($parametros);
        
        header("Location: mostrarMaestros.php");
    }
?>