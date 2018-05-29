<?php
    require_once "init.php";
    //spl_autoload_register('my_autoload');
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
        <h2 class="todo__title">detailview</h2>
        <?php

        $taskId = $_GET["id"];

        $TaskLoader = new TaskLoader();
        $task = $TaskLoader->getById($taskId);
        print_task($task);


        function print_task($value){
            echo '<h2>'.$value['title'].'</h2>';
            echo '<div>ID:'.$value['id'].'</div>';
            echo '<div>User ID: '.$value['user_id'].'</div>';
            echo '<div>Status ID: '.$value['status_id'].'</div>';
            echo '<div>Description: '.$value['description'].'</div>';
            echo '<div>Duration: '.$value['duration'].'</div>';
            echo '<div>Duedate: '.$value['duedate'].'</div>';
            echo '<div>detail footer</div>';
        }



        ?>
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