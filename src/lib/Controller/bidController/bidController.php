<?php
function check(){
    switch($_REQUEST['tval']){
        case 1:
            include_once("../Model/bidModel/getUsers.php");
            $obj=new userClass();
            $result=$obj->getUsers($_REQUEST);
            break;
        case 2:
            include_once("../View/userViews/bidView/setBid.php");
            break;
        case 3:
            include_once("../Model/bidModel/setBid.php");
            $obj=new bidClass();
            $result=$obj->setBid($_REQUEST);
            break;
        case 4:
            include_once("../View/userViews/bidView/allBid.php");
            break;
        case 5:
            include_once("../Model/bidModel/allBid.php");
            $obj=new bidClass();
            $result=$obj->getBid($_REQUEST);
            break;
        case 6:
            include_once("../View/userViews/bidView/removeBid.php");
            break;
        case 7:
            include_once("../Model/bidModel/removeBid.php");
            break;
        return $result;
    }
    
}
?>