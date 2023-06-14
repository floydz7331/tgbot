$(document).ready(function() {
    $('#sendMessage').click(function() {
      var message = $('#message').val();
      $.ajax({
        url: 'bot.php',
        method: 'POST',
        data: {text: message},
        success: function(response) {
          console.log(response);
        }
      });
    });
  });
  