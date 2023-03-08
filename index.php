<?php

    if (isset($_GET['login']) && !empty($_GET['username']) 
       && !empty($_GET['password'])) {

        $conn = mysqli_connect("localhost", "root", "", "sqlinjection");

    if (!$conn) {
          echo "Unable to connect!";

       }else {
        //$uname = $_GET['username'];
        $uname = mysqli_real_escape_string($conn, $_GET['username']);

        $pword = $_GET['password'];
        $pword = mysqli_real_escape_string($conn, $_GET['password']);
        //$sql = "SELECT * FROM users WHERE username='" . $uname . "' and password='" . $pword . "'";
        $result = mysqli_query($conn, $sql);

          if(mysqli_num_rows($result) > 0){
            session_start();
            $_SESSION["logged_in"]="1";
            header('Location: landing.php');
          }else{
            echo "Wrong username or password.";
          }
       }

       mysqli_close($conn);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SQLIA</title>

</head>

<body>


    <!-- Content -->
    <div class="container">

        

        <div>
            <div>
              <form action="#" method="get">
                  <div >
            <label for="usr">Username:</label>
            <input type="text" name = "username" id="usr">
          </div>
          <div >
            <label for="pwd">Password:</label>
            <input type="password" name = "password" id="pwd">
          </div>
          <button name="login" type="submit" >Submit</button>
              </form>
          </div>
        </div>
    </div>

</body>

</html>


<style>
  /* Définit la couleur de fond et la police globale */
  body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
  }

  /* Centre le formulaire */
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  /* Définit la taille et la bordure du formulaire */
  form {
    max-width: 400px;
    width: 100%;
    padding: 30px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }

  /* Style les champs de formulaire */
  input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: none;
    border-bottom: 2px solid #ddd;
    font-size: 16px;
    color: #555;
    transition: border-bottom-color 0.3s ease-in-out;
  }

  /* Style les champs de formulaire lorsqu'ils sont en focus */
  input[type="text"]:focus, input[type="password"]:focus {
    border-bottom-color: #007bff;
    outline: none;
  }

  /* Style le bouton de soumission */
  button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }

  /* Style le bouton de soumission lorsqu'il est en hover */
  button[type="submit"]:hover {
    background-color: #0069d9;
  }

  /* Style le titre */
  h1 {
    font-size: 32px;
    margin-bottom: 30px;
    text-align: center;
    color: #007bff;
  }
</style> 