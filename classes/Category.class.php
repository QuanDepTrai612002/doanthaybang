<?php
class Category extends Db{
	
	
	public function delete($cat_id)
	{
		try{
			$sql="delete from category where Category_Id=:cat_id ";
		$arr =  Array(":cat_id"=>$cat_id);
		return $this->exeNoneQuery($sql, $arr);	
		}catch (Exception $e) {
			# code...
			return 0;
		}
	}
	
	public function getById($cat_id)
	{
		$sql="select category.* 
			from category
			where  category.Category_Id=:cat_id ";
		$arr = array(":cat_id"=>$cat_id);
		$data = $this->exeQuery($sql, $arr);
		if (Count($data)>0) return $data[0];
		else return array();
	}
	public function getByName($name)
	{
			$sql="SELECT * FROM `category` WHERE  Category_Name= :name";
		$arr = array(':name' =>  $name);
		$data = $this->exeQuery($sql, $arr);
		if (Count($data)>0) return $data[0];
		else return array();
	}
	public function getAll()
	{
		return $this->exeQuery("select * from category");
	}
	
	public function saveEdit($id, $name)
	{
		if ($id =="" || $name=="") return 0;//Error
		$sql="update category set Category_Name=:name where Category_Id=:id ";
		$arr = array(":name"=>$name, ":id"=>$id);
		return $this->exeNoneQuery($sql, $arr);
		
	}
	public function saveAddNew($id, $name)
	{
	
		if ($id =="" || $name=="") return 0;//Error
		$sql="insert into category(Category_Id, Category_Name) values(:cat_id, :cat_name) ";
		$arr = array(":cat_id"=>$id, ":cat_name"=>$name);
		return $this->exeNoneQuery($sql, $arr);
		
	}

}
?>