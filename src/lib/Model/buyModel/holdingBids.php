<?php
require_once('../Core/requireFiles.php');
class holdingBid{
    function getBids(){
        $obj=new models();
        
        $row=$obj->selectnestedMulC();
        echo json_encode($row);
    }
}
?>