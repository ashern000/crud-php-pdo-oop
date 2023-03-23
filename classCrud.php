<?php

/**
 * Connection to the database
 * This class extends to others, being mandatory to pass the connection variables to each instance
 * @param string host
 * @param string database user
 * @param string database password 
 * @param string database
 */

class Connection{
    private $localhost;
    private $user ;
    private $pass ;
    private $dbname;

    protected $conn;

    public function __construct($user, $host, $pass,$dbname)
    {
        $this->user = $user;
        $this->localhost = $host;
        $this->pass = $pass;
        $this->dbname = $dbname;

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


    /**
     * Set user name
     * @param string userName
     */

    public function setUserName($date){

        $date = htmlspecialchars($date);
        $date = strip_tags($date);
        $this->userName = $date;

    }

       /**
     * Set user address
     * @param string userAddress
     */

    public function setUserAddress($date){

        $date = htmlspecialchars($date);
        $date = strip_tags($date);
        $this->userAddress = $date;

    }

       /**
     * Set userYear
     * @param string userYear
     */

    public function setUserYear($date){

        $this->userYear = $date;
        $date = htmlspecialchars($date);
        $date = strip_tags($date);

    }

   /**
     * Get userName
     * @return string userName
     */

    public function getUserName(){

        return $this->userName;
    
    }

       /**
     * Get userAddress
     * @return string userAddress
     */

    public function getUserAddress(){

        return $this->userAddress;

    }

   /**
     * Get userYame
     * @return string userYear
     */

    public function getUserYear(){

        return $this->userYear;

    }

    /**
     * Function to insert into the database
     */

    public function insertInto(){

        $sql = "INSERT INTO users_tb(userName, userAddress, userYear) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute([$this->userName, $this->userAddress, $this->userYear]);
        if($result==1){
            echo "<script>alert('Usuário criado com Sucesso!');document.location='index.php'</script>";
        }

        return "<script>alert('Falha ao criar usuário');document.location='index.php'</script>";
        
    }  

    /**
     * Function to read from database
     * @return array array of users
     */

    public function read(){
        $sql = "SELECT * FROM users_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }

    /**
     * Function to return the user
     * @param number idUser
     * @return array array of users
     */

    public function getUser($id){
        $sql = "SELECT * FROM users_tb WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * Function to update the database
     * @param number id
     * @return boolean
     */

    public function update($id){
        $sql = "UPDATE `users_tb` SET `userName` = ?, `userAddress`=?,`userYear`=? WHERE `users_tb`.`id` = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->getUserName(), $this->getUserAddress(),$this->getUserYear()]);
        if($stmt = 1){
            return true;
        }
            
        return false;
    }

    /**
     * Function to delete the database
     * @param number id
     */

    public function delete($id){
        $sql = "DELETE FROM `users_tb` WHERE `users_tb`.`id` = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

}

?>