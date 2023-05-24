
   
    document.addEventListener('DOMContentLoaded', function() {
        // Get the form element
        var signUpForm = document.getElementById('signup-form');

        // Add event listener for form submission
        signUpForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get form data
            var formData = new FormData(signUpForm);

            // Send form data using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'signuup.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Display success message
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('Signup successful!');
                        signUpForm.reset(); // Reset the form
                    } else {
                        alert('Signup failed: ' + response.message);
                    }
                } else {
                    alert('Error: ' + xhr.status);
                }
            };
            xhr.onerror = function() {
                alert('Request failed');
            };
            xhr.send(formData);
        });
    });

