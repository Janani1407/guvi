$(document).ready(function() {

    $.ajax({
      url: 'profile.php',
      type: 'GET',
      dataType: 'json',
      success: function(userDetails) {
        // Update HTML with user details
        $('#profileDetails').html(`
          <p><strong>Username:</strong> ${userDetails.username}</p>
          <p><strong>Age:</strong> ${userDetails.age}</p>
          <p><strong>DOB:</strong> ${userDetails.dob}</p>
          <p><strong>Contact:</strong> ${userDetails.contact}</p>
          <p><strong>Address:</strong> ${userDetails.address}</p>
        `);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
        // Handle error (e.g., redirect to login page)
      }
    });
  });
  