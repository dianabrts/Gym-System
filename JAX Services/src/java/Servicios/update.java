/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servicios;

import com.mysql.jdbc.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author Diana Bernal
 */
@WebService(serviceName = "update")
public class update {

    /**
     * This is a sample web service operation
     */
    @WebMethod(operationName = "hello")
    public String hello(@WebParam(name = "name") String txt) {
        return "Hello " + txt + " !";
    }

    /**
     * Modifica los datos de un alumno de acuerdo a su ID
     */
    
    @WebMethod(operationName = "updateAlumno")
    public String updateAlumno(@WebParam(name = "id") int id, @WebParam(name = "nombre") String nombre, @WebParam(name = "appaterno") String appaterno, @WebParam(name = "apmaterno") String apmaterno, @WebParam(name = "edad") int edad, @WebParam(name = "domicilio") String domicilio, @WebParam(name = "telefono") String telefono, @WebParam(name = "celular") String celular, @WebParam(name = "fecha_inscripcion") String fecha_inscripcion) 
    {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql= "UPDATE alumnos SET nombre='"+nombre+"',appaterno='"+appaterno+"',apmaterno='"+apmaterno+"',edad='"+edad+"',domicilio='"+domicilio+"',telefono='"+telefono+"',celular='"+celular+"',fecha_inscripcion='"+fecha_inscripcion+"' WHERE id="+id;
            
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Alumno Eliminado Exitosamente";
        
        return mensaje;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "updateMaestro")
    public String updateMaestro(@WebParam(name = "id") int id, @WebParam(name = "nombre") String nombre, @WebParam(name = "appaterno") String appaterno, @WebParam(name = "apmaterno") String apmaterno, @WebParam(name = "telefono") String telefono, @WebParam(name = "celular") String celular, @WebParam(name = "clases_impartidas") int clases_impartidas, @WebParam(name = "rfc") String rfc) 
    {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql= "UPDATE maestros SET nombre='"+nombre+"',appaterno='"+appaterno+"',apmaterno='"+apmaterno+"',telefono='"+telefono+"',celular='"+celular+"',clases_impartidas="+clases_impartidas+",rfc='"+rfc+"' WHERE id="+id;
         
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Maestro Eliminado Exitosamente";
        
        return mensaje;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "updateProspecto")
    public String updateProspecto(@WebParam(name = "id") int id, @WebParam(name = "nombre") String nombre, @WebParam(name = "appaterno") String appaterno, @WebParam(name = "apmaterno") String apmaterno, @WebParam(name = "telefono") String telefono, @WebParam(name = "celular") String celular, @WebParam(name = "clases_interes") String clases_interes, @WebParam(name = "tutor") String tutor) 
    {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql= "UPDATE prospectos SET nombre='"+nombre+"',appaterno='"+appaterno+"',apmaterno='"+apmaterno+"',telefono='"+telefono+"',celular='"+celular+"',clases_interes='"+clases_interes+"',tutor='"+tutor+"' WHERE id="+id;
         
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Prospecto Eliminado Exitosamente";
        
        return mensaje;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "updateProducto")
    public String updateProducto(@WebParam(name = "id") int id, @WebParam(name = "nombre") String nombre, @WebParam(name = "cantidad") int cantidad, @WebParam(name = "sucursal") String sucursal, @WebParam(name = "precio") int precio) 
    {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql= "UPDATE productos SET nombre='"+nombre+"',cantidad="+cantidad+",sucursal='"+sucursal+"',precio="+precio+" WHERE id="+id;
         
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Producto Modificado Exitosamente";
        
        return mensaje;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "updateProveedor")
    public String updateProveedor(@WebParam(name = "id") int id, @WebParam(name = "nombre") String nombre, @WebParam(name = "domicilio") String domicilio, @WebParam(name = "telefono") String telefono, @WebParam(name = "celular") String celular, @WebParam(name = "productos") String productos, @WebParam(name = "precios") int precios) 
    {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql= "UPDATE proveedores SET nombre='"+nombre+"',domicilio='"+domicilio+"',telefono='"+telefono+"',celular='"+celular+"',productos='"+productos+"',precios="+precios+" WHERE id="+id;
         
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Proveedor Eliminado Exitosamente";
        
        return mensaje;
    }
}
