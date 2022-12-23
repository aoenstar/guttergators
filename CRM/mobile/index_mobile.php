<?php
header("Set-Cookie: key4=value; path=/; HttpOnly; Secure; SameSite=Strict");
session_start();

include 'connect.php';

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

    <div class="cover"></div>
    <a href="index_mobile.php"><img class="logo"src="logo.png"></a>

    <?php
    if(isset($_GET['deleteid']))
    {
      $id= $_GET['deleteid'];
      echo '<div id="check2"></div>
      <div id="popup2" class="popup2">
      <a href="delete.php?id='.$id.'"><button class="confirm danger">Confirm</button></a>
      </div>';
    }
    ?>

    <input type="text" name="search" id="search" class="form-control" placeholder= "Search"/>
    <div>
      <a href="download.php" id="download"><button >Download</button></a>
      <a href="create.php" id="download"><button >Create</button></a>
    </div>

    <table>
          <td>
            <table id="customers">
              <tbody>

                <?php

                $sql= "SELECT * FROM `test`";
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


                    echo '<tr>
                        <td class="information">'.$name.'</td>
                        <td>'.$date.'</td>
                        <td class="img"><img class="img1" src="'.$image1.'" width="30px" height="30px"></td>
                        <td class="hide">'.$email.'</td>
                        <td class="hide">'.$phone.'</td>
                        <td class="hide">'.$address.'</td>
                        <td class="hide">$'.$quote.'</td>
                        <td class="hide">'.$service.'</td>
                        <td><a class="updateButton" href="update_mobile.php?id='.$id.'"><button>Update</button></a></td>
                        <td><a class="deleteButton" href="index_mobile.php?deleteid='.$id.'"><button class="danger">Delete</button></a></td>
                        <td><a href="display_mobile.php?id='.$id.'"><button>Display</button></a></td>

                    </tr>';

                  }
                }

                 ?>

              </tbody>
            </table>
          </td>
    </table>
  </body>

  <footer>Israel Howell© 2022</footer>
  <script =type="text/javascript" src="./script.js"></script>

</html>
<script>
    $(document).ready(function(){
         $('#search').keyup(function(){
              search_table($(this).val());
         });
         function search_table(value){
              $('#customers tbody tr').each(function(){
                   var found = 'false';
                   $(this).each(function(){
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                        {
                             found = 'true';
                        }
                   });
                   if(found == 'true')
                   {
                        $(this).show();
                   }
                   else
                   {
                        $(this).hide();
                   }
              });
         }
    });
</script>
