<?php
require_once("../Core/requireFiles.php");
$obj=new models();
$id=$_GET['id'];
$array=[&$id];
$obj->delete("ItemId=?","Items",$array,"i");
header("Location:../../View/userViews/bidView/removeBid.php");
?>