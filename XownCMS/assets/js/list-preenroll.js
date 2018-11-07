$(document).ready(function() {
    $('#example').dataTable({
    	"language": {
    		"lengthMenu": "_MENU_"
    	},
      "fixedHeader": {
            header: true
        },
		
		"columnDefs": [ {
			"targets": 0,
			"orderable": false,
			"searchable": false
			
		} ],
		'aaSorting': [[1, 'asc']]
    });
    $('.dataTables_filter input').attr('placeholder','Search...');


    //DOM Manipulation to move datatable elements integrate to panel
	$('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
	$('.panel-ctrls').append("<i class='separator'></i>");
	$('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");

	$('.panel-footer').append($(".dataTable+.row"));
	$('.dataTables_paginate>ul.pagination').addClass("pull-right m-n");

    $('#checkall').click(function(e){
        if ($(this).is(':checked')) {
            $(".echeck").prop('checked', true);
        }
        else{
            $(".echeck").prop('checked', false);
        }
    });

    $('.echeck').click(function(e){
        $all = false;
        $('.echeck').each(function(){
            if (!$(this).is(':checked')) {
                $all = true;
            }
        });
        
        if(!$all){
            $("#checkall").prop('checked', true);
        }
        else{
            $("#checkall").prop('checked', false);
        }
    });

});
