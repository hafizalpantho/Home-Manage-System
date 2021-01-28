<?php
require "../includes/db_connect.inc.php";

session_start();




$sessionUname = $_SESSION['login_user'];
$name = $userNameErr="";
if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(isset($_POST['logout'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: ../login/login.php");
  }

  if(isset($_POST['request'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: ownerRequest.php");
  }

  if(isset($_POST['owner'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: o_update_owner.php");
  }




}


 ?>

<!DOCCTYPE html>
<html lang="en" dir="ltr">

    <head>
    <link rel="stylesheet" href="../css/adminHome.css">
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
        <title >Admin Home</title>
    </head>
    <body>
        <h1 align = center style="color:Black"><b>Admin Home</h1>
        <form action="" method="post">
          <?php if(isset($_SESSION["login_user"])) { ?>
          <?php } ?>
          <br><br><br>
            <table align="center">
              <tr>

                <td align="center"  ><input type="submit" name="request" class="do"   value="Owner Request List"></td>

              </tr>

              <tr>
                <td align="center" ><input type="submit" name="owner" class="do"   value="Edit Owner Profile"></td>
              </tr>

            </table>

              <br><br><br><br><br><br><br>
              <br>
              <table align ="right">
                <tr>

                  <td  ><input type="submit" name="logout" class="do"   value="Logout"></td>
                </tr>
              </table>

        </form>
    </body>

</html>
