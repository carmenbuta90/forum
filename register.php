<?php require('core/init.php'); ?>
<?php
//Create topic object
$topic = new Topic;

//create user object
$user = new User;

//create validator object
$validate = new Validator;

//Create data array
if(isset($_POST['register'])){
    //create data array
    $data = array();
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password']= md5($_POST['password']);
    $data['password2']= md5($_POST['password2']);
    $data['about'] = $_POST['about'];
    $data['last_activity'] = date("Y-m-d H:i:s");
    
    $fields_array = array('name','email','username','password','password2');
    
    if($validate->isRequired($field_array)){
        if($validate->isValidEmail($data['email'])){
            if($validate->passwordsMatch($data['password'], $data['password2'])){
                //Upload avatar 
                if($user->uploadAvatar()){
                    $data['avatar'] = $_FILES["avatar"]["name"];
                    }else{
                        $data['avatar'] = 'noimage.png';
                    }
    
                //Register User
                if($user->register($data)){
                    redirect('index.php', 'You are registered and can now log in','success');
                }else{
                    redirect('index.php', 'Something went wrong with your registration.Please try again','error' );
                }   
            }else{
                redirect('register.php','Your passwords did not match.', 'error');
            }
        }else{
            redirect('register.php','Please use a valid email adress.','error');
        }
    }else{
        redirect('register.php','Please fill all required fields','error');
    }
    
}


//Get Template and Assign variables
$template = new Template('templates/register.php');

//Display template
echo $template;
