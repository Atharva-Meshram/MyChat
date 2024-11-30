<?php

$con = mysqli_connect("localhost","root","","mychat");

    $user = "select * from users";

    $run_user = mysqli_query($con, $user);

    // Logged in user.
    // echo $_SESSION['y'];  

    while ($row_user=mysqli_fetch_array($run_user)) {
        $user_id = $row_user['user_id'];
        $user_name = $row_user['user_name'];
        $user_profile = $row_user['user_profile'];
        $login = $row_user['log_in'];
        $usr = $_SESSION['LoggedIn_user'];


        if($_SESSION['LoggedIn_user'] !=  $user_name){
            echo"
                <li>
                    <div class='chat-left-img'>
                        <img src='$user_profile'>
                    </div>
                    <div class='chat-left-detail'>
                        <p><a href ='home.php?user_name=$user_name'>$user_name</a></p>";
                        if($login ==  'Online'){
                            echo"<span><i class = 'fa fa-circle' aria-hidden='true'></i> online</span>";
                        }
                        else{
                            echo"<span><i class = 'fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
                        }

                        $output = passthru("python SentimentAnalysis.py $usr $user_name");

                        $mood =file_get_contents("var.txt");
                 
                        if ($mood == "Positive") {
                            echo"<img src='images/positive.jpg' style='' alt='Positive' height='20' width='20' hspace='100'>";
                        } elseif ($mood == "Negative") {
                            echo"<img src='images/negative.png' style='' alt='Negative' height='20' width='20' hspace='100'>";
                        } else {
                            echo"<img src='images/neautral.png' style='' alt='Neutral' height='20' width='20' hspace='100'>";
                        }
                        "
                    </div>
                </li>
            ";  
        } 
    }
?>

<!-- <p><img src='images/positive.JPG' alt='Positive' height='20' width='20'></p> -->

<!-- <div class='chat-left-img'>
    <img src='images/positive.JPG' alt='Positive' height='20' width='20'>
</div> -->
