<?php
header("Set-Cookie: key4=value; path=/; HttpOnly; Secure; SameSite=Strict");
session_start();

include 'connect.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Projects</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Israel Howell">
  </head>
  <body>

    <div class="cover"></div>
    <a href="index.php"><img class="logo"src="logo.png"></a>

    <?php
    if(isset($_GET['deleteid']))
    {
      $id= $_GET['deleteid'];
      echo '<div id="check2"></div>';
      echo '
    <div id="popup2" class="popup2">
    <a href="delete.php?id='.$id.'"><button class="confirm danger">Confirm</button></a>
    </div>';
    }
    ?>

    <div id="popup" class="popup">
      <table>
        <tr>
          <td>

                <?php
                if(isset($_GET['id']))
                {
                  $currentID= $_GET['id'];
                  $sql= "SELECT * from `test` WHERE jobid=$currentID";
                  $currentResult= mysqli_query($con, $sql);
                  $row=mysqli_fetch_assoc($currentResult);
                  $currentName= $row['name'];
                  $currentEmail= $row['email'];
                  $currentDate= $row['date'];
                  $currentPhone= $row['phone'];
                  $currentQuote= $row['Quote'];
                  $currentAddress= $row['Address'];
                  $currentImage1= $row['image1'];
                  $currentImage2= $row['image2'];
                  $currentImage3= $row['image3'];
                  $currentAgreement= $row['agreement'];
                  $currentService= $row['service'];
                  $currentNotes= $row['notes'];

                  $sql= "SELECT * FROM `test` WHERE jobid=$currentID";
                  $result= mysqli_query($con, $sql);
                  if($result)
                  {
                    $check= json_encode("true");
                    echo '<div id="check"'.$check.'</div>';
                echo '
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
                  <input style="background-color: #1accc0 ;" type="file" id="image1B" name="image1B" value="'.$currentImage1.'" accept="image/*"/></input>
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
                </div>';

                  }
                  else
                  {
                    $check= JSON.parse("false");
                    echo '<div id="check"'.$check.'</div>';
                    die(mysqli_error($con));
                  }
                }
                ?>
              </div>
            </form>
          </td>
        </tr>
      </table>
    </div>

    <input type="text" name="search" id="search" class="form-control" placeholder= "Search"/>
    <a href="download.php" id="download"><button >Download</button></a>

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
          <td>
            <table id="customers">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Quote</th>
                  <th>Service</th>
                  <th>Image1</th>
                  <th>Image2</th>
                  <th>Image3</th>
                  <th>Deal</th>
                </tr>
              </thead>
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
                    <th>'.$id.'</th>
                    <td class="information">'.$name.'<textarea readonly class="notesShow">'.$notes.'</textarea></td>
                    <td>'.$email.'</td>
                    <td>'.$phone.'</td>
                    <td>'.$address.'</td>
                    <td>'.$date.'</td>
                    <td>$'.$quote.'</td>
                    <td>'.$service.'</td>
                    <td class="img"><img class="img1" src="'.$image1.'" width="30px" height="30px"></td>
                    <td class="img"><img class="img1" src="'.$image2.'" width="30px" height="30px"></td>
                    <td class="img"><img class="img1" src="'.$image3.'" width="30px" height="30px"></td>
                    <td><embed src="'.$agreement.'" width="30px" height="30px"/></td>
                    <td><a class="updateButton" href="index.php?id='.$id.'"><button>Update</button></a></td>
                    <td><a class="deleteButton" href="index.php?deleteid='.$id.'"><button class="danger">Delete</button></a></td>
                    <td><a href="display.php?id='.$id.'"><button>Display</button></a></td>
                    </tr>';

                  }
                }

                 ?>

              </tbody>
            </table>
          </td>
        </td>
      </tr>
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
