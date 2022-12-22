<?php
include("connect.php");
include("SimpleXLSXGen.php");

$customers = [
  ['ID', 'Name', 'Email', 'Phone', 'Address', 'Date', 'Quote', 'Service', 'image1', 'image2', 'image3', 'Agreement', 'Notes']
];

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

    $customers = array_merge($customers, array(array($id, $name, $email, $phone, $address, $date, $quote, $service, $image1, $image2, $image3, $agreement, $notes)));
  }
}
    $xlsx = Shuchkin\SimpleXLSXGen::fromArray( $customers );
    $xlsx->downloadAs('customers.xlsx');

    header("Location: index.php");

?>
