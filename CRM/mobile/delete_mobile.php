<?php
include 'connect.php';
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $sql="DELETE from `test` where jobid=$id";
  $result= mysqli_query($con, $sql);

  if($result)
  {
    header("Location: index_mobile.php");
  }
  else
  {
    die(mysqli_error($con));
  }

}
?>
