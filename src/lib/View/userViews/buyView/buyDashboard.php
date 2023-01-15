
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="sidenav">
<a href="../../../Controller/mainController.php?redirect=buy&tval=10">Buy Bid</a>
  <a href="../../../Controller/mainController.php?redirect=buy&tval=2">Latest Bids</a>
  <a href="../../../Controller/mainController.php?redirect=buy&tval=3">Ending Bids</a>
  <a href="../../../Controller/mainController.php?redirect=buy&tval=4">Holdings</a>
  <a href="../../../Controller/mainController.php?redirect=buy&tval=5">Requested</a>
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
