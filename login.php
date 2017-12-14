<?php include ('core/init.php'); ?>
<?php

if(isset($_POST['do_login'])){
    //get vars
    $username = $_POST['username'];
    $password  = md5($_POST['password']);
    
    //create user object
    $user = new User;
    
    if($user->login($username,$password)){
        redirect('index.php','You are now logged in.', 'success');
    }else{
        redirect('register.php','Login is not valid', 'error');
    }
}else{
    redirect('index.php');
}










