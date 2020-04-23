<?php 
require_once 'ConnectionManager.php';

class UserTableManager
{
  private $connManager;
  private $columnsNameStr;
  private $columnsValueStr;
  private $conditionStr;
  protected $_table;
 
 function __construct()
 {
     $this->connManager = new ConnectionManager();
 }
 public function insert($_insertArray)
 {
   $this->columnsNameStr = "(";
   $this->columnsValueStr = "(";
   $index = 0;
   $count = count($_insertArray);
   --$count;
   $paramArray = array_values($_insertArray);
   $str = "(";
   foreach ($_insertArray as $key => $value) 
   {
     $this->columnsNameStr .= $key;
     $str .= "?";
     $str1 .= " ";
     if($index !== $count)
     {
        $this->columnsNameStr .= ',';
        $str .= ",";
        $str1 .= "s";
     }
     else
     {
       $this->columnsNameStr .= ')';
       $str .= ")";
     }
     ++$index;
   }

   $query = "INSERT INTO " . $this->_table .  $this->columnsNameStr . " values " . $str . ";";  
   $this->connManager.insert($query,$str1,$paramArray);
   $this->connManager.closeConnection();
 }
  public function select($_columnNames,$_conditionArray)
  {
    $countColumns = count($_columnNames);
    --$countColumns;
    $index = 0;
    foreach ($_conditionArray as  $value) 
    {
      $this->columnsNameStr .= $value;
      if($index !== $countColumns)
      {
         $this->columnsNameStr .= ',';
      }
      ++$index;
    }
    $index = 0;
    $paramArray = array_values($_conditionArray); 
    $str = " ";
    foreach ($_conditionArray as $key => $value) 
    {
      $this->conditionStr .=  $key;
      $this->conditionStr .= " = ?";
      $str .= "s";
      if($index !== $count)
      {
         $this->conditionStr .= " AND ";
      }
      ++$index;
    }
    $query="Select ".$this->columnsNameStr . " from " . $this->_table . " WHERE " . $this->conditionStr . ";";
    $this->connManager->select($query,$str,$paramArray);
    $this->connManager.closeConnection();
  }
  public function delete($_conditionArray)
  {
    $paramArray = array_values($_conditionArray); 
    $str = " ";
    foreach ($_conditionArray as $key => $value) 
    {
      $this->conditionStr .=  $key " = ". "?";
      $str .= "s";
      if($index !== $count)
      {
         $this->conditionStr .= " AND ";
      }
      ++$index;
    }
      $query = "DELETE from " . $this->_table . " WHERE " . $this->conditionStr . ";";
      $this->connManager->execute($query);
      $this->connManager.closeConnection();
  }
  public function update($_valueArray,$_conditionArray)
  {
    $valueArray = array_values($_valueArray); 
    $str = " ";
    foreach ($_valueArray as $key => $value) 
    {
      $this->columnsValueStr .=  $key " = ". "?";
      $str .= "s";
      if($index !== $count)
      {
         $this->conditionStr .= ", ";
      }
      ++$index;
    }
    $index = 0;
    $paramArray = array_values($_conditionArray); 
    foreach ($_conditionArray as $key => $value) 
    {
      $this->conditionStr .=  $key " = ". "?";
      $str .= "s";
      if($index !== $count)
      {
         $this->conditionStr .= ", ";
      }
      ++$index;
    }
      $query="UPDATE ".$this->_table ." SET " . $this->columnsValueStr . " WHERE " . $this->conditionStr . ";";
      $this->connManager->update($query,$str,$valueArray,$paramArray);
    $this->connManager.closeConnection();
  }
  public function login($loginArray)
  {
    foreach ($_conditionArray as $key => $value) 
    {
      $this->conditionStr .=  $key " = ". $value;
      if($index !== $count)
      {
         $this->conditionStr .= ", ";
      }
      ++$index;
    }
    $query = "SELECT ID FROM " . $this->_table . " WHERE " . $this->_conditionArray . ";";
    $this->connManager->login($query);
  }
}