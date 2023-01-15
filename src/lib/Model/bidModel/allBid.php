<?php
require_once('../Core/requireFiles.php');
class bidClass{
    function getBid(){
        $obj=new models();
        $row=$obj->selectMul("*","","Items");
        echo json_encode($row);
    }
}
?>