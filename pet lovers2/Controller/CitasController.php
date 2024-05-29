<?php 
session_start();


include_once '../Model/Cita.php';

class CitasController extends Cita{

    private $model;

    public function __CONSTRUCT(){
        
        $this->model = new Cita();    
    }


    public function MostrarLogin(){
        include_once '../Views/login.php';
    }

    public function MostrarRegistrese(){
        include_once '../Views/register.html';
    }

    public function MostrarCitas(){
        include_once '../Views/header-dashboard.php';
        include_once '../Views/control-citas.php';
        include_once '../Views/footer-dashboard.php';
    }

    public function CerrarSesion(){
        session_destroy();
        $this->RedirectLogin();
    }

    public function AlistarDatos($Fecha, $Tipo, $Mascota)
    {
      
      $this->Fecha_cita = $Fecha;
      $this->Tipo_cita = $Tipo;
      $this->Mascota_cita = $Mascota;

      $this->GuardarCita();
      $this->RedirectCitas();

    }

    public function AlistarDatosEditar($id, $Estado, $Descripcion)
    {
      
      $this->idCita = $id;
      $this->Estado_cita = $Estado;
      $this->Desc_cita = $Descripcion;

      $this->EditarCita();
      $this->RedirectCitas();

    }

    public function RedirectCitas()
    {
        header("location: CitasController.php?accion=citas");
    }

    public function Redirect()
    {
        header("location:../");
    }


}

if(isset($_GET['accion']) && $_GET['accion']=='login'){
    $ic = new CitasController();
    $ic->MostrarLogin();
}

if(isset($_GET['accion']) && $_GET['accion']=='cerrarsesion'){
    $ic = new CitasController();
    $ic->CerrarSesion();
}

if(isset($_GET['accion']) && $_GET['accion']=='citas'){
    $ic = new CitasController();
    $ic->MostrarCitas();
}

if(isset($_GET['accion']) && $_GET['accion']=='register'){
    $ic = new CitasController();
    $ic->MostrarRegistrese();
}

if(isset($_POST['accion']) && $_POST['accion']=='insertar'){
    $ic = new CitasController();
    $ic->AlistarDatos($_POST['Fecha'], $_POST['Tipo'], $_POST['Mascota']);
}

if(isset($_POST['accion']) && $_POST['accion']=='editar'){
    $ic = new CitasController();
    $ic->AlistarDatosEditar($_POST['id'], $_POST['Estado'], $_POST['Descripcion']);
}

if(isset($_POST['accion']) && $_POST['accion']=='login'){
    $ic = new CitasController();
    $ic->VerificarLogin($_POST['Email'], $_POST['Contraseña']);
}

 ?>