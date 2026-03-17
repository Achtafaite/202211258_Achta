<?php
require_once __DIR__ . '/config/database.php';

// initialize variables
$error = '';

// handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $email === '' || $password === '') {
        $error = 'All fields are required.';
    } else {
        $db = (new Database())->getConnection();
        // check for existing user
        $stmt = $db->prepare('SELECT id FROM users WHERE username = :u OR email = :e');
        $stmt->execute([':u' => $username, ':e' => $email]);
        if ($stmt->fetch()) {
            $error = 'Username or email already taken.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare('INSERT INTO users (username, email, password, role, created_at) VALUES (:u,:e,:p,\'user\',NOW())');
            $stmt->execute([':u' => $username, ':e' => $email, ':p' => $hash]);
            header('Location: Login.php?msg=registered');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('image/download.jpg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        nav {
            background-color: #333;
            padding: 0;
            position: sticky;
            top: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: right;
        }

        nav li {
            margin: 0;
        }

        nav a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            transition: background-color 0.3s ease;
        }


        nav a:hover {
            text-decoration: underline;
        }

        nav a.active {
          text-decoration: underline;
        }
        nav li a.link {
            text-decoration: none;
            color:red;
        }

        .content {
            padding: 15px;
            justify-content: center;
        }

        h1{
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }


footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}
.container {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
  border-radius: 10px;
  width: 300px;
  margin: 50px auto;
}

input{
     width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  box-shadow: 0 2px 4px rgba(137, 135, 135, 0.1)  ;
  border-radius: 5px;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
  opacity: 0.9;
  border-radius: 10px;
}

</style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
            <?php else: ?>
                <li><a href="Login.php">Login</a></li>
            <?php endif; ?>
            <li><a href="Teach.php">Teach with us</a></li>
        </ul>
    </nav>

<div class="content">
      <h1>Signup</h1>
</div>

<form method="post" action="">
<div class="container">
    <?php if (!empty(
        $error)): ?>
        <p style="color:red;margin-bottom:1rem;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
  <label for="name">Username:</label><br>
  <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"><br><br><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"><br><br>
    <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <button type="submit">Sign Up</button>

</div>
</form>
    

<footer>
    <p>&copy; 2023 Online Learning Platform. All rights reserved.</p>
</footer>
</body>
</html>