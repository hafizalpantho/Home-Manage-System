<?php
require "../includes/db_connect.inc.php";
session_start();



$sessionUname = $_SESSION['login_user'];

$name=$pwd=$address=$phone=$nid=$dob=$email=$gender=$usertype= $userNameErr="";
$errExists = 0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['ua_name'])){
    $userNameErr = "Name cannot be empty!";
    $errExists = 1;
  }else{
    $name = mysqli_real_escape_string($conn, $_POST['ua_name']);
  }
  $pwd = mysqli_real_escape_string($conn, $_POST['ua_pwd']);
  $address = mysqli_real_escape_string($conn, $_POST['ua_address']);
  $phone = mysqli_real_escape_string($conn, $_POST['ua_phone']);
  $nid = mysqli_real_escape_string($conn, $_POST['ua_nid']);
  $dob = mysqli_real_escape_string($conn, $_POST['ua_dob']);
  $email = mysqli_real_escape_string($conn, $_POST['ua_email']);
  $gender = mysqli_real_escape_string($conn, $_POST['ua_gender']);
  $usertype = mysqli_real_escape_string($conn, $_POST['type']);

  if(isset($_POST['ua_submit'])){

        $sqlUserInsert = "update owner set pass='$pwd', address='$address', phone='$phone', nid='$nid', date='$dob', email='$email', gender='$gender', type='$usertype' where name = '$sessionUname'";
        mysqli_query($conn, $sqlUserInsert);

        $sqlUserInsert1 = "update login set pass='$pwd', type='$usertype',phone = '$phone' where user = '$name'";
        $query_run = mysqli_query($conn, $sqlUserInsert1);
        if($query_run)
        {
          echo '<script type="text/javascript"> alert("Update successful!")</script>';
        }
        else {
          echo '<script type="text/javascript"> alert("There is a problem! Please Cheacked!!")</script>';
        }


    }

    if(isset($_POST['ua_back'])){
      setcookie("loggedinuser","",time()-60,"/");
      header("location: adminHome.php");
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
	background-image: url("../image/aupadmin.jpg");
	background-size:cover;
	font-family:sans-serif;
}

    </style>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <title> UpdateAdmin </title>
    <body>
        <h1 align = center>Edit Owner Profile</h1>
          <h5 align = "center" <span style="color:red;"><?php echo $userNameErr; ?></span></h5>
        <form action="" method="post">
          <?php if(isset($_SESSION["login_user"])) { ?>
          <?php } ?>
            <table align=center>


                <tr>
                    <td><b>User Name</td>
                    <td><input type="text" placeholder ="Search User Name" name="ua_name" ></td>
                </tr>

                <tr>
                    <td><b>Password</td>
                    <td><input type="password" name="ua_pwd"></td>
                </tr>

                <tr>
                  <td><b>Address:</td>
                  <td><input type="address" name="ua_address"></td>
                </tr>

                <tr>
                    <td><b>Phone No:</td>
                    <td><input type="phone_no" name="ua_phone"></td>
                  </tr>

                  <tr>
                    <td><b>NID:</td>
                    <td><input type="nid" name="ua_nid"></td>
                  </tr>
                  <tr>
                      <td><b>Date of Birth: </td>
                      <td><input type="text" name="ua_dob" value="" ></td>
                    </tr>

                  <tr>
                    <td><b>Email:</td>
                    <td><input type="email" name="ua_email"></td>
                  </tr>

                  <tr>
                    <td><b>Gender: </td>
                    <td>
                      <input type="radio" name="ua_gender" value="male" checked required> Male
                      <input type="radio" name="ua_gender" value="female" required> Female
                      <input type="radio" name="ua_gender" value="others" required> Others
                    </td>
                  </tr>

                  <tr>
                    <td><b>User Type</td>
                    <td>
                      <select class="type" name="type" >
                        <option selected = "true"><b>Owner</option>

                      </select>


                    </td>
                  </tr>

            </table>
            <table  align="center" >
              <tr>
                <td  ><input type="submit" name="search" class="do" value="Search"></td>
                <td  ><input type="submit" name="ua_submit" class="do" value="Update"></td>
                <td  ><input type="submit" name="view" class="do" value="View Owner List"></td>
                <td  ><input type="button" name="reset" class="do" value="Reset" onclick="window.location.href='o_update_owner.php'"></td>
              </tr>
              </table><br>




              <?php
              if(isset($_POST['search'])){

              $query =  "select * FROM owner where name = '$name'";
              $query_run = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_array($query_run)) {?>

                <table align=center>



                <tr>
                        <td>Name</td>
                        <td><input type="text" placeholder ="" name="" value = "<?php echo $row['name'] ?>"></td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="" value = "<?php echo $row['pass'] ?>"></td>
                    </tr>

                    <tr>
                      <td>Address:</td>
                      <td><input type="text" name="" value = "<?php echo $row['address'] ?>"></td>
                    </tr>

                    <tr>
                        <td>Phone No:</td>
                        <td><input type="text" name="" value = "<?php echo $row['phone'] ?>"></td>
                      </tr>

                      <tr>
                        <td>NID:</td>
                        <td><input type="text" name="" value = "<?php echo $row['nid'] ?>"></td>
                      </tr>

                    <tr>
                        <td>Date of Birth: </td>
                        <td><input type="text" name="" value = "<?php echo $row['date'] ?>" ></td>
                      </tr>




                      <tr>
                        <td>E-mail:</td>
                        <td><input type="email" name="" value = "<?php echo $row['email'] ?>" ></td>
                      </tr>

                      <tr>
                        <td>Gender: </td>
                          <td><input type="text" name="" value = "<?php echo $row['gender'] ?>" ></td>

                      </tr>
                      <tr>
                        <td>User Type</td>
                        <td>
                          <select class="type" name="type" >
                            <option selected = "true"><b>Owner</option>

                          </select>


                        </td>
                      </tr>


                </table>



              <?php     }
              }  ?>



              <?php
                if(isset($_POST['view'])){ ?>

              <table align = "center" border="1" style="color:black; width:80% ; font-size:20px;">
                <thead>

                    <tr>
                      <th>Owner Name</th>
                      <th>Password</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>NID</th>
                      <th>DOB</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>User Type</th>
                    </tr>
                </thead>
                <tbody>

                  <?php

                  $sql = "select * from owner;";
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
                      <td align = "center"><?php echo $row['type']; ?></td>
                    </tr>




                <?php  } ?>
                </tbody>


              </table>
                <?php  } ?>







              <table align ="right">
                <tr>
                  <td  ><input type="submit" name="ua_back" class="do"   value="Back"></td>
                </tr>
              </table>


        </form>

    </body>

</html>
