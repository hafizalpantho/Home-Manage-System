<?php
require "../includes/db_connect.inc.php";

session_start();

if(isset($_POST['c_logout'])){
  setcookie("loggedinuser","",time()-60,"/");
  header("location: ../login/login.php");
}


if(isset($_POST['c_info'])){
  setcookie("loggedinuser","",time()-60,"/");
  header("location: careinfo.php");
}
if(isset($_POST['c_carecom'])){
  setcookie("loggedinuser","",time()-60,"/");
  header("location: vRenterAcc.php");
}




 ?>


<!DOCTYPE><html>
    <head>
    <link rel="stylesheet" href="../css/caretaker.css">
        <style>
 body
{
	margin:10;
	padding:0;
	background-image: url("../image/caretaker.jpg");
	background-size:cover;
	font-family:sans-serif;
}

        </style>
        <title backgound color>Care Taker</title>
    </head>
    <center>
    <body>
        <h1 >Welcome</h1>
        <form action="" method="post">
            <table align="center">
                <tbody>
                    <tr>
                   <td align="center"><input type="submit" name="c_info" class="do" value="Information"></td><br>
                    </tr>
                    <tr>
                        <td><input type="submit" name="c_carecom" class="do" value="View Renter Balance"></input></td><br><br>
                    </tr>
                    </table>
                    </center>
                    <br><br>
                    <table align=right>
                    <tr>
                      <td  ><input type="submit" name="c_logout" class="do" value="Logout"></input></td><br>
                     </tr>
                     </tbody>
                     </table>
                     </body>

                     </head>
                     </html>
