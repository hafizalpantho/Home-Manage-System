<?php
require "../includes/db_connect.inc.php";

session_start();
$uName = $uPass = $uPassInDB = "";
$uNameErr = $uPassErr = $error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['username'])){
      $uNameErr = "Username cannot be empty!";
  }else{
    $uName = $_POST['username'];
  }

  if(empty($_POST['pass'])){
    $uPassErr = "Password cannot be empty!";
  }else{
    $uPass = $_POST['pass'];
  }

  $myusername = mysqli_real_escape_string($conn,$_POST['username']);
  $mypassword = mysqli_real_escape_string($conn,$_POST['pass']);
  $mytype = mysqli_real_escape_string($conn,$_POST['type']);

  $sql = "SELECT id FROM login WHERE user = '$myusername' and pass = '$mypassword' and type = '$mytype'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];

  $count = mysqli_num_rows($result);
  if($count == 1 && $_POST['type'] == 'Admin') {
     //session_register("myusername");
     $_SESSION['login_user'] = $myusername;

     if(!empty($_POST['remember'])){
       setcookie("remember_user",$myusername,time()+(1 * 60 * 60));
       setcookie("remember_pass",$mypassword,time()+(1 * 60 * 60));

     }
     else {
       if (isset($_COOKIE["remember_user"])) {
         setcookie("remember_user","");
       }
       if (isset($_COOKIE["remember_pass"])) {
         setcookie("remember_pass","");
       }


     }
     //$_SESSION['current_time'] = time();
    // setcookie("loggedinuser","",time()-60,"/");
     header("location: ../admin/adminHome.php");
  }
  else if($count == 1 && $_POST['type'] == 'Owner') {
     //session_register("myusername");
     $_SESSION['login_user'] = $myusername;

     if(!empty($_POST['remember'])){
       setcookie("remember_user",$myusername,time()+(1 * 60 * 60));
       setcookie("remember_pass",$mypassword,time()+(1 * 60 * 60));

     }
     else {
       if (isset($_COOKIE["remember_user"])) {
         setcookie("remember_user","");
       }
       if (isset($_COOKIE["remember_pass"])) {
         setcookie("remember_pass","");
       }


     }
        //$_SESSION['current_time'] = time();
  //  setcookie("loggedinuser","",time()-60,"/");
     header("location: ../owner/owner.php");
  }
  else if($count == 1 && $_POST['type'] == 'Renter') {
     //session_register("myusername");
     $_SESSION['login_user'] = $myusername;

     if(!empty($_POST['remember'])){
       setcookie("remember_user",$myusername,time()+(1 * 60 * 60));
       setcookie("remember_pass",$mypassword,time()+(1 * 60 * 60));

     }
     else {
       if (isset($_COOKIE["remember_user"])) {
         setcookie("remember_user","");
       }
       if (isset($_COOKIE["remember_pass"])) {
         setcookie("remember_pass","");
       }



     }
  //   $_SESSION['current_time'] = time();
  //  setcookie("loggedinuser","",time()-60,"/");
     header("location: ../Renter/renterhome.php");
  }

  else if($count == 1 && $_POST['type'] == 'CareTaker') {
     //session_register("myusername");
     $_SESSION['login_user'] = $myusername;

     if(!empty($_POST['remember'])){
            setcookie("remember_user",$myusername,time()+(1 * 60 * 60));
            setcookie("remember_pass",$mypassword,time()+(1 * 60 * 60));


          }
          else {
            if (isset($_COOKIE["remember_user"])) {
              setcookie("remember_user","");
            }
            if (isset($_COOKIE["remember_pass"])) {
              setcookie("remember_pass","");
            }


          }
     //$_SESSION['current_time'] = time();
    //setcookie("loggedinuser","",time()-60,"/");
     header("location: ../CareTaker/Caretakerh.php");
  }



  else {
     //$error = "Your Login Name, Password or User Type is invalid!!!";
      echo '<script type="text/javascript"> alert("Your Login User Name, Password or User Type is invalid!!!  Please Try Again...")</script>';
  }


}


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="../css/login.css">

    <meta charset="utf-8">
    <title>login</title>


  </head>
  <body><br>

    <div  class="loginBox">
  		<img src="../image/login.png" class="user" height="120">

  		<h2>Log In Here</h2>
      <h4 align="center"><span style="color:red"> <?php echo $error ;?></span><h4>
  			<form  action="" method="POST" id="form" onclick="return Testform()">
          <p>User Name</p><input type="text" name="username" value="<?php if(isset($_COOKIE["remember_user"])){echo $_COOKIE["remember_user"];}  ?>" placeholder="Enter username"><br><span style="color:red"> <?php echo"$uNameErr" ;?></span>

  				<p>Password</p><input type="password" name="pass" value="<?php if(isset($_COOKIE["remember_pass"])){echo $_COOKIE["remember_pass"];}  ?>" placeholder="Enter Password"><br><span style="color:red"> <?php echo"$uPassErr" ;?></span><br>
  					<select class="type" name="type" >

              <option>Admin</option>
  						<option>Owner</option>
  						<option>Renter</option>
              <option>CareTaker</option>
  					</select>
            <table align = "right">
              <tr>
                <td >
                  <input type="checkbox" name="remember"  <?php if(isset($_COOKIE["remember_user"])){ ?> checked <?php } ?> >
                </td>
                <td  style="color:white ; font-size:20px">Remember me</td>

              </tr>
            </table>

      <input  type="submit" name="submit" value="Log In">

          <table align = "right">
            <tr>
              <td>
                <a href="../forgetPassword/forgetpassword.php" target="_blank">forget password</a>
              </td>
            </tr>

          </table>
          <br><br><br>
          <table  align = "center" >
            <tr>
              <td > <a style="font-size:30px" href="../signUp/o_signup.php" target="_blank">Sign Up</a></td>
            </tr>
          </table>

  			</form>

  	</div>

  </body>
</html>
