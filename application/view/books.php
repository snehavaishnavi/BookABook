<div id="baform" class="block">
    <div class="block-title">
        <h2><strong>Books</strong></h2>
    </div>
    <div class="row">
        <div id="example-datar" class="table-responsive" >
            <table id="example-datatableBook" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($books as $book) {
                        if ($book->bookstatus == 1) {
                            echo "<tr id='B" . $book->id . "'><td>" . $i . "</td><td>" . $book->name . "</td>";
                            echo "<td><img id='success' onclick='updateLoan(\"" . $book->id . "\")' src='assets/img/green.png' width='25px' height='25px'></td></tr>";
                        }
//                                        

                        $i = $i + 1;
                    }
                    ?>			
                </tbody>
            </table>
        </div>
    </div>
</div>



</body>
</html>
