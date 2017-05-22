/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatablesr = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            $('#example-datatabler').dataTable({
                "aoColumnDefs": [ { "bSortable": true, "aTargets": [  ] } ],
				"iDisplayLength": 10,
				"order": [ 4, 'desc' ],
                "aLengthMenu": [[10, 20, 50,100,250, -1], [10, 20, 50,100,250, "All"]]
            });
			
            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');
        }
    };
}();