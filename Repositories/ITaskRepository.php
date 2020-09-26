<?php
     namespace Repositories;

     use Model\Task as Task;

     interface IActions {
          public function add(Task $task);
          //public function remove();
          public function getAll();
     }
?>