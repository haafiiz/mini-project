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
	$sel="select * from tbl_agent where agent_id='".$_SESSION["aid"]."'";
	$row=$con->query($sel);
	$data=$row->fetch_assoc();
	include("Head.php");
	?>
    <br /><br /><br />
     <div id="tab" align="center">
<table border="1" cellpadding="10" align="center">
  <tr>
    <td colspan="2" align="center"><img src="../Assets/Files/AgentPhoto/<?php echo $data["agent_photo"]?>" /></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><?php echo $data["agent_name"]?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $data["agent_contact"]?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $data["agent_email"]?></td>
  </tr>
</table>
</div>
</body>
<br /><br /><br /><br /><br /><br />
<?php
include("Foot.php");
ob_flush();
?>
</html>