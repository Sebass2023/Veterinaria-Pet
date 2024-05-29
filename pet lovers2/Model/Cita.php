<?php 

class Cita{

	protected $idCita;
	protected $Fecha_cita;
	protected $Tipo_cita;
	protected $Veterinario_idUsuario;
	protected $Dueño_cita;

	protected function Guardarcita(){
		include_once 'Database.php';
		$ic = new Connection();

		$sql = "INSERT INTO citas (Fecha_cita,Tipo_cita,Mascota_cita,Estado_cita) VALUES (?,?,?,?)";
		$insertar = $ic->db->prepare($sql);
		$estado = "1";
		$insertar->bindParam(1,$this->Fecha_cita);
		$insertar->bindParam(2,$this->Tipo_cita);
		$insertar->bindParam(3,$this->Mascota_cita);
		$insertar->bindParam(4,$estado);
		$insertar->execute();
		
	}


	protected function ConsultarCitas(){
		try{

			include_once 'Database.php';
			$ic = new Connection();
			$sql = "SELECT idCita, Fecha_cita, Tipo_cita, Desc_cita, Estado_cita, Nom_mascota as Mascota_cita from citas join mascotas on Mascota_cita=idMascota";
			$consulta = $ic->db->prepare($sql);
			$consulta->execute();
			$objetocita = $consulta->fetchAll(PDO::FETCH_OBJ);
			return $objetocita;
		
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}

	protected function SelectMascota(){
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

	protected function EditarCita(){
		include_once 'Database.php';
		$ic = new Connection();

		$sql = "UPDATE citas SET Estado_cita = ?, Desc_cita = ? WHERE idCita = ?";
		$editar = $ic->db->prepare($sql);
		$estado = "1";
		$editar->bindParam(1,$this->Estado_cita);
		$editar->bindParam(2,$this->Desc_cita);
		$editar->bindParam(3,$this->idCita);
		$editar->execute();
		
	}


}



 ?>