<?php
require_once('../Core/requireFiles.php');
include_once('./Core/requireFiles.php');
if(unset($_SESSION['Email'])){
   header("Location:../../index.php");
} 
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

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  height: 10%;
  width: 15%;
  top: 52%;
  left: 60%;
  transform: translate(280%, 3%);
}
.container_btn{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
  height: 40px;
  width: 74%;
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
  border-radius: 5px;
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
      <h1>Login form</h1>
    </div>
  </nav>
  <div class="img"></div>
      <div class="center">
        <div class="title">Login Form</div>
          <div class="container">
            <form id="loginForm">
              <label for="email" >Email:</label><br>
              <input type="text" class="container_btn" id="email" name="email" placeholder="Email please"><br>
              <label for="pass" >Password:</label><br>
              <input type="password" class="container_btn" id="pass" name="pass" value=""><br><br>
              <div id="msg"></div>
              <div class="btns">
              <button type="submit" id="logbtn">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  var response="";
    $(document).on('click','#logbtn',function(event){ 
        event.preventDefault();
        var redirect="default";
        var email=$('#email').val();
        var psw=$('#pass').val();
        var atpos=email.indexOf('@');
        var dotpos=email.lastIndexOf('.com');
        if(email==''){
            alert(' Email cant be Empty!!');
        }
        else if(email!=email.match(/^[a-zA-Z0-9_%]+@[a-zA-Z0-9]+\.[a-z]{2,4}$/)){
            alert('Email is not valid!!');
        }
        else if(psw==''){
            alert("Password cant be empty !!!")
        }
        else if(psw!=psw.match(/^(?=.*[0-9])(?=.*[!@$%^&*])[a-zA-Z0-9!@$%^&*]{4,20}$/)){
            alert("Password must be strong !!!");
        }
        else{
            $.ajax({
                type:"POST",
                url:"../../Controller/mainController.php",
                data:{
                    redirect:redirect,
                    temail:email,
                    tpass:psw,
                    tval:2
                },
                //for storing and showing the reponse of the ajax function 
                success: function(data){
                   data=$.trim(data);
                   if(data=='true'){
                    window.location.href="../View/userViews/defaultPage.php";
                   }
                   else if(data=='notvalidpass'){
                      alert("Enter a strong password.");
                   }
                   else if(data=='notvalidemail'){
                    alert("Enter a valid email.");
                   }
                   else{
                    alert("Wrong Credentials!!");
                   }
                 }
            });
            //reseting back the form if validation were not proper
            $('#loginForm')[0].reset();
        }
    });
</script>
</html>