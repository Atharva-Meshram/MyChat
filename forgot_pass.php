<!DOCTYPE html>
<html>
<head>
    <title>Login to your account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
    <div class="signin-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Forgot Password</h2>
                <p>MyChat</p>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="someone@site.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Bestfriend Name</label>
                <input type="text" class="form-control" name="bf" placeholder="Someone..." autocomplete="off" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
            </div>
        </form>
        <div class="text-center small" style="color: #67428B;">Back to Signin? <a href="signin.php">Click here</a>
        </div>
        <?php
        session_start();
        include("include/connection.php");
        // change_password.php
            if(isset($_POST['submit'])){

                $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
                $recovery_account = htmlentities(mysqli_real_escape_string($con, $_POST['bf']));

                $select_user = "select * from users where user_email='$email' AND
                forgotten_answer='$recovery_account'";

                $query = mysqli_query($con, $select_user);

                $check_user = mysqli_num_rows($query);

                if($check_user==1){
                    $_SESSION['user_email']=$email;
                    echo"<script>window.open('create_password.php', '_self')</script>";
                }else{
                    echo"<script>alert('Your email or bestfriend name is incorrect.')</script>";
                    echo"<script>window.open('forgot_pass.php', '_self')</script>";
                }
            }
        ?>
</body>
</html>