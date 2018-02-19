<?php 
require_once '../config.php';
if(isset($_POST)){
    $user=new Users();
    $user->first_name=$_POST['firstname'];
    $user->last_name=$_POST['lastname'];
    $user->password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $user->email=$_POST['Email'];
    $user->user_type='user';
    $user->status='not active';
    $user->status_reason='waiting to activate';
    $user->userimage="user-default.png";
    $flag = true;
    if(isset($_POST['register'])){
        if(
            !isset($_POST['firstname']) 
            || empty($_POST['firstname'])
         ){
            echo "no firstname";
            $flag = false;
        }
        if(
            !isset($_POST['lastname']) 
            || empty($_POST['lastname'])
         ){
            echo "no lastname";
            $flag = false;
        }
        if(
            !isset($_POST['password']) 
            || empty($_POST['password'])
         ){
            echo "no password";
            $flag = false;
        }
        if(
            !isset($_POST['Email']) 
            || empty($_POST['Email'])
         ){
            echo "no email";
            $flag = false;
        }
    if($flag){
        $username = $_POST['username']; 
        $password = $_POST['password']; 
        $email = $_POST['email'];
        if($user->save())
        {
            header("Location: ../templates/index-register.html#login");
        
        }else{
            header("Location: #");
        }
    }
}
}

?>