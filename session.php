<?php
session_start();
if(!$_SESSION['userid']){
if(!isset($_SESSION['userid']))
{
   if(!isset( $_SESSION['role'])){
      header("Location: login.php") ;
   }
}
}
?>
