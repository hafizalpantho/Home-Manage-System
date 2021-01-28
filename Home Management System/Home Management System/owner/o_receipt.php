<?php
require "../includes/db_connect.inc.php";

session_start();




$sessionUname = $_SESSION['login_user'];
$name = $userNameErr="";
if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(empty($_POST['are_name'])){
    $userNameErr = "Name cannot be empty!";
    $errExists = 1;
  }else{
    $name = mysqli_real_escape_string($conn, $_POST['are_name']);
  }
  if(isset($_POST['are_back'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: owner.php");
  }




}


 ?>

<!DOCCTYPE html>
<html lang="en" dir="ltr">

    <head>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
    body{
      margin:0;
	padding:0;
	background-image: url("../image/areceipt.jpg");
	background-size:cover;
	font-family:sans-serif;
}



    </style>

        <meta charset="utf-8">
        <title >Receipt</title>
    </head>
    <body>
        <h1 align = center style="color:Black"><b>Money Receipt</h1>
        <form action="" method="post">
          <?php if(isset($_SESSION["login_user"])) { ?>
          <?php } ?>
            <table align=center>


                <tr>
                    <td style="font-size:30px"><b>User Name</td>
                    <td style="font-size:30px"><input type="text" style="font-size:20px" placeholder ="Enter the user name..." name="are_name" value="<?php echo $name; ?>">
                      <span style="color:red;"><?php echo $userNameErr; ?></span>
                    </td>
                </tr>

                <br>
            </table>
            <table  align="center" >
              <tr>
                <br><br>
                <td  ><input type="submit" name="are_getbill" class="do" value="Get Bill Detail    "></td>
              </tr>
              </table><br>

              <?php
                if(isset($_POST['are_getbill'])){ ?>
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

                        </tr>
                    </thead>
                    <tbody>

                      <?php
                      $sql = "select name, rent, elecBill, waterBill, utility, penalty,mealBill,currBalance,totalBill from account where name = '$name' and ownerName = '$sessionUname';";
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


                        </tr>




                    <?php  } ?>
                    </tbody>


                  </table>

              <?php  } ?>


              <table align ="center">
              <td ><input type="submit" name="are_view" class="do"  value="      Print     " onclick="window.print()"></td>
              </table>
              <br>
              <br>
              <table align ="right">
                <tr>
                  <td  ><input type="button" name="reset" class="do" value="Reset" onclick="window.location.href='o_receipt.php'"></td>
                  <td  ><input type="submit" name="are_back" class="do"   value="Back"></td>
                </tr>
              </table>

        </form>
    </body>

</html>
