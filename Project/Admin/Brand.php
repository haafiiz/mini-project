<?php
ob_start();
	include("../Assets/Connection/connection.php");
	
	if(isset($_POST["btnsave"]))
	{
		$brand=$_POST["txtname"];
		$hid=$_POST["txtid"];
		if($hid!="")
		{
		 $update="update tbl_brand set brand_name='".$brand."' where brand_id='".$hid."'";
		 $con->query($update);
		 header("Location:Brand.php");	
		}
		else{
		$insQry="insert into tbl_brand(brand_name)values('".$brand."')";
		if($conn->query($insQry))
		{
			?>
			<script>
            alert("Inserted..");
			location.href="Brand.php";
            </script>
			<?php	
		}
		}
	}
	
	if(isset($_GET["did"]))
	{
		$del="delete from tbl_brand where brand_id='".$_GET["did"]."'";
		$con->query($del);
		header("Location:Brand.php");
	}
	$eid="";
	$ename="";
	if(isset($_GET["eid"]))
	{
		$sel1="select * from tbl_brand where brand_id='".$_GET["eid"]."'";
		$row1=$con->query($sel1);
		$data1=$row1->fetch_assoc();
		$eid=$data1["brand_id"];
		$ename=$data1["brand_name"];
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
      <td>Brand</td>
      <td><label for="txtname"></label>
      <input type="hidden" name="txtid" value="<?php echo $eid?>" />
      <input type="text" name="txtname" id="txtname"  value="<?php echo $ename?>" required autocomplete="off"/></td>
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
      <td>brand</td>
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_brand";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["brand_name"]?></td>
      <td><a href="Brand.php?did=<?php echo $data["brand_id"]?>">Delete</a>/<a href="Brand.php?eid=<?php echo $data["brand_id"]?>">Edit</a></td>
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