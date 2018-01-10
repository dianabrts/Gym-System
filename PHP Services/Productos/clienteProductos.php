<?php
    require_once('../nusoap/lib/nusoap.php');
    
    if(isset($_POST['enviar']))
    {
        $parametros = array('datos_alta_producto' => array(
                            'nombre' => $_POST['nombre'],
                            'cantidad' => $_POST['cantidad'],
                            'sucursal' => $_POST['sucursal'],
                            'precio' => $_POST['precio']));
        
        $servicio = "http://localhost/championFactory/Productos/servicioProductos.php";

        $cliente = new nusoap_client($servicio);
        $result = $cliente->call('altaProducto',$parametros);
        
        //print_r($result);
        
        header("Location: indexProductos.php");
    }
?>