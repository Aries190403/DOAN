<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom styles */
        /* Add your custom styles here */
    </style>
</head>
<body>
    <div class="container">
        @if ($cartProducts !== null)
            <h1>Your Cart</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartProducts as $product)
                        <tr>
                            <td>
                                <img src="storage/upload/product/{{$product->image_path}}" alt="Image 1" width="100" height="100">
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <form action="{{ route('cart/delete', ['product_id' => $product->id, 'quantity' => $product->quantity]) }}" method="GET" style="display: inline;">
                                    <button type="submit" style="border: none; background: none;">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </form>
                                {{ $product->quantity }}
                                <form action="{{ route('cart/add', ['product_id' => $product->id]) }}" method="GET" style="display: inline;">
                                    <button type="submit"style="border: none; background: none;">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ number_format($product->price * $product->quantity, 2) }}</td>     
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p>Your cart is empty.</p>
        @endif
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
