<?php include('db.php'); ?>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

<style>
	body{
		margin: 0;
		padding: 0;
		font-family: montserrat;
		background: linear-gradient(120deg, #2980b9, #8e44ad);
		height: 100vh;
		overflow: hidden;
	}

	.center{
		position: absolute;
		top: 30%;
		left: 35%;
		right: 50%;
		transform: translet(-50%, -50%);
		width: 400px;
		background: white;
		border-radius: 10px;
	}

	.center h1{
		text-align: center;
		padding: 0 0 20px 0;
		border-bottom: 1px solid silver;
	}

	.center form{
		padding: 0 40px;
		box-sizing: border-box;
	}

	.form-control{
		width: 90%;
		padding: 0 5px;
		height: 40px;
	}

	.form-label{
		position: relative;
		margin: 30px 0;
		font-size: 16px;
	}

	.mb-3{
		margin-left: 5%;
	}

	.btn{
		width: 90%;
		height: 35px;
		border: 1px solid;
		background: #2691d9;
		border-radius: 25px;
		font-size: 18px;
		color: #e9f4fb;
		font-weight: 700;
		cursor: pointer;
		outline: none;
	}
	
</style>
</head>
<body>
<form>
	<!-- <input type="textbox" name="name" id="name" placeholder="Enter your name"/><br/><br/>
	<input type="textbox" name="amt" id="amt" placeholder="Enter amount"/><br/><br/>
	<input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" /><br/><br/> -->

<div class="center">
	<h1>Payment</h1>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Name:</label><br/>
  <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
</div><br/>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Amount:</label><br/>
  <input type="text" class="form-control" name="amt" id="amt" placeholder="Enter amount">
</div><br/>
<div class="mb-3">
	<input type="button" class="btn" name="btn" id="btn" value="Pay Now" onclick="pay_now()" /><br/><br/>
</div>
</div>
</form>

<script>
	function pay_now() {

		var name = jQuery('#name').val();
		var amt = jQuery('#amt').val();

		var options ={    
				"key": "rzp_test_617VM2FZTtI2v9", 
				"amount": amt*100, 
				"currency": "INR",
				"name": "Tourism Management Company",
				"description": "Test Transaction",
				"image": "img1.jpg",
				"handler": function (response){
					jQuery.ajax({
						type:'post',
						url:'payment_process.php',
						data:"payment_id="+response.razorpay_payment_id+"&amt="+amt+"&name"+name,
						success:function(result){
							window.location.href="thank_you.php";
						}
					});
				}
		};
		var rzp1 = new Razorpay(options);
		rzp1.open();
	}	
</script>
</body>
</html>