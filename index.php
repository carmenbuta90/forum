<?php require('core/init.php'); ?>
<?php
//Create topic object
$topic = new Topic;

//create user object
$user = new User;

//Get Template and Assign variables
$template = new Template('templates/frontpage.php');

//Assign Vars
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();

//Display template
echo $template;
