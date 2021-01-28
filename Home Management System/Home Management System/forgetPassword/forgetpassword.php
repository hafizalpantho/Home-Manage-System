<?php

require "../includes/db_connect.inc.php";


$pwd = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

if(isset($_POST['submit'])){
  $sql = "select * from login where user = '$name' and phone = '$email';";
  $query_run = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($query_run);
  //echo $count;

  while ($row = mysqli_fetch_assoc($query_run)){
    if($count >0)
    {
      $pwd = $row['pass'];
    }

  }
  if($count == 0){
    echo '<script type="text/javascript"> alert("Your User Name or Phone Number is invalid!!! \n\t\t\t Please Try Again...")</script>';

  }


}

}











 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
    body{
      margin:0;
	padding:0;
	background-image: url("../image/sign.jpg");
	background-size:cover;
	font-family:sans-serif;
}



    </style>
    <meta charset="utf-8">
    <title>Forget Password</title>
  </head>
  <body>
    <h1 align = "center"> Forget Password</h1><br><br>
    <form  action="" method="post">
      <table align = "center">
        <tr>
          <td>User Name</td>
          <td><input type="text" class="do" placeholder ="Enter Your User Nane" name="name" value="">
        </tr>
        <tr>
          <td>Phone No.</td>
          <td><input type="text" class="do" placeholder ="Enter your Phone No." name="email" value="">
        </tr>




      </table>
      <table align = "center">
        <tr>
          <td  colspan="2"><input type="submit" name="submit" class="do" value="Submit"></td>
            </tr>

      </table>
      <br><br>
      <table align = "center">
        <tr>
          <td colspan="2">Password</td>
            </tr>

      </table>
      <table align = "center">
        <tr>
          <td colspan="2"><input type="text" class="do" placeholder ="" name="pass" value="<?php echo $pwd; ?>">
            </tr>
<br>
      </table>


    </form>

  </body>
</html>
