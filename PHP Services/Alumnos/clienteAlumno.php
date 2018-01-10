<?php
    require_once('../nusoap/lib/nusoap.php');
    
    if(isset($_POST['enviar']))
    {
        $parametros = array('datos_alta_alumno' => array(
                            'nombre' => $_POST['nombre'],
                            'appaterno' => $_POST['appaterno'],
                            'apmaterno' => $_POST['apmaterno'],
                            'edad' => $_POST['edad'],
                            'domicilio' => $_POST['domicilio'],
                            'telefono' => $_POST['telefono'],
                            'celular' => $_POST['celular'],
                            'fecha_inscripcion' => $_POST['fecha_inscripcion']));
        
        $servicio = "http://localhost/championFactory/Alumnos/servicioAlumnos.php";

        $cliente = new nusoap_client($servicio);
        $result = $cliente->call('altaAlumno',$parametros);
        
        header("Location: indexAlumnos.php");
    }
?>