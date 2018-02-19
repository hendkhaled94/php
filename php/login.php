<?php
require_once '../config.php';
$user=Users::find_by_email($_POST['Email']);
if(password_verify($_POST['password'],$user->password))
{
    if($user->user_type=="user"){
    if($user->status == "active")    
    {
        session_start();
        $_SESSION["email"] = $user->email;
        header("location: newsfeed.php");
    }
    else
        echo $user->status_reason;
        //div alert
    }else{
        session_start();
        $_SESSION["email"] = $user->email;
        header("location:admin_index.php");
    }
}
else{
    header("Location: #");
    //div alert
}
?>