//$( "#teamTable" ).clTable();

$('#clTableTest_zero').DataTable({
      "searching": false
});

   var pageTableElement = $('#teamTable');
   var pageTable =  pageTableElement.DataTable({
		bProcessing: true,
        paging:   true,
		serverSide: true,
        ordering: true,
        info:     true,
		stateSave: true,
		select: true,
        searching: false,
		columnDefs: [
			{
				"targets": [1,2,5,6],
				"bSortable": false
			}
		],

		"ajax":{
			url: engineURL + "/pages/team/list/ajaxTable.php",
			type: "post",
				"data": function ( data ) {
					data.search = $("#filterSearch").val(),
					data.status = $("#filterStatus").val()
				}
		},

		"fnDrawCallback": function () {
    		pageTableElement.on( 'click', 'tr', function () {
    			setTimeout(function(){
    				var countSelected = pageTableElement.find('tr.selected').length;
                    $("#clTPageableSelectedCount").html(countSelected);
                    if (countSelected > 1 ){
                        	var ids = $.map(pageTable.rows('.selected').data(), function (item) {
                        		return item[0]
                        	});
                            $( ".pageTable_mass a" ).each(function( index ) {
                              $(this).attr('href', $(this).attr('src') + ids);
                            });
                            $(".pageTable_mass").show();
                        } else {
                            $(".pageTable_mass").hide();
                    }
    			},100);
    		});
		},
	});


    $("#filterSearch").on('keypress',function(e) {

    });
    $(document).on("keypress","#filterSearch",function(event) {
        if(event.which == 13) {
            pageTable.ajax.reload();
        }
    });


    $(document).on("click","#filterButton",function(event) {
        pageTable.ajax.reload();
    });



//    $("#filterStatus").on('change',function(e) {
////        pageTable.ajax.reload();
//    });
