<?php 
session_start();


include_once '../Model/Producto.php';

class ProductosController extends Producto{

    private $model;

    public function __CONSTRUCT(){
        
        $this->model = new Producto();    
    }


    public function MostrarLogin(){
        include_once '../Views/login.php';
    }

    public function MostrarRegistrese(){
        include_once '../Views/register.html';
    }

    public function MostrarProductos(){
        include_once '../Views/header-dashboard.php';
        include_once '../Views/control-productos.php';
        include_once '../Views/footer-dashboard.php';
    }

    public function MostrarCatalogo(){
        include_once '../Views/header-dashboard.php';
        include_once '../Views/catalogo.php';
        include_once '../Views/footer-dashboard.php';
    }

    public function MostrarPago(){
        include_once '../Views/header-dashboard.php';
        include_once '../Views/pago-catalogo.php';
        include_once '../Views/footer-dashboard.php';
    }

    public function CerrarSesion(){
        session_destroy();
        $this->RedirectLogin();
    }

    public function AlistarDatos($imagen, $imageName, $nombre, $descripcion, $precio, $estado, $cantidad)
    {

      
      $this->Img_producto = $imagen;
      $this->Nom_producto = $nombre;
      $this->Desc_producto = $descripcion;
      $this->Valor_producto = $precio;
      $this->Estado_producto = $estado;
      $this->Cant_producto = $cantidad;

      $this->GuardarProductos();
      move_uploaded_file($imageName, '../assets/img/catalogo/' . $imagen);
      $this->RedirectProductos();

    }

    public function Carrito($nombre, $valor, $imagen, $cantidad)
    {

      if (!isset($_SESSION['carrito'])) {
          $_SESSION['carrito'] = array("1"=> array("Producto"=>$nombre, "Valor"=>$valor, "Imagen"=>$imagen, "Cantidad"=>$cantidad));
          $_SESSION['Nombre_carrito'] = array($nombre);
      }else{
        array_push($_SESSION['carrito'], array("Producto"=>$nombre, "Valor"=>$valor, "Imagen"=>$imagen, "Cantidad"=>$cantidad));
        array_push($_SESSION['Nombre_carrito'], $nombre);
      }

      $_SESSION['carrito_contador'] = count($_SESSION['carrito']);

      $this->RedirectCatalogo();

    }

    public function RedirectProductos()
    {
        header("location: ProductosController.php?accion=Productos");
    }

    public function RedirectCatalogo()
    {
        header("location: ProductosController.php?accion=catalogo");
    }

}

if(isset($_GET['accion']) && $_GET['accion']=='login'){
    $ic = new ProductosController();
    $ic->MostrarLogin();
}

if(isset($_GET['accion']) && $_GET['accion']=='cerrarsesion'){
    $ic = new ProductosController();
    $ic->CerrarSesion();
}

if(isset($_GET['accion']) && $_GET['accion']=='Productos'){
    $ic = new ProductosController();
    $ic->MostrarProductos();
}

if(isset($_GET['accion']) && $_GET['accion']=='pago'){
    $ic = new ProductosController();
    $ic->MostrarPago();
}

if(isset($_GET['accion']) && $_GET['accion']=='register'){
    $ic = new ProductosController();
    $ic->MostrarRegistrese();
}

if(isset($_GET['accion']) && $_GET['accion']=='catalogo'){
    $ic = new ProductosController();
    $ic->MostrarCatalogo();
}

if(isset($_POST['accion']) && $_POST['accion']=='carrito'){
    $ic = new ProductosController();
    $ic->Carrito($_POST['nombre'], $_POST['valor'], $_POST['imagen'], $_POST['cantidad']);
}

if(isset($_POST['accion']) && $_POST['accion']=='insertar'){
    $imageName = $_FILES['imagen']['tmp_name'];
    $imagen = $_FILES['imagen']['name'];
    $ic = new ProductosController();
    $ic->AlistarDatos($imagen, $imageName, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['estado'], $_POST['cantidad']);
}


 ?>