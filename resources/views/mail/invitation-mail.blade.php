<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUBI.AI Email Template</title>
    <style>
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Header Styles */
        .header {
            background-image: url("data:image/png;base64,{{ base64_encode(file_get_contents(resource_path('images/Rectangle.png'))) }}");
            background-repeat: no-repeat;
            background-size: cover;
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-width: 200px;
        }

        /* Container Styles */
        .container {
            background-color: #ffffff;
            padding: 20px;
        }

        /* Footer Styles */
        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            font-size: 12px;
        }

        .footer p {
            margin: 0;
            color: #666;
        }

        .footer a {
            color: #666;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>
<!-- Header -->
<div class="header">
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(resource_path('images/logo.png'))) }}" alt="FLEX Technologies Logo">
</div>

<!-- Content Container -->
<div class="container">
    <!-- Email Content Goes Here -->
    <h2>You have been invited to collaborate with {{ $inviter }} <br>
        in their creation of amazing content with RUBI!</h2>
    <p>
        Accept the invitation by clicking the link below:
    </p>

    <a href="{{ $url }}">Click here to accept</a>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2023 FLEX Technologies, LLC. All rights reserved.</p>
    <p><a href="https://rubi-ai.com/terms">Terms of Service</a> | <a href="https://rubi-ai.com/privacy">Privacy Policy</a></p>
</div>
</body>
</html>
