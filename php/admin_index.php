<?php
require_once '../config.php';
error_reporting(0);
$p_users=Users::find_by_status('not active');
$p_posts=Posts::find_by_post_status('pinding');
$p_comments=Comments::find_by_status('pinding');

$a_categories=Cats::find('all');
$a_users=Users::find_by_status('active');
$a_posts=Posts::find_by_post_status('approved');
$a_comments=Comments::find_by_status('approved');
echo render('admin_index.html', array('p_users'=>$p_users,'p_posts'=>$p_posts,'p_comments'=>$p_comments,'a_users'=>$a_users,'a_posts'=>$a_posts,'a_comments'=>$a_comments,'a_categories'=>$a_categories));
?>