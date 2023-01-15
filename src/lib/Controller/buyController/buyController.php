<?php
function check(){
    switch($_REQUEST['tval']){
        case 1:
            include_once("../Model/bidModel/getUsers.php");
            $obj=new userClass();
            $result=$obj->getUsers($_REQUEST);
            break;
        case 2:
            include_once("../View/userViews/buyView/latestBids.php");
            break;

        case 3:
            include_once("../View/userViews/buyView/endBids.php");
            break;

        case 4:
            include_once("../View/userViews/buyView/holdingBids.php");
            break;
        case 5:
            include_once("../View/userViews/buyView/requestedBids.php");
            break;
        case 6:
            include_once("../Model/buyModel/latestBids.php");
            $obj=new latestBid();
            $result=$obj->getBids($_REQUEST);
            break;
        case 7:
            include_once("../Model/buyModel/holdingBids.php");
            $obj=new holdingBid();
            $result=$obj->getBids($_REQUEST);
            break;
        case 8:
            include_once("../Model/buyModel/requestedBids.php");
            $obj=new requestedBid();
            $result=$obj->getBids($_REQUEST);
            break;
        case 9:
            include_once("../Model/buyModel/endBids.php");
            $obj=new endBids();
            $result=$obj->getBids($_REQUEST);
            break;
        case 10:
            include_once("../View/userViews/buyView/buyBid.php");
            break;
        case 11:
            include_once("../View/userViews/buyView/buyBid.php");
            break;
        return $result;  
    }
    
}
?>