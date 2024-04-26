<?php
ob_start();
	include("../Assets/Connection/connection.php");
	
	if(isset($_POST["btnsave"]))
	{
		$category=$_POST["txtname"];
		$hid=$_POST["txtid"];
		if($hid!="")
		{
		 $update="update tbl_category set category_name='".$category."' where category_id='".$hid."'";
		 $con->query($update);
		 header("Location:Category.php");	
		}
		else{
		$insQry="insert into tbl_category(category_name)values('".$category."')";
		if($con->query($insQry))
		{
			?>
			<script>
            alert("Inserted..");
			location.href="Category.php";
            </script>
			<?php	
		}
		}
	}
	
	if(isset($_GET["did"]))
	{
		$del="delete from tbl_category where category_id='".$_GET["did"]."'";
		$con->query($del);
		header("Location:Category.php");
	}
	$eid="";
	$ename="";
	if(isset($_GET["eid"]))
	{
		$sel1="select * from tbl_category where category_id='".$_GET["eid"]."'";
		$row1=$con->query($sel1);
		$data1=$row1->fetch_assoc();
		$eid=$data1["category_id"];
		$ename=$data1["category_name"];
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
      <td>Category</td>
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
      <td>category</td>
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_category";
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["category_name"]?></td>
      <td><a href="Category.php?did=<?php echo $data["category_id"]?>">Delete</a>/<a href="Category.php?eid=<?php echo $data["category_id"]?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>