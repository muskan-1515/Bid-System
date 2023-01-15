
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
   
body {
    font-family: 'Poppins',sans-serif;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
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
  <h2>All Bids</h2>
  <<table>
        <thead>
            <tr>
                <th>ItemId</th>
                <th>ItemName</th>
                <th>ItemContent</th>
                <th>Image</th>
                <th>CreatedAt</th>
                <th>EndAt</th>
                <th>Min Price</th>
            </tr>
        </thead>
        <tbody id="tableBody">
        </tbody>
        </table>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var redirect="bid";
    
        $.ajax({
            type:"POST",
            url:"../../../Controller/mainController.php",
             data:{
                redirect:redirect,
                tval:5
            },
            //for storing and showing the reponse of the ajax function 
            success: function(data){
                data=$.trim(data);
                const resp=JSON.parse(data);
                console.log(resp);
                var len = resp.length;
                for(var i=0; i<len; i++){
                    var srcImage= "<img src='../../../Model/bidModel/public/images/"+resp[i].ImagePath+"' height='150px' width='300px'>";
                    // var srcImage2=  "<img src="data:image/jpeg;base64,"+resp[i].ImagePath+""";
                    var string = "<tr>" +
                        "<td>" + resp[i].ItemId + "</td>" +
                        "<td>" + resp[i].ItemName + "</td>" +
                        "<td>" + resp[i].Content + "</td>" +
                        "<td>" + srcImage + "</td>" +
                        "<td>" + resp[i].CreatedAt + "</td>" +
                        "<td>" + resp[i].TimeOut + "</td>" +
                        "<td>" + resp[i].MinPrice + "</td>" +
                        "</tr>";
                $('#tableBody').append(string);
            }
        }
        });

</script>
</html>