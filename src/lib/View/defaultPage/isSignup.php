<?php 
require_once('../Core/requireFiles.php');
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
  height: 40%;
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
  height: 40%;
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
          <div class="container">
          <form id="signupForm" >
            <label for="name">Name:</label><br>
            <input type="text" class="container_btn" id="name" name="name" placeholder="Name please" value="<?php echo (!empty($_GET['name']) ? $_GET['name'] : '');?>"><br>
            <label for="age">Age:</label><br>
            <input type="text" class="container_btn" id="age" name="age" placeholder="Age please" value="<?php echo (!empty($_GET['name']) ? $_GET['age'] : '');?>"><br>
            <label for="email">Email:</label><br>
            <input type="text" class="container_btn" id="email" name="email" placeholder="Email please" value="<?php echo (!empty($_GET['email']) ? $_GET['email'] : '');?>"><br><br>
            <label for="contInfo">Contact: </label><br></label><br>
            <input type="text" class="container_btn" id="contInfo" name="contInfo" placeholder="Contact please" value="<?php echo (!empty($_GET['contInfo']) ? $_GET['contInfo'] : '');?>"><br><br>
            <label for="pass">Password: </label><br>
            <input type="password" class="container_btn" id="pass" name="pass" value="" value="<?php echo (!empty($_GET['pass']) ? $_GET['pass'] : '');?>"><br><br>
            <div class="btns">
              <button type="submit" id="subbtn">Submit</button>
              </div>
        </form> 
<div id="response_sign"></div>
          </div>
        </div>
      </div>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    // this ajax function mainly handling the client-side validation
    // and also performing the redirection from one page to another 
    // after validation
    $(document).on('click','#subbtn',function(event){
        event.preventDefault();
        var redirect="default";
        var email=$('#email').val();
        var age=$('#age').val();
        var psw=$('#pass').val();
        var name=$('#name').val();
        var cntinfo=$('#contInfo').val();
        var atpos=email.indexOf('@');
        var dotpos=email.lastIndexOf('.com');
        var dotpos2=email.lastIndexOf('.in');
        if(name==''){
            alert('Name cant be empty!!!');
        }
        else if(name!=name.match(/^[a-zA-Z .]{2,30}$/)){
         alert('Enter a valid Name!!!');
        }
        else if(age==''){
            alert('Age cant be empty!!!');
        }
        else if(age!=age.match(/^[0-9]{1,2}$/)){
            alert('Enter a valid Age!!!');
        }
        else if(email==''){
            alert('Email cant be empty!!!');
        }
        else if(email!=email.match(/^[a-zA-Z0-9_%]+@[a-zA-Z0-9]+\.[a-z]{2,4}$/)){
            alert('Follow the pattern for email!!');
        }
        else if(cntinfo!=cntinfo.match("[0-9]+")||cntinfo.length<10||cntinfo.length>10){
            alert("Invalid Contact Info");
        }
        else if(psw==""){
            alert("Password cannot be empty !!!");
        }
        else if(psw!=psw.match(/^(?=.*[0-9])(?=.*[!@$%^&*])[a-zA-Z0-9!@$%^&*]{4,20}$/)){
            alert("Password must be strong !!!");
        }
        else if(psw.length<4){
            alert("Password must be of length 4 !!!");
        }
        else{
            $.ajax({
                type:"POST",
                url:"../../Controller/mainController.php",
                data:{
                    redirect:redirect,
                    tname:name,
                    tage:age,
                    temail:email,
                    tpass:psw,
                    tcont:cntinfo,
                    tval:1
                },
                //for storing and showing the reponse of the ajax function
                success: function(data){
                    data=$.trim(data);
                    if(data=='namef'){
                      alert('Enter a valid name!!');
                    }
                    else if(data=='agef'){
                        alert('Enter a valid Age!!');
                    }
                    else if(data=='emailf'){
                        alert('Enter a valid Email!!');
                    }
                    else if(data=='contactf'){
                        alert('Enter a valid Contact!!');
                    }
                    else if(data=='passf'){
                        alert('Enter a valid and string Password!!');
                    }
                    else if(data=='Emailex'){
                        alert('This Email already exists!!!!');
                    }
                    else if(data=='Phoneex'){
                        alert('This Contact already exists!!!!');
                    }
                   else if(data=='false'){
                    alert("Retry!!!");
                   }
                   else if(data=='true'){
                    window.location.href="./View/userView/defaultPage.php"; 
                   }
                } 
            });
            //reseting back the form if validation were not proper
            $('#signupForm')[0].reset();
        }
    });
</script>
</html>