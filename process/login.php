<?php
     
     //require_once("../Config/Autoload.php");

     require_once("../Models/User.php");
     require_once("../Repositories/UserRepository.php");
     

     use Repositories\UserRepository as UserRepository;
     use Models\User as User;

     $userRepository = new UserRepository();

     $usersArray = $userRepository->getAll();

     //print_r($users);


     if(isset($_POST)){
          $username = $_POST["user"];
          $password = $_POST["pass"];

          foreach($usersArray as $key => $user){
               if(($username == $user->getUser())&&($password == $user->getPass())){
                    session_start();
                    $loggedUser = new User();
                    $loggedUser->setUser($username);
                    $loggedUser->setPass($password);
                    $loggedUser->setName($name);
                    $SESSION["loggedUser"]=$loggedUser;
                    header("location: ../dashboard.php");
                    exit;
               }else{
                    header("location: ../index.php?error");
               }
          }
          
          



     }




?>