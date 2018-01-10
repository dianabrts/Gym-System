<?php
    require_once('../nusoap/lib/nusoap.php');
    
    if(isset($_POST['enviar']))
    {
        $parametros = array( 'id' => $_POST['id'],
                            'nombre' => $_POST['nombre'],
                            'domicilio' => $_POST['domicilio'],
                            'telefono' => $_POST['telefono'],
                            'celular' => $_POST['celular'],
                            'productos' => $_POST['productos'],
                            'precios' => $_POST['precios']);
                
        $servicio = "http://localhost:8080/championFactory/update?WSDL"; //URL del servicio
        
        $cliente = new SoapClient($servicio,$parametros);
        $result = $cliente->updateProveedor($parametros);
        
        header("Location: mostrarProveedores.php");
    }
?>