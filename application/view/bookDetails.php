<div id="baform" class="block">
	<div class="block-title">
		<h2><strong>Book Details</strong></h2>
	</div>
	<div class="row">
		<div id="example-datar" class="table-responsive" >
			<table id="example-datatableBookDetails" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
				<thead>
					<tr>
						<th>#</th>
						<th>Book Status</th>
                                                <th>Name</th>
					</tr>
				</thead>
				<tbody>
               				<!--?php $i=1;foreach($bookDetails as $eachbookDetail){
//                                            echo 'hellooo allll';
//					echo "<tr id='B".$eachbookDetail->id."'><td>".$i."</td><td>".$eachbookDetail->bookstatus."</td><td>".$eachbookDetail->name."</td>";
//                                        $i=$i+1;
				}?-->	<?php $i=1;foreach($bookDetails as $bookDetails){
                                            echo "$bookDetails[i]->id ";
                                }
                                        //echo "<tr id='B".$eachbookDetail->id."'><td>1</td></tr>";
                                ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
