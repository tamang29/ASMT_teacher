<?php
session_start();
if(!(isset($_SESSION['user'])))
{
    header('location:form.php');
    
}


?>
<!doctype html>
<html>
<head>
    
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="css/all.css">
    

    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">

<link href="css/all.css" rel="stylesheet" type="text/css" />
<link href="webfonts/" rel="stylesheet" type="text/css" />
    <title>ASMT</title>
   
</head>
<body>
    <div class="container">
        <div id="dashboard">
            <div id="pic">
                <img src="image/pp.JPG" alt="">
                <br>
                <a href="">Person's id</a>
            </div>
            <div class="leftmenu">
                <h3 align="center" style="color: white;margin-top: 20px;">Dashboard</h3>
                <div id="topbox">
                <ul>
                    <li><a href=""><i class="fas fa-user-check"></i>      Attendence</a></li>
                    <li><a href=""><i class="fas fa-file-alt"></i>        Assignment</a></li>
                    <li><a href=""><i class="fas fa-info-circle"></i> Details</a></li>
                    <li><a href=""><i class="fas fa-calendar-alt"></i> Events</a></li>
                    <li><a href=""><i class="fas fa-poll"></i> Result</a></li>
                    <li><a href=""><i class="fas fa-book-reader"></i> Notes</a></li>
                </ul>
            </div>
            <form action="logout.php" method="POST">
            <button type="submit" name="btn" id="btn">Log Out!</button>
</form>
            </div>
        </div>
        <div id="board">
            <div class="nav_search">
                <button id="navi"><i class="fas fa-bars"></i></button>
                <input type="text" placeholder="Search for items...." id="search_bar">
                <abbr title="Search"><input type="submit" value="Search" id="search"></abbr>
            </div>
            <div class="table" >
                <div id="information">
                <?php
                include('sel.php');  
                 ?>
                 </div>
                 <div id="addnew">
                 <h3 align="center">Student Data Entry Form</h3>
            <div name="form" class="forms">
                    
            <form action="insert.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <label>Name:</label><input type="text" name="user">
        <label> Address:</label><input type="text" name="add">
            <label for="gender">Gender:</label><input type="radio" name="gender" value="male" style="margin-left:5%;"><label style="width: unset;color:#37474F;background:  unset;">Male</label>
            <input type="radio" name="gender" value="female"><label style="width: unset;background: unset;color: #37474F;">Female</label>
            <br>
            <input type="file" name="img" style="font-size:15px;">
            <button value="submit" name="trigger" type="submit">Submit</button>
                </form>
            </div>
   
                </div>
            <div id="updatenow">
                    <?php
                    if(isset($_GET['od'])){
                    $roll=$_GET['od'];
                    $con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
                    mysqli_select_db($con,"asian") or die(mysqli_error($con));

                    $sel="SELECT * from student where sn=$roll";
                    $result=mysqli_query($con,$sel);
                    $row=mysqli_fetch_array($result);



                    }
                    ?>
                <h3 align="center">Student Data Update Form</h3>
        <div name="form" class="forms">
                
        <form action="update.php" method="POST" autocomplete="off">
        <input type="hidden" name="roll"  value=<?php echo $row['sn']; ?>>
        <label>Name:</label><input type="text" name="name" value="<?php echo $row['name']; ?>">
       <label> Address:</label><input type="text" name="addres" value="<?php echo $row['address']; ?>">
        <label for="gender">Gender:</label><input type="radio" name="gend" value="male" style="margin-left:5%;" <?php if($row['gender']=="male"){ echo "checked";} ?>><label style="width: unset;color:#37474F;background:  unset;">Male</label>
        <input type="radio" name="gend" value="female" <?php if($row['gender']=="female"){ echo "checked";} ?>><label style="width: unset;background: unset;color: #37474F;">Female</label>
        <input type="file" name="up_img" style="font-size:15px;">
        <button value="submit" name="trigger" type="submit">Update</button>
        <p style="float:left;"><?php echo $row['image'];?></p>
            </form>
        </div>
        

</form>
</div>
                    
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>