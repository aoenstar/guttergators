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
    header("Location: index_mobile.php");
  }
  else
  {
      die(mysqli_error($con));
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Projects</title>
    <link rel="stylesheet" href="mobile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Israel Howell">
  </head>
  <body>
    <a href="index_mobile.php"><img class="logo"src="logo.png"></a>
    <table>
      <tr>
        <td>
          <form class="wide"method="post" autocomplete="off" enctype="multipart/form-data" action="upload.php"></input>
            <div>
              <label for="Name">Name:</label>
              <input type="text" id="name" placeholder="Full Name" name="name" required></input>
            </div>
            <div>
               <label for="email">Email:</label>
               <input type="email" id="email" placeholder="Email address" name="email" onchange="updateRequirements()" required></input>
            </div>
            <div>
              <label for="phone">Phone:</label>
              <input type="tel" id="phone" placeholder="1(246)777-7777" name="phone" minlength="15" onkeydown="updateNum()" onchange="updateRequirements()" onkeypress="return backspace(this)" required></input>
            </div>

            <div>
              <label for="address">Address:</label>
              <input type="text" id="address" placeholder="2nd Avenue Lennox Goodland" name="address"></input>
            </div>

            <div>
              <label for="JDate">Date:</label>
              <input type="date" id="JDate" name="jdate"></input>
            </div>

            <div>
              <label for="Quote">Quote:</label>
              <input type="number" id="Quote" name="Quote"></input>
            </div>

            <div>
              <label for="service">Choose a Service:</label>
              <select name="service" id="service">
                <option value="Not Decided">Not Decided</option>
                <option value="Gutter Installation">Gutter Installation</option>
                <option value="Gutter Protection">Gutter Protection</option>
                <option value="House Washing">House Washing</option>
                <option value="Roof Washing">Roof Washing</option>
                <option value="Gutter & Washing">Gutter & Washing</option>
              </select>
            </div>

            <div>
              Image 1
              <input style="background-color: #1accc0 ;" type="file" id="image1" name="image1" accept="image/*"/>
            </div>

            <div>
              Image 2
              <input style="background-color: #1accc0 ;" type="file" id="image2" name="image2" accept="image/*"/>
            </div>

            <div>
              Image 3
              <input style="background-color: #1accc0 ;" type="file" id="image3" name="image3" accept="image/*"/>
            </div>

            <div><div>
              Agreement
              <input style="background-color: #1acc7a ;" type="file" id="agreement" name="agreement" accept="image/*, application/pdf">
            </div>

            <div>
              <label for="notes">Notes:</label>
              <br/>
              <textarea rows="5" id="notes" name="notes"></textarea>
            </br>

            <div class="form_action">
              <input type="submit" name="submit" value="Submit"></input>
            </div>
          </form>

          <a href="index_mobile.php"><button>Cancel</button><a/>

        </td>
      </tr>
    </table>
  </body>
<footer>Israel Howell© 2022</footer>
<script =type="text/javascript" src="./script.js"></script>
</html>
