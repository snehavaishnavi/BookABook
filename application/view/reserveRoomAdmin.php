<?php include 'application/view/fx_commonhead.php'; ?>            
<?php include 'application/view/fx_sidebar.php';?>
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
                <div style="float:right;width:50px;padding:16px"><a href="index.php?op=logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a></div>
            </div>
        </header>
        <div class="col-md-12" style="margin-top:35px;background-color: white">
            <div class="row">
				<div class="col-md-4" style="text-align:center">
					<img src="assets/img/rooms.png" style="margin:35px 0px"/>
                    <div>Individual Study Rooms</div>
					<div><span> # Total Rooms : </span><span><?php echo "20"; ?></span></div>
					<div><span> # Available Rooms : </span><span><?php echo "8"; ?></span></div>
				</div>
				<div class="col-md-4" style="text-align:center">
                                    <img src="assets/img/group study.png" height="180px" width="180px" style="margin:35px 0px"/>
                    <div>Group Study</div>
					<div><span> # Total Rooms : </span><span><?php echo "25"; ?></span></div>
					<div><span> # Available Rooms : </span><span><?php echo "16"; ?></span></div>
				</div>
				<div class="col-md-4" style="text-align:center">
					<img src="assets/img/multipurposerooms.png" style="margin:35px 0px"/>
                    <div>Events</div>
					<div><span> # Total Rooms : </span><span><?php echo "15"; ?></span></div>
					<div><span> # Available Rooms : </span><span><?php echo "13"; ?></span></div>
				</div>
			</div>
        </div>
    </div>    
</body>
</html>
