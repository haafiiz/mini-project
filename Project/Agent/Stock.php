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
		$ins="insert into tbl_stock(brand_id,category_id,stock_quantity,stock_rate,agent_id,stock_date)values('".$_POST["selbrand"]."','".$_POST["selc"]."','".$_POST["txt_stock"]."','".$_POST["txt_rate"]."','".$_SESSION["aid"]."',curdate())";
		$con->query($ins);
		header("Location:Stock.php");
	}
	if(isset($_GET["did"]))
	{
		$del="delete from tbl_stock where stock_id='".$_GET["did"]."'";
		$con->query($ins);
		header("Location:Stock.php");
		
	}
	include("Head.php");
	?>
    <br /><br /><br />
     <div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center" style="border-collapse:collapse">
    <tr>
      <td>Brand</td>
      <td><label for="selbrand"></label>
        <select name="selbrand" id="selbrand">
        <option value="">---select---</option>
        <?php
		$sel="select * From tbl_brand";
		$row=$con->query($sel);
		while($data=$row->fetch_assoc())
		{
		?>
        <option value="<?php echo $data["brand_id"]?>"><?php echo $data["brand_name"]?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><label for="selc"></label>
        <select name="selc" id="selc">
        <option value="">---select---</option>
        <?php
		$sel="select * From tbl_category";
		$row=$con->query($sel);
		while($data=$row->fetch_assoc())
		{
		?>
        <option value="<?php echo $data["category_id"]?>"><?php echo $data["category_name"]?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><label for="txt_rate"></label>
      <input type="text" name="txt_rate" id="txt_rate" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Stock</td>
      <td><label for="txt_stock"></label>
      <input type="text" name="txt_stock" id="txt_stock" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btnc" id="btnc" value="Cancel" /></td>
    </tr>
  </table>
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Sl.No</td>
      <td>Brand</td>
      <td>Category</td>
      <td>Rate</td>
      <td>Stock</td>
      <td>Action</td>
    </tr>
    <?php
	$sels="select * from tbl_stock s inner join tbl_brand b on b.brand_id=s.brand_id inner join tbl_category c on c.category_id=s.category_id where s.agent_id='".$_SESSION["aid"]."'";
	$row=$con->query($sels);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
        <td><?php echo $data["brand_name"]?></td>
      <td><?php echo $data["category_name"]?></td>
      <td><?php echo $data["stock_rate"]?></td>
      <td><?php echo $data["stock_quantity"]?></td>
      <td><a href="Stock.php?did=<?php echo $data["stock_id"]?>">Delete</a></td>
     
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