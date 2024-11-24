<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Indian Culture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #ff5733;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            margin: 20px;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            color: #ff5733;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #e64e21;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #ff5733;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #ff5733;
            color: white;
        }
        td {
            background-color: #fff;
        }
        button {
            background-color: #ff5733;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #e64e21;
        }
        .total-price {
            font-size: 1.5em;
            text-align: center;
            margin: 20px 0;
        }
        footer {
            background-color: #ff5733;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            loadCart();

            function loadCart() {
                const cart = JSON.parse(localStorage.getItem("cart")) || [];
                const cartTable = $('#cart-items');
                cartTable.empty();

                if (cart.length === 0) {
                    cartTable.append('<tr><td colspan="4">Your cart is empty</td></tr>');
                } else {
                    cart.forEach((item, index) => {
                        const row = `<tr>
                                        <td>${item.name}</td>
                                        <td>$${item.price.toFixed(2)}</td>
                                        <td>
                                            <input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)">
                                        </td>
                                        <td><button class="remove-item" data-index="${index}">Remove</button></td>
                                    </tr>`;
                        cartTable.append(row);
                    });

                    const totalPrice = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
                    $('#total-price').text(`$${totalPrice.toFixed(2)}`);
                }

                $('.remove-item').click(function() {
                    const index = $(this).data('index');
                    removeItem(index);
                });
            }

            window.removeItem = function(index) {
                let cart = JSON.parse(localStorage.getItem("cart")) || [];
                cart.splice(index, 1);
                localStorage.setItem("cart", JSON.stringify(cart));
                loadCart();
            };

            window.updateQuantity = function(index, newQuantity) {
                let cart = JSON.parse(localStorage.getItem("cart")) || [];
                if (newQuantity < 1) newQuantity = 1; // Prevent quantity from being less than 1
                cart[index].quantity = parseInt(newQuantity);
                localStorage.setItem("cart", JSON.stringify(cart));
                loadCart();
            };

            window.proceedToCheckout = function() {
                alert('Proceeding to checkout...');
            };
        });
    </script>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Your Cart</h1>
    </header>

    <!-- Navigation Section -->
    <nav>
        <a href="Home Page.php">Home</a>
        <a href="Menu Page.php">Culture Menu</a>
        <a href="Cart.php">View Cart</a>
    </nav>

    <!-- Cart Content -->
    <div class="container">
        <h2>Items in Your Cart</h2>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <!-- Items will be loaded here by JavaScript -->
            </tbody>
        </table>
        <div class="total-price">Total Price: <span id="total-price">$0.00</span></div>
        <button onclick="proceedToCheckout()">Proceed to Checkout</button>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Indian Culture Blog. All rights reserved.</p>
    </footer>

</body>
</html>
