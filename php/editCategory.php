<?php
require_once '../config.php';
error_reporting(0);
$id = $_GET['id'];
$category=Cats::find_by_category_id($id);
$a_categories=Cats::find('all');
$a_users=Users::find_by_status('active');
$a_posts=Posts::find_by_post_status('approved');
$a_comments=Comments::find_by_status('approved');
echo render('admin_editCategory.html', array('categorycontent'=>$category,'a_users'=>$a_users,'a_posts'=>$a_posts,'a_comments'=>$a_comments,'a_categories'=>$a_categories));
if(isset($_POST)){
	$categoryToEdit=Cats::find_by_category_id($id);
	if($categoryToEdit){
		echo "found";
	}else{
		echo "not found";
	}
    $categoryToEdit->name=$_POST['categoryTitle'];
    $categoryToEdit->disc=$_POST['categoryDescription'];
    if($categoryToEdit->save())
    {
        echo "<h1 style='background-color:green;margin-top:-250px;height: 50px;width: 200px;float: right;color: white;font-size: 20px;'
		>Category edited successfully</h1>";
    }/*else{
        echo "<h1 style='background-color:red;margin-top:-250px;height: 50px;width: 200px;float: right;color: white;font-size: 20px;'
		>Category hasn't been added</h1>";
    }*/
    header("Location:categories.php");
}else{
	echo "not post";
}
?>