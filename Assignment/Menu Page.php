<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Culture - Menu</title>
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
        }
        .menu-section {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        h2 {
            color: #ff5733;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .menu-item {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            padding: 15px;
        }
        .menu-item img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }
        .menu-item h3 {
            margin: 15px 0 10px;
            color: #333;
        }
        .menu-item p {
            color: #666;
            margin-bottom: 10px;
        }
        .menu-item span {
            display: block;
            font-weight: bold;
            color: #ff5733;
            margin-bottom: 10px;
        }
        .menu-item button {
            background-color: #ff5733;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .menu-item button:hover {
            background-color: #ff7f50;
        }
        footer {
            background-color: #ff5733;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: 40px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".add-to-cart").click(function() {
                const item = $(this).data("item");
                const price = $(this).data("price");
                let cart = JSON.parse(localStorage.getItem("cart")) || [];
                
                // Check if the item is already in the cart
                const existingItem = cart.find(i => i.name === item);
                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cart.push({ name: item, price: price, quantity: 1 });
                }
                localStorage.setItem("cart", JSON.stringify(cart));
                alert(`${item} has been added to your cart.`);
            });
        });
    </script>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Explore Indian Culture</h1>
        <p>Browse through the diverse and colorful aspects of India’s rich cultural heritage.</p>
    </header>

    <!-- Navigation Section -->
    <nav>
        <a href="Home Page.php">Home</a>
        <a href="Menu Page.php">Culture Menu</a>
        <a href="Cart.php">View Cart</a> <!-- Link to Cart Page -->
    </nav>

    <!-- Main Content Section -->
    <div class="container">
        <div class="menu-section">
            <h2>Indian Cuisine</h2>

            <div class="menu-grid">
                <div class="menu-item">
                    <img src="biryani.jpg" alt="Biryani">
                    <h3>Biryani - Aromatic Rice Dish</h3>
                    <p>Deliciously spiced and fragrant rice with a choice of chicken, mutton, or vegetables.</p>
                    <span>$10.00</span>
                    <button class="add-to-cart" data-item="Biryani" data-price="10">Add to Cart</button>
                </div>
                <div class="menu-item">
                    <img src="masala-dosa.jpg" alt="Masala Dosa">
                    <h3>Masala Dosa - South Indian Crepe</h3>
                    <p>A crispy, fermented crepe made from rice and lentils, filled with spiced potatoes.</p>
                    <span>$8.00</span>
                    <button class="add-to-cart" data-item="Masala Dosa" data-price="8">Add to Cart</button>
                </div>
                <div class="menu-item">
                    <img src="butter-chicken.jpg" alt="Butter Chicken">
                    <h3>Butter Chicken - Creamy Curry</h3>
                    <p>Succulent chicken pieces simmered in a rich, creamy tomato sauce.</p>
                    <span>$12.00</span>
                    <button class="add-to-cart" data-item="Butter Chicken" data-price="12">Add to Cart</button>
                </div>
                <div class="menu-item">
                    <img src="gulab-jamun.jpg" alt="Gulab Jamun">
                    <h3>Gulab Jamun - Popular Dessert</h3>
                    <p>Soft and spongy milk-solid balls soaked in sugar syrup.</p>
                    <span>$5.00</span>
                    <button class="add-to-cart" data-item="Gulab Jamun" data-price="5">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Indian Culture Blog. All rights reserved.</p>
    </footer>

</body>
</html>
