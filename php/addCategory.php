<?php
require_once '../config.php';
error_reporting(0);
$a_categories=Cats::find('all');
$a_users=Users::find_by_status('active');
$a_posts=Posts::find_by_post_status('approved');
$a_comments=Comments::find_by_status('approved');
echo render('admin_addCategory.html', array('a_users'=>$a_users,'a_posts'=>$a_posts,'a_comments'=>$a_comments,'a_categories'=>$a_categories));
if(isset($_POST)){
	if(!empty($_POST['categoryTitle']) and !empty($_POST['categoryDescription'])){
		$category=new Cats();
	    $category->name=$_POST['categoryTitle'];
	    $category->disc=$_POST['categoryDescription'];
	    if($category->save())
	    {
	        echo "<h1 style='background-color:green;margin-top:-250px;height: 50px;width: 200px;float: right;color: white;font-size: 20px;'
			>Category added successfully</h1>";
	    }
	    echo "post";
	}
}else{
	echo "not post";
}

?>