<?php

$con=new mysqli('localhost', 'root', '', 'business');

if(!$con)
{
  die(mysqli_error($con));
}
 ?>
