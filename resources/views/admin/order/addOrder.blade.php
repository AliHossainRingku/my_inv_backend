<!DOCTYPE html>
<html>
<head>
	<title>Add Order</title>
</head>
<body>


	<h1>Add a new order</h1>
	    <form action="{{URL::to('/api/orders')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

		Customer ID: <input type="text" name="customer_id" placeholder="Customer ID"> <br/>
		Total Quantity: <input type="text" name="total_quantity" placeholder="Quantity"> <br/>
		Total Cost: <input type="text" name="total_cost" placeholder="Tota Cost"> <br/>

		Number of Item: <input type="text" name="number_of_item" placeholder="Number of item"><br><br/>

		<?php for($item=0; $item < 4; $item++) {  ?>
		Product ID: <input type="text" name="product_id[]" placeholder="Product ID"> <br/>
		Unit Price: <input type="text" name="unit_price[]" placeholder="Unit Price"> <br/>
		Quantity: <input type="text" name="quantity[]" placeholder="Quantity"> <br/><br/>
		<?php } ?>

		


		<button>Submit</button>
	</form>

</body>
</html>

