<?php
require "../includes/db_connect.inc.php";

session_start();


$name = $ppwd = $pwd  =$address  =$dob  =$email =$phone =$gender =$type = $nid ="";
$userNameErr = $passErr=$cpassErr=$addressErr=$dobErr=$emailErr=$phoneErr=$genderErr=$typeErr= $cPassErr= $nidErr="";
$errExists = 0;



if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['uname'])){
    $userNameErr = "Name cannot be empty!";
    $errExists = 1;
  }else{
    $name = mysqli_real_escape_string($conn, $_POST['uname']);
  }

  if(empty($_POST['p_pwd'])){
    $passErr = "Password cannot be empty!";
    $errExists = 1;


  }else{
    $ppwd = mysqli_real_escape_string($conn, $_POST['p_pwd']);
  }

if(empty($_POST['pwd'])){
  $cpassErr = "C. password cannot be empty!";
  $errExists = 1;

}else{
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
}



  if(empty($_POST['u_address'])){
    $addressErr = "address cannot be empty!";
    $errExists = 1;


  }else{
    $address = mysqli_real_escape_string($conn, $_POST['u_address']);
  }


  if(empty($_POST['u_dob'])){
    $dobErr = "DOB cannot be empty!";
    $errExists = 1;


  }else{
    $dob = mysqli_real_escape_string($conn, $_POST['u_dob']);
  }

  if(empty($_POST['u_email'])){
    $emailErr = "Email cannot be empty!";
    $errExists = 1;


  }else{
    $email = mysqli_real_escape_string($conn, $_POST['u_email']);
  }

  if(empty($_POST['u_phone'])){
    $phoneErr = "Phone cannot be empty!";
    $errExists = 1;


  }else{
    $phone = mysqli_real_escape_string($conn, $_POST['u_phone']);
  }

  if(empty($_POST['u_gender'])){
    $genderErr = "Gender cannot be empty!";
    $errExists = 1;


  }else{
    $gender = mysqli_real_escape_string($conn, $_POST['u_gender']);
  }
  if(empty($_POST['type'])){
    $typeErr = "User type cannot be empty!";
    $errExists = 1;


  }else{
    $type = mysqli_real_escape_string($conn, $_POST['type']);
  }

  if(empty($_POST['u_nid'])){
    $nidErr = "NID cannot be empty!";
    $errExists = 1;


  }else{
    $nid = mysqli_real_escape_string($conn, $_POST['u_nid']);
  }



  if($ppwd != $pwd){
    $cPassErr = "Passwords doesn't match!";
    $errExists = 1;
  }


  if($errExists != 1){

    $sqlUers = "select * from login where user = '$name'";
    $results = mysqli_query($conn, $sqlUers);

    $rowCount = mysqli_num_rows($results);

    if($rowCount > 0){
      echo '<script type="text/javascript"> alert("User already exists!")</script>';
      $userNameErr = "User already exists!";
    }
    else{
      $sqlUserInsert = "insert into ownerrequest (name, pass, address, date, email, phone,nid, gender, type)
      values ('$name', '$ppwd', '$address', '$dob', '$email', '$phone','$nid' ,'$gender', '$type');";

      mysqli_query($conn, $sqlUserInsert);

      echo '<script type="text/javascript"> alert("Insert successful! Please wait until admin approves")</script>';    }
  }



}




 ?>


<!DOCCTYPE html>
<html lang="en" dir="ltr">

    <head>
    <link rel="stylesheet" href="../css/register.css">
    <style>
      </style>

        <meta charset="utf-8">
        <title>Sign Up</title>
    </head>
    <body>
      <div class="registrationBox">
        <h1>Register</h1>
        <form action="" method="post">

            <table>
                <tr>
                    <td><p>User Name</p></td>
                    <td><input type="text" placeholder ="Enter User Name..." name="uname" class="from_control">
                      <br><span style="color:red;"><?php echo $userNameErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <td><p>Password</p></td>
                    <td><input type="password" placeholder="Enter password" name="p_pwd" class="from_control">
                      <br>  <span style="color:red;"><?php echo $passErr; ?></span>
                      <br>  <span style="color:red;"><?php echo $cPassErr; ?></span>



                    </td>
                </tr>

                <tr>
                    <td><p>Confirm Password</p></td>
                    <td><input type="password" placeholder="Confirm password " name="pwd" class="from_control">
                      <br><span style="color:red;"><?php echo $cpassErr; ?></span>
                    </td>
                </tr>

                <tr>
                  <td><p>Address:</p></td>
                  <td><input type="text" placeholder="Enter Address" name="u_address" class="from_control">
                    <br><span style="color:red;"><?php echo $addressErr; ?></span>
                  </td>
                </tr>

                <tr>
                    <td><p>Date of Birth:</p> </td>
                    <td><input type="text"  placeholder="Enter Date" name="u_dob" class="from_control" value="" >
                    <br>  <span style="color:red;"><?php echo $dobErr; ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td><p>E-mail:</p></td>
                    <td><input type="email" placeholder="Enter Email" name="u_email" class="from_control">
                    <br>  <span style="color:red;"><?php echo $emailErr; ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td><p>Phone: </p></td>
                    <td><input type="text" placeholder="Enter your number" name="u_phone" class="from_control">
                      <br>  <span style="color:red;"><?php echo $phoneErr; ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td><p>NID: </p></td>
                    <td><input type="text" placeholder="Enter your NID" name="u_nid" class="from_control">
                      <br>  <span style="color:red;"><?php echo $nidErr; ?></span>
                    </td>
                  </tr>


                  <tr>
                    <td><p>Gender: </p></td>
                    <td>
                      <input type="radio" name="u_gender" class="n" value="male" checked required><span style="color:white"> Male
                      <input type="radio" name="u_gender" class="n" value="female" required> Female
                    </td>
                  </tr>
                  <tr>
                    <td><p>User Type</td>
                    <td>
                      <select class="type" name="type">
                        <option selected = "true">Owner</option>
                      </select>

                    </td>
                  </tr>

                  <tr align="right">
                    <td colspan="2"><input class="btn" type="submit" name="btn_registration" value="Confirm"></td>
                  </tr>
            </table>

        </form>
</div>
    </body>

</html>
