<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Indian Culture Blog</title>
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
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #ff5733;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        input:focus {
            border-color: #ff5733;
            outline: none;
        }
        button {
            width: 100%;
            background-color: #ff5733;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #e64e21;
        }
        footer {
            background-color: #ff5733;
            color: white;
            padding: 10px;
            text-align: center;
            position: relative;
            bottom: 0;
        }
    </style>
</head>
<body>

    <header>
        <h1>Login to Your Account</h1>
    </header>

    <nav>
        <a href="Home Page.php">Home</a>
        <a href="Menu Page.php">Culture Menu</a>
        <a href="Cart.php">View Cart</a>
    </nav>

    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>
        <p style="text-align: center; margin-top: 15px;">Don't have an account? <a href="registration.php">Register here</a></p>
    </div>

    <footer>
        <p>&copy; 2024 Indian Culture Blog. All rights reserved.</p>
    </footer>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "indian_culture_blog";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                echo "Login successful";
            } else {
                echo "Invalid email or password";
            }
        } else {
            echo "No user found with this email";
        }

        $conn->close();
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</body>
</html>
