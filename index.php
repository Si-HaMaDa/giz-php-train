<!-- TODO:: check if user looged in first -->

<pre>
<?php
session_start();
var_dump($_SESSION);
?>

Welcome <?= $_SESSION['user_name'] ?>!
