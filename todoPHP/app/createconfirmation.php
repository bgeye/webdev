<?php
    require_once "inc.php";
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
    <title>create confirmation</title>
</head>
<body class="body">

    <div class=""><!--class todo-->
        <h2 class="todo__title">create confirmation</h2>

        <?php

            if(isset($_POST['submit'])){
                DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS);
                $title = $_POST['title'];
                $description = $_POST['description'];
                $duration = intval($_POST['duration'],10);
                $duedate = $_POST['duedate'];
            }

            $TaskLoader = new TaskLoader();
            $TaskLoader->createTask($title,$description,$duration,$duedate);

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