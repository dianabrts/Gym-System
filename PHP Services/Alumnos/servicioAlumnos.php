<?php
    require_once('../nusoap/lib/nusoap.php');
            
    //Crear la instancia del servidor
    $server = new nusoap_server();
    $server->configureWSDL('Servicio Alumnos','urn:operaciones_alumnos');
    
    $server->soap_defencoding = 'utf-8';
    $server->encode_utf8 = false;
    $server->decode_utf8 = false;    
    
    //OPERACION DE DAR DE ALTA UN ALUMNO
    //Parametros de entrada para dar de alta un alumno
    $server->wsdl->addComplexType('datos_alta_alumno','complexType','struct','all','',
                array('nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
                    'appaterno' => array('name' => 'appaterno','type' => 'xsd:string'), 
                    'apmaterno' => array('name' => 'apmaterno', 'type' => 'xsd:string'),
                    'edad'=>array('name'=>'edad','type'=>'xsd:int'),
                    'domicilio'=>array('name'=>'domicilio','type'=>'xsd:string'),
                    'telefono'=>array('name'=>'telefono','type'=>'xsd:string'),
                    'celular'=>array('name'=>'celular','type'=>'xsd:string'),
                    'fecha_inscripcion'=>array('name'=>'fecha_inscripcion','type'=>'xsd:string')));
    
    //Parametros de salida para alta de un alumno
    $server->wsdl->addComplexType('alta_success','complexType','struct','all','',
                array('mensaje'=> array('name' => 'mensaje','type'=>'xsd:string'))); 
        
    //OPERACION DE MOSTRAR TODOS LOS ALUMNOS REGISTRO DE PARAMETROS DE ENTRADA
    //Complex Array Keys and Types
    $server->wsdl->addComplexType('consulta_alumnos','complexType','struct','all','',
                array('id' => array('name'=>'id','type' => 'xsd:int'),
                    'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
                    'appaterno' => array('name' => 'appaterno','type' => 'xsd:string'), 
                    'apmaterno' => array('name' => 'apmaterno', 'type' => 'xsd:string'),
                    'edad'=>array('name'=>'edad','type'=>'xsd:int'),
                    'domicilio'=>array('name'=>'domicilio','type'=>'xsd:string'),
                    'telefono'=>array('name'=>'telefono','type'=>'xsd:string'),
                    'celular'=>array('name'=>'celular','type'=>'xsd:string'),
                    'fecha_inscripcion'=>array('name'=>'fecha_inscripcion','type'=>'xsd:string')));    
        
    //Complex Array
    $server->wsdl->addComplexType('consultaFull','complexType','array','',
                'SOAP-ENC:Array',array(),array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:consulta_alumnos[]')));
        
    //Registrar operacion de Alta Alumnos
    $server->register('altaAlumno',array('datos_alta_alumno'=>'tns:datos_alta_alumno'),array('return'=>'tns:alta_success'),
                    'urn:operaciones_alumnos',//namespace
                    'urn:operaciones_alumnos#altaAlumno',//soap
                    'rpc',//procedimientos remotos
                    'encoded',//use
                    'Recibe la informacion de un alumno nuevo para darlo de alta al sistema');
    
    //Regsitar operacion de Mostrar Alumnos
    $server->register('mostrarAlumnos', array(), array('return'=>'tns:consultaFull'),
                    'urn:operaciones_alumnos',
                    'urn:operaciones_alumnos#mostrarAlumnos',
                    'rpc',
                    'encoded',
                    'Muestra toda la informacion contenida en la tabla de alumnos');
    
    $rawPostData = file_get_contents("php://input");
    $server->service($rawPostData);
    
    function altaAlumno($datosAlumno)
    {        
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "championfactory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());
        
        $query = "INSERT INTO alumnos (nombre,appaterno,apmaterno,edad,domicilio,telefono,celular,fecha_inscripcion) " .
                 "VALUES ('".$datosAlumno['nombre']."', '".$datosAlumno['appaterno']."', '".$datosAlumno['apmaterno']."', ".$datosAlumno['edad'].", '".$datosAlumno['domicilio']."', '".$datosAlumno['telefono']."', '".$datosAlumno['celular']."', '".$datosAlumno['fecha_inscripcion']."')";
       
        mysqli_query($conn, $query);
        
        mysqli_close($conn);
        
        $msg = "Alumno Dado de Alta Exitosamente";
        
        return array('mensaje' => $msg);
    }
    
    function mostrarAlumnos()
    {
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "championfactory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error());
                
        $list=array();         
        $query = "SELECT id,nombre,appaterno,apmaterno,edad,domicilio,telefono,celular,fecha_inscripcion FROM alumnos";
        $result =  mysqli_query($conn, $query);
                
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($list, array('id'=>intval($row['id']),'nombre'=>$row['nombre'], 'appaterno'=>$row['appaterno'],'apmaterno'=>$row['apmaterno'],'edad'=> intval($row['edad']),'domicilio'=>$row['domicilio'],'telefono'=>$row['telefono'],'celular'=>$row['celular'],'fecha_inscripcion'=>$row['fecha_inscripcion']));
        }
       
        mysqli_free_result($result);
        
        mysqli_close($conn);
        
        return new soapval('return','tns:consultaFull',$list);
    }
?>