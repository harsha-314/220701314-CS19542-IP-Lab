<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Task Manager</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="about.php">About</a>
    </nav>
    <div class="container">
        <h1>Dashboard</h1>

        <!-- Add Task Button -->
        <a href="add_task.php" class="btn">Add New Task</a> <!-- This button navigates to add_task.php -->

        <!-- Search Form -->
        <form method="get" action="dashboard.php">
            <input type="text" name="search" placeholder="Search for notes" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit" class="btn">Search</button>
        </form>

        <?php
        // Connect to MySQL
        $conn = new mysqli("localhost", "root", "", "task_manager", 3307);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch tasks, optionally filtering by search term
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sql = "SELECT * FROM tasks WHERE task LIKE '%$search%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul class='task-list'>";
            while ($row = $result->fetch_assoc()) {
                $status = $row['status'] ? "Completed" : "Pending";
                $statusClass = $row['status'] ? "task-completed" : "task-pending";
                echo "<li class='$statusClass'>" . $row['task'] . " - $status 
                        <a href='mark_complete.php?id={$row['id']}' class='btn complete-btn'>Mark as Completed</a> 
                        <a href='delete_task.php?id={$row['id']}' class='btn delete-btn'>Delete</a></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No tasks found</p>";
        }

        $conn->close();
        ?>

        <button id="clearTasks" class="btn">Clear All Tasks</button>
    </div>

    <script>
    document.getElementById('clearTasks').addEventListener('click', function() {
        if (confirm('Are you sure you want to clear all tasks?')) {
            window.location.href = 'clear_tasks.php';
        }
    });
    </script>
</body>
</html>
