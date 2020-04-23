<?php
require_once 'UserTableManager.php';

class UserModel extends UserTableManager
{
    public function __construct($tableName)
    {
        parent::__construct();
        $this->_table = $tableName;
    }
    public  function register($_registerArray)
    {
        $this->insert($_registerArray);
    }
    public function login($loginArray)
    {  
        $this->login($loginArray);
    } 
    public function session() {  
        if (isset($_SESSION['login'])) {  
            return $_SESSION['login'];  
        }  
    }  
  
    public  function logout() {  
        $_SESSION['login'] = false;  
        session_destroy();  
    } 
}