<?php
require "../includes/db_connect.inc.php";

session_start();
$comment = $view = $complain = "";
$sessionUname = $_SESSION['login_user'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
$comment = mysqli_real_escape_string($conn, $_REQUEST['comment']);

if(isset($_POST['rb_back'])){
  setcookie("loggedinuser","",time()-60,"/");
  header("location: renterhome.php");
}

if(isset($_POST['rb_view'])){
  $sqlUserInsert = "update complainbox set complain ='$comment' where name = '$sessionUname'";
  mysqli_query($conn, $sqlUserInsert);
  echo '<script type="text/javascript"> alert("Complain Send Successful!!!")</script>';

}
if(isset($_POST['view'])){
  $sql = "select * from complainbox where name = '$sessionUname'";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)){
       $complain = $row['complain'];
}




}


}
 ?>



<!DOCTYPE html>
<html>
<head>
<style>
      body{

	margin:0;
	padding:0;
	background-image: url("../image/comlain1.jpg");
	background-size:cover;
	font-family:sans-serif;
}
.do
{
  max-width: 350px;
  border-radius: 5px;
  margin: auto;
  background: rgba(0,0,0,0.5);
  /* box-sizing: border-box; */
  padding: 10px;
  color: white;
  font-weight: bold;
  font-size: 13px;
  margin-left: 20px;
  /*margin-top: 10px;*/
}
.do[type="submit"]:hover
{
  background:#efed40;
  color:#262626;
}
  }


      </style>
<title>Complain Box</title>
<body >
<center>

<h1 align=center><b>Complain Here</h1>

<br>
<form action="" method="post">
  <?php if(isset($_SESSION["login_user"])) { ?>
  <?php } ?>


<table>
  <tr>
    <td>

      <textarea  rows="4" cols="50"name="comment" ><?php echo $complain; ?></textarea>
    </td>
  </tr>
</table>
    <table>
      <tr>
          <td  ><input type="submit" name="view" class="do"   value="View Complain"></td>


                <td  ><input type="submit" name="rb_view" class="do"   value="Submit"></td>
              </tr><br>
</center>
</table>
<table align="right">
              <tr >
                  <td  ><input type="button" name="reset" class="do" value="Reset" onclick="window.location.href='rentercomplain.php'"></td>
                <td ><input type="submit" name="rb_back" class="do" value="Back"></td>
              </tr>

</table>
</form>
</body>
</html>
