<?php

class DetailOrder extends Db
{
    public function getOrderDetail($orderId)
    {
        $sql = "SELECT detailorder.Quantity, detailorder.Price, detailOrder.Pro_Id, detailOrder.OrderId, product.Pro_Name, product.Price, product.Pro_Image
        FROM detailorder
            JOIN
            product ON detailorder.Pro_Id = product.Pro_Id
         WHERE  OrderId =:order_id";
        $arr = array(":order_id" => $orderId);
        $data = $this->exeQuery($sql, $arr);
        if (Count($data) > 0)
            return $data;
        else
            return array();
    }
    public function insert($quantity, $price, $orderId, $proid)
    {
        $sql = "INSERT INTO detailorder (	Quantity, Price, OrderId , Pro_Id)
        VALUES (:quantity, :price, :orderId, :proid);";
           $arr = array(':quantity'=>$quantity, ':price'=>$price, ':orderId'=>$orderId, ':proid'=>$proid);
       echo  $this->sql_debug($sql,$arr);
           return $this->exeNoneQuery($sql, $arr);
    }
}