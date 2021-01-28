<?php
require "../includes/db_connect.inc.php";

session_start();


$sessionUname = $_SESSION['login_user'];

$rent=$elecbill=$water=$utility=$penalty=$meal=$current_balance = 0;
$userNameErr=$name=$total_bill="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['ac_name'])){
    $userNameErr = "Name cannot be empty!";
    $errExists = 1;
  }else{
    $name = mysqli_real_escape_string($conn, $_POST['ac_name']);
  }

  $rent = mysqli_real_escape_string($conn, $_POST['ac_rent']);
  $elecbill = mysqli_real_escape_string($conn, $_POST['ac_elecbill']);
  $water = mysqli_real_escape_string($conn, $_POST['ac_water']);
  $utility = mysqli_real_escape_string($conn, $_POST['ac_utility']);
  $penalty = mysqli_real_escape_string($conn, $_POST['ac_penalty']);
  $meal = mysqli_real_escape_string($conn, $_POST['ac_meal']);
  $total_bill = mysqli_real_escape_string($conn, $_POST['ac_total_bill']);
  $current_balance = mysqli_real_escape_string($conn, $_POST['ac_current_balance']);


  if(isset($_POST['ac_back'])){
    setcookie("loggedinuser","",time()-60,"/");
    header("location: owner.php");
  }

  if(isset($_POST['ac_gettotal'])){

    $total_bill = ( $rent + $elecbill + $water + $utility + $penalty + $meal) - $current_balance;


  }
    if(isset($_POST['ac_update'])){
      $sqlUserInsert = "update account set rent='$rent', elecBill='$elecbill', waterBill='$water', utility='$utility', penalty='$penalty', mealBill='$meal',currBalance='$current_balance', totalBill='$total_bill' where name = '$name' and ownerName = '$sessionUname'";
      $query_run = mysqli_query($conn, $sqlUserInsert);
      if($query_run)
      {
        echo '<script type="text/javascript"> alert("Update successful!")</script>';
      }
      else {
        echo '<script type="text/javascript"> alert("There is a problem! Please Cheacked!!")</script>';
      }

    }







}

 ?>


<!DOCCTYPE html>
<html lang="en" dir="ltr">

    <head>
    <link rel="stylesheet" href="../css/admin.css">
      <style>
body{
          margin: 20;
          padding: 0;
          background-image: url("../image/aaccount.jpg");
          background-size:cover;
        }


      </style>
      <meta charset="utf-8">
        <title>Account</title>
    </head>
    <body>
        <h1 align = center>Account</h1>
        <form action="" method="post">
          <?php if(isset($_SESSION["login_user"])) { ?>
          <?php } ?>
            <table  align=center>
                <tr>
                    <td><b>User Name</b></td>
                    <td><input type="text" placeholder ="" name="ac_name" value="<?php echo $name; ?>">
                      <span style="color:red;"><?php echo $userNameErr; ?></span>
                    </td>
                </tr>


                <tr>
                    <td><b>Rent Fee</td>
                    <td><input type="text" name="ac_rent" value="<?php echo $rent;?>"></td>
                </tr>

                <tr>
                    <td><b>Electricity Bill:</td>
                    <td><input type="text " name="ac_elecbill" value="<?php echo $elecbill;?>"></td>
                  </tr>

                  <tr>
                    <td><b>Water bill:</td>
                    <td><input type="text" name="ac_water" value="<?php echo $water;?>"></td>
                  </tr>

                <tr>
                    <td><b>Utility: </td>
                    <td><input type="text" name="ac_utility" value="<?php echo $utility;?>"></td>
                  </tr>

                  <tr>
                    <td><b>Penalty:</td>
                    <td><input type="text" name="ac_penalty" value="<?php echo $penalty;?>"></td>
                  </tr>


                  <tr>
                    <td><b>Meal Bill:</td>
                    <td><input type="text" name="ac_meal" value="<?php echo $meal;?>"></td>
                  </tr>
                  <tr>
                    <td><b>Current Balance:</td>
                    <td><input type="text" name="ac_current_balance" value="<?php echo $current_balance;?>"></td>
                  </tr>


                  <tr>
                    <td><b>Total Bill:</td>
                    <td><input type="text" name="ac_total_bill" value="<?php echo $total_bill; ?>"></td>
                  </tr>




                  <tr align="right">
                    <td colspan="3"><b><input type="submit" name="ac_gettotal" class="do" value="Get Total"></td><br>
                  </tr>
                  </table>

                  <table  align="center" >
                    <tr>
                      <td  ><input type="submit" name="ac_search" class="do" value="View All Account"></td><br>
                      <td  ><input type="submit" name="ac_update" class="do" value="Update"></td>
                      <td  ><input type="button" name="reset" class="do" value="Reset" onclick="window.location.href='o_account.php'"></td>
                    </tr>

            </table><br>
            <table align ="right">
              <tr>
                <td colspan=5><input type="submit" name="ac_back" class="do"  value="Back"></td>
              </tr>
            </table>





        </form>
        <?php
          if(isset($_POST['ac_search'])){ ?>
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
                $sql = "select name, rent, elecBill, waterBill, utility, penalty,mealBill,currBalance,totalBill,ownerName from account where ownerName = '$sessionUname';";
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
    </body>

</html>
