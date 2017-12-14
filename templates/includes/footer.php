                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="sidebar">
                    <div class="block">
                        <h3>Login Form</h3>
                        <?php if(isLoggedIn()): ?>
                        <div class ="userdata">
                            Welcome, <?php echo getUser()['username']; ?> !
                        </div>
                        <br>
                        <form role ="form" method ="post" action="logout.php">
                            <input type="submit" name="do_logout" class="btn btn-primary" value="Logout"/>
                        </form>
                        <?php else :?>
                        <form role="form" method="post" action="login.php">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" type="text" class="form-control" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="text" class="form-control" placeholder="Enter password">
                            </div>
                            <button name= "do_login" type="submit" class="btn btn-primary">Login</button><a href="register.html" class="btn btn-default">Create new account</a>
                        </form>
                        <?php endif;?>
                    </div>
                    <div class="block">
                        <h3>Categories</h3>
                        <div class="list-group">
                            <a href="topics.php" class="list-group-item <?php echo is_active(null); ?>">All topics<span class="badge pull-right"></span></a>
                            <?php foreach(getCategories() as $category):?>
                            <a href="topics.php?category=<?php echo $category->id; ?>" class="list-group-item <?php echo is_active($category->id);?>"><?php echo $category->name;?><span class="badge pull-right"></span></a>
                            <?php endforeach; ?>
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>


  </body>
</html>