<?php
    require_once "inc.php";
    //spl_autoload_register('my_autoload');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- build:css css/styles.min.css -->
    <!--<link href="/css/reset.css" rel="stylesheet">-->
    <link href="/css/main.css" rel="stylesheet">
    <!-- endbuild -->
    <title>todo</title>
</head>
<body class="body">

    <div class=""><!--class todo-->
        <h2 class="todo__title">todos</h2>
        <?php

//        echo "hello";
//        echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS);

        echo "<table>";
        echo "<tr><th>title</th></tr>";

        $TaskLoader = new TaskLoader();
        $task = $TaskLoader->getAll();
        foreach($task as $item){
            print_task($item);
        }

        echo "</table>";


        function print_task($value){
            echo "<tr>";
            echo '<td><a href="done.php?id="'.$value['id'].'>Done</a></td>';
            echo '<td>'.$value['title'].'</td>';
            echo '<td><a href=detail.php?id='.$value['id'].'>Details</a></td>';
            echo '<td><a href="delete.php?id="'.$value['id'].'>Delete</a></td>';
            echo "</tr>";
        }



        ?>
        <br><br><br>
    <div><a href="create.php">New Task</a></div>
    </div>
<!--
    <script src="js/speech.js"></script>
<script src="js/tools.js"></script>
<script src="js/app.js"></script>
-->
</body>
</html>