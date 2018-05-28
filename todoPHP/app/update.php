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

    <div class=""><!--class todo-->
        <h2 class="todo__title">create</h2>

        <form method="POST" action="createconfirmation.php">
            <label id="title">Title</label>
            <input type="text" name="title">
            <label id="description">Description</label>
            <input type="text" name="description">
            <label id="duration">Duration</label>
            <input type="text" name="duration">
            <label id="duedate">Duedate</label>
            <input type="date" name="duedate">
            <input type="submit" name="submit" value="create">
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