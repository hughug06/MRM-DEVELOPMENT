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

        // Regex validation for special characters in first_name, last_name, and username
        var nameRegex = /^[A-Za-z]+$/; // Only allows alphabetic characters
        var usernameRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,10}$/; // Allows only alphanumeric, 6-10 chars
        var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,10}$/; // Same as username for password

        // Check if first name contains special characters
        if (!nameRegex.test(formData.first_name)) {
            Swal.fire({
                icon: "error",
                title: "First Name Error",
                text: "First name should only contain alphabetic characters without special characters.",
                footer: '<a href="#">Need help?</a>'
            });
            return; // Stop form submission if first name is invalid
        }

        // Check if last name contains special characters
        if (!nameRegex.test(formData.last_name)) {
            Swal.fire({
                icon: "error",
                title: "Last Name Error",
                text: "Last name should only contain alphabetic characters without special characters.",
                footer: '<a href="#">Need help?</a>'
            });
            return; // Stop form submission if last name is invalid
        }

        // Check if the username meets the criteria
        if (!usernameRegex.test(formData.username)) {
            Swal.fire({
                icon: "error",
                title: "Username Error",
                text: "Username must be 6 to 10 characters long, contain both letters and numbers, and no special characters.",
                footer: '<a href="#">Need help?</a>'
            });
            return; // Stop form submission if username is invalid
        }

        // Check if the password meets the criteria
        if (!passwordRegex.test(formData.password)) {
            Swal.fire({
                icon: "error",
                title: "Password Error",
                text: "Password must be 6 to 10 characters long, contain both letters and numbers.",
                footer: '<a href="#">Need help?</a>'
            });
            return; // Stop form submission if password is invalid
        }

        // Check if passwords match
        if (formData.password !== formData.passWord) {
            Swal.fire({
                icon: "error",
                title: "Password Mismatch",
                text: "Passwords do not match. Please try again.",
                footer: '<a href="#">Need help?</a>'
            });
            return; // Stop form submission if passwords don't match
        }

        // Send AJAX request if validation passes
        $.ajax({
            url: 'user/signup/function.php',  // URL from form action
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response === 'email_exists') {
                    Swal.fire({
                        icon: "error",
                        title: "Email Error",
                        text: "This email is already registered. Please use another email.",
                        footer: '<a href="#">Need help?</a>'
                    });
                } else {
                    // Display success message or do something with response
                    $('#signupmodal').modal('hide'); // Close the modal on success
                    Swal.fire({
                        title: "Great",
                        text: "Your account has been created successfully",
                        icon: "success"
                    });

                    // Reset the form fields to empty after successful submission
                    $('#signupForm').trigger('reset');
                }
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