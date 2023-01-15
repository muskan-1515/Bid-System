
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="sidenav">
</div>

<div class="main">
  <h2>Latest Bids</h2>
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
    var redirect="buy";
    
        $.ajax({
            type:"POST",
            url:"../../../Controller/mainController.php",
             data:{
                redirect:redirect,
                tval:8
            },
            //for storing and showing the reponse of the ajax function 
            success: function(data){
                console.log(data);
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