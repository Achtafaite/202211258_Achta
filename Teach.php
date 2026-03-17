<?php
require_once __DIR__ . '/config/database.php';
// page currently static; you can process POST data here in the future
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
  background-color: #f1822d;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
  opacity: 0.9;
  border-radius: 10px;
}

textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  box-shadow: 0 2px 4px rgba(137, 135, 135, 0.1)  ;
  border-radius: 5px;
}

fieldset input[type="checkbox"] {
  margin-top: 10px;
  justify-content: left;

}

</style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Signup.php">Signup</a></li>
            <li><a href="Teach.php">Teach with us</a></li>
        </ul>
    </nav>

<div class="content">
      <h1>Teach with Us</h1>
</div>

<form method="post" action="">
<div class="container">
  <label for="name">Fullname:</label><br>
  <input type="text" id="name" name="name"><br>

  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email"><br>

  <label for="teaching">Teaching Experience:</label><br>
  <input type="text" id="teaching" name="teaching"><br>

  <label for="qualifications">Qualifications:</label><br>
  <input type="text" id="qualifications" name="qualifications"><br>

  <label for="Subject">Subject To Teach:</label><br>
  <input type="text" id="Subject" name="Subject"><br>

  <fieldset>
    <legend>Preferred Teaching Mode</legend><br>
    <input type="checkbox" id="online" name="Online" value="Online">
    <label for="online">Online</label><br>
    <input type="checkbox" id="In-Person" name="In-Person" value="In-Person">
    <label for="In-Person">In-Person</label><br><br>    
  </fieldset><br>
  <textarea name="text" id="introduce">Introduce yourself</textarea>
  <p>Brief Description of yourself.</p><br>

  <input type="file" name="resume" id="resume">

  <button>Submit</button>

</div>
</form>
<footer>
    <p>&copy; 2023 Online Learning Platform. All rights reserved.</p>
</footer>
</body>
</html>