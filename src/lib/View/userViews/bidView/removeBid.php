
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
                <th>Time Remained</th>
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
        function hockeytimer(count,counter) {
          count = count - 1;
          sessionStorage.setItem('count', count);

          if (count == -1) {
            clearInterval(counter);
            return;
          }

          var seconds = count % 60;
          var minutes = Math.floor(count / 60);
          var hours = Math.floor(minutes / 60);
          minutes %= 60;
          hours %= 60;

          var time_str = hours + ":h " + minutes + ":m " + seconds + ":s";
          var finalTime;
          <h1 style="background-color:DodgerBlue;">Hello World</h1>
          if(hours==0&&minutes==0&&seconds<2){
            finalTime="<h3 style="background-color:DodgerBlue;"> EXPIRED </h3>";
          }
          else if(hours==0&& minutes <30){
            finalTime="<h3 style="background-color:DodgerBlue;">"+ time_str +"</h3>";
          }
          else {
            finalTime="<h3>time_str</h3>";
          }
          return time_str;

        }
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
                    var url='../../../Controller/mainController.php?redirect='+"bid"+'&tval='+7+'&id='+resp[i].ItemId;
                    var title='Remove';
                    temp="<a href='"+url+"'>"+title+"</a>";
                    var srcImage= "<img src='../../../Model/bidModel/public/images/"+resp[i].ImagePath+"' height='150px' width='300px'>";
                    
                    ///calculating the countdown timer for bids
                    var timeout=resp[i].TimeOut;
                    var date = new Date();
                    var currentTime=date.getHours()+":"+date.getMinutes()+":"+"00";
                    var endTime=timeout.split(":");
                    var remainedHours=endTime[0]-date.getHours();
                    var remainedMinutes=Math.abs(endTime[1]-date.getMinutes());
                    var count = remainedHours*3600+remainedMinutes*60;
                    var counter = setInterval(hockeytimer, 1000);
                    var finalTimeRemained=hockeytimer(count,counter);
                    if(count<2){
                        window.location.href="../../../Model/buyModel/removeEndBids.php?id="+resp[i].ItemId;
                    }
                    else{

                     //putting back to the html table
                    var string = "<tr>" +
                        "<td>" + resp[i].ItemId + "</td>" +
                        "<td>" + resp[i].ItemName + "</td>" +
                        "<td>" + resp[i].Content + "</td>" +
                        "<td>" + srcImage + "</td>" +
                        "<td>" + finalTimeRemained + "</td>" +
                        "<td>" + resp[i].MinPrice + "</td>" +
                        "<td>" + temp + "</td>" +
                        "</tr>";
                    $('#tableBody').append(string);  
                    }
            }
        }
        });

</script>
</html>
