<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - LendingLeaf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header {
            background: #f5f5f5;
            padding: 1rem 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-weight: bold;
            color: #333;
        }

        .message {
            margin-bottom: 2rem;
        }

        .message p {
            color: #555;
            font-size: 1.1rem;
        }

        .btn-custom {
            background: linear-gradient(to right, #ff5f00, #ffa500);
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            font-size: 1.1rem;
        }

        .btn-custom:hover {
            background: linear-gradient(to right, #e65200, #ff8c00);
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Thank You!</h1>
        </div>

        <div class="message">
            <p>Your application has been successfully submitted.</p>
            <p>We will contact you soon with further details.</p>
        </div>

        <a href="/" class="btn btn-custom">Return to Home</a>
    </div>
</body>

</html>
