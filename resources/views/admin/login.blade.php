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
        /* Same styles as before */
        body {
            background: url("/images/Loginbg.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            position: relative;
        }

        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        h1, h2, label {
            font-family: 'Georgia', serif;
        }

        .main-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            z-index: 1;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 320px;
            margin-top: 20px;
            text-align: center;
            opacity: 0;
            animation: fade-in 1.5s ease-in-out forwards;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        h1 {
            font-size: 36px;
            color: white;
            margin-bottom: 20px;
            opacity: 0;
            animation: fade-in 1.5s ease-in-out forwards;
        }

        .login-container h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .input-container {
            position: relative;
            margin-bottom: 15px;
        }

        .input-container label {
            text-align: left;
            font-weight: bold;
            font-size: 14px;
            color: #333;
            margin-bottom: 3px;
            display: block;
        }

        .input-container input {
            width: 100%;
            padding: 12px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            outline: none;
            box-sizing: border-box;
            padding-right: 35px;
        }

        .input-container i {
            position: absolute;
            top: 60%;
            right: 10px;
            transform: translateY(-50%);
            font-size: 18px;
            color: black;
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

        .show-password {
            margin-top: 10px;
            text-align: right;
            font-size: 14px;
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .show-password label {
            margin-left: 8px;
        }

        .show-password input {
            width: auto;
            margin: 0;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .error-message ul {
            list-style: disc;
            list-style-position: inside;
            padding-left: 0;
            margin: 0;
            display: inline-block;
        }

        .error-message li {
            margin-bottom: 5px;
        }

        footer {
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h1>Admin Portal</h1>

        <div class="login-container">
            <h2>Login</h2>

            @if ($errors->any())
                <div class="error-message" id="errorMessage">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required>
                    <i class="fas fa-user"></i>
                </div>

                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    <i class="fas fa-lock"></i>
                </div>

                <div class="show-password">
                    <input type="checkbox" id="showPassword">
                    <label for="showPassword">Show Password</label>
                </div>

                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 MclonsManpowerServices. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const errorMessage = document.getElementById("errorMessage");
            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.style.opacity = "0"; // Fade out effect
                    setTimeout(() => errorMessage.remove(), 500); // Remove the element after fade out
                }, 3000); // 3 seconds
            }

            // Toggle show password functionality
            const showPasswordCheckbox = document.getElementById('showPassword');
            const passwordInput = document.getElementById('password');
            showPasswordCheckbox.addEventListener('change', function () {
                passwordInput.type = this.checked ? 'text' : 'password';
            });
        });
    </script>
</body>
</html>
