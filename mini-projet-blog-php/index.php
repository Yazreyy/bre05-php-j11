<?php

require_once 'managers/Abstract_Manager.php';

require_once 'models/User.php';
require_once 'models/Post.php';
require_once 'models/Category.php';

require_once 'managers/Category_Manager.php';
require_once 'managers/Post_Manager.php';
require_once 'managers/User_Manager.php';

$user = new User("","","",1);
var_dump($user);
$post = new Post("","","",2);
var_dump($post);
$category = new Category("","");
var_dump($category);

$maCategory = new Category("Voyage", "");
$monPost = new Post("","","",1);


$monPost -> addCategory($maCategory);
$maCategory -> addPost($monPost);

var_dump($maCategory);
var_dump($monPost);

$userManager = new UserManager();
?>
