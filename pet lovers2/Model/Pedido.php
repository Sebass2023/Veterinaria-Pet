<?php

class Pedido{


    protected $Id_pedidos;
    protected $Id_usuario;
    protected $detalles;
    protected $valor_total;
    

  

    protected function GuardarPedido(){
        include_once 'Database.php';
        $ic = new Connection();
        $estado = 1;

        $sql = "INSERT INTO pedidos (detalles, valor_total, Id_usuario, estado, direccion) VALUES (?,?,?,?,?)";
        $insertar = $ic->db->prepare($sql);
        $insertar->bindParam(1,$this->detalles);
        $insertar->bindParam(2,$this->valor_total);
        $insertar->bindParam(3,$this->Id_usuario);
        $insertar->bindParam(4,$estado);
        $insertar->bindParam(5,$this->direccion);
        $insertar->execute();
        
    }

    protected function ConsultarPedidos(){
        try{
            include_once 'Database.php';
			$ic = new Connection();
            $session = $_SESSION['idUsuario'];
            $sql = "SELECT * FROM pedidos WHERE Id_usuario = $session";
            $consulta = $ic->db->prepare($sql);
            $consulta->execute();
            $objetopedido = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objetopedido;


        }catch(exception $e){
            die($e->getMessage());


        }
    }

    protected function ConsultarPedidosAdmin(){
        try{

            include_once 'Database.php';
            $ic = new Connection();
            $sql = "SELECT Id_pedidos, detalles, valor_total, estado, direccion, Nom_usuario as Id_usuario from pedidos join usuario on Id_usuario=idUsuario";
            $consulta = $ic->db->prepare($sql);
            $consulta->execute();
            $objetopedido2 = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objetopedido2;
        
        } catch (Exception $e){
            die($e->getMessage());
        }
        
    }

    protected function EditarPedido(){
        include_once 'Database.php';
        $ic = new Connection();

        $sql = "UPDATE pedidos SET estado = ? WHERE Id_pedidos = ?";
        $editar = $ic->db->prepare($sql);
        $editar->bindParam(1,$this->Estado_pedido);
        $editar->bindParam(2,$this->idPedido);
        $editar->execute();
        
    }



      
        
        
}