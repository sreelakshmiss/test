<?php
include 'dbconfig.php';
$link = mysqli_connect("localhost", "root", "", "shop");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php
$result = mysqli_query($conn,"SELECT * FROM User");
echo "<div '><table border='1'>
<tr style='width:50%'>
<th>Name</th>
<th>Quantity</th>
<th>Tax</th>
<th>Unit Price</th>
<th>Total Price</th>
<th>Subtotal without Tax</th>
<th>Subtotal with Tax</th><th>";?>
<select id="disdrop" style="width:100%;">
								<option value="Select">Select</option>
								<option value="percentage">Percentage</option>
								<option value="amount">Amount</option>
								
							</select>
							<input type="text" id="discount" class="form-control" name="discount" onchange="discountcalculate()"?>

<?php echo"</td></tr>";
$sumtax=0;
while($row = mysqli_fetch_array($result))
{
$tot=$row['quantity'] * $row['unit'];

$subwithtax=(($row['tax']/100)*$tot) + ($row['quantity'] * $row['unit']);
$sumtax=$sumtax+$subwithtax;
echo "<tr>";
echo "<td>" . $row['full_name'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . $row['tax'] . "</td>";
echo "<td>" . $row['unit'] . "</td>";
echo "<td>" . $tot. "</td>";
echo "<td>" . $tot. "</td>";
echo "<td>" . $subwithtax. "</td>";
echo "</tr>";

}
echo "<tr>";
echo "<td colspan=6>Total</td>";
echo "<td id='summ' value='$sumtax'>" . $sumtax. "</td>";
echo "</tr>";
echo "</table></div><br>";
?>
<a href="index.php">
<button>Add</button>
</a>
<script>
function discountcalculate(){
	var value=$('#summ').text();
	var disc=$('#discount').val();
	var dis = $('#disdrop option:selected').val();
	if(dis=="percentage"){
var amt=value-((disc/100)*value);
	}else{
var amt=value-disc;
	}
	$('#summ').text(amt);
	
	
}

</script>
