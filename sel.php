<?php


if(!isset($_SESSION['user']))
{
    
    header('location:form.php');
    
}


?>  
<table border="1"  cellspacing="0px" width="600px" cellpadding="20px" align="center" >
<caption>Student Information</caption>
<tr>
<th>SN</th>
<th>Name</th>
<th>Address</th>
<th>Gender</th>
<th>Action</th>

</tr>

<?php

$con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
mysqli_select_db($con,"asian") or die(mysqli_error($con));
$sele="SELECT * from student";
$se=mysqli_query($con,$sele);

while($row=mysqli_fetch_array($se,MYSQLI_ASSOC))
{
    ?>
    <tr>
    <td><?php echo $row['sn'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['address'];?></td>
    <td><?php echo $row['gender'];?></td>
    <td><a href="index.php?od=<?php echo $row['sn'];?>" ><abbr title="Edit"><i class="fas fa-edit" style="color:black;"></i></abbr></a>
    <a href="newselect.php?od=<?php echo $row['sn'];?>" onclick="return delete_data();" id="delet" style="background:white;border-radius:20px;border:none;color:black;"><abbr title="Delete"><i class="fas fa-minus-circle"></i></abbr></a>
    <a href="view.php?od=<?php echo $row['sn']?>" id="picnic" name="pic">
    <abbr title="view">
    <i class="fas fa-eye" style="color:black;"></i></abbr></a></td>
    </tr>
    <?php
}




?>


</table>

<script type="text/javascript">
function delete_data(){
    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
       alert ("record deleted");
    }else{
        alert("Record Not Deleted");
    }
    return del;
    }
// document.getElementById('delet').getEventListener("click",function(){
//     document.alert("Do you want to delete?");
// });


</script>
</body>
</html>
