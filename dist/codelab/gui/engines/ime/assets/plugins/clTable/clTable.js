

(function($) {
    $.fn.clTable = function(options) {
        var defaults = {
            columns: false,
            ordering: false
        }


        // Define global variables
        var settings = $.extend(defaults, options);
        var table = $(this);


        // Add class 'clTable'
        if (!table.hasClass('clTable')){
            table.addClass('clTable');
        }
        // Add class 'clTable_{ID}'
        table.addClass('clTable_' + table.attr('id'));

        // Create loader
        table.append('<div class="clTableLoader"><div class="lds-rippless"><div></div><div></div></div></div>');


    // ######################################
    // COLUMNS
    // ######################################

        // Check if colums set if settings
        var tableColumns = table.children('.clTableColumns');
        // get columns from settings

        // Create folumns if not exists
        if(!tableColumns.length)
        {
            table.prepend('<div class="clTableColumns"></div>');
            var tableColumns = table.children('.clTableColumns');
        }
        var tableColumns = table.children('.clTableColumns');
        // Load columns from JS data
        if (settings.columns != false){
            tableColumns.html('');
            var index = 0;
            $.each(settings.columns, function (i) {
                var headerCellLabel = settings.columns[i].label;
                if (typeof headerCellLabel === "undefined") {
                    headerCellLabel = i;
                }
                var headerCellClass = settings.columns[i].class;
                var headerCellClassOutput = '';
                if (typeof headerCellClass !== "undefined") {
                    headerCellClassOutput = headerCellClass;
                }

                tableColumns.append('<div class="clTableColumn  clTableColumn_' + index  + ' ' + headerCellClassOutput + '">' + headerCellLabel  + '</div>');
                index++;
            });

            //function myFunction(item, index) {
            //    alert(item);
            //  document.getElementById("demo").innerHTML += index + ":" + item + "<br>";
            //    }
        }
        var  index = 0;
        $(table).find('.clTableColumns > div').each(function(){
            var thisone = $(this);
            if (!thisone.hasClass('clTableColumn')){
                thisone.addClass('clTableColumn');
            }
            if (!thisone.is('[class^=clTableColumn_]')){
                thisone.addClass('clTableColumn_' + index);
            }
            if (settings.ordering != false){
                if ($.inArray(index, settings.ordering) > -1 ) {
                    $(this).addClass('clTableColumn_hasOrdering');
                    $(this).prepend( '<div class="clTableColumnOrdering"><div class="clTableColumnOrdering_top"></div><div class="clTableColumnOrdering_bottom"></div></div>');
                }
            }

            index++;
        });



//        var headerCellOrder = settings.columns[i].order;
//        var headerCellOrderOutput = '';
//        if (headerCellOrder == true){
//
//            if (headerCellOrder == true) {
//                headerCellOrderOutput = '<div class="clTableColumnRow_order"><div class="clTableColumnRow_orderTop"></div><div class="clTableColumnRow_orderBottom"></div></div>';
//            }
//        }








        var tableData = table.children('.data');
        if (settings.source == 'data'){
            if(tableData.length)
            {
                tableData.html('');
            } else {
                tableData.prepend('<div class="clTableData"></div>');
            }
        }


//        if (settings.columns != false){
//
//
//            $.each(settings.columns, function (i) {
//                var headerCellLabel = settings.columns[i].label;
//                if (typeof headerCellLabel === "undefined") {
//                    headerCellLabel = i;
//                }
//                var headerCellSize = settings.columns[i].size;
//                var headerCellSizeOutput = '';
//                if (typeof headerCellSize !== "undefined") {
//                    headerCellSizeOutput = ' style="width:' + headerCellSize + '%" ';
//                }
//                var headerCellOrder = settings.columns[i].order;
//                var headerCellOrderOutput = '';
//                if (headerCellOrder == true) {
//                    headerCellSizeOutput = '<>';
//                }
//                tableColumns.append('<div' + headerCellSizeOutput + '>' + headerCellLabel + headerCellOrderOutput + '</div>');
//            //    //    $.each(settings.columns[i], function (key, val) {
//            //        table.prepend('<div class="columns">' + key + '</div>');
//                //    alert(key + val);
//        //        });
//            });
//
//            function myFunction(item, index) {
//                alert(item);
//            //  document.getElementById("demo").innerHTML += index + ":" + item + "<br>";
//            }
//
//        }
//


        //var tablePanelContent = [
        // '<div class="clTablePanel">',
        //    '<div class="clTablePanel_item">',
        //        '<label>Display</label>',
        //        '<select id="filterLimit" class="inp">',
        //            '<option value="5">5</option>',
        //            '<option value="10" selected>10</option>',
        //            '<option value="25">25</option>',
        //            '<option value="50">50</option>',
        //            '<option value="100">100</option>',
        //        '</select>',
        //    '</div>',
        // '</div>'].join("\n");
//
//
        //table.prepend(tablePanelContent);


        var tableLoader = $(table).children('.clTableLoader');













//        if (settings.ajax != false) {
//            $.ajax({
//                url: settings.ajax.source,
//                type: "post",
//                data: settings.data,
//                beforeSend : function (){
//                    tableLoader.show();
//
//                },
//                success: function (response) {
//                    tableHeader.after(response);
//                    //$(".clTableInfo").html($(".clTableInfoData").html());
//                    // $("#filterPage").val($(".clTableInfoPage").html());
//                    // $(".clTableInfo").remove();
//                    tableLoader.hide();
//                },
//                error: function(jqXHR, textStatus, errorThrown) {
//                    //console.log(textStatus, errorThrown);
//                }
//            });
//
//        }







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
