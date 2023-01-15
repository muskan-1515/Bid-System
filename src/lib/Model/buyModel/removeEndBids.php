<?php
$obj=new models();
$id=$_GET['id'];
//get the highest bid value
$array=[&$id];
$row=$obj->select("*","ItemId=?","Item ORDER BY MinPrice DESC LIMIT 1",$array,"i");
$userId=$row['UserId'];
$obj->insert("UserId,ItemId,Email","'$userId','$id','$email'","Buyers");
$obj->delete("ItemId=?","Items",$array,"i");
$obj->delete("ItemId=?","Biders",$array,"i");
//make function for sending email
header("Location:../../View/userViews/bidView/removeBid.php");
?>