<?php
define('DIR','');
?>

<!DOCTYPE html>
<html>
<body style="background-color:orange"><center><h2>

	<form action="#" method="post" enctype="multipart/form-data">
		<div class="row">
	  	<div class="leftcolumn">
		    <div class="card">
		    	<div class="formheading mb-2">See Flight Peference! </div>
		    	<table border="1">
		    		<tr>
		    			<th>Name</th>
		    			<td><input type="text" name="first_name"></td>
		    		</tr>
		    		<tr>
		    			<th>Seat Selection</th>
		    			<td>
		    				<input type="radio" name="seat" value="Aside"> Aside 
		    				<input type="radio" name="seat" value="Window"> Window 
		    				<input type="radio" name="seat" value="Center"> Center 
		    			</td>
		    		</tr>
		    		<tr>
		    			<th>Meal Selection</th>
		    			<td>
		    				<input type="radio" name="meal" value="Veg"> Veg 
		    				<input type="radio" name="meal" value="Non-Veg"> Non-veg 
		    				<input type="radio" name="meal" value="Diabetie"> Diabetie 
		    				<input type="radio" name="meal" value="child"> Child 
		    			</td>
		    		</tr>
		    		<tr>
		    			<td colspan="2"><input type="submit" name="save" Value="SUBMIT"></td>
		    		</tr>
		    	</table>
		    </div>
		</div>
	</div>
	</form>
</h2></center>
<center><h1><a href="index.html">back</a></h1></center>
</body>
</html>

<?php
if (isset($_POST['save'])) {

	session_start();
	$name = $_POST['first_name'];
	$seat = $_POST['seat'];
	$meal = $_POST['meal'];
	setcookie("name",$name);
	setcookie("seat",$seat);
	setcookie("meal",$meal);
	if (isset($_COOKIE["name"]) && isset($_COOKIE["meal"]) && isset($_COOKIE["seat"])) {
		echo "<h1>Cookie has been set!.</h1><br><br>____________________<br><br>";
		echo "<h1>Press <a href='as2a.php'>Go</a> to view Cookie..</h1><br>";
	}else{
		echo "<h1>Cookie not set</h1>";
	}
}
?>