<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Club</title>
    <!-- Add your CSS styles here -->
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-image: url(https://lhsroar.com/wp-content/uploads/2015/12/10373593623_feaf5a6ac1_h.jpg); /* Replace with your image */
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .welcome-container {
            background-color: rgba(0, 0, 0, 0.6); /* Dark overlay for text readability */
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            animation: fadeIn 2s ease-in-out;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        p {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .register-btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 20px;
            color: #fff;
            background-color: #ff6b6b;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .register-btn:hover {
            background-color: #ff4a4a;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to Our Exclusive Club</h1>
        <p>Join us today and be a part of an amazing community!</p>
        <a href="{{ route('register') }}" class="register-btn">Register Now</a>
    </div>

    <!-- Optional JS to enhance experience -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const registerBtn = document.querySelector('.register-btn');
            registerBtn.addEventListener('click', function() {
                alert('Get ready to join the best club ever!');
            });
        });
    </script>
</body>
</html>
