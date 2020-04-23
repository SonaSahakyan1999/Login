<?php  
   include_once "templates/Login.html";
   include_once "Classes/UserController.php";
   session_start();    
   $userController = new UserController();
   $userView = new UserView();
   $id = $_SESSION['id'];  
   
   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {  
      //if (!$userController->session())
      //{  
   
        if(isset($_POST['login']))
         {
         $loginArray = array("email" => $_POST['email'],"password" => $_POST['password']);
         if($userController->login($loginArray))
         {
            $userView -> profilePage();
         }
         //}
      }
       if(isset($_POST['register']))
       {
         $registerArray = array("name" => $_POST['name'],"surname" => $_POST['surname'],"email" => $_POST['email'],"password" => $_POST['password'],"image" => $_FILES['image']); 
        if($user -> register($registerArray))
        {  
           echo "Registration Successful!";
           $userView -> Registerpage() ; 
        }
        else
        {  
           echo "Entered email already exist!";  
        } 
       } 
   }  
 ?>  
