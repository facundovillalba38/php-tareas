<?php
     
     require_once("../Config/Autoload.php");
     //require_once("../Repositories/TaskRepository.php");
     //require_once("../Models/Task.php");

     use Repositories\TaskRepository as TaskRepository;
     use Models\Task as Task;

     $taskRepo = new TaskRepository();

     


     if(isset($_GET)){
          $title = $_GET["title"];

          $taskRepo->remove($title);

          header("location: ../dashboard.php");
     }

?>