<?php
require "../includes/db_connect.inc.php";

session_start();

$sessionUname = $_SESSION['login_user'];
$name=$pwd=$address=$phone=$nid=$dob=$gender=$usertype=$userNameErr =$oname ="";
$errExists = 0;

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['c_name'])){
    $userNameErr = "Name cannot be empty!";
    $errExists = 1;
  }else{
    $name = mysqli_real_escape_string($conn, $_POST['c_name']);
  }

  $pwd = mysqli_real_escape_string($conn, $_POST['c_pwd']);
  $address = mysqli_real_escape_string($conn, $_POST['c_address']);
  $phone = mysqli_real_escape_string($conn, $_POST['c_phone']);
  $nid = mysqli_real_escape_string($conn, $_POST['c_nid']);
  $dob = mysqli_real_escape_string($conn, $_POST['c_dob']);
  $gender = mysqli_real_escape_string($conn, $_POST['c_gender']);
  $usertype = mysqli_real_escape_string($conn, $_POST['type']);
  $oname = mysqli_real_escape_string($conn, $_POST['r_oname']);

  if(isset($_POST['c_submit'])){

    if($errExists != 1){
      $sqlUers = "select id from login where user = '$name'";
      $results = mysqli_query($conn, $sqlUers);
      $rowCount = mysqli_num_rows($results);
      if($rowCount > 0){
        $userNameErr = "User already exists!";
      }
      else {
        $sqlUserInsert = "insert into caretaker (name, pass, address, phone, nid, date, gender, type,ownerName)
        values ('$name', '$pwd', '$address', '$phone', '$nid', '$dob', '$gender','$usertype','$oname');";
        mysqli_query($conn, $sqlUserInsert);

        $sqlUserInsert1 = "insert into login (user, pass, type,ownerName,phone)
        values ('$name', '$pwd', '$usertype','$sessionUname','$phone');";
        mysqli_query($conn, $sqlUserInsert1);
      }

    }

  }
  if(isset($_POST['c_back'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: owner.php");
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
	background-image: url("../image/arenter.png");
	background-size:cover;
	font-family:sans-serif;
}

    </style>

        <meta charset="utf-8">
        <title >Caretaker</title>
    </head>
    <body>
        <h1 align = center>Create CareTaker</h1>
        <h5 align = "center" <span style="color:red;"><?php echo $userNameErr; ?></span></h1>
        <form action="" method="post">
          <?php if(isset($_SESSION["login_user"])) { ?>
          <?php } ?>
            <table align=center>


                <tr>
                    <td style ="color:black">User Name</td>
                    <td><input type="text" placeholder ="" name="c_name"></td>
                </tr>

                <tr>
                    <td style ="color:black">Password</td>
                    <td><input type="password" name="c_pwd"></td>
                </tr>

                <tr>
                  <td style ="color:black">Address:</td>
                  <td><input type="text" name="c_address"></td>
                </tr>
                <tr>

                    <td style ="color:black">Phone: </td>
                    <td>+880 <input type="text" name="c_phone"></td>

                </tr>

                  <tr>
                    <td style ="color:black">NID:</td>
                    <td><input type="text" name="c_nid"></td>
                  </tr>

                <tr>
                    <td style ="color:black">Date of Birth: </td>
                    <td><input type="text" name="c_dob" value="" ></td>
                  </tr>




                  <tr>
                    <td>Gender</td>
                    <td style ="color:black">
                      <input type="radio" name="c_gender" value="male" checked required> Male
                      <input type="radio" name="c_gender" value="female" required> Female
                      <input type="radio" name="c_gender" value="others" required> Others
                    </td>
                  </tr>
                  <tr>
                    <td>User Type</td>
                    <td>
                      <select class="type" name="type">
                        <option selected = "true"><b>CareTaker</option>

                      </select>


                    </td>
                  </tr>

                  <tr>
                    <td>Owner Name</td>
                    <td><input type="text" placeholder ="" name="r_oname" value="<?php echo $sessionUname; ?>" > </td>
                  </tr>


            </table>
            <table  align="center" >
              <tr>
                <td  ><input type="submit" name="c_submit" class="do" value="Submit"></td>
                <td  ><input type="reset" name="c_reset" class="do" value="Reset"></td>
              </tr>
              </table><br>
              <table align ="right">
                <tr>
                  <td  ><input type="submit" name="c_back" class="do"  value="Back"></td>
                </tr>
              </table>

        </form>
    </body>

</html>
