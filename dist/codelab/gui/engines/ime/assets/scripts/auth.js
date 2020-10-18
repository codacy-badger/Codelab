$(document).ready(function() {
    setTimeout(function () {
            $("#clGUILoader").fadeOut(250);
    }, 500);
});


$(document).on("click","#authUsername",function(event) {


    event.preventDefault();


    thisone = $(this);
    $.ajax({
        url: engineURL + "/ajax/auth/login.php",
        type: "post",
        data: {
            'username': $("#username").val(),
            'password': $("#password").val()
        } ,
        beforeSend: function(){
            $(".box").addClass('load');
            $(".box .inner .input input").attr('disabled', 'disabled');
            thisone.attr('disabled', 'disabled')
        },
        success: function (response) {
            setTimeout(function () {
                if (response['status'] == false){
                    $(".box").removeClass('load');
                    $(".box .inner .input input").removeAttr('disabled');
                    thisone.removeAttr('disabled');
                }
                if (response['status'] == true){
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
                if (typeof response['noty'] !== 'undefined') {
                    new Noty({
                        type: response['noty'],
                        text: response['message']
                    }).show();
                }
            }, 500);
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});
Noty.overrideDefaults({
    layout: 'bottomRight',
    theme: 'codelab',
    timeout: 4000,
    progressBar: true,
});
