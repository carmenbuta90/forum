<?php include('includes/header.php');?>

<form role="form" enctype="multipart/form-data" method="POST" action="register.php">
    <div class="form-group">
        <label >Name*</label><input type="text" class="form-control" name="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label >Email adress*</label><input type="email" class="form-control" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label >Choose username*</label><input type="text" class="form-control" name="username" placeholder="Create usernamename">
    </div>
    <div class="form-group">
        <label >Password</label><input type="password" class="form-control" name="password" placeholder="Enter a password">
    </div>
     <div class="form-group">
       <label >Confirm password</label><input type="password" class="form-control" name="password2" placeholder="Retype your password">
     </div>
    <div class="form-group">
         <label >Upload Avatar</label>
         <input type="file"  name="avatar">
         <p class="help-block"></p>
    </div>
    <div class="form-group">
     <label >About Me</label>
    <textarea id="about" rows="6" cols="80" class="form-control" name="about" placeholder="Tell us about yourself(Optional)"></textarea>
    </div>
      <input type="submit" name="register" class="btn btn-default" value="Register"/>
</form>

<?php include('includes/footer.php');?>