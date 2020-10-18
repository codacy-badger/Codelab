

(function($) {
    $.fn.clTable = function(options) {
        var defaults = {
            ajax: false,
            data: false,
        }


        var settings = $.extend(defaults, options);



        var table = $(this);

        var tableContent = $(this).children('.clTableContent');
        var tableHeader = $(table).children('.clTableHeader');
        var tableHeaderCell = $(tableHeader).children('div');
        var tableRow = $(table).children('.clTableRow');
        var tableRowCell = $(tableRow).children('div');


        if (!table.hasClass('clTable')){
            table.addClass('clTable');
        }
        table.addClass('clTable_' + table.attr('id'));

        table.append('<div class="clTableLoader"><div class="lds-rippless"><div></div><div></div></div></div>');
        table.prepend('<div class="clTablePanel">Panel</div>');


        var tableLoader = $(table).children('.clTableLoader');

        if (settings.ajax != false) {


            $.ajax({
                url: settings.ajax.source,
                type: "post",
                data: {
                    'data': settings.data
                } ,
                beforeSend : function (){
                    $(".clTableInfo").remove();
                    tableLoader.show();
                    tableMessage.remove();
                },
                success: function (response) {
                    tableRow.remove();
                    tableHeader.after(response);


                    $(".clTableInfo").html($(".clTableInfoData").html());
                //    $("#filterPage").val($(".clTableInfoPage").html());
                    //$(".clTableInfo").remove();
                    tableLoader.hide();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //console.log(textStatus, errorThrown);
                }
            });

        }

//
//        // Count all table columns
//        var columnsCount = 0;
//
//    //    var cellStandardWidth = [];
//        var columnsCount = 0;
//        tableHeaderCell.each(function( index ) {
//            $(this).addClass('clTableCell');
//            $(this).addClass('clTableCell_' + columnsCount);
//            columnsCount++;
//        });
//        tableRowCell.each(function( index ) {
//            $(this).addClass('clTableCell');
//            $(this).addClass('clTableCell_' + columnsCount);
//            columnsCount++;
//        });
//        tableFooterCell.each(function( index ) {
//            $(this).addClass('clTableCell');
//            $(this).addClass('clTableCell_' + columnsCount);
//            columnsCount++;
//        });
//
    //    //x =  cellStandardWidth.toString();
    //    //document.getElementById("demo").innerHTML = x;
//
//
    //    var columdWith = 100 / columnsCount;
    //    columdWith = columdWith.toFixed(3);
//
    //    cellStandardWidth.forEach(cellStandardForeach);
//
    //    function cellStandardForeach(item, index) {
    //        $('.clTableCell_' + item).css('width', columdWith + '%');
    //    }




    };
}(jQuery));




$(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > 140) {
            $("#clTableFilters").addClass("sticky");
        } else {
            $("#clTableFilters").removeClass("sticky");
        }
});




$(document).on("click","#clTableFilters #clTablePagination .first",function(event) {
    var currentValue = $("#filterPage").val();
    if (currentValue != 1){
        $("#filterPage").val(1);
        $("#clTableFilterButton").click();
    }
});
$(document).on("click","#clTableFilters #clTablePagination .prev",function(event) {
    var currentValue = $("#filterPage").val();
    var currentValue = currentValue - 1;
    if (currentValue > 0){
        $("#filterPage").val(currentValue);
        $("#clTableFilterButton").click();
    }
});
$(document).on("click","#clTableFilters #clTablePagination .next",function(event) {
    var currentValue = $("#filterPage").val();
    var maxValue = $(".clTablePaginationPagesTotal").html();
    var currentValue = parseInt(currentValue) + 1;
    if (currentValue < parseInt(maxValue)){
        $("#filterPage").val(currentValue);
        $("#clTableFilterButton").click();
    }
});
$(document).on("click","#clTableFilters #clTablePagination .last",function(event) {
    var currentValue = $("#filterPage").val();
    var maxValue = $(".clTablePaginationPagesTotal").html();
    if (currentValue != parseInt(maxValue)){
        $("#filterPage").val(maxValue);
        $("#clTableFilterButton").click();
    }
});
