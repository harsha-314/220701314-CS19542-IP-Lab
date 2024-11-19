<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.php">Add Task</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="about.php">About</a>
    </nav>
    <div class="container">
        <h1>Welcome to Task Manager!</h1>
        <form action="add_task.php" method="POST">
            <textarea name="task" placeholder="Enter a new note" required></textarea>
            <button type="submit" class="btn">Add Task</button>
        </form>
        <h2>Task List</h2>
        <ul>
        <?php
        // Connect to MySQL
        $conn = new mysqli("localhost", "root", "", "task_manager",3307);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch tasks
        $sql = "SELECT * FROM tasks";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row['task'] . " - " . ($row['status'] ? "Completed" : "Pending") . "</li>";
            }
        } else {
            echo "<li>No tasks yet</li>";
        }

        $conn->close();
        ?>
        </ul>
    </div>
</body>
</html>
