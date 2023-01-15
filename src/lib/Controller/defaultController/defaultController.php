<?php
function checkDefault(){
    switch($_REQUEST['tval']){
        case 2:
            include_once("../Model/defaultModel/getLogin.php");
            $obj=new loginUser();
            $result=$obj->getlogged($_REQUEST);
            break;
        case 1:
            include_once("../Model/defaultModel/getSignup.php");
            $obj=new signupUser();
            $result=$obj->getsignuped($_REQUEST);
            break;
        case 4:
            include_once("../View/defaultPage/isLogin.php");
            break;
        case 3:
            include_once("../View/defaultPage/isSignup.php");
            break;
    }
    return $result;
}
?>