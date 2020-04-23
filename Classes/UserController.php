<?php
require_once 'UserModel.php';
class UserController 
{
    /*function __autoload($className) {
        $filename = $className . ".php";
        if (is_readable($filename)) {
            require $filename;
        }
    }*/
   private $userModel;
   public function __construct()
   {
      $userModel = new UserModel(); 
   }
   public function register()
   {
       $valueArray = array();
       foreach($_POST as $key => $value)
        {
        $valueArray[$key] = $value; 
        }
       $userModel->register($valueArray);
   }
   public function login()
   {
     $valueArray = array();
    foreach($_POST as $key => $value)
     {
     $valueArray[$key] = $value; 
     }
     $userModel->login($valueArray);
   }

}