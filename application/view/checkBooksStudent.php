<div> Page 3 </div><?php include 'application/view/fx_commonhead.php'; ?>            
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
				<div class="col-md-4" id="departmentsTable" style="padding-top:10px">
					<div id="baform" class="block">
						<div class="block-title">
							<h2><strong>Books</strong></h2>
						</div>
						<div class="row">
							<div id="example-dataD" class="table-responsive" >
								<table id="example-datatableDept" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>					
										</tr>
									</thead>
									<tbody>
										<?php $i=1;foreach($depts as $dept){
											echo "<tr id='D".$dept->id."' onclick='loadSubjects(\"".$dept->id."\")'><td>".$i."</td><td>".$dept->name."</td></tr>";
											$i=$i+1;
										}?>			
									</tbody>
								</table>
							</div>				
						</div>
					</div>
				</div>
				<div class="col-md-4" id="subjectsTable" style="padding-top:10px"></div>  
				<div class="col-md-4" id="booksTable" style="padding-top:10px"></div>  
			</div>
			<div class="row">
				<div class="col-md-12" id="transactionsTable"></div>  
			</div>
        </div>
    </div>    

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/app.js"></script>	
<script src="assets/js/appInitializer.js" type="text/javascript"></script>	
<script src="assets/js/datatable.js"></script>
<script>$('#example-datatableDept').DataTable();</script>
<script>
	function loadSubjects(deptId){
		$('#subjectsTable').html("");
		$.get('index.php?op=getSubjectsView&dept=' + deptId, function(data) {
			$('#subjectsTable').html(data);
			$('#example-datatableSub').DataTable();
		});
	}
	function loadBooks(subId){
		$('#booksTable').html("");
		$.get('index.php?op=getBooksView&sub=' + subId, function(data) {
			$('#booksTable').html(data);
			$('#example-datatableBook').DataTable();
		});
	}
	function updateLoan(bookId){
		$('#booksTable').html("");
		$.get('index.php?op=getUpdateLoan&bookId=' + bookId, function(data) {
			//$('#booksTable').html(data);
                        window.location = "index.php?op=loanSuccess";
			//$('#example-datatableBook').DataTable();
		});
	}
</script>
</body>
</html>
