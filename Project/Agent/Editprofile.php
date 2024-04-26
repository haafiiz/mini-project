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
	
	if(isset($_POST["btnsave"]))
	{
		$up="update tbl_agent set agent_name='".$_POST["txt_name"]."',agent_contact='".$_POST["txt_contact"]."',usre_email='".$_POST["txt_email"]."' where agent_id='".$_SESSION["aid"]."'";
		$con->query($up);
		header("Location:Editprofile.php");
	}
	
	$sel="select * from tbl_agent where agent_id='".$_SESSION["uid"]."'";
	$row=$con->query($sel);
	$data=$row->fetch_assoc();
	include("Head.php");
	?>
    <br /><br /><br />
     <div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"  value="<?php echo $data["agent_name"]?>" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"  value="<?php echo $data["agent_contact"]?>" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email"  value="<?php echo $data["agent_email"]?>" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btnc" id="btnc" value="Cancel" /></td>
    </tr>
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