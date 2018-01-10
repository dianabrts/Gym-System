<?php   
    
    if(isset($_GET['id']))
    {
        $parametros['id'] = $_GET['id'];
        
        $servicio = "http://localhost:8080/championFactory/delete?WSDL"; //URL del servicio
        
        $cliente = new SoapClient($servicio,$parametros);
        $result = $cliente->deleteProducto($parametros);
        
        header("Location: mostrarProductos.php");
    }
    
?>