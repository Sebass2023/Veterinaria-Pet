<?php 

class Usuario{

	protected $id;
	protected $idUsuario;
	protected $Nom_usuario;
	protected $Ape_usuario;
	protected $Email_usuario;
	protected $Contraseña;
	protected $Tel_usuario;
	protected $Rol_idRol;

	protected function GuardarUsuario(){
		include_once 'Database.php';
		$ic = new Connection();

		$sql = "INSERT INTO usuario (Nom_usuario,Ape_usuario,Email_usuario,Contraseña,Tel_usuario,Rol_idRol) VALUES (?,?,?,?,?,?)";
		$newcontraseña = md5($this->Contraseña);
		$insertar = $ic->db->prepare($sql);
		$insertar->bindParam(1,$this->Nom_usuario);
		$insertar->bindParam(2,$this->Ape_usuario);
		$insertar->bindParam(3,$this->Email_usuario);
		$insertar->bindParam(4,$newcontraseña);
		$insertar->bindParam(5,$this->Tel_usuario);
		$insertar->bindParam(6,$this->Rol_idRol);
		$insertar->execute();
		
	}

	protected function ConsultarUsuario(){


		include_once 'Database.php';
		$ic = new Connection();
		$sql = "SELECT * FROM usuario WHERE Email_usuario = '$this->Email_usuario'";
		$consulta = $ic->db->prepare($sql);
		$consulta->execute();
		$objetousuario = $consulta->fetchAll(PDO::FETCH_OBJ);
		foreach ($objetousuario as $usuario) { }
		return $usuario;
	}

	protected function ConsultarUsuarios(){

		try{

			include_once 'Database.php';
			$ic = new Connection();
			$sql = "SELECT idUsuario, Nom_usuario, Ape_usuario, Email_usuario, Tel_usuario, Tipo_rol as Rol_idRol from usuario join rol on Rol_idRol=idRol";
			$consulta = $ic->db->prepare($sql);
			$consulta->execute();
			$objetousuario = $consulta->fetchAll(PDO::FETCH_OBJ);
			return $objetousuario;
		
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}

	protected function EliminarUsuarios(){

		try{

			include_once 'Database.php';
			$ic = new Connection();
			$sql = "DELETE FROM usuario WHERE idUsuario = '$this->idUsuario'";
			$consulta = $ic->db->prepare($sql);
			$consulta->execute();
			$objetousuario = $consulta->fetchAll(PDO::FETCH_OBJ);
			return $objetousuario;
		
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}

	protected function ConsultarCitas(){

		try{

			include_once 'Database.php';
			$ic = new Connection();
			$sql = "SELECT Fecha_cita, Tipo_cita, Desc_cita, Estado_cita, Nom_mascota as Mascota_cita from citas join mascotas on Mascota_cita=idMascota";
			$consulta = $ic->db->prepare($sql);
			$consulta->execute();
			$objetocita = $consulta->fetchAll(PDO::FETCH_OBJ);
			return $objetocita;
		
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}

	protected function ConsultarCitasUsuario(){

		try{

			include_once 'Database.php';
			$ic = new Connection();
			$session = $_SESSION['idUsuario'];
			$sql = "SELECT Fecha_cita, Tipo_cita, Desc_cita, Estado_cita, Nom_mascota as Mascota_cita from citas join mascotas on Mascota_cita=idMascota WHERE Dueño_idDueño = $session";
			$consulta = $ic->db->prepare($sql);
			$consulta->execute();
			$objetocita = $consulta->fetchAll(PDO::FETCH_OBJ);
			return $objetocita;
		
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}

	protected function ConsultarMascota(){
		try{

			include_once 'Database.php';
			$ic = new Connection();
			$session = $_SESSION['idUsuario'];
			$sql = "SELECT * FROM mascotas WHERE Dueño_idDueño = $session";
			$consulta = $ic->db->prepare($sql);
			$consulta->execute();
			$objetomascota = $consulta->fetchAll(PDO::FETCH_OBJ);
			return $objetomascota;
		
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}


	protected function ConsultarProductos(){
        try{
            include_once 'Database.php';
			$ic = new Connection();
            $sql = "SELECT * FROM productos limit 3";
            $consulta = $ic->db->prepare($sql);
            $consulta->execute();
            $objetoproduct = $consulta->fetchAll(PDO::FETCH_OBJ);
			return $objetoproduct;


        }catch(exception $e){
            die($e->getMessage());


        }
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
            $sql = "SELECT * FROM pedidos";
            $consulta = $ic->db->prepare($sql);
            $consulta->execute();
            $objetopedido = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objetopedido;


        }catch(exception $e){
            die($e->getMessage());


        }
    }


}



 ?>