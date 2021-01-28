<?php
require "../includes/db_connect.inc.php";

 ?>

<!DOCTYPE><html>
    <head>
    <link rel="stylesheet" href="../css/tolet.css">
        <style>
 body
{
	margin:10;
	padding:0;
	background-image: url("../image/atolet.jpg");
	background-size:cover;
	font-family:sans-serif;
}

        </style>
        <title backgound color>Tolet</title>
    </head>
    <center>
    <body>
        <h1  style="color:white">Welcome To Our Home</h1>
        <form action="" method="post">


              <table align = "center" border="1" style="color:black; width:80% ; font-size:25px;">
                <thead>

                    <tr>
                      <th>Flat Number</th>
                      <th>Floor</th>
                      <th>Free from</th>
                      <th>Rent</th>
                      <th>Type</th>
                      <th>Address</th>
                      <th>Contact</th>
                      <th>Owner name</th>
                    </tr>
                </thead>
                <tbody>

                  <?php

                  $sql = "select * from tolet;";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                      <td align = "center"><?php echo $row['number']; ?></td>
                      <td align = "center"><?php echo $row['floor']; ?></td>
                      <td align = "center"><?php echo $row['freeFrom']; ?></td>
                      <td align = "center"><?php echo $row['rent']; ?></td>
                      <td align = "center"><?php echo $row['type']; ?></td>
                        <td align = "center"><?php echo $row['address']; ?></td>
                      <td align = "center"><?php echo $row['contact']; ?></td>
                      <td align = "center"><?php echo $row['ownerName']; ?></td>
                    </tr>




                <?php  } ?>
                </tbody>


              </table>











        </form>
              </body>

                     </head>
                     </html>
