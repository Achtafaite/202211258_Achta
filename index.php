<?php
require_once __DIR__ . '/config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('image48.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
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
            color: orange;  
            text-decoration: none;
            padding: 15px 20px;
            transition: background-color 0.3s ease;
        }


        nav a:hover {
            text-decoration: underline;
            color:#fff;
        }

        nav a.active {
          text-decoration: underline;
        }
        nav li a.link {
            text-decoration: none;
        }

        .content {
            padding: 20px;
        }

    .card {
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
         width: 350px;
         height: 450px;
         border-radius: 10px;
         margin: 29px;
         text-align: center;
         font-family: arial;
         justify-content: flex-end;
         display: inline-block;
}

.card button {
  border: none; 
  margin-top: 10px;
  padding: 12px;
  color: white;
  background-color: #dc7b15;
  text-align: center;
  cursor: pointer;
  width: 50%;
  font-size: 18px;
  border-radius: 10px;
}

.card  img{
    border-radius: 10px;
    margin: 15px;
    width:90%;
    height:60%;
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

.card button a {
    color: black;
    text-decoration: none;
}

.card button a:hover {
    text-decoration: underline;
    color: white;

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
                <li><a href="signup.php">Signup</a></li>
                <li><a href="Login.php">Login</a></li>
            <?php endif; ?>
            <li><a href="Teach.php">Teach with us</a></li>
        </ul>
    </nav>

<div class="content">
    <div>
        <h1>Popular Courses</h1>
    </div>
</div>
<!-- python programming card -->
<div class="card">
  <h3>Python Programming</h3>
  <img src="image/Python Machine Learning Solutions.jpg" alt="Jeans" >
  <p>Django: High-performance web framework. Build secure, scalable web apps in records time.
    batteries-included.</p>
  <button><li><a href="https://www.youtube.com/watch?v=kqtD5dpn9C8" target="_blank">Watch video</a></li></button>
</div>

<!-- django programming card -->
<div class="card">
  <h3>Django Web dev</h3>
  <img src="image/Python Machine Learning Solutions.jpg" alt="Jeans" >
  <p>Django: High-performance web framework. Build secure, scalable web apps in records time.
    batteries-included.</p>
  <button><li><a href="https://www.youtube.com/watch?v=kqtD5dpn9C8" target="_blank">Watch video</a></li></button>
</div>

<!-- django programming card -->
<div class="card">
  <h3>Python Programming</h3>
  <img src="image/Python Machine Learning Solutions.jpg" alt="Jeans" >
  <p>Django: High-performance web framework. Build secure, scalable web apps in records time.
    batteries-included.</p>
  <button><li><a href="https://www.youtube.com/watch?v=kqtD5dpn9C8" target="_blank">Watch video</a></li></button>
</div>

<!-- django programming card -->
<div class="card">
  <h3>Python Programming</h3>
  <img src="image/Python Machine Learning Solutions.jpg" alt="Jeans" >
  <p>Django: High-performance web framework. Build secure, scalable web apps in records time.
    batteries-included.</p>
  <button><li><a href="https://www.youtube.com/watch?v=kqtD5dpn9C8" target="_blank">Watch video</a></li></button>
</div>

<!-- django programming card -->
<div class="card">
  <h3>Python Programming</h3>
  <img src="image/Python Machine Learning Solutions.jpg" alt="Jeans" >
  <p>Django: High-performance web framework. Build secure, scalable web apps in records time.
    batteries-included.</p>
  <button><li><a href="https://www.youtube.com/watch?v=kqtD5dpn9C8" target="_blank">Watch video</a></li></button>
</div>

<!-- django programming card -->
<div class="card">
  <h3>Python Programming</h3>
  <img src="image/Python Machine Learning Solutions.jpg" alt="Jeans" >
  <p>Django: High-performance web framework. Build secure, scalable web apps in records time.
    batteries-included.</p>
  <button><li><a href="https://www.youtube.com/watch?v=kqtD5dpn9C8" target="_blank">Watch video</a></li></button>
</div>  

<footer>
    <p>&copy; 2023 Online Learning Platform. All rights reserved.</p>
</footer>
</body>
</html>