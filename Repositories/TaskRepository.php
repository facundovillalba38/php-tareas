<?php
     namespace Repositories;

     use Models\Task as Task;

     class TaskRepository{ 
          private $taskList = array();
          private $fileNames = array();

          public function __construct(){
               $this->fileNames = dirname(__DIR__)."/data/tasks.json";
          }
          

          public function getFileNames(){
               return $this->fileNames;
          }
          public function add(Task $task){
               $this->RetrieveData();
               array_push($this->taskList, $task);
               $this->SaveData();
          }
          public function getAll(){
               $this->RetrieveData();
               return $this->taskList;
          }

          public function remove($task)
          {
               $this->RetrieveData();
               foreach($this->taskList as $key => $value){
                    if($value->getTitle() == $task){
                         unset($this->taskList[$key]);
                    }
               }
               $this->SaveData();
          }

          private function SaveData(){
               $arrayToEncode = array();

               foreach($this->taskList as $task){
                    $valuesArray["title"] = $task->getTitle();
                    $valuesArray["date"] = $task->getDate();
                    $valuesArray["description"] = $task->getDescription();
                    $valuesArray["reminder"] = $task->getReminder();

                    array_push($arrayToEncode, $valuesArray);
               }

               $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
               file_put_contents($this->fileNames, $jsonContent);
          }

          private function RetrieveData(){
               $this->taskList = array();
               if(file_exists($this->fileNames)){
                    $jsonContent = file_get_contents($this->fileNames);
                    $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                    //var_dump($arrayToDecode);
                    foreach($arrayToDecode as $valuesArray){
                         $task = new Task();
                         $task->setTitle($valuesArray["title"]);
                         $task->setDate($valuesArray["date"]);
                         $task->setDescription($valuesArray["description"]);
                         $task->setReminder($valuesArray["reminder"]);
                         array_push($this->taskList, $task);
                    }

               }
          }
          

     }


?>