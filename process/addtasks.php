<?php
     require_once('../Config/Autoload.php');
     //require_once("../Repositories/TaskRepository.php");
     //require_once("../Models/Task.php");
     
     
     use Repositories\TaskRepository as TaskRepository;
     use Models\Task as Task;

     $taskRepo = new TaskRepository();

     if(isset($_POST)){
          $title = $_POST['title'];
          $date = $_POST['date'];
          $description = $_POST['description'];
          $reminder = $_POST['reminder'];

          $newTask = new Task();
          $newTask->setTitle($title);
          $newTask->setDate($date);
          $newTask->setDescription($description);
          $newTask->setReminder($reminder);

          $taskRepo->add($newTask);

          header("location: ../dashboard.php?ok");

     }



?>