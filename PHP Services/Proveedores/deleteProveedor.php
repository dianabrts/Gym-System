<?php   
    
    if(isset($_GET['id']))
    {
        $parametros['id'] = $_GET['id'];
        
        $servicio = "http://localhost:8080/championFactory/delete?WSDL"; //URL del servicio
        
        $cliente = new SoapClient($servicio,$parametros);
        $result = $cliente->deleteProveedor($parametros);
        
        header("Location: mostrarProspectos.php");
    }
    
?>