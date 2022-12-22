<?php
include 'connect.php';

if(isset($_POST['submit']) && isset($_FILES['image1']))
{
  $name= $_POST['name'];
  $email= $_POST['email'];
  $date= $_POST['jdate'];
  $phone= $_POST['phone'];
  $Quote= $_POST['Quote'];
  $address= $_POST['address'];
  $service= $_POST['service'];
  $notes= $row['notes'];
  $default= "images/default.png";

  if($_FILES['image1']['size'] == 0)
  {
    $image_path1 = $default;
  }
  else
  {
    $image_name = $_FILES['image1']['name'];
    $temp_name = $_FILES['image1']['tmp_name'];
    $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $new_name = uniqid("IMG-", true).'.'.$img_ex_lc;
    $image_path1 = 'images/'.$new_name;
    move_uploaded_file($temp_name, $image_path1);
  }

  if($_FILES['image2']['size'] == 0)
  {
    $image_path2 = $default;
  }
  else
  {
    $image_name2 = $_FILES['image2']['name'];
    $temp_name2 = $_FILES['image2']['tmp_name'];
    $img_ex2 = pathinfo($image_name2, PATHINFO_EXTENSION);
    $img_ex_lc2 = strtolower($img_ex2);
    $new_name2 = uniqid("IMG-", true).'.'.$img_ex_lc2;
    $image_path2 = 'images/'.$new_name2;
    move_uploaded_file($temp_name2, $image_path2);
  }

  if($_FILES['image3']['size'] == 0)
  {
    $image_path3 = $default;
  }
  else
  {
    $image_name3 = $_FILES['image3']['name'];
    $temp_name3 = $_FILES['image3']['tmp_name'];
    $img_ex3 = pathinfo($image_name3, PATHINFO_EXTENSION);
    $img_ex_lc3 = strtolower($img_ex3);
    $new_name3 = uniqid("IMG-", true).'.'.$img_ex_lc3;
    $image_path3 = 'images/'.$new_name3;
    move_uploaded_file($temp_name3, $image_path3);
  }

  $agreement_name = $_FILES['agreement']['name'];
  $temp_name4 = $_FILES['agreement']['tmp_name'];
  $img_ex4 = pathinfo($agreement_name, PATHINFO_EXTENSION);
  $img_ex_lc4 = strtolower($img_ex4);
  $new_name4 = uniqid("AGR-", true).'.'.$img_ex_lc4;
  $image_path4 = 'images/'.$new_name4;
  move_uploaded_file($temp_name4, $image_path4);

  $sql = "INSERT into `test` (name, email, date, phone, Quote, Address, image1, image2, image3, agreement, service, notes)
  values('$name', '$email', '$date', '$phone', '$Quote', '$address', '$image_path1', '$image_path2', '$image_path3', '$image_path4', '$service', '$notes')";
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

?>
