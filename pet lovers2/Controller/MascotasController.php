<?php 
session_start();


include_once '../Model/Mascota.php';

class MascotasController extends Mascota{

    private $model;

    public function __CONSTRUCT(){
        
        $this->model = new Mascota();    
    }


    public function MostrarLogin(){
        include_once '../Views/login.php';
    }

    public function MostrarRegistrese(){
        include_once '../Views/register.html';
    }

    public function MostrarMascotas(){
        include_once '../Views/header-dashboard.php';
        include_once '../Views/control-mascotas.php';
        include_once '../Views/footer-dashboard.php';
    }

    public function CerrarSesion(){
        session_destroy();
        $this->RedirectLogin();
    }

    public function AlistarDatos($Nombre, $Raza, $Edad, $Rh)
    {
      
      $this->Nom_mascota = $Nombre;
      $this->Raza_mascota = $Raza;
      $this->Edad_mascota = $Edad;
      $this->Rh_mascota = $Rh;
      $this->GuardarMascota();
      $this->RedirectMascotas();

    }

    public function RedirectMascotas()
    {
        header("location: MascotasController.php?accion=Mascotas");
    }

    public function Redirect()
    {
        header("location:../");
    }

}

if(isset($_GET['accion']) && $_GET['accion']=='login'){
    $ic = new MascotasController();
    $ic->MostrarLogin();
}

if(isset($_GET['accion']) && $_GET['accion']=='cerrarsesion'){
    $ic = new MascotasController();
    $ic->CerrarSesion();
}

if(isset($_GET['accion']) && $_GET['accion']=='Mascotas'){
    $ic = new MascotasController();
    $ic->MostrarMascotas();
}

if(isset($_GET['accion']) && $_GET['accion']=='register'){
    $ic = new MascotasController();
    $ic->MostrarRegistrese();
}

if(isset($_POST['accion']) && $_POST['accion']=='insertar'){
    $ic = new MascotasController();
    $ic->AlistarDatos($_POST['Nombre'], $_POST['Raza'], $_POST['Edad'], $_POST['Rh']);
}


 ?>