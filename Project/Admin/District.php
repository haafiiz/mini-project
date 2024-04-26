<?php
ob_start();
	include("../Assets/Connection/connection.php");
	
	if(isset($_POST["btnsave"]))
	{
		$district=$_POST["txtname"];
		$hid=$_POST["txtid"];
		if($hid!="")
		{
		 $update="update tbl_district set district_name='".$district."' where district_id='".$hid."'";
		 $con->query($update);
		 header("Location:District.php");	
		}
		else{
		$insQry="insert into tbl_district(district_name)values('".$district."')";
		if($con->query($insQry))
		{
			?>
			<script>
            alert("Inserted..");
			location.href="district.php";
            </script>
			<?php	
		}
		}
	}
	
	if(isset($_GET["did"]))
	{
		$del="delete from tbl_district where district_id='".$_GET["did"]."'";
		$con->query($del);
		header("Location:District.php");
	}
	$eid="";
	$ename="";
	if(isset($_GET["eid"]))
	{
		$sel1="select * from tbl_district where district_id='".$_GET["eid"]."'";
		$row1=$con->query($sel1);
		$data1=$row1->fetch_assoc();
		$eid=$data1["district_id"];
		$ename=$data1["district_name"];
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
  <table  border="1"align="center" cellpadding="10" style="border-collapse:collapse">
    
    <tr>
      <td>District</td>
      <td><label for="txtname"></label>
      <input type="hidden" name="txtid" value="<?php echo $eid?>" />
      <input type="text" name="txtname" id="txtname"  value="<?php echo $ename?>"required="required" autocomplete="off"/></td>
    </tr>
    <tr>
    <td colspan="2" align="center">
    <input type="submit" name="btnsave" value="Save"/>
    <input type="reset" name="btncancel" value="Reset"/>
    </td>
  </table>
  <table border="1" align="center" cellpadding="10" >
    <tr>
      <td>Sl.No</td>
      <td>District</td>
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_district";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["district_name"]?></td>
      <td><a href="District.php?did=<?php echo $data["district_id"]?>">Delete</a>/<a href="District.php?eid=<?php echo $data["district_id"]?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>
</html>