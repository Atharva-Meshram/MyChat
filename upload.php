<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
include("include/header.php");

if(!isset($_SESSION['user_email'])){
    header("Location: signin.php");
}
else { ?>
<html>
<head>
    <title>Change profile picture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 400px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }
    .card img{
        height: 200px;
    }

    .title {
        color: grey;
        font-size: 18px;
    }
    button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 9px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }
    #update_profile{
        position: absolute;
        cursor: pointer;
        padding: 10px;
        border-radius: 4px;
        color: white;
        background-color: #000;
    }
    label{
        padding: 7px;
        display: table;
        color: #fff;
    }
    input[type="file"]{
        display: none;
    }
</style>
<body>
    <?php
        $user = $_SESSION['user_email'];
        $get_user = "select * from users where user_email='$user'";
        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['user_name'];
        $user_profile = $row['user_profile'];

        echo"
            <div class='card'>
                <img src='$user_profile'>
                <h1>$user_name</h1>
                <form method='post' enctype='multipart/form-data'>
                    <label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i>Select Profile
                    <input type='file' name='u_image' size='60'>
                    </label>
                    <button id='button_profile' name='update'>&nbsp&nbsp&nbsp<i class='fa fa-heart' aria-hidden='true'></i>Update Profile</button>
                </form>
            </div><br><br>
        ";

        if(isset($_POST['update'])){
            $u_image = $_FILES['u_image']['name'];
            $image_tmp = $_FILES['u_image']['tmp_name'];
            $random_number = rand(1,100);

            if($u_image==''){
                echo"<script>alert('Please Select Profile')</script>";
                echo"<script>window.open('upload.php', '_self')</script>";
                exit();
            }else{
                move_uploaded_file($image_tmp, "images/$u_image.$random_number");

                $update = "update users set user_profile='images/$u_image.$random_number' where user_email='$user'";
                // upload.php
                $run = mysqli_query($con, $update);

                if($run) {
                    echo"<script>alert('Your Profile Updated!')</script>";
                    echo"<script>window.open('upload.php', '_self')</script>";
                }
            }
        }
    ?>
</body>
</html>
<?php } ?>