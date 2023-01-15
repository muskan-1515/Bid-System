<?php
require_once('../Core/requireFiles.php');
class loginUser{
//This is the function that accessing the database connection 
//and chechking the database for logging in.
    function getlogged(){
        
        //getting the connection using the object of dbControl class.
        $ob=new models();
        //putting to the local variable the values that needed for inserting in table
        $email=$_POST['temail'];
        $pass=$_POST['tpass'];
        //handling all the exceptions of the validations for server-side 
        $emailreg="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";
        $pswreg="/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{4,20}$/";
        if($email=='' || !preg_match($emailreg,$email)){
            echo 'notvalidemail';
        }
        else if($pass==''||!preg_match($pswreg,$pass)){
            echo 'notvalidpass';
        }
        else{
            $obj=new dbControl();
            $conn=$obj->getdbSession();
            $array =[ &$email,&$pass];
            $row=$ob->select("*","Email=? AND Password=?","Users",$array,"ss");
            if($row){
                $_SESSION['Email']=$email;
                session_commit();
                echo 'true';
            }
            else{
                echo 'false';
            }
        }
    }
}

?>