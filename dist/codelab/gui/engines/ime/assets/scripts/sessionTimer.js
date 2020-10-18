
$(document).ready(function() {

  // Function to update counters on all elements with class counter
  var doUpdate = function() {
      var count = parseInt($('#clSessionTimerValue').html());
      if (count == 0){
          $("#clGUILayer").show();
          $('#clSessionTimer').addClass('expired');
          $('#clSessionTimer .text').html('The session has expired');
          $('#clSessionTimer .value').hide();
          $('#clSessionTimer .icon').html('<i class="fas fa-skull-crossbones"></i>');

          clearInterval(doUpdate);
          return false;
      }
      if (count !== 0) {
        $('#clSessionTimerValue').html(count - 1);
      }

      if (count == 60){
          $("#clSessionTimer").addClass('display');
      }

      if (count == 30){
          $("#clSessionTimer").addClass('red');
          $("#clSessionTimer").addClass('display');
          $('#clSessionTimer .icon').html('<i class="fas fa-exclamation"></i>');
      }

  };
  // Schedule the update to happen once every second
  setInterval(doUpdate, 1000);
});


$(document).on("click","#clSessionTimer",function(event) {
    $("#clSessionTimer").removeClass('display');
});




$(document).on("click","#clSessionTimer.expired",function(event) {
     location.reload();
});
