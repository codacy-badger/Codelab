$("#subpanelGet").val("0");
$(document).on("click",".subpanelLoad",function(event) {
    var thisone = $(this);
    var parent = thisone.parent('li');
    var id = thisone.attr('id');
    if (id != $('#subpanelGet').val()){
        $('#subpanel').show();
        $('#subpanelGet').val(id);
        $('#subpanelContent').html('');
        $("header .mainMenu > ul > li").removeClass('submenuOpen');
        parent.addClass('submenuOpen');
        $.ajax({
            url: engineURL + "/ajax/subpanel/get.php",
            type: "post",
            data: {
                'id': id
            } ,
            beforeSend: function (response) {
                $('#subpanelLoader').show();
            },
            success: function (response) {
                $('#subpanelContent').html(response);
                $('#subpanelLoader').hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#subpanelContent').html('An error occured');
                $('#subpanelLoader').hide();
            }
        });
        } else {
            $('#subpanelGet').val('0');
            $('#subpanel').hide();
            $('#subpanelContent').html('');
            $("header .mainMenu > ul > li").removeClass('submenuOpen');
        }
    });
$(document).on("click","#subpanelClose",function(event) {
    $('#subpanelGet').val('0');
    $('#subpanelContent').html('');
    $('#subpanel').hide();
    $("header .mainMenu > ul > li").removeClass('submenuOpen');
});
