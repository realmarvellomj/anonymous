<?php
// for guests to type their message
require_once "config.php";
$user_link = $_GET['link'];
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
   //sending the message to database
   if(isset($_POST['send'])){
    $msg = mysqli_real_escape_string($conn,$_POST['message']);
    $date = date("Y-m-d");

    $sql = "INSERT INTO message (message, userid, date) VALUES('$msg' ,'$user_link' , '$date')";

    $result =  mysqli_query($conn, $sql);
    if($result == true){
        header("Location: index.php?msg_txt=Thanks for your participation");
    }else{
        alert("Something went wrong");
    }
   }






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Olofofo</title>
</head>
<body>
    <div>
        <form><input type="hidden" name="link_id" value=""   /></form>
        <ul>
        <li> Share your thoughts with <?= $name ?></li> 
        <li> Let's Play and have fun with <?= $name ?> </li>
        <li> This is your little secret, <?= $name ?> will never know</li>
        </ul>
    <form action="" method= "POST">

    <div class= "input-data">
        <textarea type="text" name="message" placeholder="Say your Mind"> </textarea>
        
    </div>
    <div>  <input type="submit" class="button" name= "send" value= "Send">
    </div>

    </form>
</body>
</html>