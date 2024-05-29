<?php 
session_start();


include_once '../Model/Pedido.php';

class PedidosController extends Pedido{

    private $model;

    public function __CONSTRUCT(){
        
        $this->model = new Pedido();    
    }


    public function MostrarLogin(){
        include_once '../Views/login.php';
    }

    public function MostrarRegistrese(){
        include_once '../Views/register.html';
    }

    public function MostrarPedidos(){
        include_once '../Views/header-dashboard.php';
        include_once '../Views/control-pedido.php';
        include_once '../Views/footer-dashboard.php';
    }

    public function CerrarSesion(){
        session_destroy();
        $this->RedirectLogin();
    }

    public function AlistarDatos($detalles, $valor_total, $direccion)
    {

      
      $this->detalles = $detalles;
      $this->valor_total = $valor_total;
      $this->direccion = $direccion;
      $this->Id_usuario = $_SESSION['idUsuario'];


      $this->GuardarPedido();
      $this->RedirectPedidos();

    }


    public function AlistarDatosEditar($id, $Estado)
    {
      
      $this->idPedido = $id;
      $this->Estado_pedido = $Estado;

      $this->EditarPedido();
      $this->RedirectPedidos();

    }

    public function RedirectPedidos()
    {
        header("location: PedidosController.php?accion=pedidos");
    }


    public function Redirect()
    {
        header("location:../");
    }

}

if(isset($_GET['accion']) && $_GET['accion']=='login'){
    $ic = new PedidosController();
    $ic->MostrarLogin();
}

if(isset($_GET['accion']) && $_GET['accion']=='cerrarsesion'){
    $ic = new PedidosController();
    $ic->CerrarSesion();
}

if(isset($_GET['accion']) && $_GET['accion']=='pedidos'){
    $ic = new PedidosController();
    $ic->MostrarPedidos();
}

if(isset($_GET['accion']) && $_GET['accion']=='register'){
    $ic = new PedidosController();
    $ic->MostrarRegistrese();
}

if(isset($_GET['accion']) && $_GET['accion']=='catalogo'){
    $ic = new PedidosController();
    $ic->MostrarCatalogo();
}

if(isset($_POST['accion']) && $_POST['accion']=='editar'){
    $ic = new PedidosController();
    $ic->AlistarDatosEditar($_POST['id'], $_POST['Estado']);
}

if(isset($_POST['accion']) && $_POST['accion']=='insertar'){
    $ic = new PedidosController();
    $ic->AlistarDatos( $_POST['detalles'], $_POST['valor_total'], $_POST['direccion']);
}


 ?>