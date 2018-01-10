<?php
    require_once('../nusoap/lib/nusoap.php');
    
    if(isset($_POST['enviar']))
    {
        $parametros = array('datos_alta_proveedor' => array(
                            'nombre' => $_POST['nombre'],
                            'domicilio' => $_POST['domicilio'],
                            'telefono' => $_POST['telefono'],
                            'celular' => $_POST['celular'],
                            'productos' => $_POST['productos'],
                            'precios' => $_POST['precios']));
        
        $servicio = "http://localhost/championFactory/Proveedores/servicioProveedores.php";

        $cliente = new nusoap_client($servicio);
        $result = $cliente->call('altaProveedores',$parametros);
        
        //print_r($result);
        
        header("Location: indexProveedores.php");
    }
?>