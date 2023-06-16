<?php
    require_once "config.php";

    

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5($_POST['password']);

    $select = "SELECT * FROM register WHERE username = '$name' && password = '$password' ";
    $result = mysqli_query($conn, $select);
    
    if(mysqli_num_rows($result)> 0){
        echo 'User already exists';
        header ('Location: register.php');
    }else{ 
        $sql= "INSERT INTO register (username, password) VALUES('$name', '$password')";
        mysqli_query($conn, $sql);
        echo 'Welcome';
        header ('Location: index.php');
    }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Olofofo</title>
</head>
<body>
    <div class= "container p-5 m-5">
        <div class= "form-container">
            <form action="register.php" method="POST">
               <h3> REGISTER </h3>
               <input type="text" name="username" placeholder= "Enter your username">
               <input type="password" name="password" id="password" placeholder= "Enter your password">
               <input type="submit" name="submit" value="register now" class="form-btn">
                </form>
    </div>
    </div>
</body>
</html>