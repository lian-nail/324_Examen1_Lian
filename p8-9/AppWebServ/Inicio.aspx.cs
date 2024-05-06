using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Inicio : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    //Crear persona
    protected void btnCrearPersona_Click(object sender, EventArgs e)
    {
        try
        {
            SRPersona.PersonaSoapClient inspe = new SRPersona.PersonaSoapClient();
            string respuesta = inspe.InsertPersona(txtNombre.Text, txtApPaterno.Text, txtApMaterno.Text, txtCi.Text);
            if (respuesta.Contains("exito"))
            {
                string script = @"Mensaje('Registro exitoso','','success');";
                ScriptManager.RegisterStartupScript(this, this.GetType(), "script", script, true);
            }
            else
            {
                string script = @"Mensaje('Problemas al realizar el registro','','warning');";
                ScriptManager.RegisterStartupScript(this, this.GetType(), "script", script, true);
            }
            txtNombre.Text = "";
            txtApPaterno.Text = "";
            txtApMaterno.Text = "";
            txtCi.Text = "";
            updPersonas.Update();
            dropListaPersona.DataBind();
            dropListaCi.DataBind();
        }
        catch (Exception ex)
        {
            string script = @"Mensaje('Ups ocurrio un error','" + ex.Message + "','error');";
            ScriptManager.RegisterStartupScript(this, this.GetType(), "script", script, true);
        }
        
    }
    //Editar persona
    protected void btnEditarPersona_Click(object sender, EventArgs e)
    {
        try
        {
            SRPersona.PersonaSoapClient inspe = new SRPersona.PersonaSoapClient();
            string respuesta = inspe.UpdatePersona(txtEdNombre.Text,txtEdPaterno.Text,txtEdMaterno.Text,txtEdCi.Text,dropListaCi.SelectedValue.ToString());
            if (respuesta.Contains("exito"))
            {
                string script = @"Mensaje('Se edito la persona con exito','','success');";
                ScriptManager.RegisterStartupScript(this, this.GetType(), "script", script, true);
            }
            else
            {
                string script = @"Mensaje('Problemas al realizar la editar de la persona','','warning');";
                ScriptManager.RegisterStartupScript(this, this.GetType(), "script", script, true);
            }
            txtEdNombre.Text = "";
            txtEdPaterno.Text = "";
            txtEdMaterno.Text = "";
            txtEdCi.Text = "";
            updPersonas.Update();
            dropListaPersona.DataBind();
            dropListaCi.DataBind();
        }
        catch (Exception ex)
        {
            string script = @"Mensaje('Ups ocurrio un error','" + ex.Message + "','error');";
            ScriptManager.RegisterStartupScript(this, this.GetType(), "script", script, true);
        }
    }
    //Eliminar persona
    protected void btnEliminarPersona_Click(object sender, EventArgs e)
    {
        try
        {
            SRPersona.PersonaSoapClient inspe = new SRPersona.PersonaSoapClient();
            string respuesta = inspe.DeletePersona(dropListaPersona.SelectedValue.ToString());
            if (respuesta.Contains("exito"))
            {
                string script = @"Mensaje('Se elimino la persona con exito','','success');";
                ScriptManager.RegisterStartupScript(this, this.GetType(), "script", script, true);
            }
            else
            {
                string script = @"Mensaje('Problemas al realizar la eliminacion de la persona','','warning');";
                ScriptManager.RegisterStartupScript(this, this.GetType(), "script", script, true);
            }
            txtNombre.Text = "";
            txtApPaterno.Text = "";
            txtApMaterno.Text = "";
            txtCi.Text = "";
            updPersonas.Update();
            dropListaPersona.DataBind();
            dropListaCi.DataBind();
        }
        catch (Exception ex)
        {
            string script = @"Mensaje('Ups ocurrio un error','" + ex.Message + "','error');";
            ScriptManager.RegisterStartupScript(this, this.GetType(), "script", script, true);
        }
    }
}