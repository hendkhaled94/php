<?php
require_once "../config.php";
$categories=Cats::find('all');
$user=Users::find_by_email($_SESSION['email']);
echo render("createPost.html",array('categories'=>$categories,'user'=>$user));