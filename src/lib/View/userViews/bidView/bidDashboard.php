<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
   
body {
    font-family: 'Poppins',sans-serif;
}
table, th, td {
  border: 1px solid black;
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
  <a href="../../../Controller/mainController.php?redirect=bid&tval=2">Set Bid</a>
  <a href="../../../Controller/mainController.php?redirect=bid&tval=4">All Bid</a>
  <a href="../../../Controller/mainController.php?redirect=bid&tval=6">Remove Bid</a>
</div>

<div class="main">
  <h2>Bid Dashboard</h2>
  <button type="submit" id="user_btn">Users</button>
  <button type="submit" id="log_out">Logout</button>
  <div id="section" style="display: none">
    <div >
        <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody id="tableBody">
        </tbody>
        </table>
        <button type="submit" id="hide_btn">Hide</button>
    </div>
  </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var redirect="bid";
    $(document).on('click','#hide_btn',function(event){ 
        document.getElementById("section").style.display ="none";
        document.getElementById("tableBody").innerHTML = "";
    });
    $(document).on('click','#log_out',function(event){ 
        window.location.href="../../../Model/defaultModel/getLogout.php";
    });
    $(document).on('click','#user_btn',function(event){ 
        event.preventDefault();
        document.getElementById("section").style.display ="block";
       $.ajax({
            type:"POST",
            url:"../../../Controller/mainController.php",
             data:{
                redirect:redirect,
                tval:1
            },
            //for storing and showing the reponse of the ajax function 
            success: function(data){
                data=$.trim(data);
                const resp=JSON.parse(data);
                var len = resp.length;
                for(var i=0; i<len; i++){
                var string = "<tr>" +
                        "<td>" + resp[i].Name + "</td>" +
                        "<td>" + resp[i].Age + "</td>" +
                        "<td>" + resp[i].Email + "</td>" +
                        "<td>" + resp[i].ContactInfo + "</td>" +
                        "</tr>";
                $('#tableBody').append(string);
            }
        }
        });
    });
</script>
</html>
