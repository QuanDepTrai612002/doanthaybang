<?php
    class Order extends Db
    {
        private $_page_size = 8; //Một trang hiển hị 5 cuốn sách
        private $_page_count;
        public function getRand($n)
        {
            $sql = "select * from order order by rand() limit 0, $n ";
            return $this->exeQuery($sql);
        }
    
        public function getBySuplier($manhaxb)
        {
    
        }
        public function delete($order_id)
        {
            try{
                $sql = "delete from order where OrderId=:order_id ";
                $arr = array(":order_id" => $order_id);
                return $this->exeNoneQuery($sql, $arr);
            }catch(Exception $e)
            {

                return 0;
            }
        }
    
        public function getOrder($order_id)
        {
            $sql = "SELECT
            o.OrderId,
            o.Status AS OrderStatus,
            o.Price,
            o.Consignee_Name,
            o.Consignee_Phone,
            o.Consignee_Add,
            o.Date_Order,
            u.FirstName,
            u.LastName
        FROM
            `order` o
        JOIN
            Users u ON o.UserId = u.UserId
            Where o.OrderId =:order_id";
            $arr = array(":order_id" => $order_id);
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
            FROM `Order`";
            $n = $this->count($sql);
            $this->_page_count = ceil($n / $this->_page_size);
    
            $sql = "SELECT
            o.OrderId,
            o.Status AS OrderStatus,
            o.Price,
            o.Consignee_Name,
            o.Consignee_Phone,
            o.Consignee_Add,
            o.Date_Order,
            u.FirstName,
            u.LastName
        FROM
            `Order` o
        JOIN
            Users u ON o.UserId = u.UserId;
            ORDER BY order.OrderId ASC
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
        public function insert($name, $phone, $address, $userId, $price)
        {
            try {
                $sql = "INSERT INTO `order` (Consignee_Name, Consignee_Phone, Consignee_Add, UserId, Price)
                        VALUES (:name, :phone, :address, :userId, :price)";
        
                $arr = array(':name' => $name, ':phone' => $phone, ':address' => $address, ':userId' => $userId, ':price' => $price);
                $stm = $this->dbh->prepare($sql);
        
                if ($stm->execute($arr)) {
                    $id = $this->dbh->lastInsertId();
                    return $id;
                } else {
                    // Handle errors
                    $errorInfo = $stm->errorInfo();
                    echo "SQL error: " . $errorInfo[2];
                    // You may want to log the error or handle it in a way appropriate for your application.
                    return false;
                }
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
                // You may want to log the error or handle it in a way appropriate for your application.
                return false;
            }
        }
        // public function update( $id, $name, $price, $image, $des, $quantity, $cat_id, $sup_id)
        // {
        //     $sql = "UPDATE order 
        //     SET Pro_Description = :des,
        //         Price = :price,
        //         Pro_Name = :name,
        //         Pro_Quantity = :quantity,
        //         Category_Id = :cat_id,
        //         Supplier_Id = :sup_id,
        //         Pro_Image = :image
        //     WHERE order_id =:id ";
        //      $arr = array(':id'=>$id,':des'=>$des, ':name'=>$name,':price'=>$price, ':quantity'=>$quantity, ':cat_id'=>$cat_id, ':sup_id'=>$sup_id,':image'=>$image);
        //      return $this->exeNoneQuery($sql, $arr);
        // }
    }

?>