<?php

class Producto{


    protected $idProducto;
    protected $Img_producto;
    protected $Nom_producto;
    protected $Desc_producto;
    protected $Valor_producto;
    protected $Estado_producto;
    protected $Cant_producto;

  

    protected function GuardarProductos(){
        include_once 'Database.php';
        $ic = new Connection();

        $sql = "INSERT INTO productos (Img_producto, Nom_producto, Desc_producto, Valor_producto, Estado_producto, Cant_producto) VALUES (?,?,?,?,?,?)";
        $insertar = $ic->db->prepare($sql);
        $insertar->bindParam(1,$this->Img_producto);
        $insertar->bindParam(2,$this->Nom_producto);
        $insertar->bindParam(3,$this->Desc_producto);
        $insertar->bindParam(4,$this->Valor_producto);
        $insertar->bindParam(5,$this->Estado_producto);
        $insertar->bindParam(6,$this->Cant_producto);
        $insertar->execute();
        
    }

    protected function Cantidad(){
        try{
            include_once 'Database.php';
			$ic = new Connection();
            $sql = "SELECT SUM(cant) as Cantidad FROM productos";
            $consulta = $ic->db->prepare($sql);
            $consulta->execute();
            $objetoproduct = $consulta->fetch(PDO::FETCH_OBJ);
		    return $producto;


        }catch(exception $e){
            die($e->getMessage());


        }
    }

    protected function ConsultarProductos(){
        try{
            include_once 'Database.php';
			$ic = new Connection();
            $sql = "SELECT * FROM productos";
            $consulta = $ic->db->prepare($sql);
            $consulta->execute();
            $objetoproduct = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objetoproduct;


        }catch(exception $e){
            die($e->getMessage());


        }
    }


      
        
        
}