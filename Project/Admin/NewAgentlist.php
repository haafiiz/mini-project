
<?php
ob_start();

    include("../Assets/Connection/connection.php");
	if(isset($_GET["aid"]))
{
  $delQry="update tbl_agent set agent_vstatus=1 where agent_id='".$_GET["aid"]."'";
  $con->query($delQry);
  header("Location:NewAgentlist.php");
}
if(isset($_GET["rid"]))
{
  $delQry="update tbl_agent set agent_vstatus=2 where agent_id='".$_GET["rid"]."'";
  $con->query($delQry);
  header("Location:NewAgentlist.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("Head.php");
?>
<br /><br /><br />
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td >Sl.no</td>
      <td >Agent Name</td>
      <td >Contact</td>
      <td >Email</td>
      <td>Address</td>
      <td >Photo</td>
      <td >Proof</td>
      <td >Action</td>
    </tr>
    <?php

    $sel="select * from tbl_agent where agent_vstatus=0";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	
  ?>
  <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["agent_name"];?></td>
      <td><?php echo $data["agent_contact"];?></td>
      <td><?php echo $data["agent_email"];?></td>
      <td><?php echo $data["agent_address"];?></td>
      <td><img src="../Assets/Files/AgencyPhoto/<?php echo $data["agent_photo"];?>"  width="150" height="150"/></td>
      <td><img src="../Assets/Files/AgencyProof/<?php echo $data["agent_proof"];?>" width="150" height="150"/></td>
      <td><a href="NewAgentlist.php?aid=<?php echo $data["agent_id"];?>">Accept</a>/<a href="NewAgentlist.php?rid=<?php echo $data["agent_id"];?>">Reject</a></td>
      
     </tr>
  
    <?php
	}
	?>
  </table>
</form>
</body>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php
include("Foot.php");
ob_flush();
?>
</html>