<?php
session_start();

//session_destroy();

unset($_SESSION["username"]);

echo '<a href="aufgabe3.php">back</a>';