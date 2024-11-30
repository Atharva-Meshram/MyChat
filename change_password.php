<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
include("include/header.php");

if(!isset($_SESSION['user_email'])){
    header("location: signin.php");
}
else { ?>
<html>
<head>
    <title>Change Profile Picture</title>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/
    bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<style>
body{
    overflow-x: hidden;
}
</style>
<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <form action="" method="post" enctype="multipart/from-data">
        <table class="table table-bordered table-hover">
            <tr align="center">
                <td colspan="6" class="active"><h2>Change Password</h2></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Current Password</td>
                <td>
                    <input type="password" name="current_pass" id="mypass" class="form-control" required placeholder="Current Password" />
                </td>
            </tr>

            <tr>
                <td style="font-weight: bold;">New Password</td>
                <td>
                    <input type="password" name="u_pass1" id="mypass" class="form-control" required placeholder="New Password" />
                </td>
            </tr>

            <tr>
                <td style="font-weight: bold;">Confirm Password</td>
                <td>
                    <input type="password" name="u_pass2" id="mypass" class="form-control" required placeholder="Confirm Password" />
                </td>
            </tr>

            <tr align="center">
                <td colspan="6">
                    <input type="submit" name="change" value="Change" class="btn btn-info" />
                </td>
            </tr>
        </table>
    </form>
<?php 
    if(isset($_POST['change'])){
        $c_pass = $_POST['current_pass'];
        $pass1 = $_POST['u_pass1'];
        $pass2 = $_POST['u_pass2'];

        $user = $_SESSION['user_email'];
        $get_user = "select * from users where user_email='$user'";
        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);

        $user_password = $row['user_pass'];

        if($c_pass !== $user_password){
            echo"
                <div class='alert alert-danger'>
                   <strong>Your Old password didn't match</strong>
                </div>
            ";
        }

        if($pass1 != $pass2){
            echo"
                <div class='alert alert-danger'>
                   <strong>Your New password didn't match confirm password</strong>
                </div>
            ";
        }

        if($pass1 < 9 AND $pass2 <9 ){
            echo"
                <div class='alert alert-danger'>
                   <strong>Use 9 or more than 9 characters</strong>
                </div>
            ";
        }        

        if($pass1 == $pass2 AND $c_pass == $user_password){
            $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
            echo"
                <div class='alert alert-danger'>
                <strong>Your password is Changed</strong>
                </div>
            ";
        }
    }
?>
    </div>
    <div class="col-sm-2">
    </div>
</div>
</body>
</html>
<?php } ?>
















