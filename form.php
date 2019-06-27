<?php

if(isset($_POST['btn']))
{
$user=$_POST['username'];
$pas=$_POST['pass'];
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

?>
<html>
<head></head>
<body>
<form method="POST" action="form.php">
                            <div class="inp" id="login">
                        <h1><u>Login</u></h1>
                        <br>
                        <p style="margin-left:50px;" >Username:</p>
                            <input type="text" autofocus autocomplete="off" style="margin-left:50px;" placeholder="Username" name="username">
                        
                        <br>
                        <p style="margin-left:50px;">Password:<br></p>
                      
                       <input type="password" id="password" style="margin-left:50px;" placeholder="Password" name="pass">
                        <br>
                        
                        <p style="margin-left:50px;"><button name="btn">login</button></p>
                        
                        </div>
                        </form>
</body>
</html>