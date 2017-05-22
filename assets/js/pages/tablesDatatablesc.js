/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatablesc = function() {
	
    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();
			//alert("in init3");
			//$('#example-datatablec').html("");
            /* Initialize Datatables */
            $('#example-datatablec').dataTable({				
                "aoColumnDefs": [ { "bSortable": true, "aTargets": [  ] } ],
				"iDisplayLength": 10,
				"order": [ 4, 'desc' ],
                "aLengthMenu": [[10, 20, 50,100,250, -1], [10, 20, 50,100,250, "All"]]
            });
			//alert("in init4");
            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');
        }
    };
}();
