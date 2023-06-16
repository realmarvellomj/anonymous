
<?php
require_once "config.php";
session_start();


    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5($_POST['password']);

    $select = "SELECT * FROM register WHERE username = '$name' && password = '$password' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result)== 1){
        mysqli_fetch_assoc($result);
        echo 'Welcome';
        header ('Location: olofofo.php');
    }else{ 
       echo "User does not exist";
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

    <section>   <div class= "container p-5 m-5">
        <div class= "form-container">
            <form action="" method="post">
               <h3> LOGIN </h3>
               
               <?php
                if(isset($_SESSION['status'])){
                 echo '<h4>' .$_SESSION['status']. '</h4>';
                unset($_SESSION['status']);
                }; 
               ?>
               
               
               <input type="text" name="username" placeholder="name">
               <input type="password" name="password" placeholder="password">
               <input type="submit" name="submit" value="Login" class="form-btn">
                </form>
                
    </div>
    </div>
    </section>
 
</body>
</html>