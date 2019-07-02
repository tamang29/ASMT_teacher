<?php

if(isset($_POST['btn']))
{
$user=$_POST['username'];
$pas=$_POST['pass'];

if(isset($_POST['check'])){
    setcookie('username',$user,time()+60);
    setcookie('password',$pas,time()+60);
$con=mysqli_connect('localhost','root','','asian') or die('Connection failure');
$in="SELECT * from login where username='$user' and password='$pas'";
$ins=mysqli_query($con,$in);
$row=mysqli_fetch_array($ins);

        if($row==0){
    echo "Incorrect Username or Password";
    
    
        }
        else{
    session_start();    
    $_SESSION['user']=$user;
    
    header('location:index.php');
        }
        }
else{
    $con=mysqli_connect('localhost','root','','asian') or die('Connection failure');
$in="SELECT * from login where username='$user' and password='$pas'";
$ins=mysqli_query($con,$in);
$row=mysqli_fetch_array($ins);

if($row==0){
    echo "Incorrect Username or Password";
    
    
}
else{
    session_start();    
    $_SESSION['user']=$user;
    
    header('location:index.php');
}
}
}

?>
<html>
<head></head>
<body>
<form method="POST" action="form.php">
                            <div class="inp" id="login">
                        <h1><u>Login</u></h1>
                        <br>
                        <p style="margin-left:50px;" >Username:</p>
                            <input type="text" autofocus autocomplete="off" style="margin-left:50px;" placeholder="Username" name="username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>">
                        
                        <br>
                        <p style="margin-left:50px;">Password:<br></p>
                      
                       <input type="password" id="password" style="margin-left:50px;" placeholder="Password" name="pass" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>">
                        <br>
                        <br>
                        <input type="checkbox" name="check" style="margin-left:50px;">Remember Me
                        <br>
                        
                        <p style="margin-left:50px;"><button name="btn">login</button></p>
                        
                        </div>
                        </form>
</body>
</html>