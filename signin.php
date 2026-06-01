<html>
    <head>
        <title>login page</title>
        <link rel="stylesheet" href="logincss.css">
    </head>
    <body>
            <div class="login" >
                <form method="POST" action="">
                    <h1>SIGN IN</h1>
                    <input type="text" name ="fname" autocomplete="off" placeholder="First Name" required>
                    <input type="text" name ="lname" autocomplete="off" placeholder="Last Name" required>
                    <input type="email" name ="username" autocomplete="off" placeholder="Email" required>
                    <input type="password" name ="password" placeholder="Password" required>
                    <input type="submit" value ="SIGN IN" name="loginbtn">
                    <div class="Anchor"><a href="login.php">Already a User? Login</a></div>
                </form>
            </div>
    </body>
</html>

<?php
if (isset($_POST['loginbtn']))
{
    session_start();
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$username = $_POST['username'];
$password = $_POST['password'];

$name = $fname." ".$lname;
$_SESSION['user']=$username;
$_SESSION['name']=$name;

$cn = mysqli_connect('127.0.0.1', 'root', 'root', 'smartbasket', 3306);
$qry="select * from logindb where username='".$username."'";
$rc=mysqli_query($cn,$qry);
$r=mysqli_num_rows($rc);
if($r!=0){
    echo "<script>alert('Username Already exists');</script>";
    echo "<script>window.location.href='signin.php';</script>";
}
else{
$qry = "INSERT INTO logindb (username, password, name) VALUES ('$username', '$password','$name')";
mysqli_query($cn, $qry);
echo "<script>alert('Hi " . $name . ", Welcome to Smartbasket');</script>";
echo "<script>window.location.href='home.php';</script>";
}
}
?>