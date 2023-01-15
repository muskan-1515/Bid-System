<?php
require_once('../Core/requireFiles.php');
class userClass{
    function getUsers(){
        $obj=new models();
        $row=$obj->selectMul("*","","Users");
        echo json_encode($row);
    }
}

?>