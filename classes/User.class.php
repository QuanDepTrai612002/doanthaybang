<?php



class User extends Db
{


    private $_page_size = 8;
    private $_page_count;

    public function getUserById($id)
    {
        $sql = "select * from users where UserId =:id";
        $arr = array(":id" => $id);
        $data = $this->exeQuery($sql, $arr);
        if (Count($data) > 0)
            return $data[0];
        else
            return array();
    }
    public function getAllUser($currentPage)
    {
        $offset = ($currentPage - 1) * $this->_page_size;
        $sql = "SELECT COUNT(*) 
        FROM users";
        $n = $this->count($sql);
        $this->_page_count = ceil($n / $this->_page_size);

        $sql = "SELECT *
        FROM
            users
            ORDER BY users.UserId ASC
        LIMIT $offset, " . $this->_page_size;
        return $this->exeQuery($sql);
    }

    public function updateData($id, $firstName, $lastName, $email, $phone, $address, $password)
    {
        $sql = "UPDATE users 
            SET FirstName = :firstName, LastName = :lastName, Email = :email, 
                Phone = :phone, Address = :address, Password = :pass
            WHERE UserId = :id";

        $arr = array(
            ":id" => $id,
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address,
            ':pass' => $password
        );

        return $this->exeNoneQuery($sql, $arr);
    }
    
    public function updateDataNotPassword($id, $firstName, $lastName, $email, $phone, $address)
    {
        $sql = "UPDATE users 
            SET FirstName = :firstName, LastName = :lastName, Email = :email, 
                Phone = :phone, Address = :address
            WHERE UserId = :id";

        $arr = array(
            ":id" => $id,
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address,
           
        );

        return $this->exeNoneQuery($sql, $arr);
    }
    public function delete($id)
    {
        try{
            $sql = "Delete from users
            WHERE UserId = :id";
    
        $arr = array(
            ":id" => $id,
           
        );
        return $this->exeNoneQuery($sql, $arr);
        }catch(Exception $e)
        {
            return  0;
        }
    }

    public function count($sql, $arr = array())
    {
        return $this->countItems($sql, $arr);
    }

    public function getPageCount()
    {
        return $this->_page_count;
    }

    public function insertData($firstName, $lastName, $email, $phone, $address, $password)
    {
        $sql = "INSERT INTO users (FirstName, LastName, Email, Phone, Address, Password)
         VALUES (:firstName, :lastName, :email, :phone,  :address,:pass)";
        $arr = array(":firstName" => $firstName, ":lastName" => $lastName, ':email' => $email, ':phone' => $phone, ':address' => $address, ':pass' => $password);
        return $this->exeNoneQuery($sql, $arr);
    }


    public function userLogin($email, $password)
    {
        $sql = "select * from users where Email =:e and Password= :p ";
        $arr = array(":e" => $email, ":p" => $password);
        $data = $this->exeQuery($sql, $arr);
        if (Count($data) > 0)
        return $data[0];
    else
        return array();
    }
    public function checkEmail($email )
    {
        $sql = "select * from users where Email =:e";
        $arr = array(":e" => $email,);
        $data = $this->exeQuery($sql, $arr);
        if (Count($data) > 0)
            return true;
        else
            return false;
    }
}