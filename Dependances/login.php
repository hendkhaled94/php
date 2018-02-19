<?php
require_once '../config.php';

if(isset($_POST['login'])){
    $username= $_POST['username'];
    $password= $_POST['password'];

//validate

    if($user=Users::find_by_username($username)){
        //check for password
        if (password_verify($password, $user->password)) {
            header("Location: home.php");
        } else {
            // error: password not matched
        }
    }else{
        // error: username not found
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>
    <form action="" method="post">
        <?= isset($usernameError)?$usernameError:''?>
        <label for="username">username:</label>
        <input type="text" name="username" id="username" 
        value="<?= isset($username)?$username:'' ?>"><br>
        <label for="password">password:</label>
        <input type="password" name="password" id="password"><br>
        

        <input type="submit" name="login" value="Login">

    </form>
    <a href="register.php">Register</a>
</body>
</html>