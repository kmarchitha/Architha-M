<?php
	if(isset($_POST['submitForm']) == true){
		$str = file_get_contents('TEXT-Files/input-file.json');
		$json = json_decode($str,true);
		$fp = fopen('TEXT-Files/out-file.json', 'w');
		for($i=1;$i<=trim($_POST['empCount']);$i++){
			$randomNumber = rand(0,9);
			$displayArray[] = array($json['productList'][$randomNumber]['p_code'] => $json['productList'][$randomNumber]['prise']);
			$priseVal[] = $json['productList'][$randomNumber]['prise'];
		}
		$displayArray[]['Range'] = max($priseVal) - min($priseVal);
		fwrite($fp, json_encode($displayArray ,JSON_PRETTY_PRINT));
		fclose($fp);		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<input type="number" name="empCount" min="1" max="10" required="required" placeholder="Enter No. Emp" style="width: 30%" /><br/><br/>
		<input type="submit" name="submitForm" value="Submit" />
	</form>
</body>
</html>