<?php
define('DIR','');
?>

<!DOCTYPE html>
<html>

<body style="background-color:orange">
<center>
	<form action="#" method="post" enctype="multipart/form-data">
		<div class="row">
	  	<div class="leftcolumn">
		    <div class="card">
		    	<div class="formheading mb-2">bank(Open Account)</div>
		    	<table border="1">
		    		<tr>
		    			<th>Account Number</th>
		    			<td><input type="text" name="acno" id="acno"></td>
		    		</tr>
		    		<tr>
		    			<th>First Name</th>
		    			<td><input type="text" name="fname" id="fname"></td>
		    		</tr>
		    		<tr>
		    			<th>Last Name</th>
		    			<td><input type="text" name="lname" id="lname"></td>
		    		</tr>
		    		<tr>
		    			<th>Enter DOB</th>
		    			<td><input type="date" name="dob" id="dob"></td>
		    		</tr>
		    		<tr>
		    			<th>Select Gender</th>
		    			<td>
		    				<input type="radio" name="gender" value="Male"> Male 
		    				<input type="radio" name="gender" value="Female"> Female 
		    				<input type="radio" name="gender" value="Other"> Other 
		    			</td>
		    		</tr>
		    		<tr>
		    			<th>Amount</th>
		    			<td><input type="number" name="amt" id="amt"></td>
		    		</tr>
		    		<tr>
		    			<td colspan="2"><input type="submit" name="save" Value="CREATE"></td>
		    		</tr>
		    	</table>
		    </div>
		</div>
	</div>
	</form></center>
<center><a href="as5.php">back</a></center>
</body>
</html>

<?php
if (isset($_POST['save'])) {

	$con = mysqli_connect("localhost","root","","dhruthi");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if($_POST['amt']< '500'){
 echo "Minimum amount must be greater than 500 is required";
}else{
	$qry = mysqli_query($con,"SELECT * FROM bank where acno=".$_POST['acno']);
	
if (mysqli_num_rows($qry)>0) {
	echo "Account number already Exist";
}else{

	$query = mysqli_query($con,"INSERT INTO `bank`(`acno`, `fname`, `lname`, `dob`, `gender`, `balance`) VALUES ('".$_POST['acno']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['dob']."','".$_POST['gender']."','".$_POST['amt']."')")or die(mysqli_error($con));
if ($query) {
	echo "data uploaded";
}else{
	echo "data Not uploaded";
}
}
}


}
?>