<?php include 'application/view/fx_commonhead.php'; ?>            
<?php include 'application/view/fx_sidebar.php'; ?>
<head>
    <meta charset="utf-8">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function () {
            $("#datepicker").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                minDate: 0, maxDate: "+1D",
                dateFormat: 'yy-mm-dd',
                showOn: "button",
                buttonImage: "assets/img/date-picker.gif",
                buttonImageOnly: true,
                buttonText: "Select date"});
            $("#room_id").selectmenu({
                change: function (event, data) {
                    //$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd");
                    var date = $("#datepicker").datepicker("getDate");
                    var room_id = data.item.val;
                    //String url = "index.php?op=reserveRoomS?room_id="+room_id+"&date="+date; 
                }
            });
            $("#time_slot").selectmenu();
        });

    </script>
</head>
<div id="main-container">	
    <header class="navbar navbar-default navbar-fixed-top">
        <!-- Navbar Header -->
        <div>
            <div style="float:left;width:50px">
                <ul class="nav navbar-nav-custom">
                    <li>
                        <a onclick="App.sidebar('toggle-sidebar');" href="javascript:void(0)">
                            <i class="fa fa-bars fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div style="float:left;text-align:center;font-size: 30px;line-height: 50px;"> UNCC Library </div>
            <div style="float:right;width:50px;padding:16px"><a href="index.php?op=logout" 
                                                                data-toggle="tooltip" data-placement="bottom"
                                                                title="Logout"><i class="gi gi-exit"></i></a></div>
        </div>
    </header>
    <div class="col-md-12" style="margin-top:35px;background-color: white">
        <!--<div class="row">
                            <div class="col-md-4" style="text-align:center">
                                <a href="index.php?op=studyroom"><img src="assets/img/amblogo.png"/></a>
                <div>Reserve A Study Room</div>
                                    <div><span> # Total Rooms : </span><span><?php echo "25"; ?></span></div>
                                    <div><span> # Available Rooms : </span><span><?php echo "5"; ?></span></div>
                            </div>
                            <div class="col-md-4" style="text-align:center">
                                <a href="index.php?op=iroom"><img src="assets/img/amblogo.png"/></a>
                <div>Reserve A Room</div>
                                    <div><span> # Total Rooms : </span><span><?php echo "25"; ?></span></div>
                                    <div><span> # Available Rooms : </span><span><?php echo "5"; ?></span></div>
                            </div>
                            <div class="col-md-4" style="text-align:center">
                                <a href="index.php?op=event"><img src="assets/img/amblogo.png"/></a>
                <div>Reserve Space For Events</div>
                                    <div><span> # Total Rooms : </span><span><?php echo "25"; ?></span></div>
                                    <div><span> # Available Rooms : </span><span><?php echo "5"; ?></span></div>
                            </div>
                    </div> -->
        <form action="index.php?op=roomSuccess" class="col-md-12" style="margin-top:35px;background-color: white">
            <!--Room Type:<br>
            <input type="radio" name="roomtype" value="Gstudy" checked>Group Study <&nbsp;
            <input type="radio" name="roomtype" value="Iroom">I Room <&nbsp;
            <input type="radio" name="roomtype" value="Event">Reserve for an Event
            -->

            <br>
            Date:<br>
            <input type="text" id="datepicker"><br>
            Room:<br>
            <select id="room_id" onselect="getAvailabletimeSlots()">
                <?php
                foreach ($rooms as $room) {
                    echo "<option value='$room->Room_Id'> Floor:$room->floor Capacity:$room->capacity</option>";
                }
                ?>
            </select><br>
            Time Slot:<br>
            <select name='time_slot' id="time_slot">
                <option value=="1">09:00:00 to 12:00:00</option>
                <option value=="2">12:00:00 to 15:00:00</option>
                <option value=="3">15:00:00 to 18:00:00</option>
                <option value=="4">18:00:00 to 21:00:00</option>
            </select>
            <br>
            <input type="submit" value="Submit"><br><br>
        </form>
    </div>
</div>    
</div>
</body>
</html>