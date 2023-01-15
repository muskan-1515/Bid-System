<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
   
body {
    font-family: 'Poppins',sans-serif;
}

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
</div>

<div class="main">
  <h2>Set Bid</h2>
  <div class="container">
            <form id="loginForm" enctype="multipart/form-data">
              <label for="name" > Item Name:</label><br>
              <input type="text"  id="name" name="name" placeholder="Name please"><br>
              <label for="desp" >Description:</label><br>
              <textarea id="desp"  name="desp" rows="4" cols="26" placeholder="Content please"></textarea><br>
              <label> Image to upload: </label>
              <input type="file" name="image" id="image" accept="image/*"> <br />
              <label for="timer">Choose End Timer:</label>
                <select name="values" id="timer">
                    <option value=""></option>
                    <option value="2">2 hours</option>
                    <option value="4">4 hours</option>
                    <option value="8">8 hours</option>
                    <option value="12">12 hours</option>
                    <option value="18">18 hours</option>
                    <option value="20">20 hours</option>
                    <option value="24">24 hours</option>
                </select><br>
              <label for="price" >Start Price:</label><br>
              <input type="text" class="container_btn" id="price" name="price" ><br><br>
              <div id="msg"></div>
              <button type="submit" id="logbtn">Submit</button>
            </form>
          </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).on('click','#logbtn',function(event){ 
        event.preventDefault();
        var redirect="bid";
        var itemName=$('#name').val();
        var itemDesp=$('#desp').val();
        var img=$('#image').prop('files')[0];
        var timeOut=$('#timer').val();
        var minPrice=$('#price').val();
        var data=new FormData();
        data.append( 'redirect', redirect );
        data.append( 'name', itemName );
        data.append( 'desp', itemDesp );
        data.append( 'image', img);
        data.append( 'time', timeOut);
        data.append( 'price', minPrice );
        data.append( 'tval', 3 );
        // if(timeOut==''){
        //     timeOut=2;
        // }
        // else if(minPrice==''||minPrice<10){
        //     minPrice=10;
        // }
        // else if(itemName==''){
        //     alert("Item Name must be mentioned!!");
        // }
        // else if(itemDesp==''){
        //     alert("Item should have a description!!");
        // }
        // else if(img==''){
        //     alert("Image should be given!!");
        // }
        // else {
            $.ajax({
              type:"POST",
              url:"../../../Controller/mainController.php",
              // data:{
              //   redirect:redirect,
              //   name:itemName,
              //   desp:itemDesp,
              //   image:img,
              //   time:timeOut,
              //   price:minPrice,
              //   tval:3
              // },
              data :data,
            mimeType: 'multipart/form-data',
            processData: false,
            contentType: false,
                success: function(data){
                   data=$.trim(data);
                   if(data=='true'){
                        alert("Successfully done!!");
                   }
                   else{
                        alert("Retry");
                   }
                }
            });
             $('#loginForm')[0].reset();
        // }
    });
  
</script>
</html>
