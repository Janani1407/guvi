$(document).ready(function() {
    $('#loginForm').submit(function(e) {
      e.preventDefault();
      let formData = $(this).serialize();
      $.ajax({
        url: 'login.php',
        type: 'POST',
        data: formData,
        success: function(response) {
          // Handle successful login response
   
          window.location.href = 'profile.html';
        },
        error: function(xhr, status, error) {
          // Handle login error
          console.error(xhr.responseText);
         
        }
      });
    });
  });
  