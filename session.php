<?php
session_start();
if(!isset($_COOKIE["user_password"])){
   //if there is session it can pass login nothing to do
 

if(!$_SESSION['userid']){
if(!isset($_SESSION['userid']))
{
   if(!isset( $_SESSION['role'])){
      header("Location: login.php") ;
   }
}
}
}else{
   $_SESSION['userid']=$_COOKIE["user_id"];
}

?>
