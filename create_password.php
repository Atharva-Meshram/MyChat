<!DOCTYPE html>
<html>
<head>
    <title>Login to your accounts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="signin-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Create New Password</h2>
                <p>MyChat</p>
            </div>
            <div class="form-group">
                <label>Enter Password</label>
                <input type="password" class="form-control" name="pass1" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="pass2" placeholder="Confirm Password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Change</button>
            </div>
        </form>
    </div>
    <?php
        session_start();
        include("include/connection.php");
        if(isset($_POST['change'])){
            $user = $_SESSION['user_email'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            if($pass1 != $pass2){
                echo"
                    <div class='alert alert-danger'>
                        <strong>Your New password didn't match with confirm password</strong>
                    </div>
                ";
            }
            if($pass1 < 9 AND $pass2 < 9){
                echo"
                    <div class='alert alert-danger'>
                        <strong>Use 9 or more than 9 characters</strong>
                    </div>
                ";
            }

            if($pass1 == $pass2){
                $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
                session_destroy(); //we destroyed the session so that user can login with new password.
                echo"<script>alert('Go ahead and signin')</script>";
                echo"<script>window.open('signin.php', '_self')</script>";
            }
    }
    ?>
</body>
</html>