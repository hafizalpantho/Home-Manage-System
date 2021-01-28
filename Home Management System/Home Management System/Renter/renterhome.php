<?php
require "../includes/db_connect.inc.php";

session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['re_info'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: renterinfo.php");
  }
  if(isset($_POST['re_bal'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: balance.php");
  }
  if(isset($_POST['re_carecom'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: rentercomplain.php");
  }
  if(isset($_POST['re_logout'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: ../login/login.php");
  }






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
	background-image: url("../image/renter1.jpg");
	background-size:cover;
	font-family:sans-serif;
}

        </style>
        <title backgound color>Renter</title>
    </head>

    <body>
        <h1 align="center">Welcome Renter Home</h1>
        <form action="" method="post">
            <table align="center">
                <tbody>
                    <tr>
                     <td><input type="submit" name="re_info" class="do" value="Information"></td>
                    </tr>
                    <tr>
                     <td><input type ="submit" name="re_bal" class="do" value="Balance Info"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="re_carecom" class="do" value="Complain Here"></td><br><br>
                    </tr>
                    </table>

                    <br><br>
                    <table align=right>
                    <tr>
                    <a><td  ><input type="submit" name="re_logout" class="do" value="Logout"></input></a><br>
                     </tr>
                     </tbody>
                     </table>
                     </body>

                     </head>
                     </html>
