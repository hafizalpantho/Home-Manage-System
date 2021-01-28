
<?php
require "../includes/db_connect.inc.php";
session_start();




$sessionUname = $_SESSION['login_user'];
$name=$pwd=$address=$phone=$nid=$dob=$email=$gender=$usertype= $userNameErr="";
$errExists = 0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['ur_name'])){
    $userNameErr = "Name cannot be empty!";
    $errExists = 1;
  }else{
    $name = mysqli_real_escape_string($conn, $_POST['ur_name']);
  }
  $pwd = mysqli_real_escape_string($conn, $_POST['ur_pwd']);
  $address = mysqli_real_escape_string($conn, $_POST['ur_address']);
  $phone = mysqli_real_escape_string($conn, $_POST['ur_phone']);
  $nid = mysqli_real_escape_string($conn, $_POST['ur_nid']);
  $dob = mysqli_real_escape_string($conn, $_POST['ur_dob']);
  $email = mysqli_real_escape_string($conn, $_POST['r_email']);
  $gender = mysqli_real_escape_string($conn, $_POST['ur_gender']);
  $usertype = mysqli_real_escape_string($conn, $_POST['type']);

  if(isset($_POST['ur_update'])){

        $sqlUserInsert = "update renter set pass='$pwd', address='$address', phone='$phone', nid='$nid', date='$dob', email='$email', gender='$gender', type='$usertype' where name = '$name' and ownerName = '$sessionUname'";
        mysqli_query($conn, $sqlUserInsert);

        $sqlUserInsert1 = "update login set pass='$pwd', type='$usertype' phone='$phone' where user = '$name' and ownerName = '$sessionUname'";
        mysqli_query($conn, $sqlUserInsert1);



    }

    if(isset($_POST['ur_back'])){
      setcookie("loggedinuser","",time()-60,"/");
      header("location: owner.php");
    }

      if(isset($_POST['ur_delete'])){

            $sqlUserInsert = "DELETE FROM login where user = '$name' and ownerName = '$sessionUname' ";
            mysqli_query($conn, $sqlUserInsert);

            $sqlUserInsert = "DELETE FROM account where name = '$name' and ownerName = '$sessionUname' ";
            mysqli_query($conn, $sqlUserInsert);


            $sqlUserInsert1 = "DELETE FROM renter where name = '$name' and ownerName = '$sessionUname'";
            $query_run = mysqli_query($conn, $sqlUserInsert1);

            if($query_run)
            {
              echo '<script type="text/javascript"> alert("Delete successfully!")</script>';
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
	background-image: url("../image/aupcaretaker.jpg");
	background-size:cover;
	font-family:sans-serif;
}

    </style>
        <meta charset="utf-8">
        <title >Edit Renter Profile</title>
    </head>
    <body>


        <h1 align = center >Edit Renter Profile</h1>
        <h5 align = "center" <span style="color:red;"><?php echo $userNameErr; ?></span></h5>



        <form action="" method="post">
          <?php if(isset($_SESSION["login_user"])) { ?>
          <?php } ?>

            <table align=center>




            <tr>
                    <td>User Name</td>
                    <td><input type="text" placeholder ="Search User Name" name="ur_name" ></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="ur_pwd" ></td>
                </tr>

                <tr>
                  <td>Permanent Address:</td>
                  <td><input type="text" name="ur_address" ></td>
                </tr>

                <tr>
                    <td>Phone No:</td>
                    <td><input type="text" name="ur_phone"></td>
                  </tr>

                  <tr>
                    <td>NID:</td>
                    <td><input type="text" name="ur_nid"></td>
                  </tr>

                <tr>
                    <td>Date of Birth: </td>
                    <td><input type="text" name="ur_dob" value="" ></td>
                  </tr>




                  <tr>
                    <td>E-mail:</td>
                    <td><input type="email" name="r_email" ></td>
                  </tr>

                  <tr>
                    <td>Gender: </td>
                    <td>
                      <input type="radio" name="ur_gender" value="male" checked required> Male
                      <input type="radio" name="ur_gender" value="female" required> Female
                      <input type="radio" name="ur_gender" value="others" required> Others
                    </td>
                  </tr>
                  <tr>
                    <td>User Type</td>
                    <td>
                      <select class="type" name="type" >
                        <option selected = "true"><b>Renter</option>

                      </select>


                    </td>
                  </tr>


            </table>

            <table  align="center" >
              <tr>
                <td  ><input type="submit" name="search" class="do" value="Search"></td>
                <td  ><input type="submit" name="ur_update" class="do" value="Update"></td>
                <td  ><input type="submit" name="ur_delete" class="do" value="Delete"></td>

              </tr>
              </table><br>



              <table align ="right">
                <tr>
                  <td  ><input type="button" name="reset" class="do" value="Reset" onclick="window.location.href='o_updaterenter.php'"></td>
                  <td  ><input type="submit" name="ur_back" class="do"   value="Back"></td>
                </tr>
              </table>


        </form>
        <?php

      if(isset($_POST['search'])){


          $query =  "select * FROM renter where name = '$name' and ownerName = '$sessionUname';";
          $query_run = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($query_run)) {?>

          <table align=center>



          <tr>
                  <td>Name</td>
                  <td><input type="text" placeholder ="" name="r_name" value = "<?php echo $row['name'] ?>"></td>
              </tr>

              <tr>
                  <td>Password</td>
                  <td><input type="password" name="ur_pwd" value = "<?php echo $row['pass'] ?>"></td>
              </tr>

              <tr>
                <td>Address:</td>
                <td><input type="text" name="ur_address" value = "<?php echo $row['address'] ?>"></td>
              </tr>

              <tr>
                  <td>Phone No:</td>
                  <td><input type="text" name="ur_phone" value = "<?php echo $row['phone'] ?>"></td>
                </tr>

                <tr>
                  <td>NID:</td>
                  <td><input type="text" name="ur_nid" value = "<?php echo $row['nid'] ?>"></td>
                </tr>

              <tr>
                  <td>Date of Birth: </td>
                  <td><input type="text" name="ur_dob" value = "<?php echo $row['date'] ?>" ></td>
                </tr>




                <tr>
                  <td>E-mail:</td>
                  <td><input type="email" name="r_email" value = "<?php echo $row['email'] ?>" ></td>
                </tr>

                <tr>
                  <td>Gender: </td>
                    <td><input type="text" name="" value = "<?php echo $row['gender'] ?>" ></td>

                </tr>
                <tr>
                  <td>User Type</td>
                  <td>
                    <select class="type" name="type" >
                      <option selected = "true"><b>Renter</option>

                    </select>


                  </td>
                </tr>

          </table>



<?php           }





 } ?>
    </body>

</html>
