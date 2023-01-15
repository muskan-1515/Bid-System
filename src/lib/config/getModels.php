<?php
/*
Author's Name: Muskan Kushwah
Date: 29/12/2022
Purpose: This class models is designed for providing the generic model
for every possible query 
*/
 //including all the required files
 require_once('../Core/requireFiles.php');
 class models{
    public $obj;
    /*
    Author's Name: Muskan Kushwah
    Date: 29/12/2022
    Purpose: This is a constructor for the creating object for dbcontrol class
    */
    function __construct(){
        $this->obj=new dbControl();
    }
    
    /*
    Author's Name: Muskan Kushwah
    Date: 29/12/2022
    Purpose: This function will only select a specific row.
    */
    function select($att,$cond,$name,$array,$type){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
            $cleanArray = [];
            foreach( $array as $val )
                $cleanArray[] = mysqli_real_escape_string( $conn, $val );
            $sql="SELECT  ".$att."  FROM  ".$name."  WHERE  ".$cond;
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt,$type,...$cleanArray);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row=mysqli_fetch_assoc($result);
            $this->obj->destroySession();
            return $row;
        }
    }

    /*
    Author's Name: Muskan Kushwah
    Date: 29/12/2022
    Purpose: This function will only provide selective rows.
    */
    function selectMul($att,$cond,$name){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
            if($cond!=''){
                $sql="SELECT ".$att." FROM ".$name." WHERE ".$cond;
                $res=mysqli_query($conn,$sql);
                $result_array = array();
                while($row = mysqli_fetch_assoc($res)){
                    array_push($result_array, $row);
                }
               $this->obj->destroySession();
            }
            else{
                $sql="SELECT ".$att." FROM ".$name;
                $res=mysqli_query($conn,$sql);
                $result_array = array();
            while($row = mysqli_fetch_assoc($res)){
                array_push($result_array, $row);
            }
            $this->obj->destroySession();
        }
            return $result_array;
        }
    }
    
    /*
    Author's Name: Muskan Kushwah
    Date: 29/12/2022
    Purpose: This function will used for getting selective rows
            with having a nested conditions.
    */
    function selectnestedMulC($att,$cond,$name,$array,$type){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
        $cleanArray = [];
        foreach( $array as $val )
            $cleanArray[] = mysqli_real_escape_string( $conn, $val );
        ###building the prepare statement
        $sql="SELECT ".$att." FROM ".$name." WHERE ".$cond;
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt,$type,...$cleanArray );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $this->obj->destroySession();
        return $result;
        }
    }
    
    /*
    Author's Name: Muskan Kushwah
    Date: 29/12/2022
    Purpose: This function will delete specific row(s) from table
    */
    function delete($cond,$name,$array,$type){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
            if($conn){
            if($cond==''){
                $cleanArray = [];
                foreach( $array as $val )
                $cleanArray[] = mysqli_real_escape_string( $conn, $val );
                ###building the prepare statement
                $sql="DELETE FROM ".$name;
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt,$type,...$cleanArray );
                mysqli_stmt_execute($stmt);
            }
            else{
                $cleanArray = [];
                foreach( $array as $val )
                $cleanArray[] = mysqli_real_escape_string( $conn, $val );
                ###building the prepare statement
                $sql="DELETE FROM ".$name." WHERE ".$cond;
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt,$type,...$cleanArray );
                mysqli_stmt_execute($stmt);
            }
            $this->obj->destroySession(); 
        }
    }
    
    /*
    Author's Name: Muskan Kushwah
    Date: 29/12/2022
    Purpose: This function will update specific row fromtables
    */
    function update($before,$after,$name,$array,$type){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
            $cleanArray = [];
            foreach( $array as $val )
                $cleanArray[] = mysqli_real_escape_string( $conn, $val );
            $sql="UPDATE ".$name." SET ".$before." WHERE ".$after;
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt,$type,...$cleanArray );
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $this->obj->destroySession();
            return $res;
        }
        
    }
    
    /*
    Author's Name: Muskan Kushwah
    Date: 30/12/2022
    Purpose: This function will used for inserting row to the table
    */
    function insert($att,$value,$name){
        $conn=$this->obj->getdbSession();//getting the connection using the object of dbControl class.
        if($conn){
            $sql="INSERT INTO ".$name." ( ".$att." ) VALUES  (".$value." )";
            $res=mysqli_query($conn,$sql);
            $this->obj->destroySession();
            return $res;
        }
        
    }
}

?>