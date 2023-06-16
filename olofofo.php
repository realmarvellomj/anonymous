 <?php
 require_once "config.php";
 session_start();

//  $user_link = $_GET['link'];
if(isset($_GET['link'])){
   $link = $_GET['link'];
   $sql = "SELECT * FROM olofofo WHERE link= '$link'";
   $res = mysqli_query($conn, $sql);
   if(mysqli_num_rows($res)>0){
    $data = mysqli_fetch_assoc($res);
    $name = $data['name'];
   }else{
    header("Location: index.php");
   }}


 if(isset($_POST['submit'])){
    

    $name = mysqli_real_escape_string($conn, $_POST['username']);

$select = "SELECT * FROM olofofo WHERE name = '$name'";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result)== true){
    $data = mysqli_fetch_assoc($result);

    $_SESSION['link'] = $data['link'];



    echo 'Welcome';
    header ('Location: message.php');
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
    <style>
         @media (min-width: 100px) and (max-width: 991px) {
    }
        body{
            background-color: white;
            display: grid;
            background-image: linear-gradient(rgb(243, 244, 235) 0%, rgb(115, 158, 239) 100%);
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        form{
            text-align: center;
            justify-content: center;
            padding: 100px;
            box-sizing: border-box;
            margin: 30px;
        }
        .input{
            width: 40%;
            height: 30px;
        }
        .btn{
            justify-items: center;
            margin-top: 15px;
        }
    </style>
    <title>Olofofo</title>
</head>
<body>
    <form action="" method= "POST">
        <input type="text" class= "input" placeholder= "" value= "" name="username">
      <div> <input type="submit"  class="btn" name="submit" value="Check your drops"> </div> 
    </form>
</body>
</html>