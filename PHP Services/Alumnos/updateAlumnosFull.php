<?php
    require_once('../nusoap/lib/nusoap.php');
    
    if(isset($_POST['enviar']))
    {
        $parametros = array('id' => $_POST['id'],
                            'nombre' => $_POST['nombre'],
                            'appaterno' => $_POST['appaterno'],
                            'apmaterno' => $_POST['apmaterno'],
                            'edad' => $_POST['edad'],
                            'domicilio' => $_POST['domicilio'],
                            'telefono' => $_POST['telefono'],
                            'celular' => $_POST['celular'],
                            'fecha_inscripcion' => $_POST['fecha_inscripcion']);
                
        $servicio = "http://localhost:8080/championFactory/update?WSDL"; //URL del servicio
        
        $cliente = new SoapClient($servicio,$parametros);
        $result = $cliente->updateAlumno($parametros);
        
        header("Location: mostrarAlumnos.php");
    }
?>