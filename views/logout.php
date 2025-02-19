<?php
session_start();
session_unset();
$_SESSION['errmsg']="You have successfully logout";
header("Location: ../index.php");
?>
