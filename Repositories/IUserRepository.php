<?php
     namespace Repositories;

     use Model\User as User;

     interface IActions {
          public function add(User $user);
          //public function remove();
          public function getAll();
     }
?>