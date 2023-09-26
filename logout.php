<?php

session_start();

session_unset();
session_destroy();
setcookie("user_id",$data['uid'],time()-(60*60*24));
header("Location: index.php");
?>