<?php
 session_start();
if(isset($_SESSION["email"])){
header("location:php/newsfeed.php");
}else{
header("location:templates/index-register.html");
}
?>