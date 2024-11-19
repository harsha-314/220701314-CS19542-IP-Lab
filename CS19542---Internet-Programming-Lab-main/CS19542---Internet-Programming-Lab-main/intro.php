<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Task Manager</title>
    <style>
        /* Full-page background styles */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .intro-container {
            background-image: url('img.png'); /* Replace with your background image path */
            background-size: cover;
            background-position: center;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .intro-container h1 {
            color: white;
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .intro-container button {
            background-color: #ff4500;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .intro-container button:hover {
            background-color: #ff6347;
        }
    </style>
</head>
<body>
    <div class="intro-container">
        <h1>Welcome to Task Manager</h1>
        <form action="dashboard.php" method="get">
            <button type="submit">Go to Dashboard</button>
        </form>
    </div>
</body>
</html>
