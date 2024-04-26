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
if(isset($_GET["wid"]))
{
	echo $_GET["wid"];
	$_SESSION["wid"]=$_GET["wid"];
}
include("../Assets/Connection/connection.php");
if(isset($_GET["did"]))
{
	$sela="select * from tbl_assign where deliveryboy_id='".$_GET["did"]."' and booking_id='".$_SESSION["wid"]."'";
	$rowa=$con->query($sela);
	if($dataa=$rowa->fetch_assoc())
	{
		?>
        <script>
		alert("Already Added");
		window.location="AcceptedOrder.php";
        </script>
        <?php
	}
	else{
		$ins="insert into tbl_assign(deliveryboy_id,booking_id)values('".$_GET["did"]."','".$_SESSION["wid"]."')";
		$con->query($ins);
		?>
        <script>
		alert("Work Assigned");
		window.location="AcceptedOrder.php";
        </script>
        <?php
	}
}
include("Head.php");
?>
<br /><br /><br />
 <div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <td>SL.No</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_deliveryboy where agent_id='".$_SESSION["aid"]."'";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["deliveryboy_name"]?></td>
      <td><?php echo $data["deliveryboy_contact"]?></td>
      <td><?php echo $data["deliveryboy_email"]?></td>
      <td><a href="ViewDeliveryBoy.php?did=<?php echo $data["deliveryboy_id"]?>">Assign</a></td>
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