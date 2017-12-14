<?php require('core/init.php'); ?>
<?php
//Create topic object
$topic = new Topic;

//Get category from URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get user from url
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

//Get Template and Assign variables
$template = new Template('templates/topics.php');

//Assign Template variables

if(isset($category)){
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Posts in "'.$topic->getCategory($category)->name.'"';
}

//check for user filter

if(isset($user_id)){
    $template->topics = $topic->getByUser($user_id);
    //$template->title = 'Posts by "'.$user->getUser($user_id)->username.'"';
}

if(!isset($category) && !isset($user_id)){
 $template->topics = $topic->getAllTopics();  
}


$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

//Display template
echo $template;

