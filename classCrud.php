<?php

class Connection{
    private $localhost = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "crudOopPdo";

    protected $conn;

    public function __construct()
    {
        try{
            $this->conn = new PDO("mysql:localhost=$this->localhost;dbname=$this->dbname",$this->user, $this->pass);
        } catch(PDOException $e){
            echo "Error connection: " . $e->getMessage();
            exit();
        }
    }

}

class Users extends Connection{
    private $userName;
    private $userAddress;
    private $userYear;


    public function setUserName($date){
        $this->userName = $date;
    }

    public function setUserAddress($date){
        $this->userAddress = $date;
    }

    public function setUserYear($date){
        $this->userYear = $date;
    }

    public function getUserName(){
        return $this->userName;

    }

    public function getUserAddress(){
        return $this->userAddress;
    }

    public function getUserYear(){
        return $this->userYear;
    }


    public function insertInto(){
        $sql = "INSERT INTO users_tb(userName, userAddress, userYear) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute([$this->userName, $this->userAddress, $this->userYear]);
        if($result==1){
            echo "<script>alert('Usuário Listado com Sucesso!');document.location='index.php'</script>";
        }
        
    }  

    public function read(){
        $sql = "SELECT * FROM users_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }

    public function getUser($id){
        $sql = "SELECT * FROM users_tb WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update($id){
        $sql = "UPDATE `users_tb` SET `userName` = ?, `userAddress`=?,`userYear`=? WHERE `users_tb`.`id` = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->getUserName(), $this->getUserAddress(),$this->getUserYear()]);
        if($stmt = 1){
            return true;
        }
            
    }

    public function delete($id){
        $sql = "DELETE FROM `users_tb` WHERE `users_tb`.`id` = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

}

?>