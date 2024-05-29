<?php 

class Mascota{

	protected $idMascota;
	protected $Nom_mascota;
	protected $Raza_mascota;
	protected $Edad_mascota;
	protected $Rh_mascota;
	protected $Dueño_idDueño;

	protected function GuardarMascota(){
		include_once 'Database.php';
		$ic = new Connection();

		$sql = "INSERT INTO mascotas (Nom_mascota, Raza_mascota, Edad_mascota, Rh_mascota, Dueño_idDueño) VALUES (?,?,?,?,?)";
		$insertar = $ic->db->prepare($sql);
		$insertar->bindParam(1,$this->Nom_mascota);
		$insertar->bindParam(2,$this->Raza_mascota);
		$insertar->bindParam(3,$this->Edad_mascota);
		$insertar->bindParam(4,$this->Rh_mascota);
		$insertar->bindParam(5,$_SESSION['idUsuario']);
		$insertar->execute();
		
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


}



 ?>