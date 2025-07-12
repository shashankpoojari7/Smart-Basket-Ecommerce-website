<html>
    <head>
        <title>login page</title>
        <link rel="stylesheet" href="logincss.css">
    </head>
    <body>
            <div class="login" >
                <form method="POST" action="">
                    <h1>LOG IN</h1>
                    <input type="email" name ="username" autocomplete="off" placeholder="Email" required>
                    <input type="password" name ="password" placeholder="Password" echobar="*" required>
                    <input type="submit" value ="login" name="loginbtn">
                    <div class="Anchor"><a href="signin.php">New to Smart Basket? Create Account</a></div>
                </form>
            </div>
    </body>
</html>

<?php
if (isset($_POST['loginbtn']))
{
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cn = mysqli_connect('localhost', 'root', '', 'smartbasket');
    $qry ="select * from logindb where username='".$username."' and password='".$password."'";
    $rc=mysqli_query($cn,$qry);
    $r=mysqli_num_rows($rc);
    if($username=="Admin@gmail.com" && $password=="Admin"){
        echo "<script>window.location.href='admin.php';</script>";    
    }
    else if($r!=0){
        $qry ="select * from logindb where username='".$username."'";
        $rc=mysqli_query($cn,$qry);
        $row=mysqli_fetch_assoc($rc);
        session_start();
        $_SESSION['name']=$row['name'];
        $_SESSION['user']=$row['username'];
        echo "<script>alert('Welcome back ".$row['name']."');</script>";
        echo "<script>window.location.href='home.php';</script>";
    }
    else{
    echo "<script>alert('Invalid username and password');</script>";
    echo "<script>window.location.href='login.php';</script>";
    }
}
?>