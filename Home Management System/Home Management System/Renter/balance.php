<?php
require "../includes/db_connect.inc.php";

session_start();
$comment = $view = $complain = "";
$sessionUname = $_SESSION['login_user'];
if($_SERVER["REQUEST_METHOD"]=="POST"){


if(isset($_POST['rb_back'])){
  setcookie("loggedinuser","",time()-60,"/");
  header("location: renterhome.php");
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
	background-image: url("../image/aaccount.jpg");
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
<title>Balance Information</title>
<body >
<center>

<h1 align=center><b>Balance Information</h1>

<br>
<form action="" method="post">
  <?php if(isset($_SESSION["login_user"])) { ?>
  <?php } ?>


    <table>
      <tr>
          <td  ><input type="submit" name="view" class="do"   value="View Balance Info"></td>


            <td ><input type="submit" name="are_view" class="do"  value="      Print     " onclick="window.print()"></td>
          </tr><br>
</center>
</table>
<br><br>
<?php
  if(isset($_POST['view'])){ ?>
    <table align = "center" border="1" style="color:black; width:80% ; font-size:25px;">
      <thead>

          <tr>
            <th>Name</th>
            <th>Rent</th>
            <th>Elec Bill</th>
            <th>Water Bill</th>
            <th>Utility</th>
            <th>Penalty</th>
            <th>Meal Bill</th>
            <th>Current Balance</th>
            <th>Total Bill</th>
            <th>Owner Name</th>


          </tr>
      </thead>
      <tbody>

        <?php
        $sql = "select name, rent, elecBill, waterBill, utility, penalty,mealBill,currBalance,totalBill,ownerName from account where name = '$sessionUname';";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){ ?>
          <tr>
            <td align = "center"><?php echo $row['name']; ?></td>
            <td align = "center"><?php echo $row['rent']; ?></td>
            <td align = "center"><?php echo $row['elecBill']; ?></td>
            <td align = "center"><?php echo $row['waterBill']; ?></td>
            <td align = "center"><?php echo $row['utility']; ?></td>
            <td align = "center"><?php echo $row['penalty']; ?></td>
            <td align = "center"><?php echo $row['mealBill']; ?></td>

            <td align = "center"><?php echo $row['currBalance']; ?></td>
            <td align = "center"><?php echo $row['totalBill']; ?></td>
            <td align = "center"><?php echo $row['ownerName']; ?></td>


          </tr>




      <?php  } ?>
      </tbody>


    </table>

<?php  } ?>

<br><br><br>
<table align="right">
              <tr >
                  <td  ><input type="submit" name="reset" class="do" value="Reset" onclick="window.location.href='balance.php'"></td>
                <td ><input type="submit" name="rb_back" class="do" value="Back"></td>
              </tr>

</table>
</form>
</body>
</html>
