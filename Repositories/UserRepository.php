<?php
     namespace Repositories;
     

     use Models\User as User;

     class UserRepository{ 
          private $userList = array();
          private $fileNames = array();

          function __construct(){
               $this->fileNames = dirname(__DIR__)."\data\users.json";
          }

          
          /**
           * Get the value of fileNames
           */ 
          public function getFileNames()
          {
                    return $this->fileNames;
          }

          public function add(User $user){
               $this->RetrieveData();
               array_push($this->userList, $user);
               $this->SaveData();
          }

          public function getAll(){
               $this->RetrieveData();
               return $this->userList;
          }

          private function SaveData(){
               $arrayToEncode = array();

               foreach($this->userList as $user){
                    $valuesArray["name"] = $bill->getName();
                    $valuesArray["user"] = $bill->getUser();
                    $valuesArray["pass"] = $bill->getPass();

                    array_push($arrayToEncode, $valuesArray);
               }
               $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

               file_put_contents($this->fileNames, $jsonContent);
          }

          private function RetrieveData(){
               $this->userList = array();
               if(file_exists($this->fileNames)){
                    $jsonContent = file_get_contents($this->fileNames);
                    $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                    foreach($arrayToDecode as $valuesArray){
                         $user = new User();
                         $user->setName($valuesArray["name"]);
                         $user->setUser($valuesArray["user"]);
                         $user->setPass($valuesArray["pass"]);

                         array_push($this->userList, $user);
                    }

               }


          }


     }

?>