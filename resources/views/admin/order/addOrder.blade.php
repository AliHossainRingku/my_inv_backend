<!DOCTYPE html>
<html>
<head>
	<title>Add Order</title>
</head>
<body>


	<h1>Add a new order</h1>
	    <form action="{{URL::to('/api/orders')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
		Product Name: <input type="text" name="product_name" placeholder="Product Name"> <br/>

		Customer Name: <input type="text" name="product_name" placeholder="Product Name"> <br/>

		Product Name: <input type="text" name="product_name" placeholder="Product Name"> <br/>

		Unit Price: <input type="text" name="product_price" placeholder="Price"> <br/>
		Quantity: <input type="text" name="quantity" placeholder="Quantity"> <br/>
		Description: <input type="text" name="product_description" placeholder="Description"> <br/>
		Image: <input type="file" name="product_image" placeholder="Image"> <br/>
		<button>Submit</button>
	</form>

</body>
</html>

