<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.orange{
	background-color:orange;
	text-align:center;
}
</style>
</head>

<body>
<?php
ob_start();
session_start();
    include("../Assets/Connection/connection.php");
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
     
    </tr>
    <?php
	$sel="select * from tbl_booking b inner join tbl_user u on u.user_id=b.user_id inner join tbl_brand bd on bd.brand_id=b.brand_id inner join tbl_category c on c.category_id=b.category_id where b.agent_id='".$_SESSION["aid"]."' and b.booking_status=2";
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
     </tr>
     <?php
	}
	 ?>
  </table>
</form>
</div>
</body>
<br /><br /><br /><br /><br /><br />
<?php
include("Foot.php");
ob_flush();
?>
</html>