<?php
require_once('../Core/requireFiles.php');
class signupUser{
    function getsignuped(){
    //for letting the dbController file added for building the connection    
    $tobj=new models();
        //putting to the local variable the values that needed for inserting in table
        $name=$_POST['tname'];
        $email=$_POST['temail'];
        $contactinfo=$_POST['tcont'];
        $pass=$_POST['tpass'];
        $age=$_POST['tage'];
        //handling all the exceptions of the validations for server-side 
        $namereg="/^[a-zA-Z ]{2,30}$/";
        $agereg="/^[0-9]{1,2}$/";
        $mobreg='/^[0-9]{10}+$/';
        $emailreg="/^[a-z0-9_%+-]+@[a-z0-9-]+\.[a-z]{2,4}$/";
        $pswreg="/^(?=*[0-9])(?=*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{4,20 }$/";
        if($name==''||!preg_match($namereg,$name)){
          echo 'namef';
          exit();
        }
        else if($age==''||!preg_match($agereg,$age)){
          echo 'agef';
          exit();
        }
        else if($email==''||!preg_match($emailreg,$email)){
          echo 'emailf';
          exit();
        }
        else if($contactinfo==''||!preg_match($mobreg,$contactinfo)){
          echo 'contactf';
          exit();
        }
        else if($pass==''){
          echo 'phonef';
          exit();
        }
        else{
          //chechking for the duplications
          $t1=[&$email];
          $sql=$tobj->selectnestedMulC("*","Email=?","Users",$t1,"s");
          $rows=array();
            while($row=mysqli_fetch_assoc($sql)){
              $rows[]=$row;
            }
            foreach($rows as $row){
              if($row['Email']==$email){
                echo 'Emailex';
                exit();
              }
              if($row['ContactInfo']==$contactinfo){
                echo 'Phoneex';
                exit();
              }
            }
            
              $res=$tobj->insert("Name,Age,Email,Password,ContactInfo","'$name','$age','$email','$pass','$contactinfo'","Users");
              if($res>0){
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