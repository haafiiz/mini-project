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
	$sel="select * from tbl_agent where agent_id='".$_SESSION["aid"]."' and agent_password='".$_POST["txt_c"]."'";
	$row=$con->query($sel);
	if($data=$row->fetch_assoc())
	{
			if($_POST["txt_r"]==$_POST["txt_n"])
			{
				$up="update tbl_agent agent_password='".$_POST["txt_n"]."' where agent_id='".$_SESSION["aid"]."'";
				$con->query($up);
				header("Location:Changepassword.php");
			}
			else{
				
				?>
			<script>
            alert("Password Mismatch....");
			location.href="Changepassword.php";
            </script>
			<?php	
			}
	}
	else{
		?>
			<script>
            alert("Wrong Current Password");
			location.href="Changepassword.php";
            </script>
			<?php	
	}
	}
	include("Head.php");
	?>
    <br /><br /><br />
     <div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_c"></label>
      <input type="text" name="txt_c" id="txt_c" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_n"></label>
      <input type="text" name="txt_n" id="txt_n" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_r"></label>
      <input type="text" name="txt_r" id="txt_r" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Change Password" />
      <input type="submit" name="btnc" id="btnc" value="Reset" /></td>
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