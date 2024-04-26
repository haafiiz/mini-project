
<?php
ob_start();
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

    include("../Assets/Connection/connection.php");
	if(isset($_POST["btn_save"]))
	{
		$disid=$_POST["sel_district"];
		$pname=$_POST["txt_place"];
		$ins="insert into tbl_place(place_name,district_id)values('".$pname."','".$disid."')";
		if($con->query($ins))
		{
			?>
            <script>alert("inserted")</script>
            <?php
		}
		else
		{
			?>
            <script>alert("failed")</script>
            <?php
		}
	}
	
	if(isset($_GET["did"]))
{
  $delQry="delete from tbl_place where place_id='".$_GET["did"]."'";
  $con->query($delQry);
  header("Location:Place.php");
}
$eid="";
$ename="";
$edis="";
if(isset($_GET["eid"]))
{
	$sel1="select * from tbl_place where place_id='".$_GET["eid"]."'";
	$row1=$con->query($sel1);
	$data1=$row1->fetch_assoc();
	$eid=$data1["place_id"];
	$ename=$data1["place_name"];
	$edis=$data1["district_id"];
}


	?>
    <br /><br /><br />
<form id="form1" name="form1" method="post" action="Place.php">
  <table  border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td >district</td>
      <td ><label for="sel_district"></label>
        <select name="sel_district" id="sel_district">
        <option>---select---</option>
        <?php
		$sel="select * from tbl_district";
		$row=$con->query($sel);
		while($data=$row->fetch_assoc())
		{
			?>
            <option <?php if($data["district_id"]==$edis){echo "selected";}?> value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
            <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" value="<?php echo $ename?>" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>

 
  <table border="1"align="center" cellpadding="10" >
    <tr>
      <td >SL No</td>
      <td >District</td>
      <td >Place</td>
      <td >Action</td>
    </tr>
    <tr>
    <?php
  $selp = "select * from tbl_place p inner join tbl_district d on d.district_id=p.district_id";
  $row1=$con->query($selp);
  $i=0;
  while($data1 = $row1->fetch_assoc())
  {
    $i++;
  
  ?>
      <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data1["district_name"]?></td>
      <td><?php echo $data1["place_name"]?></td>
      <td><a href="Place.php?did=<?php echo $data1["place_id"]?>">Delete</a>/<a href="Place.php?eid=<?php echo $data1["place_id"]?>">Edit</a></td>
    </tr>
    <?php
  }
  ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
<br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
ob_flush();
?>
</html>





