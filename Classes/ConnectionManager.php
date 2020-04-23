<?php
class ConnectionManager
{
    private $conn;
    private $stmt;
    private $servername; 
    private $dbUsername;
    private $dbPassword;
    private $dbName;
   function __construct()
   {
    $this->servername="localhost";
    $this->dbUsername="root";
    $this->dbPassword="";
    $this->dbName="loginsystemtut";
    $this->conn =  new mysqli($this->servername,$this->dbUsername,$this->dbPassword,$this->dbName);
    if($this->conn->connect_errno)
     {
       die("Connection failed: ".$this->conn->connect_error );
     }
     $stmt = $this->conn-> stmt_init();
   }
   public function insert($query,$str1,$_columnsValueArray)
   {
     $this->prepare($query,$str1,$_columnsValueArray);
    $stmt->execute($query);
    $stmt->close();
   }
   private function prepare($query,$str,$paramArray)
   {
    $this->stmt = $this->conn->prepare($query);
    $this->stmt -> bind_param($str1,$_columnsValueArray);
   }
   public function select($query,$str,$paramArray)
   {
    $this->prepare($query,$str1,$_columnsValueArray);
    $this->execute($query);
   }
   public function delete($query,$str,$paramArray)
   {
     $this->prepare($query,$str1,$_columnsValueArray);
     $this->execute($query);
   }
   public function update($query,$str,$paramArray)
   {
    $this->prepare($query,$str,$valueArray,$paramArray);
    $this->prepare($query,$str,$valueArray);
    $this->prepare($query,$str,$paramArray);
    $this->execute($query);
   }
    private function execute($query)
    {
     if($this->conn->query($query)===TRUE)
     {
       echo "Query executed seccessfully";
     }
     else
     {
       echo "Error: " .$query."<br>". $this->conn->error;
     }
  }
  public function existUser($query)
  {
    $checkuser = mysql_query($query);  
        $result = mysql_num_rows($checkuser);  
        if ($result == 0)
        {  
            return true;
        }
        else
        {  
            return false;  
        }  
  }
  public function login($query)
  {
    if($db->existUser($query))
    {
        $_SESSION['login'] = true;  
        $_SESSION['id'] = $data['id'];  
        return true;  
    }
    else
    {
        return false;  
    }
  }
   public function closeConnection()
   {
    &this->conn->close();
   }
}