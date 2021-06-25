<?php
include 'dbconfig.php';
$sql = 'SELECT * FROM `user`';

$result = mysqli_query($conn, $sql);

if (!$result) {
	die('Could not get data: ' . mysqli_error());
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Demo</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>

<body>

	<div class="container">
		<div class="card" style="padding-top:40px;">
			<div class="container-fliud">
				<div class="wrapper row">


					<div class="details col-md-12">
						<h3 class="product-title" style="margin-left:24%;"><u>User Demo</u></h3>
						<div class="col-md-6">
						<p ><button style="width:20%;" type="button" onclick="order_now_details()" class="btn btn-primary">Add</button></p>
						</div>
						<div class="col-md-6">
						<p ><a href="view.php">
								<button style="width:20%;" class="btn btn-primary">View</button>
							</a></p>
</div>
						<div class="order_now_details" style="display:none">
							<h4 class="name"> Name: <span>
									<input type="text" id="name" class="form-control" name="name" ?>
								</span></h4>
							<h4 class="quantity"> Quantity: <span>
									<input type="text" id="quantity" class="form-control" name="quantity" ?>
								</span></h4>
							<h4 class="unit"> Unit Price: <span>
									<input type="text" id="unit" class="form-control" name="unit" ?>
								</span></h4>
							<h4>Tax</h4>


							<select id="taxdrop" style="width:50%;">
								<option value="Select">Select</option>
								<option value="0">0%</option>
								<option value="1">1%</option>
								<option value="5">5%</option>
								<option value="10">10%</option>

							</select>
							<br>
							<p><button type="button" onclick="order_now()" class="btn btn-info">Save</button></p>
						</div>
					</div>

				</div>
				<div id="appenddisp"></div>
			</div>
		</div>
	</div>
</body>
<style>
	.val_date,
	.val_dis {
		color: red;
	}

	.offer {
		color: green;
	}
</style>
<script>
	function order_now_details() {
		$(".order_now_details").slideToggle();


	}

	function order_now() {




		var name = $('#name').val();

		var quantity = $('#quantity').val();

		var unit = $('#unit').val();
		var tax = $('#taxdrop option:selected').val();

		$.ajax({
			type: "POST",
			url: 'save.php',
			data: {
				name: name,
				quantity: quantity,
				unit: unit,
				tax: tax
			},
			// dataType: "json",
			success: function(data) {
				//console.log(res.msg)
				alert("success");
				//$('.details').hide();
				//$('#appenddisp').append(data)
				// alert(data);
				location.reload();
			}
		});

	}
</script>

</html>