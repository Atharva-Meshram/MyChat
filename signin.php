<!DOCTYPE html>
<html>
<head>
  <title>Login to your account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../CSS/find_people.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
  <div class="signin-form">
    <form action="" method="post">
      <div class="form-header">
        <center>
          <h1>Sign In</h1>
        </center>
        <p>Login to MyChat</p>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="someone@site.com" autocomplete="off" required>
      </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="pass" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="small">Forgot password? <a href="forgot_pass.php">Click Here</a></div><br>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-1g" name="sign_in">Sign in</button>
        </div>
        <?php include("signin_user.php"); ?> 
      </form>
      <div class="text-center big" style="color: #000000;">Don't have an account? <a href="signup.php">Create one</a></div>
  </div>
</body>
</html>
