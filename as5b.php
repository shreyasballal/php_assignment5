<?php
define('DIR','');
?>

<!DOCTYPE html>
<html>
<body style="background-color:orange">
<center><h2>
	<form action="#" method="post" enctype="multipart/form-data">
		<div class="row">
	  	<div class="leftcolumn">
		    <div class="card">
		    	<div class="formheading mb-2"> Bank (Debit Amount)</div>
		    	<table border="1">
		    		<tr>
		    			<th>Account Number</th>
		    			<td><input type="text" name="acno" id="acno"></td>
		    		</tr>
		    		<tr>
		    			<th>Amount</th>
		    			<td><input type="number" name="amt" id="amt"></td>
		    		</tr>
		    		<tr>
		    			<td colspan="2"><input type="submit" name="save" Value="SUBMIT"></td>
		    		</tr>
		    	</table>
		    </div>
		</div>
	</div>
	</form></h2></center>

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

$qry = mysqli_query($con,"SELECT * FROM bank where acno=".$_POST['acno']);
if (!$qry) {
	echo "Account nummber not found";
}else{
	$qry1 = mysqli_fetch_array($qry, MYSQLI_ASSOC);
	if (($qry1['balance']-$_POST['amt'])>500) {
		$upqry = mysqli_query($con,"UPDATE `bank` SET `balance`=".($qry1['balance']-$_POST['amt'])." WHERE acno =".$_POST['acno'])or die(mysqli_error($con));
		if($upqry){
			echo $_POST['amt']."<h2> Rs Debited. Balance =</h2>".($qry1['balance']-$_POST['amt']);
		}else{
			echo "something went wrong";
		}
	}else{
		echo "Insufficiant Balance";
	}
}
}
?>