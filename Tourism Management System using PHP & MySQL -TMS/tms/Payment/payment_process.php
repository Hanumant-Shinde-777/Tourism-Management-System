<?php
include('db.php');
// $con=mysqli_connect('localhost','root','','tms1');
if(isset($_POST['payment_id']) && isset($_POST['amt']) && isset($_POST['name']))
{
	$payment_id=$_POST['payment_id'];
	$amt=$_POST['amt'];
	$name=$_POST['name'];
	$payment_status="complete";
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con, "insert into payment(name, amount, payment_status, payment_id, added_on) values('$name','$amt','$payment_status','$payment_id','$added_on')");
}
?>