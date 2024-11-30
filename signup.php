<!DOCTYPE html>
<html>
<head>
<title>Create New Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<div class="signup-form">
<form action="" method="post">
<div class="form-header">
<h2>Sign Up</h2>
<p>Fill out this form and start chatting with your freinds.</p>
</div>
<div class="form-group">
<label>Username</label>
<input type="text" class="form-control" name="user_name" placeholder="Example: abcde" autocomplete="off" required>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" name="user_pass" placeholder="Password"
autocomplete="off" required>
</div>
<div class="form-group">
<label>Email Address</label>
<input type="email" class="form-control" name="user_email" placeholder="
someone@site.com" autocomplete="off" required>
</div> 

<div class="form-group">
<label>Country</label>
<select class="form-control" name="user_country" required>
<option disabled="">Select a Country</option>
<option>India</option>
<option>United States of America</option>
<option>China</option>
<option>UK</option>
<option>Bangladesh</option>
<option>France</option>
</select>
</div>
<div class="form-group">
<label>Gender</label>
<select class="form-control" name="user_gender" required>
<option disabled="">Select your Gender</option>
<option>Male</option>
<option>Female</option>
<option>0thers</option>
</select>
</div>
<div class="form-group">
<label class="checkbox-inline"><input type="checkbox" required>I accept the <a href="#"
>Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn-block btn-1g" name="sign_up"><h4>Sign Up</h4>
</button>
</div>
<?php include("signup_user.php"); ?>
</form>
<div class="text-center big" style="color: #000000;">Already have an account? <a href="signin.php">Signin here</a></div>
</div>
</body>
</html>