<?php
    require_once('../nusoap/lib/nusoap.php');
            
    //Crear la instancia del servidor
    $server = new nusoap_server();
    $server->configureWSDL('Servicio Proveedores','urn:operaciones_proveedores');
    
    $server->soap_defencoding = 'utf-8';
    $server->encode_utf8 = false;
    $server->decode_utf8 = false; 
    
    //Parametros de entrada
    $server->wsdl->addComplexType('datos_alta_proveedor','complexType','struct','all','',
                array('nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
                      'domicilio' => array('name' => 'domicilio','type' => 'xsd:string'), 
                      'telefono' => array('name' => 'telefono', 'type' => 'xsd:string'),
                      'celular'=>array('name'=>'celular','type'=>'xsd:string'),
                      'productos'=>array('name'=>'productos','type'=>'xsd:string'),
                      'precios'=>array('name'=>'precios','type'=>'xsd:int')));
    
    //Parametros de salida
    $server->wsdl->addComplexType('alta_success','complexType','struct','all','',
                array('mensaje'=> array('name' => 'mensaje','type'=>'xsd:string'))); 
    
    //Consultar Tabla de Alumnos de la base de datos
    //Complex Array Keys and Types
    $server->wsdl->addComplexType('consulta_proveedores','complexType','struct','all','',
                array('id' => array('name'=>'id','type' => 'xsd:int'),
                    'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
                    'domicilio' => array('name' => 'domicilio','type' => 'xsd:string'), 
                    'telefono' => array('name' => 'celular', 'type' => 'xsd:string'),
                    'productos'=>array('name'=>'productos','type'=>'xsd:string'),
                    'precios'=>array('name'=>'precios','type'=>'xsd:int'))); 
    
    //Complex Array
    $server->wsdl->addComplexType('consultaFull','complexType','array','',
                'SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:consulta_proveedores[]')));
    
    //Registrar operacion de Alta Alumnos
    $server->register('altaProveedores',array('datos_alta_proveedor'=>'tns:datos_alta_proveedor'),array('return'=>'tns:alta_success'),
                    'urn:operaciones_proveedores',//namespace
                    'urn:operaciones_proveedores#altaProveedores',//soap
                    'rpc',//procedimientos remotos
                    'encoded',//use
                    'Recibe la informacion de un alumno nuevo para darlo de alta al sistema');
    
    //Regsitar operacion de Mostrar Alumnos
    $server->register('mostrarProveedores', array(), array('return'=>'tns:consultaFull'),
                    'urn:operaciones_proveedores',
                    'urn:operaciones_proveedores#mostrarProveedores',
                    'rpc',
                    'encoded',
                    'Muestra toda la informacion contenida en la tabla de alumnos');
    
    
    $rawPostData = file_get_contents("php://input");
    $server->service($rawPostData);
    
    function altaProveedores($datosProveedores)
    {        
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "championfactory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());
        
        $query = "INSERT INTO proveedores (nombre,domicilio,telefono,celular,productos,precios) " .
                 "VALUES ('".$datosProveedores['nombre']."', '".$datosProveedores['domicilio']."', '".$datosProveedores['telefono']."', '".$datosProveedores['celular']."', '".$datosProveedores['productos']."', ".$datosProveedores['precios'].")";
       
        mysqli_query($conn, $query);
        
        mysqli_close($conn);
        
        $msg = "Proveedor Dado de Alta Exitosamente";
        
        return array('mensaje' => $msg);
    }
    
    function mostrarProveedores()
    {
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "championfactory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());
                
        $list=array();         
        $query = "SELECT * FROM proveedores";
        $result =  mysqli_query($conn, $query);
                
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($list, array('id'=>intval($row['id']),'nombre'=>$row['nombre'],'domicilio'=>$row['domicilio'],'telefono'=>$row['telefono'],'celular'=>$row['celular'],'productos'=>$row['productos'],'precios'=>intval($row['precios'])));
        }
       
        mysqli_free_result($result);
        
        mysqli_close($conn);
        
        return new soapval('return','tns:consultaFull',$list);
    }
?>