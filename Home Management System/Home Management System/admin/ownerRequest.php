<?php
require "../includes/db_connect.inc.php";

session_start();
/*if($_SESSION['login_user']==true){
  if((time() - $_SESSION['current_time']) >300){
    header("location: ../index.php");
  }
}
*/

if(isset($_POST['ad_logout'])){
  setcookie("loggedinuser","",time()-60,"/");

  header("location: adminHome.php");

}


if(isset($_POST['btn_con'])){
  $sql = "select name,pass, address, date, email, phone,nid, gender,type from ownerrequest ";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)){
       $sname = $row['name'];
       $spass = $row['pass'];
      $saddress= $row['address'];
      $sdob = $row['date'];
      $semail = $row['email'];
      $sphone = $row['phone'];
        $snid = $row['nid'];
      $sgender = $row['gender'];
      $stype = $row['type'];
}


  $query = "insert into owner (name,pass,address, date, email,phone,nid,gender,type) values ('$sname','$spass','$saddress','$sdob','$semail','$sphone','$snid','$sgender','$stype')";
  $query1 = "insert into login (user,pass,type,phone) values ('$sname','$spass','$stype','$sphone')";
  mysqli_query($conn, $query);
  mysqli_query($conn, $query1);

  $query2= "delete from ownerrequest where name = '$sname'";
  mysqli_query($conn, $query2);
  echo '<script type="text/javascript"> alert("Account has been Confirmed!")</script>';

}
if(isset($_POST['btn_del'])){
  $sql = "select name,pass, address, date, email, phone,nid, gender,type from ownerrequest ";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)){
       $sname = $row['name'];
       $spass = $row['pass'];
      $saddress= $row['address'];
      $sdob = $row['date'];
      $semail = $row['email'];
      $sphone = $row['phone'];
        $snid = $row['nid'];
      $sgender = $row['gender'];
      $stype = $row['type'];
}
  $query2= "delete from ownerrequest where name = '$sname'";
  mysqli_query($conn, $query2);
  echo '<script type="text/javascript"> alert("Account has been Deleted!")</script>';


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
	background-image: url("../image/sign.jpg");
	background-size:cover;
	font-family:sans-serif;
}



    </style>

        <meta charset="utf-8">
        <title >request list</title>
    </head>
    <body>
        <h1 align = center style="color:Black"><b>Owner Request List</h1>
        <form action="" method="post">
            <table align = "center" border="1" style="color:black; width:80% ; font-size:25px;">
                <thead>

                    <tr>
                      <th>Name</th>
                      <th style="display:none;">Password</th>
                      <th>Address</th>
                      <th>DOB</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>NID</th>
                      <th>Gender</th>
                      <th>User Type</th>
                      <th>Confirm</th>
                      <th>Delet</th>

                    </tr>
                </thead>
                <tbody>

                  <?php
                  $sql = "select name,pass, address, date, email, phone,nid, gender,type from ownerrequest ";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                      <td align = "center"><?php echo $row['name'];
                       $sname = $row['name'];
                       ?></td>
                       <td style="display:none;" align = "center"><?php echo $row['pass'];
                       $spass = $row['pass'];
                        ?></td>

                      <td align = "center"><?php echo $row['address'];
                      $saddress= $row['address'];

                       ?></td>
                      <td align = "center"><?php echo $row['date'];
                      $sdob = $row['date'];

                      ?></td>
                      <td align = "center"><?php echo $row['email'];
                      $semail = $row['email'];

                      ?></td>
                      <td align = "center"><?php echo $row['phone'];
                      $sphone = $row['phone'];

                      ?></td>
                      <td align = "center"><?php echo $row['nid'];
                        $snid = $row['nid'];
                       ?></td>

                      <td align = "center"><?php echo $row['gender'];
                      $sgender = $row['gender'];


                       ?></td>
                      <td align = "center"><?php echo $row['type'];
                      $stype = $row['type'];

                      ?></td>

                      <td><input  type="submit" name="btn_con" class="do" value="Confirm"></td>
                      <td><input  type="submit" name="btn_del" class="do" value="Delete"></td>




                    </tr>




                <?php  }
                $count = mysqli_num_rows($result);
                if($count == 0){
                  echo '<script type="text/javascript"> alert("No New Request Found!!!")</script>';

                }

                 ?>
                </tbody>


              </table>
              <br><br><br>
              <table align ="right">
                  <tr>
                    <td  ><input type="submit" name="ad_logout" class="do"   value="Back"></td>
                  </tr>
                </table>


        </form>
    </body>

</html>
