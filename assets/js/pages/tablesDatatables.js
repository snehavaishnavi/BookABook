/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();
			//alert("in init3");
            /* Initialize Datatables */            
			$('#example-datatableDept').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
			$('#example-datatableSub').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
			$('#example-datatableBook').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
			$('#example-datatableTrans').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
			//alert("in init4");            
        }
    };
}();