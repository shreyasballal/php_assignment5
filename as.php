<!DOCTYPE html>
<html>
<body style="background-color:teal"><center><h1>
<form action="#" method="post" enctype="multipart/form-data">
		<div class="row">
	  	<div class="leftcolumn">
		    <div class="card">
		    	<div class="formheading mb-2">Text File </div>
		    	<div class="row mb-2">
		    		<label>Choose File : </label>
		    	<input type="file" name="filename" class="form-control"><br>
		    	</div>
		    	<div class="row">
		    		<input type="submit" name="save" value="save">
		    		<input type="reset" name="" value="reset" style="padding-left: 10px;">
		    	</div>
		    </div>
		</div>
	</div>
	</form>
<center>
<a href="index.html">back</a></center>
<?php
$vCount=0;
$cCount=0;
$dCount=0;

if (isset($_POST['save'])) {
	 
	 if($_FILES['filename']['type']=='text/plain'){
	 $filesize = $_FILES['filename']['size'];
	 $filenames= $_FILES['filename']['name'];
	 $content = $_FILES['filename']['tmp_name'];
	 	
	 	if(move_uploaded_file($content,"files/".$filenames)){
	 		$string =  file_get_contents("files/".$filenames); 
	 		$filepath = "files/".$filenames;
   			$str = strtolower($string);
   
   for($i = 0; $i < strlen($str); $i++)
{
//Checks whether a character is a vowel
if( $str[$i] == 'a' || $str[$i] == 'e' || $str[$i] == 'i' || $str[$i] == 'o' || $str[$i] == 'u')
{
//Increments the vowel counter
$vCount++;
}
//Checks whether a character is a consonant
else if($str[$i] >= 'a' && $str[$i] <= 'z')
{
//Increments the consonant counter
$cCount++;
}else if ($str[$i] >='0'  && $str[$i] <= '9') {
	//Increments the digit counter
	$dCount++;
}
}

substr_count($str, ' ');
$sCount = $i-$cCount-$vCount-$dCount-substr_count($str,' ');
echo "<br>";
echo "<b>----OUTPUT----</b><br>";
echo "Number of vowels : " . $vCount."</br>";
echo "Number of consonants : " . $cCount."</br>";
echo "Number of words : " . str_word_count($str)."</br>";
echo "Number of digits : " . $dCount."</br>";
echo "Number of Special Characters : " .$sCount."<br>" ;
echo "Number of lines : " . count(file($filepath))."</br>";
echo "Size of file : " . number_format($filesize/1024,3)." KB</br>";

}else{
	echo "Something Went Wrong. Try Again";
}
	 	}else{
	 			echo "Please Upload text file";
	 	}

		// $file = fopen("files/".$filenames,"r");
		// 	echo fgets($file);
		// 	fclose($file);

// 		if (is_uploaded_file($_FILES['filename']['tmp_name'])) { //checks that file is uploaded
   
}

?></h1></center>
</body>
</html>