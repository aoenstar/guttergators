<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Projects</title>
    <link rel="stylesheet" href="mobile.css"/>
  </head>
  <body>
    <div class="cover"></div>
    <a href="index_mobile.php"><img class="logo"src="logo.png"/></a>

    <div class="info">
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
            <a class="updateButton" href="update_mobile.php?id='.$id.'"><button>Update</button></a>
            <a class="deleteButton" href="display_mobile.php?id='.$id.'&deleteid='.$id.'"><button class="danger">Delete</button></a>
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


        </td>
      </tr>
    </table>
  </div>
</body>

<footer>Israel Howell© 2022</footer>
<script =type="text/javascript" src="./script.js"></script>
</html>
