<?php
	include "php_config.php";
	$mid = $_SESSION['mid'];
	
	if (isset($_GET['content']) and $_GET['content'] == "check")
	{
		$checker = $_GET['checker'];//setting the string to compare with from the database
		
		$res = mysqli_query($con,"select sstring from matches where id = ".$mid);
		$resarr = mysqli_fetch_array($res);
		$json = $resarr[0];
		
		while ($checker == $json)
		{
			$res = mysqli_query($con,"select sstring from matches where id = ".$mid);
			$resarr = mysqli_fetch_array($res);
			$json = $resarr[0];
			sleep(0.05);
		}
	
		mysqli_query($con,"update matches set sstring = $checker where id = $mid");
		echo $json;
	}
?>