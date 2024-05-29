<?php 
session_start();

include_once '../Model/Usuario.php';
include_once '../Model/Cita.php';
include_once '../Model/Mascota.php';
include_once '../Model/Producto.php';
include_once '../Model/Pedido.php';

class UsuariosController extends Usuario{

    private $model;

    public function __CONSTRUCT(){
        
        $this->model = new Usuario();    
    }


    public function MostrarHome(){
        if (empty($_SESSION['Nom_usuario']))
        {
            include_once '../Views/login.php';
        }
        else
        {
            include_once '../Views/header-dashboard.php';
            if ($_SESSION['Rol_idRol'] == 2){
                include_once '../Views/dashboard.php';
            }elseif ($_SESSION['Rol_idRol'] == 3) {
                include_once '../Views/dashboard-veterinario.php';
            }elseif ($_SESSION['Rol_idRol'] == 1) {
                include_once '../Views/dashboard-usuario.php';
            }
            include_once '../Views/footer-dashboard.php';
        }
    }

     public function MostrarInicio(){     
        include_once '../Views/pagina-inicio.php';  
    }

    public function MostrarUsuarios(){
        include_once '../Views/header-dashboard.php';
        include_once '../Views/control-usuario.php';
        include_once '../Views/footer-dashboard.php';
    }

    public function MostrarCatalogo(){
        include_once '../Views/muestra-catalogo.php';
        include_once '../Views/footer-dashboard.php';
    }

    public function MostrarRegistrese(){
        include_once '../Views/register.html';
    }

    public function CerrarSesion(){
        session_destroy();
        $this->RedirectHome();
    }

    public function AlistarDatos($Nombre, $Apellido, $Email, $Contraseña, $Telefono, $Rol)
    {
      
      $this->Nom_usuario = $Nombre;
      $this->Ape_usuario = $Apellido;
      $this->Email_usuario = $Email;
      $this->Contraseña = $Contraseña;
      $this->Tel_usuario = $Telefono;
      $this->Rol_idRol = $Rol;
      $this->GuardarUsuario();
      $this->RedirectHome();

    }

    public function AlistarDatosEliminar($id)
    {
      
      $this->idUsuario = $id;
      $this->EliminarUsuarios();
      $this->RedirectUsuarios();

    }

    public function RedirectHome()
    {
        header("location: UsuariosController.php?accion=home");
    }

    public function RedirectUsuarios()
    {
        header("location: UsuariosController.php?accion=usuarios");
    }

    public function VerificarLogin($Email, $Contraseña)
    {
    
      $this->Email_usuario = $Email;
      $this->Contraseña = $Contraseña;
      $usuario = $this->ConsultarUsuario();

          if(empty($usuario))
          {
            $_SESSION['error'] = "No se encontro ese usuario en la BD";
            $this->RedirectHome();
          }
          else
          {
                if(md5($this->Contraseña) == $usuario->Contraseña)
                {
                    $_SESSION['idUsuario'] = $usuario->idUsuario;
                    $_SESSION['Nom_usuario'] = $usuario->Nom_usuario;
                    $_SESSION['Ape_usuario'] = $usuario->Ape_usuario;
                    $_SESSION['Email_usuario'] = $usuario->Email_usuario;
                    $_SESSION['Contraseña'] = $usuario->Contraseña;
                    $_SESSION['Tel_usuario'] = $usuario->Tel_usuario;
                    $_SESSION['Rol_idRol'] = $usuario->Rol_idRol;
                    $this->RedirectHome();
                }
                else
                {
                    $_SESSION['error'] = "Contraseña Incorrecta";
                    $this->RedirectHome();
                }
          }

    }


}

if(isset($_GET['accion']) && $_GET['accion']=='home'){
    $ic = new UsuariosController();
    $ic->MostrarHome();
}

if(isset($_GET['accion']) && $_GET['accion']=='inicio'){
    $ic = new UsuariosController();
    $ic->MostrarInicio();
}

if(isset($_GET['accion']) && $_GET['accion']=='cerrarsesion'){
    $ic = new UsuariosController();
    $ic->CerrarSesion();
}

if(isset($_GET['accion']) && $_GET['accion']=='register'){
    $ic = new UsuariosController();
    $ic->MostrarRegistrese();
}

if(isset($_GET['accion']) && $_GET['accion']=='usuarios'){
    $ic = new UsuariosController();
    $ic->MostrarUsuarios();
}

if(isset($_POST['accion']) && $_POST['accion']=='insertar'){
    $ic = new UsuariosController();
    $ic->AlistarDatos($_POST['Nombre'], $_POST['Apellido'], $_POST['Email'], $_POST['Contraseña'], $_POST['Telefono'], $_POST['Rol']);
}

if(isset($_POST['accion']) && $_POST['accion']=='eliminar'){
    $ic = new UsuariosController();
    $ic->AlistarDatosEliminar($_POST['id']);
}

if(isset($_GET['accion']) && $_GET['accion']=='catalogo'){
    $ic = new UsuariosController();
    $ic->MostrarCatalogo();
}

if(isset($_POST['accion']) && $_POST['accion']=='home'){
    $ic = new UsuariosController();
    $ic->VerificarLogin($_POST['Email'], $_POST['Contraseña']);
}

 ?>