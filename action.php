<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
   $(document).ready(function() {
    $('#signupForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Gather form data
        var formData = {
            first_name: $('#su_FirstName').val(),
            last_name: $('#su_LastName').val(),
            username: $('#su_UserName').val(),
            email: $('#su_Email').val(),
            password: $('#su_Password').val(),
            passWord: $('#su_RepeatPassword').val(),
            signup: true
        };

        // Validation: Check if any required fields are empty
        if (!formData.first_name || !formData.last_name || !formData.username || !formData.email || !formData.password || !formData.passWord) {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: "All fields are required. Please fill out all fields.",
                footer: '<a href="#">Need help?</a>'
            });
            return; // Stop the form from being submitted if validation fails
        }

        // Send AJAX request
        $.ajax({
            url: 'user/signup/function.php',  // URL from form action
            type: 'POST',
            data: formData,
            success: function(response) {
                // Display success message or do something with response
                $('#signupmodal').modal('hide'); // Close the modal on success
                Swal.fire({
                    title: "Great",
                    text: "Your account has been created successfully",
                    icon: "success"
                });
            },
            error: function(xhr, status, error) {
                // Display error message
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
            }
        });
    });
});

    
</script>