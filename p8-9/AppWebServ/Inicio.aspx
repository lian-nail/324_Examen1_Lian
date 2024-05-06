<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Inicio.aspx.cs" Inherits="Inicio" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="/assets/plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css" />
    <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" />
    <script src="/assets/plugins/sweetalert2/sweetalert2.js"></script>
</head>
<body>
    <script>
        //Swit alert mensaje
        function Mensaje(titulo, detalle, icono) {
            Swal.fire(
                titulo,
                detalle,
                icono
            )
        }
    </script>
    <form id="form1" runat="server">
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
        <asp:UpdatePanel ID="updPersonas" runat="server" UpdateMode="Conditional">
            <ContentTemplate>
                <!-- Contenido -->
                <div class="content">
                    <!-- Cabecera -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Pagina Persona</h1>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Contenido -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Crear persona -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Crear persona</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nombre:</label>
                                                <asp:TextBox ID="txtNombre" runat="server" CssClass="form-control"></asp:TextBox>
                                                <asp:RequiredFieldValidator runat="server"
                                                    ControlToValidate="txtNombre"
                                                    Font-Size="Small" Display="Dynamic"
                                                    ErrorMessage="* Dato Obligatorio" ForeColor="Red"
                                                    ValidationGroup="registro">
                                                </asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label>Ap. Paterno:</label>
                                                <asp:TextBox ID="txtApPaterno" runat="server" CssClass="form-control"></asp:TextBox>
                                                <asp:RequiredFieldValidator runat="server"
                                                    ControlToValidate="txtApPaterno"
                                                    Font-Size="Small" Display="Dynamic"
                                                    ErrorMessage="* Dato Obligatorio" ForeColor="Red"
                                                    ValidationGroup="registro">
                                                </asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label>Ap. Materno:</label>
                                                <asp:TextBox ID="txtApMaterno" runat="server" CssClass="form-control"></asp:TextBox>
                                                <asp:RequiredFieldValidator runat="server"
                                                    ControlToValidate="txtApMaterno"
                                                    Font-Size="Small" Display="Dynamic"
                                                    ErrorMessage="* Dato Obligatorio" ForeColor="Red"
                                                    ValidationGroup="registro">
                                                </asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label>CI:</label>
                                                <asp:TextBox ID="txtCi" runat="server" CssClass="form-control"></asp:TextBox>
                                                <asp:RequiredFieldValidator runat="server"
                                                    ControlToValidate="txtCi"
                                                    Font-Size="Small" Display="Dynamic"
                                                    ErrorMessage="* Dato Obligatorio" ForeColor="Red"
                                                    ValidationGroup="registro">
                                                </asp:RequiredFieldValidator>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <asp:Button ID="btnCrearPersona" runat="server" CssClass="btn btn-primary w-50" Text="Crear"
                                                OnClick="btnCrearPersona_Click"
                                                ValidationGroup="registro"></asp:Button>
                                        </div>
                                    </div>

                                    <!-- Eliminar persona -->
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Eliminar persona</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Seleccione la persona a eliminar:</label>
                                                <asp:DropDownList ID="dropListaPersona" runat="server"
                                                    CssClass="form-control" DataSourceID="sqlListaPersona2"
                                                    DataTextField="NombreCompleto" DataValueField="id_persona">
                                                </asp:DropDownList>
                                                <asp:SqlDataSource runat="server" ID="sqlListaPersona2" ConnectionString='<%$ ConnectionStrings:Usuario_db %>' SelectCommand="SELECT nombre + ' ' + ap_paterno + ' ' + ap_materno AS NombreCompleto, id_persona FROM dat_persona"></asp:SqlDataSource>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <asp:Button ID="btnEliminarPersona" runat="server" CssClass="btn btn-danger w-50"
                                                Text="Eliminar" OnClick="btnEliminarPersona_Click"></asp:Button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Editar persona -->
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Editar persona</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Seleccione la persona para editar:</label>
                                                <asp:DropDownList ID="dropListaCi" runat="server"
                                                    CssClass="form-control" DataSourceID="SqlListaPersona"
                                                    DataTextField="NombreCompleto" DataValueField="id_persona">
                                                </asp:DropDownList>
                                                <asp:SqlDataSource runat="server" ID="SqlListaPersona" ConnectionString='<%$ ConnectionStrings:Usuario_db %>' SelectCommand="SELECT nombre + ' ' + ap_paterno + ' ' + ap_materno AS NombreCompleto, id_persona FROM dat_persona"></asp:SqlDataSource>
                                            </div>

                                            <div class="form-group">
                                                <label>Editar Nombre:</label>
                                                <asp:TextBox ID="txtEdNombre" runat="server" CssClass="form-control"></asp:TextBox>
                                                <asp:RequiredFieldValidator runat="server"
                                                    ControlToValidate="txtEdNombre"
                                                    Font-Size="Small" Display="Dynamic"
                                                    ErrorMessage="* Dato Obligatorio" ForeColor="Red"
                                                    ValidationGroup="registro2">
                                                </asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label>Editar Ap. Paterno:</label>
                                                <asp:TextBox ID="txtEdPaterno" runat="server" CssClass="form-control"></asp:TextBox>
                                                <asp:RequiredFieldValidator runat="server"
                                                    ControlToValidate="txtEdPaterno"
                                                    Font-Size="Small" Display="Dynamic"
                                                    ErrorMessage="* Dato Obligatorio" ForeColor="Red"
                                                    ValidationGroup="registro2">
                                                </asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label>Editar Ap. Materno:</label>
                                                <asp:TextBox ID="txtEdMaterno" runat="server" CssClass="form-control"></asp:TextBox>
                                                <asp:RequiredFieldValidator runat="server"
                                                    ControlToValidate="txtEdMaterno"
                                                    Font-Size="Small" Display="Dynamic"
                                                    ErrorMessage="* Dato Obligatorio" ForeColor="Red"
                                                    ValidationGroup="registro2">
                                                </asp:RequiredFieldValidator>
                                            </div>
                                            <div class="form-group">
                                                <label>CI:</label>
                                                <asp:TextBox ID="txtEdCi" runat="server" CssClass="form-control"></asp:TextBox>
                                                <asp:RequiredFieldValidator runat="server"
                                                    ControlToValidate="txtEdCi"
                                                    Font-Size="Small" Display="Dynamic"
                                                    ErrorMessage="* Dato Obligatorio" ForeColor="Red"
                                                    ValidationGroup="registro2">
                                                </asp:RequiredFieldValidator>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <asp:Button ID="btnEditarPersona" runat="server"
                                                CssClass="btn btn-success w-50" Text="Editar"
                                                OnClick="btnEditarPersona_Click"
                                                ValidationGroup="registro2"></asp:Button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </ContentTemplate>
        </asp:UpdatePanel>
    </form>
</body>
</html>
