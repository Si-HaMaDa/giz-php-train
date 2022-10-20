<pre>
<?php
session_start();
var_dump($_SESSION);
?>

Welcome <?= $_SESSION['user_name'] ?>!
