<?php session_start();?>

<?php include('header.php') ?>
            <div class="jumbotron text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>
                                <span><a href="index.php" class="btn btn-success " style="float: left;">HOME</a></span>
                            ADMIN LOGIN
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 jumbotron">
                            <form action="login.php" method="post">
                              <div class="form-group">
                                  Username:<input type="text" class="form-control" name="user" placeholder=" Enter Username" required>
                              </div>
                            <div class="form-group">
                                  Password:<input type="password" class="form-control" name="password" placeholder="Enter Passoword" required>
                            </div>
                              <div class="form-group">
                                  <input type="submit" name="login" value="LOGIN" class="btn btn-success btn-block text-center" > 
                              </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    include ('dbcon.php');

    if (isset($_POST['login'])) {

       $user = $_POST['user'];
        $password = $_POST['password'];
  
        $qry = "SELECT * FROM admin WHERE username='$user' AND password='$password'";
        $user=stripcslashes($user);
        $user = $_POST['user'];

        //The stripcslashes() is predefine function of PHP. It is used to remove backslashes and clean up data retrieved from a database or from an HTML form. It returns a string with backslashes stripped off 

        $password=stripcslashes($password);
        $password = $_POST['password'];

        $user=mysqli_real_escape_string($conn,$user);
        // $user = $_POST['user'];
        //The real_escape_string() / mysqli_real_escape_string() function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection 
        $Password=mysqli_real_escape_string($conn,$password);
       // $password = $_POST['password'];


      
       


        
        

        $qry = "SELECT * FROM admin WHERE username='$user' AND password='$password'";
        
        $run  = mysqli_query($conn, $qry);

        //$row = mysqli_num_rows($run);

        if($run > 0) {
         $data = mysqli_fetch_assoc($run);
                    $id= $data['id'];
                    $_SESSION['uid'] = $id;
                    header('location:admin/admindash.php');

           
        } else {
      ?>             
    <script>
        alert('username or passoword invalid');
        window.open('login.php','_self');
    </script>
    <?php
                   
                }

}
?>

<?php include('footer.php') ?>

