<?php
 /*Author's Name: Muskan Kushwah
 Date: 30/12/2022
 Purpose:this will be the main page showing the flow of management 
  system.
*/
 include_once('./Core/requireFiles.php');
 if(isset($_SESSION['Email'])){
    header("Location:./View/defaultPage.php");
 } 
include_once('./Core/requireFiles.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
::selection{
  color: #000;
  background: #fff;
}
nav{
  position: fixed;
  background: #1b1b1b;
  width: 100%;
  padding: 10px 0;
  z-index: 12;
}
nav .menu{
  max-width: 1250px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
}
.menu .logo a{
  text-decoration: none;
  color: #fff;
  font-size: 35px;
  font-weight: 600;
}
.menu ul{
  display: inline-flex;
}
.menu ul li{
  list-style: none;
  margin-left: 7px;
}
.menu ul li:first-child{
  margin-left: 0px;
}
.menu ul li a{
  text-decoration: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  padding: 8px 15px;
  border-radius: 5px;
  transition: all 0.3s ease;
}
.menu ul li a:hover{
  background: #fff;
  color: black;
}
.img{
  background: url('img3.jpg')no-repeat;
  width: 100%;
  height: 100vh;
  background-size: cover;
  background-position: center;
  position: relative;
}
.img::before{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.4);
}
.center{
  position: absolute;
  top: 52%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  padding: 0 20px;
  text-align: center;
}
.center .title{
  color: #fff;
  font-size: 55px;
  font-weight: 600;
}
.center .sub_title{
  color: #fff;
  font-size: 52px;
  font-weight: 600;
}
.center .btns{
  margin-top: 20px;
}
.center .btns button{
  height: 55px;
  width: 170px;
  border-radius: 5px;
  border: none;
  margin: 0 10px;
  border: 2px solid white;
  font-size: 20px;
  font-weight: 500;
  padding: 0 10px;
  cursor: pointer;
  outline: none;
  transition: all 0.3s ease;
}
.center .btns button:first-child{
  color: #fff;
  background: none;
}
.btns button:first-child:hover{
  background: white;
  color: black;
}
.center .btns button:last-child{
  background: white;
  color: black;
}

  </style>
<body>
  <nav>
    <div class="menu">
    </div>
  </nav>
  <div class="img"></div>
  <div class="center">
    <div class="title">Biding System</div>
    <div class="sub_title">....</div>
    <div class="btns">
      <button type="submit" id="sig_btn">Signup</button>
      <button type="submit" id="log_btn">Login</button>
    </div>
  </div>
</body>
<script>
  //jquery function for redirecting to the page according to the click buttons
    document.getElementById("sig_btn").addEventListener("click",redirectFunc1);
    function redirectFunc1(){
        window.location.href="./Controller/mainController.php?redirect=default&tval=3";
    }
    document.getElementById("log_btn").addEventListener("click",redirectFunc2);
    function redirectFunc2(){
        window.location.href="./Controller/mainController.php?redirect=default&tval=4";
    }
</script>
</html>
