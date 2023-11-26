
$(document).ready(function() {
    $('#registerForm').submit(function(e) {
      e.preventDefault();
      let formData = $(this).serialize();
      $.ajax({
        url: 'register.php',
        type: 'POST',
        data: formData,
        success: function(response) {
         
          window.location.href = 'login.html';
        },
        error: function(xhr, status, error) {
          
          console.error(xhr.responseText);
        }
      });
    });
  });
  