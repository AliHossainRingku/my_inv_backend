
    <h1>Manage Product</h1>
 
    {{ Session::get('msg') }}

    <hr>
    <table border="1">
        <thead>
        <tr>
            <th>SI</th>
            <th>ID</th>
            <th>Product Name</th>
            <th>Picture</th>          
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i = 0;
        ?>
        @foreach($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->product_name }}</td>
                <td><img src="{{ $product->product_image }}" style="height: 60px; width: 60px" /></td>
                <td>{{ $product->product_price}}</td>
                <td>{{ $product->quantity}}</td>
                <td><button>View</button><button>Edit</button><button>Delete</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        <center>{{ $products->render() }}  </center>
    </div>

    </div>


