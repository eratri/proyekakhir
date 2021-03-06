<?php
require("../../include/konek.php");
 class member extends connection{
	public function viewMember(){
			try
			{
				$sql = "SELECT * FROM memberbs where status=0";
				$stmt = $this->conn->prepare($sql) or die("Gagal!");
				$stmt->execute();
				$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $data;
			}catch(PDOException $e)
			{
				return $e->getMessage();
			}
		}
		public function viewMemberbyId($id_member){
			
				$sql="SELECT * from memberbs where id_member=?";
				$stmt=$this->conn->prepare($sql);
				$stmt->bindParam(1,$id_member);
				$stmt->execute();
				 $data = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $data;
		}
	public function addMember($nama,$user,$pass,$telp,$mail,$alamat,$foto){
		try{
			$sql ="INSERT INTO memberbs VALUES(:idmember, :nm, :us, :ps, :al, :no, :ml, :ft,0)";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute(array(':idmember'=>NULL,
							  	  ':nm'=>$nama,
							  	  ':us'=>$user,
							  	  ':ps'=>$pass,
							  	  ':al'=>$alamat,
							  	  ':no'=>$telp,
							  	  ':ml'=>$mail,
							  	  ':ft'=>$foto,));
				return true;
		}catch(PDOException $e)
		{
			return $e->getMessage();
			return false;
		}

	}
	
}

?>