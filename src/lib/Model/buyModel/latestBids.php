<?php
require_once('../Core/requireFiles.php');
class latestBid{
    function getBids(){
        $obj=new models();
        $row=$obj->selectMul("*","","Items ORDER BY CreatedAt DESC LIMIT 5 ");
        echo json_encode($row);
    }
}
?>