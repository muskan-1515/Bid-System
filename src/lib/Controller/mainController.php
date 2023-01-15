<?php

    switch($_REQUEST["redirect"]){
        case "default":
            include_once("./defaultController/defaultcontroller.php");
            $result=checkDefault($_REQUEST);
            break;
         return $result;

        case "bid":
            include_once("./bidController/bidController.php");
            $result=check($_REQUEST);
            break;
        case "buy":
            include_once("./buyController/buyController.php");
            $result=check($_REQUEST);
            break;
        return $result;
    }
?>