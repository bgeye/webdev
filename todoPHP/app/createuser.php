<?php
    require_once "init.php";
    //spl_autoload_register('my_autoload');

    include "createuserconfirmation.php";

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
        <h2 class="todo__title">create user</h2>

        <form method="POST" action="createuser.php">

            <div>
                <label id="firstname">firstname</label>
                <input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];}?>">
                <?php if(isset($_SESSION['fnerror'])){echo $_SESSION['fnerror'];}?>
            </div>
            <div>
                <label id="lastname">lastname</label>
                <input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])){echo $_POST['lastname'];}?>">
                <?php if(isset($_SESSION['lnerror'])){echo $_SESSION['lnerror'];}?>
            </div>
            <div>
                <label id="username">username</label>
                <input type="text" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>">
                <?php if(isset($_SESSION['unerror'])){echo $_SESSION['unerror'];}?>
            </div>
            <div>
                <label id="password">password</label>
                <input type="text" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>">
                <?php if(isset($_SESSION['pwderror'])){echo $_SESSION['pwderror'];}?>
            </div>
            <div>
                <input type="submit" name="submit" value="user erzeugen">
            </div>
        </form>

        <br><br><br>
        <div><a href="#">Link</a></div>
    </div>
<!--
    <script src="js/speech.js"></script>
<script src="js/tools.js"></script>
<script src="js/app.js"></script>
-->
</body>
</html>