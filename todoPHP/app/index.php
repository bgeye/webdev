<?php
    require_once "init.php";
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

    <div class="todo"><!--class todo-->
        <h2 class="todo__title">todos</h2>
        <?php

        echo "<ul class='todo__list todo__font todo__list--fade list'>";

        $TaskLoader = new TaskLoader();
        $task = $TaskLoader->getAll();
        foreach($task as $item){
            print_task($item);
        }

        echo "</ul>";

        function print_task($value){
            echo '<li class="list__item list__item--show" id="'.$value['id'].'">';
            echo '<div class="list__taskdone">';

            echo '<input id="taskdone_'.$value['id'].'" type="checkbox" class="taskdone">';
            echo '<label for="taskdone_'.$value['id'].'"><span></span></label>';
            echo '</div>';
            echo '<span class="list__txt list__txt">'.$value['title'].'</span>';
            echo '<div class="list__del">';
            echo '<button class="btn btnremove">';
            echo '<img class="img_base list__removeicon" src="img/close.svg">';
            echo '<a href="detail.php?id='.$value['id'].'">Details</a>';
            echo '<a href="edit.php?id='.$value['id'].'">Edit</a>';
            echo '</div>';
            echo '</button>';
            echo '</li>';
        }




//        function print_task($value){
//            echo "<tr>";
//            echo '<td class="ssd"><a href="done.php?id="'.$value['id'].'>Done</a></td>';
//            echo '<td>'.$value['title'].'</td>';
//            echo '<td><a href=detail.php?id='.$value['id'].'>Details</a></td>';
//            echo '<td><a href=edit.php?id='.$value['id'].'>Edit</a></td>';
//            echo '<td><a href="delete.php?id="'.$value['id'].'>Delete</a></td>';
//            echo "</tr>";
//        }



        ?>

        <br><br><br>
    <div><a href="create.php">New Task</a></div>
    <div><a href="createuser.php">New User</a></div>
    </div>
<!--
    <script src="js/speech.js"></script>
<script src="js/tools.js"></script>
<script src="js/app.js"></script>
-->
</body>
</html>