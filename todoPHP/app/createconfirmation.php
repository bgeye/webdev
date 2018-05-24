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
            //print_r($_POST['title']);
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                //$duration = $_POST['duration'];
                $duedate = $_POST['duedate'];
            }

            $TaskLoader = new TaskLoader();
            $confirmation = $TaskLoader->createTask($title,$description,$duedate);

            //echo $confirmation;

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