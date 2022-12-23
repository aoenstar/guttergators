<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Projects</title>
    <link rel="stylesheet" href="index.css"/>
  </head>
  <body>
    <div class="cover"></div>
    <div class="info">
      <a href="index.php"><img class="logo"src="logo.png"/></a>
      <?php

      if(isset($_GET['id']))
      {
        $id= $_GET['id'];
        $sql= "SELECT * FROM `test` WHERE jobid=$id";
        $result= mysqli_query($con, $sql);
        if($result)
        {
          while($row=mysqli_fetch_assoc($result))
          {
            $id= $row['JobID'];
            $name= $row['name'];
            $email= $row['email'];
            $phone= $row['phone'];
            $address= $row['Address'];
            $date= $row['date'];
            $quote= $row['Quote'];
            $image1= $row['image1'];
            $image2= $row['image2'];
            $image3= $row['image3'];
            $agreement= $row['agreement'];
            $service= $row['service'];
            $notes= $row['notes'];

          echo '<div>
            <h1>'.$id.' - '.$name.'</h1>
            <div>
              <embed src="'.$image1.'"width="200px" height="200px"/>
              <embed src="'.$image2.'"width="200px" height="200px"/>
              <embed src="'.$image3.'"width="200px" height="200px"/>
            </div>
            <div class="data">
              <div>Email: <a href="mailto:'.$email.'">'.$email.'</a></div>
              <div>Phone: '.$phone.'</div>
              <div>Address: '.$address.'</div>
              <div>Date: '.$date.'</div>
              <div>Quote: $'.$quote.'</div>
              <div>Service: '.$service.'</div>
              <div>Notes:</div>
              <textarea rows="3" id="notesB" name="notesB" style="font-size:x-large;width: 20vw;height: 20vh;" readonly>'.$notes.'</textarea>
            </div>
            <embed src="'.$agreement.'" width="800px" height="1050px" />
            <div></div>
            <a class="updateButton" href="display.php?id='.$id.'&updateid='.$id.'"><button>Update</button></a>
            <a class="deleteButton" href="display.php?id='.$id.'&deleteid='.$id.'"><button class="danger">Delete</button></a>
            <button onclick="print()">Save</button>

            </div>';
          }
        }
      }
      ?>

      </div>





    <?php
    if(isset($_GET['deleteid']))
    {
      $id= $_GET['deleteid'];
      echo '<div id="check2"></div>';
      echo '
    <div id="popup2" class="popup2">
      <button class="confirm danger"><a href="delete.php?id='.$id.'">Confirm</a></button>
    </div>';
    }
    ?>

    <?php

if(isset($_GET['updateid']))
{
  $currentID= $_GET['updateid'];
  $sql= "SELECT * from `test` WHERE jobid=$currentID";
  $result= mysqli_query($con, $sql);
  if ($result)
  {
    $row=mysqli_fetch_assoc($result);
    $currentName= $row['name'];
    $currentEmail= $row['email'];
    $currentDate= $row['date'];
    $currentPhone= $row['phone'];
    $currentQuote= $row['Quote'];
    $currentAddress= $row['Address'];
    $currentImage1= $row['image1'];
    $currentImage1= $row['image1'];
    $currentImage2= $row['image2'];
    $currentImage3= $row['image3'];
    $currentAgreement= $row['agreement'];
    $currentService= $row['service'];
    $currentNotes= $row['notes'];

    $check= json_encode("false");
    echo '<div id="check">'.$check.'</div>';
    echo '
      <div id="popup" class="popup">
        <table>
          <tr>
            <td>
            <form method="post" autocomplete="off" enctype="multipart/form-data" id="updateForm" action="update.php?id='.$currentID.'">
            <div>
              <label for="nameB">Name:</label>
              <input type="text" id="nameB" placeholder="Full Name" name="nameB" value="'.$currentName.'" required></input>
            </div>
            <div>
               <label for="emailB">Email:</label>
               <input type="email" id="emailB" placeholder="Email address" name="emailB" value="'.$currentEmail.'" onkeyup="updateRequirements2()" required></input>
            </div>
            <div>
              <label for="phoneB">Phone:</label>
              <input type="tel" id="phoneB" placeholder="1(246)777-7777" name="phoneB" onkeydown="updateNum2()" value="'.$currentPhone.'" onkeyup="updateRequirements2()" required></input>
            </div>

            <div>
              <label for="addressB">Address:</label>
              <input type="text" id="addressB" placeholder="2nd Avenue Lennox Goodland" name="addressB" value="'.$currentAddress.'"></input>
            </div>

            <div>
              <label for="jdateB">Date:</label>
              <input  type="date" id="JDate2" name="jdateB" value="'.$currentDate.'"></input>
            </div>

            <div>
              <label for="quoteB">Quote:</label>
              <input  type="number" id="quoteB" name="quoteB" value="'.$currentQuote.'"></input>
            </div>

            <div>
              <label for="service">Choose a Service:</label>
              <select name="serviceB" id="serviceB" value="'.$currentService.'">
                <option value="Not Decided">Not Decided</option>
                <option value="Gutter Installation">Gutter Installation</option>
                <option value="Gutter Protection">Gutter Protection</option>
                <option value="House Washing">House Washing</option>
                <option value="Roof Washing">Roof Washing</option>
                <option value="Gutter & Washing">Gutter & Washing</option>
              </select>
            </div>

            <div>
              <input style="background-color: #1accc0 ;" type="file" id="image1B" name="image1B" value="'.$currentImage1.'" accept="image/*"></input>
              <embed src="'.$currentImage1.'"width="33px" height="33px">
            </div>

            <div>
              <input style="background-color: #1accc0 ;" type="file" id="image2B" name="image2B" value="'.$currentImage2.'" accept="image/*"></input>
              <embed src="'.$currentImage2.'"width="33px" height="33px">
            </div>

            <div>
              <input style="background-color: #1accc0 ;" type="file" id="image3B" name="image3B" value="'.$currentImage3.'" accept="image/*"></input>
              <embed src="'.$currentImage3.'"width="33px" height="33px">
            </div>

            <div><div>Agreement</div>
              <embed src="'.$currentAgreement.'"width="800px" height="60px">
              <input style="background-color: #1acc7a ;" type="file" id="agreementB" name="agreementB" value="'.$currentAgreement.'" accept="image/*, application/pdf"></input>
            </div>

            <div>
              <label for="notes">Notes:</label>
              <br/>
              <textarea rows="3" id="notesB" name="notesB">'.$currentNotes.'</textarea>
            </div>

            <div class="form_action">
              <button type="update" name="update" value="Update">Update</button>
            </div>

              </form>';
  }
  else
  {
    $check= JSON.parse("false");
    echo '<div id="check">'.$check.'</div>';
    die(mysqli_error($con));
  }
}

 ?>


        </td>
      </tr>
    </table>
  </div>
</body>

<footer>Israel Howell© 2022</footer>
<script =type="text/javascript" src="./script.js"></script>
</html>
