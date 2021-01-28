<?php
require "../includes/db_connect.inc.php";
session_start();

$sessionUname = $_SESSION['login_user'];

if(isset($_POST['acb_back'])){
  setcookie("loggedinuser","",time()-60,"/");
  header("location: owner.php");
}

 ?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/admin.css">
<style>
      body{

	margin:0;
	padding:0;
	background-image: url("../image/comlain1.jpg");
	background-size:cover;
	font-family:sans-serif;
}

      </style>
<title>Complain Box</title>
<body >

<h1 align=center>Comment Box</h1>

<br>
<form action="" method="post">
  <?php if(isset($_SESSION["login_user"])) { ?>
  <?php } ?>


    <table align="center">
      <tr>
        <td  ><input type="submit" name="view" class="do"   value="View Complain List"></td>
      </tr>
    </table>
<br><br>

<?php
  if(isset($_POST['view'])){ ?>
    <table align = "center" border="1" style="color:black; width:80% ; font-size:20px;">
      <thead>

          <tr>
            <th>Name</th>
            <th>Owner Name</th>
            <th>Complain</th>
          </tr>
      </thead>
      <tbody>


        <?php
        $sql = "select * from complainbox where ownerName = '$sessionUname';";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){ ?>
          <tr>
            <td align = "center"><?php echo $row['name']; ?></td>
            <td align = "center"><?php echo $row['ownerName']; ?></td>
            <td align = "center"><?php echo $row['complain']; ?></td>

          </tr>




      <?php  } ?>
      </tbody>
    </table>

<?php  } ?>

<br><br><br><br><br>
    <table align="right">


            <tr >
              <td ><input  type="submit" name="acb_reset" class="do" value="Reset"></td>
              <td ><input type="submit" name="acb_back" class="do" value="Back"></td>
            </tr>

</table>
</form>
</body>
</html>
