<?php

session_start();
if(!(isset($_SESSION['user'])))
{
    header('location:form.php');
    
}


?>
<?php

$roll=$_GET['od'];
$con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
mysqli_select_db($con,"asian") or die(mysqli_error($con));

$sel="SELECT * from student where sn=$roll";
$result=mysqli_query($con,$sel);
$row=mysqli_fetch_array($result);







?>
<html>

    <head>
    <link rel="stylesheet" href="studentUpdate.css">
    </head>
<body>

<h2 align="center">Student Data Update Form</h2>
        <div name="form" class="forms">
                <img src="logosmall.png">
        <form action="update.php" method="POST" autocomplete="off">
        <input type="hidden" name="roll"  value=<?php echo $row['sn']; ?>>
        <label>Name:</label><input type="text" name="name" value="<?php echo $row['name']; ?>">
       <label> Address:</label><input type="text" name="addres" value="<?php echo $row['address']; ?>">
        <label for="gender">Gender:</label><input type="radio" name="gend" value="male" style="margin-left:5%;" <?php if($row['gender']=="male"){ echo "checked";} ?>><label style="width: unset;color:green;background:  unset;">Male</label>
        <input type="radio" name="gend" value="female" <?php if($row['gender']=="female"){ echo "checked";} ?>><label style="width: unset;background: unset;color: green;">Female</label>
        <input type="file" name="up_img" >
        <button value="submit" name="trigger" type="submit">Update</button>
        <p style="float:left;"><?php echo $row['image'];?></p>
            </form>
        </div>
        

</form>
</div>
</body>
</html>
