<?php
/**
 * logout.php
 * User: knechtmario
 * Date: 07.06.18
 * Time: 14:47
 */
require_once "init.php"; //session start included

session_destroy();
echo "<a href='login.php'>Login</a>";
exit;
