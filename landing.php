<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "sqlinjection";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['submit'])) {

  $name = $_GET['name'];
  //$name = mysqli_real_escape_string($conn, $_GETT['name']);

  $sql = "SELECT id, name, username, password FROM users WHERE username LIKE '%" . $name . "%'";
  $result = mysqli_query($conn, $sql);

 echo "<div class='results'>";


  if (mysqli_num_rows($result) > 0) {
    echo "<h2>Your information:</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<p>ID: " . $row['id'] . " Name: " . $row['name'] . " Username : " . $row['username'] ." Password: " . $row['password'] ."</p>";
    }
  } else {
    echo "<p>No matching names found.</p>";
  }

    echo "</div>";




}


?>

<!DOCTYPE html>
<html>
<head>
  <title>My profile</title>
</head>
<body>
  <h1>My Profile</h1>
    <h3>Successfully logged in</h3>

  <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
  <form method="GET">
    <label for="name">Enter your username</label>
    <input type="text" name="name" id="name" required>
    <button type="submit" name="submit">Search</button>
  </form>
</body>
</html> 




  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    h1 {
      color: #333;
      text-align: center;
    }
    h3 {
      color: darkgreen;
      text-align: center;
    }
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 50px;
    }
      .results {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .result {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-bottom: 20px;
      max-width: 500px;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .result p {
      margin: 0;
      font-size: 18px;
    }
    .result span {
      font-weight: bold;
      font-size: 20px;
    }
    label {
      font-size: 20px;
      margin-bottom: 20px;
    }
    input[type=text] {
      font-size: 16px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      width: 300px;
      margin-bottom: 20px;
    }
    button[type=submit] {
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
    button[type=submit]:hover {
      background-color: #555;
    }
  </style>