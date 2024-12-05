<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: url("/images/Loginbg.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height of the viewport */
            font-family: Arial, sans-serif;
            position: relative; /* To position the overlay */
        }

        /* Dark overlay on top of the background image */
        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6); /* Darkens the background */
            z-index: -1; /* Set the overlay below the content */
        }

        h1, h2, label {
            font-family: 'Georgia', serif; /* Ensure headers and labels use Georgia font */
        }

        .main-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Stack title and form vertically */
            z-index: 1; /* Places content above the overlay */
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 320px;
            margin-top: 20px;
            text-align: center;

            /* Fade-in animation */
            opacity: 0; /* Start invisible */
            animation: fade-in 1.5s ease-in-out forwards; /* Apply fade-in animation */
        }

        /* Keyframes for fade-in */
        @keyframes fade-in {
            from {
                opacity: 0; /* Start fully transparent */
            }
            to {
                opacity: 1; /* End fully visible */
            }
        }

        h1 {
            font-size: 36px;
            color: white;
            margin-bottom: 20px;
            /* Fade-in animation */
            opacity: 0; /* Start invisible */
            animation: fade-in 1.5s ease-in-out forwards; /* Apply fade-in animation */
        }

        .login-container h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .login-container input {
            width: 100%;
            padding: 12px 12px 12px 12px; /* Adjusted padding for the icon */
            margin: 5px 0; /* Reduced margin to bring inputs closer to labels */
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            outline: none;
            box-sizing: border-box;
        }

        .login-container input:focus {
            border-color: #007bff;
        }

        .login-container button {
            width: 100%;
            padding: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .input-container {
            position: relative;
            margin-bottom: 15px; /* Adjusted margin for spacing */
        }

        .input-container label {
            text-align: left;
            font-weight: bold;
            font-size: 14px;
            color: #333;
            margin-bottom: 3px; /* Reduced margin for closer label */
            display: block;
        }

        /* Icon placement on the right inside the input field */
        .input-container i {
            position: absolute;
            top: 60%;
            right: 10px;
            transform: translateY(-50%);
            font-size: 18px;
            color: black;
        }

        .input-container input {
            padding-right: 35px; /* Added space for the icon on the right */
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Styling for the show password checkbox */
        .show-password {
            margin-top: 10px;
            text-align: right; /* Align to the right side */
            font-size: 14px;
            display: flex;
            justify-content: flex-end; /* Align items to the right */
            margin-bottom: 20px; /* Added this line to create space between the checkbox and the button */
        }

        .show-password label {
            margin-left: 8px; /* Add space between checkbox and label */
        }

        .show-password input {
            width: auto; /* Ensure the checkbox stays its default size */
            margin: 0; /* Remove any extra margin */
        }

        footer {
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1; /* Ensure footer is above the overlay */
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: center; /* Centers the text */
            display: flex; /* Enables flexbox for alignment */
            justify-content: center; /* Centers content horizontally */
            align-items: center; /* Centers content vertically */
        }

        .error-message ul {
            list-style: disc; /* Ensures a bullet point is used */
            list-style-position: inside; /* Moves the bullet point inside the container, closer to the text */
            padding-left: 0; /* Removes default padding */
            margin: 0; /* Removes default margin for cleaner spacing */
            display: inline-block; /* Prevents the list from taking the full width */
        }

        .error-message li {
            margin-bottom: 5px; /* Adds a little space between errors if there are multiple */
        }

    </style>
</head>
<body>
    <div class="main-container">
        <!-- Title outside the login form -->
        <h1>Admin Portal</h1>

        <div class="login-container">
            <h2>Login</h2>

            <!-- Display error message if any -->
            <!-- Error message container -->
            @if ($errors->any())
                <div class="error-message" id="errorMessage">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <script>
                // JavaScript to make the error message disappear after 3 seconds
                document.addEventListener("DOMContentLoaded", function () {
                    const errorMessage = document.getElementById("errorMessage");
                    if (errorMessage) {
                        setTimeout(() => {
                            errorMessage.style.opacity = "0"; // Fade out effect
                            setTimeout(() => errorMessage.remove(), 500); // Remove the element after fade out
                        }, 3000); // 3 seconds
                    }
                });

                @if(session('login_success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful',
                            text: '{{ session('login_success') }}',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>
                @endif

            </script>


            <!-- Login form -->
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Please enter your username" required>
                    <i class="fas fa-user"></i> <!-- Flaticon on the right -->
                </div>

                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Please enter your password" required>
                    <i class="fas fa-lock"></i> <!-- Flaticon on the right -->
                </div>

                <!-- Show Password Option, placed on the right side -->
                <div class="show-password">
                    <input type="checkbox" id="showPassword"> <label for="showPassword">Show Password</label>
                </div>

                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>

    <footer style="padding: 10px; color: white; text-align: center; position: fixed; bottom: 0; width: 100%;">
        <p>&copy; 2024 MclonsManpowerServices. All rights reserved.</p>
    </footer>


    <script>
        // Toggle show password functionality
        document.getElementById('showPassword').addEventListener('change', function () {
            const passwordInput = document.getElementById('password');
            if (this.checked) {
                passwordInput.type = 'text'; // Show password
            } else {
                passwordInput.type = 'password'; // Hide password
            }
        });
    </script>
</body>
</html>
