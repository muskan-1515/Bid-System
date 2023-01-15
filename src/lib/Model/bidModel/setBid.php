<?php
require_once('../Core/requireFiles.php');
class bidClass{
    function setBid(){
        $targetDir = __DIR__."/public/images/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if( !empty($_FILES["image"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $currentTime= date('H:i');
                    $obj=new models();
                    $temp=explode(':',$currentTime);
                    $thours=intval($temp[0])+intval($_POST['time'])+5;
                    $tmin=intval($temp[1])+30;
                    $chours=intval($temp[0])+5;
                    $cmin=intval($temp[1])+30;
                    if($tmin>59){
                        $thours=$thours+1;
                        $tmin=$tmin-59;
                    }
                    else if($cmin>59){
                        $chours=$chours+1;
                        $cmin=$cmin-59;
                    }
                    else if($thours>23){
                        $thours=$thours-23;
                    }
                    else if($chours>23){
                        $chours=$chours-23;
                    }

                    $endTime=$thours.":".$tmin;
                    $createTime=$chours.":".$cmin;
                    $price=intval($_POST['price']);
                    $content=$_POST['desp'];
                    $title=$_POST['name']; 
                    $res=$obj->insert("ItemName,Content,ImagePath,CreatedAt,TimeOut,MinPrice","'$title','$content','$fileName','$currentTime','$currentTime','$price'","Items");
                    if($res>0){
                        echo 'true';
                    }
                    else{
                        echo 'false';
                    }
                }
                else{
                    echo 'false';
                }
            }
            else{
               // $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
               echo 'false';
            }
        }
        else{
            echo 'false';
        }

        
        // $url=$_POST['image'];
        // $pos = strrpos($url, '\\');
        // $url = substr_replace($url, '/', $pos, 1);
        // $extension = pathinfo($url, PATHINFO_EXTENSION);
        // $imageStartname=basename($url);
        // $imagePath= "/src/lib/Model/bidModel/uploads/".basename($url);
        // $extensionImage= $extension;
        // $allowTypes = array('jpg','png','jpeg','gif'); 
        // if(in_array($extensionImage, $allowTypes)){ 
        //     $currentTime= date('H:i');
        //     $obj=new models();
        //     $temp=explode(':',$currentTime);
        //     $temp1=intval($_POST['time']);
        //     $thours=$temp[0]+$temp1+5;
        //     $tmin=$temp[1]+30;
        //     $chours=$temp[0]+5;
        //     $cmin=$temp[1]+30;
        //     $endTime=$thours.":".$tmin;
        //     $createTime=$chours.":".$cmin;
        //     $price=$_POST['price'];
        //     $content=$_POST['desp'];
        //     $title=$_POST['name'];
        //     $img=$_POST['image'];
        //     move_uploaded_file($imageStartname,$imagePath);
        //     if(is_uploaded_file($imageStartname)){
        //         var_dump("sdkj");
        //     }
        //     else{
        //         var_dump("njsldnnsdknf");
        //     }
        //     die();
        //     $res=$obj->insert("ItemName,Content,ImagePath,CreatedAt,TimeOut,MinPrice","'$title','$content','$imageName','$createTime','$endTime','$price'","Items");
        //     if($res>0){
        //         echo 'true';
        //     }
        //     else{
        //         echo 'false';
        //     }
        // }
        // else{
        //     echo "imageExtension";
        // }
         
    }
}
?>