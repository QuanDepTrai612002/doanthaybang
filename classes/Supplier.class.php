<?php
class Supplier extends Db{
	
	
	public function delete($sup_id)
	{
		try{
			
		$sql="delete from supplier where Supplier_Id=:sup_id ";
		$arr =  Array(":sup_id"=>$sup_id);
		return $this->exeNoneQuery($sql, $arr);	
		}catch(Exception $e)
		{
			return 0;
		}
	}
	
	public function getById($sup_id)
	{
		$sql="select * 
			from supplier
			where supplier.Supplier_Id =:sup_id ";
		$arr = array(":sup_id"=>$sup_id);
		$data = $this->exeQuery($sql, $arr);
		if (Count($data)>0) return $data[0];
		else return array();
	}
	
	public function getAll()
	{
		return $this->exeQuery("select * from supplier");
	}
	
	public function saveEdit($id, $name, $phone, $email)
	{
		if ($id =="" || $name=="") return 0;//Error
		$sql="UPDATE `supplier` SET `Supplier_Name`= :sup_name,`Phone`=:phone ,`Email`=:email WHERE `Supplier_Id`= :id";
		$arr = array(":id"=>$id, ":sup_name"=>$name, ':email'=>$email, ':phone'=>$phone);
		return $this->exeNoneQuery($sql, $arr);
		
	}
	public function saveAddNew($id, $name, $phone, $email)
	{
		if ($id =="" || $name=="") return 0;//Error
		$sql="insert into supplier(Supplier_Id, Supplier_Name, Email, Phone) values(:sup_id, :sup_name, :sup_email, :sup_phone)";
		$arr = array(":sup_id"=>$id, ":sup_name"=>$name, ':sup_email'=>$email, ':sup_phone'=>$phone);
		return $this->exeNoneQuery($sql, $arr);
	}

}
?>