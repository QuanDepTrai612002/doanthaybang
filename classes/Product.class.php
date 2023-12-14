<?php
class Product extends Db
{
    private $_page_size = 8; //Một trang hiển hị 5 cuốn sách
    private $_page_count;
    public function getRand($n)
    {
        $sql = "select * from product order by rand() limit 0, $n ";
        return $this->exeQuery($sql);
    }

    public function getByCategory($categoryId,$currPage = 1)
    {
        $offset = ($currPage - 1) * $this->_page_size;
        $sql = "SELECT COUNT(*) 
        FROM product
        INNER JOIN Category ON product.Category_Id = Category.Category_Id
        INNER JOIN Supplier ON product.Supplier_Id = Supplier.Supplier_Id";
        $n = $this->count($sql);
        $this->_page_count = ceil($n / $this->_page_size);

        $sql = "SELECT
        product.Pro_Id,
        product.Pro_Name,
        product.Pro_Description,
        product.Price,
        product.Pro_Image,
        product.Pro_Quantity,
        product.Category_Id,
        product.Supplier_Id,
        category.Category_Name,
        supplier.Supplier_Name
    FROM
        product
        INNER JOIN category ON product.Category_Id = category.Category_Id
        INNER JOIN supplier ON product.Supplier_Id = supplier.Supplier_Id
    where product.Category_Id = :category
        ORDER BY product.Pro_Id ASC
    LIMIT $offset, " . $this->_page_size;

        $arr = ['category'=>$categoryId];
        return $this->exeQuery($sql,$arr);
    }

    public function delete($pro_id)
    {
       try{
        $sql = "delete from product where Pro_Id=:pro_id ";
        $arr = array(":pro_id" => $pro_id);
        return $this->exeNoneQuery($sql, $arr);
       }catch(Exception $e)
       {
        return 0;
       }
    }

    public function getDetail($pro_id)
    {
        $sql = "SELECT 
        C.Category_Name,
        S.Supplier_Name,
        P.*
        FROM 
            product P
        JOIN 
            category C ON P.Category_Id = C.Category_Id
        JOIN 
            supplier S ON P.Supplier_Id = S.Supplier_Id
        Where P.Pro_Id =:pro_id";
        $arr = array(":pro_id" => $pro_id);
        $data = $this->exeQuery($sql, $arr);
        if (Count($data) > 0)
            return $data[0];
        else
            return array();
    }

    public function getAll($currPage = 1)
    {
        $offset = ($currPage - 1) * $this->_page_size;
        $sql = "SELECT COUNT(*) 
        FROM product
        INNER JOIN category ON product.Category_Id = category.Category_Id
        INNER JOIN supplier ON product.Supplier_Id = supplier.Supplier_Id";
        $n = $this->count($sql);
        $this->_page_count = ceil($n / $this->_page_size);

        $sql = "SELECT
        product.Pro_Id,
        product.Pro_Name,
        product.Pro_Description,
        product.Price,
        product.Pro_Image,
        product.Pro_Quantity,
        product.Category_Id,
        product.Supplier_Id,
        category.Category_Name,
        supplier.Supplier_Name
    FROM
        product
        INNER JOIN category ON product.Category_Id = category.Category_Id
        INNER JOIN supplier ON product.Supplier_Id = supplier.Supplier_Id
        ORDER BY product.Pro_Id ASC
    LIMIT $offset, " . $this->_page_size;

        return $this->exeQuery($sql);
    }

 
    public function count($sql, $arr = array())
    {
        return $this->countItems($sql, $arr);
    }

    public function getPageCount()
    {
        return $this->_page_count;
    }

    public function insert($name, $price, $image, $des, $quantity, $cat_id, $sup_id)
    {
        $sql = "INSERT INTO product (Pro_Description, Price, Pro_Name, Pro_Quantity, Category_Id, Supplier_Id, Pro_Image)
        VALUES (:des, :price, :name, :quantity, :cat_id, :sup_id, :image)";

        $arr = array(':des'=>$des, ':name'=>$name,':price'=>$price, ':quantity'=>$quantity, ':cat_id'=>$cat_id, ':sup_id'=>$sup_id,':image'=>$image);
        return $this->exeNoneQuery($sql, $arr);
	}
    
    public function update( $id, $name, $price, $image, $des, $quantity, $cat_id, $sup_id)
    {
        $sql = "UPDATE product 
        SET Pro_Description = :des,
            Price = :price,
            Pro_Name = :name,
            Pro_Quantity = :quantity,
            Category_Id = :cat_id,
            Supplier_Id = :sup_id,
            Pro_Image = :image
        WHERE Pro_Id =:id ";
         $arr = array(':id'=>$id,':des'=>$des, ':name'=>$name,':price'=>$price, ':quantity'=>$quantity, ':cat_id'=>$cat_id, ':sup_id'=>$sup_id,':image'=>$image);
         return $this->exeNoneQuery($sql, $arr);
    }
    public function updateNotImage( $id, $name, $price, $des, $quantity, $cat_id, $sup_id)
    {
        $sql = "UPDATE product 
        SET Pro_Description = :des,
            Price = :price,
            Pro_Name = :name,
            Pro_Quantity = :quantity,
            Category_Id = :cat_id,
            Supplier_Id = :sup_id
        WHERE Pro_Id =:id ";
         $arr = array(':id'=>$id,':des'=>$des, ':name'=>$name,':price'=>$price, ':quantity'=>$quantity, ':cat_id'=>$cat_id, ':sup_id'=>$sup_id);
         return $this->exeNoneQuery($sql, $arr);
    }

}
?>