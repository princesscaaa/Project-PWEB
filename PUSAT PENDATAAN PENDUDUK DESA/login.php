<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 150px;
            background-image: url("skyscraper.jpg"); 
            background-size: cover;
        }

        h2 {
            margin-bottom: 30px;
            color: #000; 
        }

        .container {
            width: 300px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: black;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Gaya untuk logo panah kembali */
        .back-arrow {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.html" class="back-arrow">
            
            <img src="back.png" alt="Back" width="20" height="20">
        </a>
        <h2 style="color: #000;">Halaman Login</h2> 
        <form action="login proses.php" method="POST">
            <input type="text" id="user" name="username" placeholder="Username" required><br>
            <input type="password" id="pass" name="password" placeholder="Password" required><br>
            <button type="submit" id="btn" name="login" default>Login</button>
        </form>
    </div>
</body>
</html>
