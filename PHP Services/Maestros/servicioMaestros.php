<?php
    require_once('../nusoap/lib/nusoap.php');
            
    //Crear la instancia del servidor
    $server = new nusoap_server();
    $server->configureWSDL('Servicio Maestros','urn:operaciones_maestros');
    
    $server->soap_defencoding = 'utf-8';
    $server->encode_utf8 = false;
    $server->decode_utf8 = false; 
    
    //Parametros de entrada
    $server->wsdl->addComplexType('datos_alta_maestros','complexType','struct','all','',
                array('nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
                    'appaterno' => array('name' => 'appaterno','type' => 'xsd:string'), 
                    'apmaterno' => array('name' => 'apmaterno', 'type' => 'xsd:string'),
                    'telefono'=>array('name'=>'telefono','type'=>'xsd:string'),
                    'celular'=>array('name'=>'celular','type'=>'xsd:string'),
                    'clases_impartidas'=>array('name'=>'clases_impartidas','type'=>'xsd:int'),
                    'rfc'=>array('name'=>'rfc','type'=>'xsd:string')));
    
    //Parametros de salida
    $server->wsdl->addComplexType('alta_success','complexType','struct','all','',
                array('mensaje'=> array('name' => 'mensaje','type'=>'xsd:string'))); 
    
    //Consultar Tabla de Alumnos de la base de datos
    //Complex Array Keys and Types
    $server->wsdl->addComplexType('consulta_maestros','complexType','struct','all','',
                array('id' => array('name'=>'id','type' => 'xsd:int'),
                    'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
                    'appaterno' => array('name' => 'appaterno','type' => 'xsd:string'), 
                    'apmaterno' => array('name' => 'apmaterno', 'type' => 'xsd:string'),
                    'telefono'=>array('name'=>'edad','type'=>'xsd:string'),
                    'celular'=>array('name'=>'domicilio','type'=>'xsd:string'),
                    'clases_impartidas'=>array('name'=>'telefono','type'=>'xsd:int'),
                    'rfc'=>array('name'=>'celular','type'=>'xsd:string'))); 
    
    //Complex Array
    $server->wsdl->addComplexType('consultaFull','complexType','array','',
                'SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:consulta_maestros[]')));
        
    //Registrar operacion de Alta Alumnos
    $server->register('altaMaestros',array('datos_alta_maestros'=>'tns:datos_alta_maestros'),array('return'=>'tns:alta_success'),
                    'operaciones_maestros',//namespace
                    'operaciones_maestros#altaMaestros',//soap
                    'rpc',//procedimientos remotos
                    'encoded',//use
                    'Recibe la informacion de un alumno nuevo para darlo de alta al sistema');
    
    //Regsitar operacion de Mostrar Maestros
    $server->register('mostrarMaestros', array(), array('return'=>'tns:consultaFull'),
                    'urn:operaciones_maestros',
                    'urn:operaciones_maestros#mostrarMaestros',
                    'rpc',
                    'encoded',
                    'Muestra toda la informacion contenida en la tabla de maestros');
    
    $rawPostData = file_get_contents("php://input");
    $server->service($rawPostData);
    
    function altaMaestros($datosMaestro)
    {        
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "championfactory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());
        
        $query = "INSERT INTO maestros (nombre,appaterno,apmaterno,telefono,celular,clases_impartidas,rfc) " .
                 "VALUES ('".$datosMaestro['nombre']."', '".$datosMaestro['appaterno']."', '".$datosMaestro['apmaterno']."', '".$datosMaestro['telefono']."', '".$datosMaestro['celular']."', '".$datosMaestro['clases_impartidas']."', '".$datosMaestro['rfc']."')";
       
        mysqli_query($conn, $query);
        
        mysqli_close($conn);
        
        $msg = "Maestro Dado de Alta Exitosamente";
        
        return array('mensaje' => $msg);
    }
    
    function mostrarMaestros()
    {
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "championfactory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());
                
        $list=array(); 
        
        $query = "SELECT * FROM maestros";
        $result =  mysqli_query($conn, $query);
                
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($list, array('id'=>intval($row['id']),'nombre'=>$row['nombre'],'appaterno'=>$row['appaterno'],'apmaterno'=>$row['apmaterno'],'telefono'=> $row['telefono'],'celular'=>$row['celular'],'clases_impartidas'=>intval($row['clases_impartidas']),'rfc'=>$row['rfc']));
        }
       
        mysqli_free_result($result);
        
        mysqli_close($conn);
        
        return new soapval('return','tns:consultaFull',$list);
    }
?>