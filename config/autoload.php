<?php
     include_once('constants.php');
     spl_autoload_register(function ($className)
     {
          $fileName = ROOT."\\".$className.".php";
          echo $fileName;
          require_once($fileName);
     });

?>

