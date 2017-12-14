<?php require('core/init.php'); ?>
<?php
//create a topic object
$topic = new Topic;

//get id from  url
$topic_id = $_GET['id'];

if(isset($_POST['do_reply'])){
    //create data array
    $data = array();
    $data['topic_id']=$_GET['id'];
    $data['body'] =$_POST['body'];
    $data['user_id'] = getUser()['user_id'];
    
    //create validator object
    $validate = new Validator;
    
    //required fields
    $field_array = array('body');
    
    if($validate->isRequired($field_array)){
        
        if($topic->reply($data)){
            redirect('topic.php?id='.$topic_id,'Your reply has been posted', 'success');
        }else{
            redirect('topic.php?id='.$topic_id,'Something went wrong with your reply.Try again.', 'error');
        }
    }else{
        redirect('topic.php?id='.$topic_id,'Your reply form is blank', 'error');
    }
    }

//Get Template and Assign variables
$template = new Template('templates/topic.php');

//Assign Vars
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;

//Display template
echo $template;
