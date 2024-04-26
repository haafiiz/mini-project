<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
ob_start();
session_start();
    include("../Assets/Connection/connection.php");
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	if(isset($_GET["aid"]))
	{
		$name=$_GET["name"];
		$ran=rand(100000,999999);


require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'fuelatdoorstep0@gmail.com'; // Your gmail
    $mail->Password = 'nqstokrnxzcsamaa'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('fuelatdoorstep0@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["user"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Your Order Is Confirmed..";
    $mail->Body = "Hello"." ".$name." "."Your OTP is ".$ran;
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
 	$update="update tbl_booking set booking_status=1,booking_otp='".$ran."' where booking_id='".$_GET["aid"]."'";
	$con->query($update);
	 header("Location:ViewUserBookings.php");
  
}

if(isset($_GET["rid"]))
	{
		$name=$_GET["name"];
		


require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'fuelatdoorstep0@gmail.com'; // Your gmail
    $mail->Password = 'nqstokrnxzcsamaa'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('fuelatdoorstep0@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["user"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Your Order Is Canceled";
    $mail->Body = "Hello"." ".$name." "."Your Order is Cancelled Due To Technical Issues....";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
 	$update="update tbl_booking set booking_status=2 where booking_id='".$_GET["rid"]."'";
	$con->query($update);
	 header("Location:ViewUserBookings.php");
  
}
include("Head.php");
?>
<br /><br /><br />
 <div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Sl.No</td>
      <td>Name of user</td>
      <td>Brand</td>
      <td>Category</td>
      <td>Order Quntity in Liter</td>
      <td>Booked Date</td>
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_booking b inner join tbl_user u on u.user_id=b.user_id inner join tbl_brand bd on bd.brand_id=b.brand_id inner join tbl_category c on c.category_id=b.category_id where b.agent_id='".$_SESSION["aid"]."' and b.booking_status=0";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["user_name"]?></td>
      <td><?php echo $data["brand_name"]?></td>
      <td><?php echo $data["category_name"]?></td>
      <td><?php echo $data["booking_quantity"]?></td>
      <td><?php echo $data["booking_date"]?></td>
      <td><a href="ViewUserBookings.php?aid=<?php echo $data["booking_id"]?>&user=<?php echo $data["user_email"]?>&name=<?php echo $data["user_name"]?>">Confirm Order</a>/<a href="ViewUserBookings.php?rid=<?php echo $data["booking_id"]?>&user=<?php echo $data["user_email"]?>">Cancel Order</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</div>
</body>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php
include("Foot.php");
ob_flush();
?>
</html>