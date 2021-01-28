<?php

require "../includes/db_connect.inc.php";

session_start();


$sessionUname = $_SESSION['login_user'];

$housen=$floor=$dob=$rent=$type=$phone=$name=$address=$userNameEr=$userErr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['t_housen'])){
    $userNameEr = "House field cannot be empty!";
    $errExists = 1;
  }else{
    $housen = mysqli_real_escape_string($conn, $_POST['t_housen']);
  }
  if(empty($_POST['t_floor'])){
    $userErr = "Floor field cannot be empty!";
    $errExists = 1;
  }else{
    $floor = mysqli_real_escape_string($conn, $_POST['t_floor']);
  }

  $dob = mysqli_real_escape_string($conn, $_POST['t_dob']);
  $rent = mysqli_real_escape_string($conn, $_POST['t_rent']);
  $type = mysqli_real_escape_string($conn, $_POST['t_type']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $phone = mysqli_real_escape_string($conn, $_POST['t_phone']);
  $name = mysqli_real_escape_string($conn, $_POST['o_name']);

  if(isset($_POST['t_back'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: owner.php");
  }

  if(isset($_POST['t_delete'])){
    $sqlUserInsert = "DELETE FROM tolet where number = '$housen'and floor = '$floor' and ownerName = '$sessionUname' ";
    $query_run = mysqli_query($conn, $sqlUserInsert);
    if($query_run)
    {
      echo '<script type="text/javascript"> alert("Delete successfully!")</script>';
    }
    else {
      echo '<script type="text/javascript"> alert("There is a problem! Please Cheacked!!")</script>';
    }


  }


  if(isset($_POST['t_update'])){
    $sqlUserInsert = "insert into tolet (number, floor, freeFrom, rent, type,address, contact,ownerName)
    values ('$housen', '$floor', '$dob', '$rent', '$type','$address', '$phone', '$sessionUname');";
    $query_run = mysqli_query($conn, $sqlUserInsert);
    if($query_run)
    {
      echo '<script type="text/javascript"> alert("Insert successfully!")</script>';
    }
    else {
      echo '<script type="text/javascript"> alert("There is a problem! Please Cheacked!!")</script>';
    }

  }


}



 ?>

<!DOCCTYPE html>
<html lang="en" dir="ltr">

    <head>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
 body{
      margin:0;
	padding:0;
	background-image: url("../image/atolet.jpg");
	background-size:cover;
	font-family:sans-serif;
}


    </style>
        <meta charset="utf-8">
        <title >TO LET</title>
    </head>
    <body>
        <h1 align="center">Create Tolet</h1>
        <form action="" method="post">
          <?php if(isset($_SESSION["login_user"])) { ?>
          <?php } ?>
            <br>
            <table align=center style="color:white">
                <tr>
                    <td><b>House No:</td>
                    <td><input type="text" placeholder ="" name="t_housen">
                      <span style="color:red;"><?php echo $userNameEr; ?></span>
                    </td>
                </tr><br>

                <tr>
                    <td><b>Floor:</td>
                    <td><input type="floor" placeholder ="" name="t_floor">
                      <span style="color:red;"><?php echo $userErr; ?></span>

                    </td>
                </tr>

                <tr>
                    <td><b>Will be Free From: </td>
                    <td><input type="text" name="t_dob" value="" ></td>
                  </tr>


                  <tr>
                    <td><b>Rent: </td>
                    <td><input type="rent" name="t_rent"></td>
                  </tr>
                  <tr>
                    <td><b>Preferable:</td>
                      <td>
                        <select name="t_type" >


                          <option value="Family">Family</option>
                          <option value="Bachelors">Bachelors</option>
                        </select>
                      </td>
                  </tr>
                  <tr>
                    <td><b>Address: </td>
                    <td><input type="text" name="address"></td>
                  </tr>
                  <tr>
                    <td><b>Contact: </td>
                    <td>+880 <input type="text" name="t_phone"></td>
                  </tr>

                  <tr>
                      <td><b>Owner Name:</td>
                      <td><input type="text" placeholder ="" name="o_name" value="<?php echo $sessionUname; ?>"></td>
                  </tr><br>



            </table>
            <br>
            <br>
            <table align="center">
              <tr>
                <td  ><input type="submit" name="t_update" class="do" value="Insert"></td>
                <td  ><input type="submit" name="t_delete" class="do" value="Delete"></td>
                <td  ><input type="submit" name="t_search" class="do" value="View All"></td>


                <td  ><input type="submit" name="reset" class="do" value="Reset" onclick="window.location.href='o_tolet.php'"></td>

              </tr>
              </table><br><br>
              <table align ="right">
                <tr>
                  <td  ><input type="submit" name="t_back" class="do"  value="Back"></td>
                </tr>
              </table>
        </form>
        <?php
          if(isset($_POST['t_search'])){ ?>
            <table align = "center" border="1" style="color:white; width:80% ; font-size:25px;">
              <thead>
                  <tr>
                    <th>Number</th>
                    <th>Floor</th>
                    <th>Free From</th>
                    <th>Rent</th>
                    <th>Type</th>
                    <th>Address</th>

                    <th>Contact</th>
                    <th>Owner Name</th>
                  </tr>
              </thead>
              <tbody>

                <?php
                $sql = "select number, floor, freeFrom, rent, type,address, contact,ownerName from tolet where ownerName = '$sessionUname';";
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

        <?php  } ?>
    </body>

</html>
