<?php

/*Author's Name: Muskan Kushwah
Date: 30/12/2022
Purpose:This page is mainly built for redirecting according to the 
*/

    switch($_REQUEST['tval']){
        case 1:
            include_once(mainC.'/getSignup.php');
            $obj=new signupUser();
            $result=$obj->getsignuped($_REQUEST);
            break;
        case 2:
            include_once(mainC.'/getLogin.php');
            $obj=new loginUser();
            $result = $obj->getlogged($_REQUEST);
            break;
        case 3:
            include_once(pateintC.'/bookAppoinmentCode.php');
            $result = getbooked();
            break;
        //if 4 happen then simply getting the appoinment dashboard
        case 4:
            include_once(pateintC.'/bookAppoinCode.php');
            $result = getSlotBooked();
            break;
        //if 5 happen then it will check is slot being already 
        //booked
        case 5:
            include_once(pateintC.'/getCheck.php');
            $obj=new Check();
            $result = $obj->checkBooked($_REQUEST);
            break;
        //if 6 happen then it will check is slot being already 
        //unavailable
        case 6:
            include_once(pateintC.'/getCheck.php');
            $obj=new Check();
            $result = $obj->checkUnavail($_REQUEST);
            break;
        //if 7 happen then simply access the appoinment 
        //history data for specific pateint
        case 7:
            include_once(pateintC.'/appoinHistoryCode.php');
            $result = getRows();
            break;
        //if 8 happen then simply for getting pateint history data 
        //for specific doctors
        case 8:
            include_once(doctorC.'/pateintHistoryCode.php');
            $result = getHistory($_REQUEST);
            break;
        default:
            die();
    }
    return $result;
?>