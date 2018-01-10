<?php
    require_once('../nusoap/lib/nusoap.php');
            
    //Crear la instancia del servidor
    $server = new nusoap_server();
    $server->configureWSDL('Servicio Productos','urn:operaciones_productos');
    
    $server->soap_defencoding = 'utf-8';
    $server->encode_utf8 = false;
    $server->decode_utf8 = false; 
    
    //Parametros de entrada
    $server->wsdl->addComplexType('datos_alta_producto','complexType','struct','all','',
                array('nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
                      'cantidad' => array('name' => 'cantidad','type' => 'xsd:int'), 
                      'sucursal' => array('name' => 'sucursal', 'type' => 'xsd:string'),
                      'precio'=>array('name'=>'precio','type'=>'xsd:int')));
    
    //Parametros de salida
    $server->wsdl->addComplexType('alta_success','complexType','struct','all','',
                array('mensaje'=> array('name' => 'mensaje','type'=>'xsd:string'))); 
    
    //Consultar Tabla de Alumnos de la base de datos
    //Complex Array Keys and Types
    $server->wsdl->addComplexType('consulta_productos','complexType','struct','all','',
                array('id' => array('name'=>'id','type' => 'xsd:int'),
                    'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
                    'cantidad' => array('name' => 'cantidad','type' => 'xsd:int'), 
                    'sucursal' => array('name' => 'apmaterno', 'type' => 'xsd:string'),
                    'precio'=>array('name'=>'edad','type'=>'xsd:int'))); 
    
    //Complex Array
    $server->wsdl->addComplexType('consultaFull','complexType','array','',
                'SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:consulta_productos[]')));
           
    //Registrar operacion de Alta Productos
    $server->register('altaProducto',array('datos_alta_producto'=>'tns:datos_alta_producto'),array('return'=>'tns:alta_success'),
                    'urn:operaciones_productos',//namespace
                    'urn:operaciones_productos#altaProducto',//soap
                    'rpc',//procedimientos remotos
                    'encoded',//use
                    'Recibe la informacion de un producto nuevo para darlo de alta al sistema');
    
    //Regsitar operacion de Mostrar Maestros
    $server->register('mostrarProductos', array(), array('return'=>'tns:consultaFull'),
                    'urn:operaciones_productos',
                    'urn:operaciones_productos#mostrarProductos',
                    'rpc',
                    'encoded',
                    'Muestra toda la informacion contenida en la tabla de productos');
    
    $rawPostData = file_get_contents("php://input");
    $server->service($rawPostData);
    
    function altaProducto($datosProducto)
    {        
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "championfactory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());
        
        $query = "INSERT INTO productos (nombre,cantidad,sucursal,precio) " .
                 "VALUES ('".$datosProducto['nombre']."', ".$datosProducto['cantidad'].", '".$datosProducto['sucursal']."', ".$datosProducto['precio'].")";
       
        mysqli_query($conn, $query);
        
        mysqli_close($conn);
        
        $msg = "Proveedor Dado de Alta Exitosamente";
        
        return array('mensaje' => $msg);
    }
    
    function mostrarProductos()
    {
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "championfactory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());
                
        $list=array(); 
        
        $query = "SELECT * FROM productos";
        $result =  mysqli_query($conn, $query);
                
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($list, array('id'=>intval($row['id']),'nombre'=>$row['nombre'],'cantidad'=>intval($row['cantidad']),'sucursal'=>$row['sucursal'],'precio'=>intval($row['precio'])));
        }
       
        mysqli_free_result($result);
        
        mysqli_close($conn);
        
        return new soapval('return','tns:consultaFull',$list);
    }    
?>