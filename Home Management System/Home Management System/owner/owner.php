<?php
require "../includes/db_connect.inc.php";

session_start();

$ad_renter ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if($_POST['ad_renter'] == 'Create New Renter') {
     //session_register("myusername");
     //$_SESSION['login_user'] = $myusername;
     setcookie("loggedinuser","",time()-60,"/");
     header("location: o_create_renter.php");
  }
  else if($_POST['ad_crtaker'] == 'Create New Caretaker') {
     //session_register("myusername");
     //$_SESSION['login_user'] = $myusername;
     setcookie("loggedinuser","",time()-60,"/");
     header("location: o_create_caretaker.php");
  }
  else if($_POST['ad_account'] == 'Account') {
     //session_register("myusername");
     //$_SESSION['login_user'] = $myusername;
     setcookie("loggedinuser","",time()-60,"/");
     header("location: o_account.php");
  }
  else if($_POST['ad_receipt'] == 'Receipt') {
     //session_register("myusername");
     //$_SESSION['login_user'] = $myusername;
     setcookie("loggedinuser","",time()-60,"/");
     header("location: o_receipt.php");
  }
  else if($_POST['ad_tolet'] == 'ToLet') {
     //session_register("myusername");
     //$_SESSION['login_user'] = $myusername;
     setcookie("loggedinuser","",time()-60,"/");
     header("location: o_tolet.php");
  }
  else if($_POST['ad_complain'] == 'Cmoplain Box') {
     //session_register("myusername");
     //$_SESSION['login_user'] = $myusername;
     setcookie("loggedinuser","",time()-60,"/");
     header("location: o_complainbox.php");
   }
   else if($_POST['ad_rupdate'] == 'Renter Profile Edit') {
      //session_register("myusername");
      //$_SESSION['login_user'] = $myusername;
      setcookie("loggedinuser","",time()-60,"/");
      header("location: o_updaterenter.php");
    }
    else if($_POST['ad_cupdate'] == 'Caretaker Profile Edit') {
       //session_register("myusername");
       //$_SESSION['login_user'] = $myusername;
       setcookie("loggedinuser","",time()-60,"/");
       header("location: o_updatecaretaker.php");
     }
     else if($_POST['ad_aprofile'] == 'Owner Profile Edit') {
        //session_register("myusername");
        //$_SESSION['login_user'] = $myusername;
        setcookie("loggedinuser","",time()-60,"/");
        header("location: o_update_owner.php");
      }
      else if($_POST['ad_logout'] == 'LogOut') {
         //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
         setcookie("loggedinuser","",time()-60,"/");
         header("location: ../login/login.php");
       }




}

 ?>



<!DOCTYPE><html>
    <head>
    <link rel="stylesheet" href="../css/admin.css">
        <style>
 body
{
	margin:0;
	padding:0;
	background-image: url("../image/adminhome.png");
	background-size:cover;
	font-family:sans-serif;
}

        </style>
        <title backgound color>Owner</title>
    </head>
    <center>
    <body>
        <h1  style="color:white">Welcome <?php echo $_SESSION['login_user']; ?></h1><br>
        <form action="" method="post">
            <table>
                <tbody>
                    <tr>
                     <td align="center" colspan="2"><input type="submit" name="ad_renter" class="do" value="Create New Renter"></td>
                    </tr>
                    <tr>
                      <td align="center" colspan="2"><input type="submit" name="ad_crtaker" class="do" value="Create New Caretaker"></td>
                    </tr>

                    <tr>
                      <td align="center" colspan="2"><input type="submit" name="ad_account" class="do" value="Account"></td>
                     </tr>

                    <tr>
                         <td align="center" colspan="2"><input type="submit" name="ad_receipt" class="do" value="Receipt"></td>
                    </tr>

                    <tr>
                      <td align="center" colspan="2"><input type="submit" name="ad_tolet" class="do" value="ToLet"></td>
                    </tr>

                    <tr>
                      <td align="center" colspan="2"><input type="submit" name="ad_complain" class="do" value="Cmoplain Box"></td>
                    </tr>

                     <tr>
                    <td align="center" colspan="2"><input type="submit" name="ad_rupdate" class="do" value="Renter Profile Edit"></td>
                    </tr>
                    <tr>
                      <td align="center" colspan="2"><input type="submit" name="ad_cupdate" class="do" value="Caretaker Profile Edit"></td>
                   </tr>

                </tbody>
            </table><br><br>
            <table align ="right">
                <tr>
                  <td  ><input type="submit" name="ad_logout" class="do"   value="LogOut"></td>
                </tr>
              </table>
    </body>
    </center>
</html>
