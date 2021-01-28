<?php
require "../includes/db_connect.inc.php";

session_start();
$sessionUname = $_SESSION['login_user'];
if(isset($_POST['rf_logout'])){
  setcookie("loggedinuser","",time()-60,"/");
  header("location: renterhome.php");

}

 ?>




<!DOCTYPE><html>
    <head>
    <link rel="stylesheet" href="../css/renter.css">
        <style>
 body
{
	margin:10;
	padding:0;
	background-image: url("../image/renter2.jpg");
	background-size:cover;
	font-family:sans-serif;
}

        </style>
        <title backgound color>Info</title>
    </head>
    <center>
    <body>
        <h1  style="color:white">My Profile</h1>
        <form action="" method="post">
          <?php if(isset($_SESSION["login_user"])) { ?>
          <?php } ?>

            <table>
                <tbody>


                    <tr>
                    <a><td align="left" colspan="2"><input type="submit" name="rf_view" class="do" value="View"></input><br>
                    </tr>
                    </table>
                    </center>
                    <?php
                      if(isset($_POST['rf_view'])){ ?>
                        <table align = "center" border="1" style="color:black; width:80% ; font-size:25px;">
                          <thead>

                              <tr>
                                <th>Name</th>
                                <th>Password</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>NID</th>
                                <th>D.O.B</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Owner Name</th>
                              </tr>
                          </thead>
                          <tbody>


                            <?php
                            $sql = "select name, pass, address, phone, nid, date,email,gender,ownerName from renter where name = '$sessionUname';";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)){ ?>
                              <tr>
                                <td align = "center"><?php echo $row['name']; ?></td>
                                <td align = "center"><?php echo $row['pass']; ?></td>
                                <td align = "center"><?php echo $row['address']; ?></td>
                                <td align = "center"><?php echo $row['phone']; ?></td>
                                <td align = "center"><?php echo $row['nid']; ?></td>
                                <td align = "center"><?php echo $row['date']; ?></td>
                                <td align = "center"><?php echo $row['email']; ?></td>
                                <td align = "center"><?php echo $row['gender']; ?></td>
                                <td align = "center"><?php echo $row['ownerName']; ?></td>

                              </tr>




                          <?php  } ?>
                          </tbody>
                        </table>

                    <?php  } ?>
                    <br><br>
                    <table align=right>

                    <tr>
                    <a><td  ><input type="submit" name="rf_logout" class="do" value="Back"></input></a><br>
                     </tr>
                     </tbody>
                     </table>
                   </form>

                     </body>

                     </head>
                     </html>
