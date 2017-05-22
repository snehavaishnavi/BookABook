<div id="baform" class="block">
	<div class="block-title">
		<h2><strong>Subjects</strong></h2>
	</div>
	<div class="row">
		<div id="example-dataS" class="table-responsive" >
			<table id="example-datatableSub" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;foreach($subjects as $subject){
						echo "<tr id='S".$i."' onclick='loadBooks(\"".$subject->id."\")'><td>".$subject->id."</td><td>".$subject->name."</td></tr>";
						$i=$i+1;
					}?>			
				</tbody>
			</table>
		</div>
	</div>
</div>

