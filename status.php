<?php
session_start();
if($_SESSION["user"]=="" && ($_SESSION["user"]==0))
{
    header("location:login.php");
}
?>
<?php
$id=$_REQUEST['id'];
$con=mysqli_connect('localhost','root','','myproject');
$query="select * from tbl_form where id='$id'";
$result=mysqli_query($con,$query);
while($data=mysqli_fetch_assoc($result))
{
    $status=$data['status'];
    if($status=='Y'){
        
        $query1="update tbl_form set status='N' where id='$id'";
        mysqli_query($con,$query1);
        header("location:verify.php");
    }
    else{
        $query2="update tbl_form set status='Y' where id='$id'";
        mysqli_query($con,$query2);
        header("location:verify.php");
    }
}
?>