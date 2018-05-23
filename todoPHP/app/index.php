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
    <title>todo</title>
</head>
<body class="body">

    <div class="todo">
        <h1 class="todo__title">todos</h1>
        <?php

//        echo "hello";
//        echo DB::get()->getAttribute(PDO::ATTR_CONNECTION_STATUS);

        echo "<table>";
        echo "<tr><th>id</th><th>user_id</th><th>status_id</th><th>title</th><th>description</th><th>duration</th><th>duedate</th></tr>";

        $TaskLoader = new TaskLoader();
        //print_r($TaskLoader->getAll());
        $task = $TaskLoader->getAll();
        print_r($task[0]);
        foreach($task as $item){
            print_task($item);
        }




        echo "</table>";


        function print_task($value){
            echo "<tr>";
            echo '<td>'.$value['id'].'</td>';
            echo '<td>'.$value['user_id'].'</td>';
            echo '<td>'.$value['status_id'].'</td>';
            echo '<td>'.$value['title'].'</td>';
            echo '<td>'.$value['description'].'</td>';
            echo '<td>'.$value['duration'].'</td>';
            echo '<td>'.$value['duedate'].'</td>';
            echo "</tr>";
        }



        ?>
        <!--
        <div class="todo__content addtask">
            <div class="addtask__element">

                <button id="addbtn" class="btn addtask__addbtn">
                    <img class="img_base addtask__iconangle"  src="img/angle-down.svg">
                </button>

                <input type="text" id="addtxt" class="addtask__txt todo__font" name="addtxt" placeholder="What needs to be done?">
            </div>
            <ul class="todo__list todo__font todo__list--fade list">

            </ul>
            <footer class="todo__footer footer">
                <span class="footer__count"></span><span>&nbsp;items left</span>
                <button id="all">all</button>
                <button id="todo">todo</button>
                <button id="done">done</button>
                <button id="speech">speech</button>
            </footer>
        </div>
        -->
    </div>
<!--
    <script src="js/speech.js"></script>
<script src="js/tools.js"></script>
<script src="js/app.js"></script>
-->
</body>
</html>