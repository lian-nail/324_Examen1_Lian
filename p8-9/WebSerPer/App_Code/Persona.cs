using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Services;

/// <summary>
/// Descripción breve de Persona
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
// Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
// [System.Web.Script.Services.ScriptService]
public class Persona : System.Web.Services.WebService
{

    public Persona()
    {

        //Elimine la marca de comentario de la línea siguiente si utiliza los componentes diseñados 
        //InitializeComponent(); 
    }

    [WebMethod]
    public string InsertPersona(string nombre,string paterno, string materno,string ci)
    {
        string Mensaje = "";
        try
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = ConfigurationManager.ConnectionStrings["Usuario_db"].ConnectionString;
            SqlCommand cmd = new SqlCommand();

            cmd.CommandText = @"INSERT INTO dat_persona
           ([nombre]
           ,[ap_paterno]
           ,[ap_materno]
           ,[ci]
           ,[fecha_registro])
     VALUES
           (@nombre
           ,@ap_paterno
           ,@ap_materno
           ,@ci
           ,GETDATE())";

            cmd.CommandType = CommandType.Text;
            cmd.Connection = con;

            SqlParameter Nombre = new SqlParameter("@nombre", SqlDbType.VarChar);
            Nombre.Value = nombre;
            cmd.Parameters.Add(Nombre);

            SqlParameter ApPaterno = new SqlParameter("@ap_paterno", SqlDbType.VarChar);
            ApPaterno.Value = paterno;
            cmd.Parameters.Add(ApPaterno);

            SqlParameter ApMaterno = new SqlParameter("@ap_materno", SqlDbType.VarChar);
            ApMaterno.Value = materno;
            cmd.Parameters.Add(ApMaterno);

            SqlParameter Ci = new SqlParameter("@ci", SqlDbType.NVarChar);
            Ci.Value = ci;
            cmd.Parameters.Add(Ci);

            con.Open();
            int result = cmd.ExecuteNonQuery();
            con.Close();
            if (result > 0)
                Mensaje = "Se agrego la persona con exito.";
            else
                Mensaje = "No se pudo agregar a la persona.";
            return Mensaje;
        }
        catch (Exception ex)
        {
            return "Error al agregar a la persona - " + ex.Message;
        }
    }
    [WebMethod]
    public string DeletePersona(string id)
    {
        string Mensaje = "";
        try
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = ConfigurationManager.ConnectionStrings["Usuario_db"].ConnectionString;
            SqlCommand cmd = new SqlCommand();

            cmd.CommandText = @"DELETE FROM dat_persona
                                WHERE id_persona = @Id";

            cmd.CommandType = CommandType.Text;
            cmd.Connection = con;

            SqlParameter Ci = new SqlParameter("@Id", SqlDbType.Int);
            Ci.Value = id;
            cmd.Parameters.Add(Ci);

            con.Open();
            int result = cmd.ExecuteNonQuery();
            con.Close();
            if (result > 0)
                Mensaje = "Se elimino a la persona con exito.";
            else
                Mensaje = "No se pudo eliminar a la persona.";
            return Mensaje;
        }
        catch (Exception ex)
        {
            return "Error al eliminar a la persona - " + ex.Message;
        }
    }
    [WebMethod]
    public string UpdatePersona(string nombre, string paterno, string materno, string ci,string id)
    {
        string Mensaje = "";
        try
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = ConfigurationManager.ConnectionStrings["Usuario_db"].ConnectionString;
            SqlCommand cmd = new SqlCommand();

            cmd.CommandText = @"UPDATE dat_persona
               SET [nombre] = @nombre
                  ,[ap_paterno] = @ap_paterno
                  ,[ap_materno] = @ap_materno
                  ,[ci] = @ci
                  ,[fecha_registro] = GETDATE()
             WHERE id_persona = @ID";

            cmd.CommandType = CommandType.Text;
            cmd.Connection = con;

            SqlParameter Nombre = new SqlParameter("@nombre", SqlDbType.VarChar);
            Nombre.Value = nombre;
            cmd.Parameters.Add(Nombre);

            SqlParameter ApPaterno = new SqlParameter("@ap_paterno", SqlDbType.VarChar);
            ApPaterno.Value = paterno;
            cmd.Parameters.Add(ApPaterno);

            SqlParameter ApMaterno = new SqlParameter("@ap_materno", SqlDbType.VarChar);
            ApMaterno.Value = materno;
            cmd.Parameters.Add(ApMaterno);

            SqlParameter Ci = new SqlParameter("@ci", SqlDbType.NVarChar);
            Ci.Value = ci;
            cmd.Parameters.Add(Ci);

            SqlParameter Id = new SqlParameter("@ID", SqlDbType.Int);
            Id.Value = id;
            cmd.Parameters.Add(Id);

            con.Open();
            int result = cmd.ExecuteNonQuery();
            con.Close();
            if (result > 0)
                Mensaje = "Se actualizó los datos de la persona con exito.";
            else
                Mensaje = "No se pudo actualizar los datos de la persona.";
            return Mensaje;
        }
        catch (Exception ex)
        {
            return "Error al actualizar los datos de la persona - " + ex.Message;
        }
    }

}
