<?php
require_once '../config.php';
$category=Cats::find('all');

$a_categories=Cats::find('all');
$a_users=Users::find_by_status('active');
$a_posts=Posts::find_by_post_status('approved');
$a_comments=Comments::find_by_status('approved');
echo render('admin_categories.html', array('categorycontent'=>$category,'a_users'=>$a_users,'a_posts'=>$a_posts,'a_comments'=>$a_comments,'a_categories'=>$a_categories));
?>