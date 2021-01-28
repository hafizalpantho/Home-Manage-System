<?php
require "../includes/db_connect.inc.php";

session_start();


$sessionUname = $_SESSION['login_user'];
$name = $pwd = $address = $phone =  $nid = $dob= $email = $gender = $usertype =$oname= $userNameErr = "";
$passErr = $addErr =$nidErr=$e="";
$errExists = 0;

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['r_name'])){
    $userNameErr = "Name cannot be empty!";
    $errExists = 1;
  }else{
    $name = mysqli_real_escape_string($conn, $_POST['r_name']);
  }
  if(empty($_POST['r_pwd'])){
    $passErr = "Password cannot be empty!";
    $errExists = 1;
  }else{
    $pwd = mysqli_real_escape_string($conn, $_POST['r_pwd']);
  }
  if(empty($_POST['r_address'])){
    $addErr = "Address cannot be empty!";
    $errExists = 1;
  }else{
    $address = mysqli_real_escape_string($conn, $_POST['r_address']);
  }

  $phone = mysqli_real_escape_string($conn, $_POST['r_phone']);
  if(empty($_POST['r_nid'])){
    $nidErr = "NID cannot be empty!";
    $errExists = 1;
  }else{
    $nid = mysqli_real_escape_string($conn, $_POST['r_nid']);
  }

  $dob = mysqli_real_escape_string($conn, $_POST['u_dob']);
  $email = mysqli_real_escape_string($conn, $_POST['r_email']);
  $gender = mysqli_real_escape_string($conn, $_POST['r_gender']);
  $usertype = mysqli_real_escape_string($conn, $_POST['type']);

  $oname = mysqli_real_escape_string($conn, $_POST['r_oname']);

  if(isset($_POST['r_submit'])){

    if($errExists != 1){
      $sqlUers = "select id from login where user = '$name'";
      $results = mysqli_query($conn, $sqlUers);
      $rowCount = mysqli_num_rows($results);
      if($rowCount > 0){
        $userNameErr = "User already exists!";
      }
      else {
        $sqlUserInsert = "insert into renter (name, pass, address, phone, nid, date, email, gender, type,ownerName)
        values ('$name', '$pwd', '$address', '$phone', '$nid', '$dob', '$email', '$gender','$usertype','$oname');";
        mysqli_query($conn, $sqlUserInsert);

        $sqlUserInsert1 = "insert into login (user, pass, type,ownerName,phone)
        values ('$name', '$pwd', '$usertype','$oname','$phone');";
        mysqli_query($conn, $sqlUserInsert1);

        $sqlUserInsert5 = "insert into complainbox (name, ownerName)
        values ('$name', '$oname');";
        mysqli_query($conn, $sqlUserInsert5);




        $sqlUserInsert2 = "insert into account (name,ownerName)
        values ('$name','$oname');";
        $query_run = mysqli_query($conn, $sqlUserInsert2);
        if($query_run)
        {
          echo '<script type="text/javascript"> alert("Insert successful!")</script>';
        }
        else {
          echo '<script type="text/javascript"> alert("There is a problem! Please Cheacked!!")</script>';
        }


      }

    }

  }
  if(isset($_POST['r_back'])){
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
        <title>Renter</title>
    </head>
    <body>
        <h1 align="center" style ="color:black">Create Renter</h1>
        <h5 align = "center" <span style="color:red;"><?php echo $userNameErr; ?></span></h5>
        <form action="" method="post">
          <?php if(isset($_SESSION["login_user"])) { ?>
          <?php } ?>
            <table align =center>

                <tr>
                    <td><b>User Name</td>
                    <td><input type="text" placeholder ="" name="r_name" > </td>
                </tr>

                <tr>
                    <td><b>Password</td>
                    <td><input type="password" name="r_pwd"  >  </td>
                </tr>

                <tr>
                  <td><b>Address:</td>
                  <td><input type="text" name="r_address" > </td>
                </tr>

                <tr>
                    <td><b>Phone No:</td>
                    <td><input type="text" name="r_phone"></td>
                  </tr>

                  <tr>
                    <td><b>NID:</td>
                    <td><input type="text" name="r_nid" >  </td>
                  </tr>

                <tr>
                    <td><b>Date of Birth: </td>
                    <td><input type="text" name="u_dob" value="" ></td>
                  </tr>

                  <tr>
                    <td><b>E-mail:</td>
                    <td><input type="email" name="r_email" ></td>
                  </tr>

                  <tr>
                    <td><b>Gender: </td>
                    <td>
                      <input type="radio" name="r_gender" value="male" checked > Male
                      <input type="radio" name="r_gender" value="female" > Female
                      <input type="radio" name="r_gender" value="others" > Others
                    </td>
                  </tr>
                  <tr>
                    <td><b>User Type</td>
                    <td>
                      <select class="type" name="type" >
                        <option selected = "true"><b>Renter</option>

                      </select>


                    </td>
                  </tr>
                  <tr>
                    <td><b>Owner Name</td>
                    <td><input type="text" placeholder ="" name="r_oname" value="<?php echo $sessionUname; ?>"> </td>
                  </tr>


                  </table>
                  <table align="center">

                     </table><br><br><br>
                  <table align="center">
                  <tr >
                    <td ><input  type="submit" name="r_submit" class="do" value="Submit"></td>
                    <td  ><input type="reset" name="c_reset" class="do" value="Reset"></td>

                  </tr>

            </table><br>


            <table align ="right">
              <tr>
                <td  ><input type="submit" name="r_back" class="do"   value="Back"></td>
              </tr>
            </table>

        </form>
    </body>

</html>
