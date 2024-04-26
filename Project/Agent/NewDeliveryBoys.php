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
	if(isset($_POST["btn_register"]))
	{
		$name=$_POST["txt_name"];
		$contact=$_POST["txt_contact"];
		$email=$_POST["txt_email"];
		$dob=$_POST["txt_dob"];
		$address=$_POST["txt_address"];
		$district=$_POST["sel_district"];
		$place=$_POST["sel_place"];
		$password=$_POST["txt_password"];
		$confirmpassword=$_POST["txt_confirmpassword"];
		if($password==$confirmpassword)
		{
			$photo=$_FILES["file_photo"]['name'];
			$temp=$_FILES["file_photo"]['tmp_name'];
			move_uploaded_file($temp,"../Assets/Files/DeliveryPhoto/".$photo);
			
			$proof=$_FILES["file_proof"]['name'];
			$temp1=$_FILES["file_proof"]['tmp_name'];
			move_uploaded_file($temp,"../Assets/Files/DeliveryProof/".$proof);
			
			$ins="insert into tbl_deliveryboy(deliveryboy_name,deliveryboy_contact,deliveryboy_email,deliveryboy_dob,deliveryboy_address,place_id,deliveryboy_photo,deliveryboy_proof,deliveryboy_password,agent_id)values('".$name."','".$contact."','".$email."','".$dob."','".$address."','".$place."','".$photo."','".$proof."','".$password."','".$_SESSION["aid"]."')";
		if($con->query($ins))
		{
			?>
            <script>alert("Registration SucessFully Completed.....")</script>
            <?php
		}
		else
		{
			?>
            <script>alert("Registration Unsucessfull Due to Server Error......")</script>
            <?php
		}
	
		}
			
			
		

			
	 
	}
	if(isset($_GET["did"]))
	{
		$del="delete from tbl_deliveryboy where deliveryboy_id='".$_GET["did"]."'";
		$con->query($del);
		header("Location:NewDeliveryBoys.php");
	}
	 include("Head.php");
	?>
    <br /><br /><br />
     <div id="tab" align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table  border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td >Name</td>
      <td ><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>DOB</td>
      <td><label for="txt_dob"></label>
      <input type="date" name="txt_dob" id="txt_dob" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onchange="getPlace(this.value)">
         <option>---select---</option>
        <?php
		$sel="select * from tbl_district";
		$row=$con->query($sel);
		while($data=$row->fetch_assoc())
		{
			?>
            <option  value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
            <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
        <option>---select---</option>
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" required="required" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" required="required" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirmpassword"></label>
      <input type="password" name="txt_confirmpassword" id="txt_confirmpassword" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_register" id="btn_register" value="Register" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <hr />
  <br />
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td>Sl.No</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Photo</td>
      <td>Action</td>
    </tr>
    <?php
	$seld="select * from tbl_deliveryboy where agent_id='".$_SESSION["aid"]."'";
	$rowd=$con->query($seld);
	$i=0;
	while($datad=$rowd->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $datad["deliveryboy_name"]?></td>
      <td><?php echo $datad["deliveryboy_contact"]?></td>
      <td><img src="../Assets/Files/DeliveryPhoto/<?php echo $datad["deliveryboy_photo"]?>"  width="150" height="150"/></td>
      <td><a href="NewDeliveryBoys.php?did=<?php echo $datad["deliveryboy_id"]?>">Remove</a></td>
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
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/Ajaxpages/Ajaxplace.php?did="+did,
	  success: function(html){
		$("#sel_place").html(html);
	  }
	});
}
</script>