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
@WebService(serviceName = "delete")
public class delete {

    /**
     * This is a sample web service operation
     */
    @WebMethod(operationName = "hello")
    public String hello(@WebParam(name = "name") String txt) {
        return "Hello " + txt + " !";
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "deleteAlumno")
    public String deleteAlumno(@WebParam(name = "id") int id) 
    {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql = "DELETE FROM alumnos where id="+id;
            
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Alumno Eliminado Exitosamente";
        
        return mensaje;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "deleteMaestro")
    public String deleteMaestro(@WebParam(name = "id") int id) 
    {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql = "DELETE FROM maestros where id="+id;
            
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Maestro Eliminado Exitosamente";
        
        return mensaje;        
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "deleteProspecto")
    public String deleteProspecto(@WebParam(name = "id") int id) 
    {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql = "DELETE FROM prospectos where id="+id;
            
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Prospecto Eliminado Exitosamente";
        
        return mensaje;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "deleteProducto")
    public String deleteProducto(@WebParam(name = "id") int id) 
    {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql = "DELETE FROM productos where id="+id;
            
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Producto Eliminado Exitosamente";
        
        return mensaje;
    }

    /**
     * Web service operation
     */
    @WebMethod(operationName = "deleteProveedor")
    public String deleteProveedor(@WebParam(name = "id") int id) {
        Connection conn;    
        String sql, mensaje;
        
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/championFactory","root","");
            Statement stmnt = conn.createStatement();
            
            sql = "DELETE FROM proveedores where id="+id;
            
            stmnt.executeUpdate(sql);            
        }
        catch(SQLException | ClassNotFoundException e){}
        
        mensaje = "Proveedor Eliminado Exitosamente";
        
        return mensaje;
    }

}
