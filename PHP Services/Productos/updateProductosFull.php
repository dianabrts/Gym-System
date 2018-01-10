<?php
    require_once('../nusoap/lib/nusoap.php');
    
    if(isset($_POST['enviar']))
    {
        $parametros = array( 'id' => $_POST['id'],
                            'nombre' => $_POST['nombre'],
                            'cantidad' => $_POST['cantidad'],
                            'sucursal' => $_POST['sucursal'],
                            'precio' => $_POST['precio']);
                
        $servicio = "http://localhost:8080/championFactory/update?WSDL"; //URL del servicio
        
        $cliente = new SoapClient($servicio,$parametros);
        $result = $cliente->updateProducto($parametros);
        
        header("Location: mostrarProductos.php");
    }
?>