<?php

include 'connect.php';

if(isset($_GET['id']))
{
  $id= $_GET['id'];
  if(isset($_POST['update']) && isset($_FILES['image1B']))
  {
    $name= $_POST['nameB'];
    $email= $_POST['emailB'];
    $phone= $_POST['phoneB'];
    $address= $_POST['addressB'];
    $date= $_POST['jdateB'];
    $quote= $_POST['quoteB'];
    $service= $_POST['serviceB'];
    $notes= $_POST['notesB'];

    //image1 file import and renaming
    $image_name = $_FILES['image1B']['name'];
    $temp_name = $_FILES['image1B']['tmp_name'];
    $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $new_name = uniqid("IMG-", true).'.'.$img_ex_lc;
    $image_path1 = 'images/'.$new_name;
    move_uploaded_file($temp_name, $image_path1);

    //image2 file import and renaming
    $image_name2 = $_FILES['image2B']['name'];
    $temp_name2 = $_FILES['image2B']['tmp_name'];
    $img_ex2 = pathinfo($image_name2, PATHINFO_EXTENSION);
    $img_ex_lc2 = strtolower($img_ex2);
    $new_name2 = uniqid("IMG-", true).'.'.$img_ex_lc2;
    $image_path2 = 'images/'.$new_name2;
    move_uploaded_file($temp_name2, $image_path2);

    //image3 file import and renaming
    $image_name3 = $_FILES['image3B']['name'];
    $temp_name3 = $_FILES['image3B']['tmp_name'];
    $img_ex3 = pathinfo($image_name3, PATHINFO_EXTENSION);
    $img_ex_lc3 = strtolower($img_ex3);
    $new_name3 = uniqid("IMG-", true).'.'.$img_ex_lc3;
    $image_path3 = 'images/'.$new_name3;
    move_uploaded_file($temp_name3, $image_path3);

    $agreement_name = $_FILES['agreementB']['name'];
    $temp_name4 = $_FILES['agreementB']['tmp_name'];
    $img_ex4 = pathinfo($agreement_name, PATHINFO_EXTENSION);
    $img_ex_lc4 = strtolower($img_ex4);
    $new_name4 = uniqid("AGR-", true).'.'.$img_ex_lc4;
    $image_path4 = 'images/'.$new_name4;
    move_uploaded_file($temp_name4, $image_path4);

    //Return current image1 if no image entered
    if($_FILES['image1B']['size'] == 0)
    {
      $sql2= "SELECT * from `test` WHERE jobid=$id";
      $currentResult= mysqli_query($con, $sql2);
      $row=mysqli_fetch_assoc($currentResult);
      $image_path1 = $row['image1'];
    }

    //Return current image2 if no image entered
    if($_FILES['image2B']['size'] == 0)
    {
      $sql2= "SELECT * from `test` WHERE jobid=$id";
      $currentResult= mysqli_query($con, $sql2);
      $row=mysqli_fetch_assoc($currentResult);
      $image_path2 = $row['image2'];
    }

    //Return current image3 if no image entered
    if($_FILES['image3B']['size'] == 0)
    {
      $sql2= "SELECT * from `test` WHERE jobid=$id";
      $currentResult= mysqli_query($con, $sql2);
      $row=mysqli_fetch_assoc($currentResult);
      $image_path3 = $row['image3'];
    }

    if($_FILES['agreementB']['size'] == 0)
    {
      $sql2= "SELECT * from `test` WHERE jobid=$id";
      $currentResult= mysqli_query($con, $sql2);
      $row=mysqli_fetch_assoc($currentResult);
      $image_path4 = $row['agreement'];
    }

    $sql="UPDATE `test` SET name='$name', email='$email', phone='$phone', Address='$address', Quote='$quote', image1='$image_path1' , image2='$image_path2', image3='$image_path3', agreement='$image_path4', service='$service', notes='$notes' WHERE jobid=$id";

    $result= mysqli_query($con, $sql);

    if($result)
    {
      echo "Data inserted successfully";
      header("Location: index.php");
    }
    else
    {
      die(mysqli_error($con));
    }
  }
}

?>
