<?php
    require_once "init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- build:css css/styles.min.css -->
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <!-- endbuild -->
    <title>todo</title>
</head>
<body class="body">

    <div class=""><!--class todo-->
        <h2 class="todo__title">edit</h2>

        <form method="POST" action="update.php">
            <?php
            //get taskid
            $taskId = $_GET['id'];

            //get taskdata
            $taskLoader = new TaskLoader();
            $task = $taskLoader->getById($taskId);


            $statusId = $task['status_id'];
            $title = $task['title'];
            $description = $task['description'];
            $duration = $task['duration'];
            $duedate = $task['duedate'];

            echo "<div>";
            echo "<label id='statusid'>Status ID</label>";
            echo "<input type='text' name='statusid' value='$statusId'>";
            echo "</div>";
            echo "<div>";
            echo "<label id='title'>Title</label>";
            echo "<input type='text' name='title' value='$title'>";
            echo "</div>";
            echo "<div>";
            echo "<label id='description'>Description</label>";
            echo "<input type='text' name='description' value='$description'>";
            echo "</div>";
            echo "<div>";
            echo "<label id='duration'>Duration</label>";
            echo "<input type='text' name='duration' value='$duration'>";
            echo "</div>";
            echo "<div>";
            echo "<label id='duedate'>Duedate</label>";
            echo "<input type='date' name='duedate' value='$duedate'>";
            echo "</div>";
            echo "<div>";
            echo "<input type='submit' name='submit' value='update'>";
            echo "</div>";
            echo "<input type='hidden' name='taskid' value='$taskId'>"
            ?>
        </form>

        <br><br><br>
        <div><a href="index.php">Taskliste</a></div>
    </div>
<!--
    <script src="js/speech.js"></script>
<script src="js/tools.js"></script>
<script src="js/app.js"></script>
-->
</body>
</html>