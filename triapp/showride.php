<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	include 'connection.php';
	showRide();
}
function showRide()
{
	global $connect;
	//$username =$_POST["username"];
	$driver =$_POST["driver"];
	$query = " Select * FROM RIDE where driver='any'||driver='$driver' ORDER BY status DESC; ";
	
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
		}
	}
	
	header('Content-Type: application/json');
	echo json_encode($temp_array);
	//mysqli_close($connect);
	
}
?>

