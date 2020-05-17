<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="style/index.css">
        <title>Your Trips</title>
    </head>
    <body>
        
        <h2 class="firstablehead" style="text-align: center;">Your Last Trips</h2>
        <table class="firsttable"> 
            <thead>
                <tr>
                    <th>Trip ID</th>
                    <th>Place</th>
                    <th>Start</th>
                    <th>End</th>
                    <th style="width: 200px;">Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="load-data-here">
            </tbody>
        </table>
        <h2 class="secondtablehead" style="margin-left: 25%;">Insert / Delete Trips</h2>
        <table class="secondtable">
            <tr>
                <td>Trip ID</td>
                <td>:</td>
                <td><input type="text" name="tripID" disabled="disabled" id=""></td>
            </tr>
            <tr>
                <td>Place</td>
                <td>:</td>
                <td><input type="text" name="place"></td>
            </tr>
            <tr>
                <td>Start</td>
                <td>:</td>
                <td><input type="date" name="start"></td>
            </tr>
            <tr>
                <td>End</td>
                <td>:</td>
                <td><input type="date" name="end"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">
                    <button onclick="insertTrip()">Insert Trip</button>
                    <button onclick="deleteTrip()">Delete Trip</button>
                </td>
            </tr>
                <p id="errorMessageHere"></p>
        </table>
        <script>
            function changeColor(o){
                o.style.backgroundColor=(o.style.backgroundColor=='red')?('transparent'):('red');
            }
        </script>
        <script type="text/javascript" src="scripts/jquery.js"></script>
        <script type="text/javascript">
            loadTrip();
            
            $(document).on("click",".selectTrip",function(){
                var tripID = $(this).attr("id");
                
                $.ajax({
                    type : "POST",
                    data : "tripID="+tripID,
                    url : "getDataTrip.php",
                    success : function(result){
                        var resultObj = JSON.parse(result);
                    $("[name='tripID']").val(resultObj.tripID);
                    $("[name= 'place']").val(resultObj.place);
                    $("[name='start']").val(resultObj.start);
                    $("[name='end']").val(resultObj.end);
                    $("[name='description']").val(resultObj.description);
                    }
                });
            });
            
            function deleteTrip(){
                var tripID = $("[name='tripID']").val();
                $.ajax({
                    type : "POST",
                    data : "tripID="+tripID,
                    url : "deleteTrip.php",
                    success : function(result){
                        loadTrip();
                    }
                });
            }
            function insertTrip(){
                var place = $("[name = 'place']").val();
                var start= $("[name = 'start']").val();
                var end = $("[name = 'end']").val();
                var description= $("[name = 'description']").val();
                $.ajax({
                    type : "POST",
                    data : "place="+place+"&start="+start+
                    "&end="+end+"&description="+description,
                    url : "insertTrip.php",
                    success : function(result){
                        var resultObj = JSON.parse(result);
                        $("#errorMessageHere").html(resultObj.message);
                        loadTrip();
                    }
                })
            }
            
            function loadTrip(){
                var dataHandler = $("#load-data-here");
                dataHandler.html("");
                $.ajax({
                    type : "GET",
                    data : "",
                    url : "getTrip.php",
                    success : function(result){
                        var resultObj = JSON.parse(result);
                        $.each(resultObj,function(key,val){
                            var newRow = $("<tr>");
                            newRow.html("<td>"+val.tripID+"</td><td>"+val.place+"</td><td>"
                            +val.start+"</td><td>"+val.end+"</td><td>"+val.description+
                            "</td><td><button class='selectTrip' id='"+val.tripID+"'>Select</button></td>");
                            dataHandler.append(newRow);
                        })
                    }
                })
            }
       
       </script>
       </body>
       </html>