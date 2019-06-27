<?php

$roll=$_POST['roll'];
$name=$_POST['name'];
$address=$_POST['addres'];
$uimg=$_POST['up_img'];
$gmf=$_POST['gend'];


$filename=$_FILES['up_img']['name'];
move_uploaded_file($_FILES['up_img']['tmp_name'],"img/$filename");

$con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
mysqli_select_db($con,"asian") or die(mysqli_error($con));

$up="UPDATE student set name='$name', address='$address',image='$uimg' ,gender='$gmf' where sn=$roll";
$water=mysqli_query($con,$up);
if(!$water)
{
    echo "Failed".mysqli_error($con);
}
else
{
    header('location:index.php');
}






?>