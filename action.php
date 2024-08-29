<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {
        $('#signupForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting normally

            // Gather form data
            var formData = {
                name: $('#su_FullName').val(),
                username: $('#su_UserName').val(),
                email: $('#su_Email').val(),
                password: $('#su_Password').val(),
                passWord: $('#su_RepeatPassword').val(),
                signup: true
            };

            // Send AJAX request
            $.ajax({
                url: 'user/signup/function.php',  // URL from form action
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Display success message or do something with response
                    $('#resultMessage').html('<div class="alert alert-success">Sign up successful!</div>');
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