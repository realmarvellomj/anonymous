
<?php
require_once "config.php";
// if(isset($name)){
// $name = $_POST["name"];
// //error messag
// $missingName = '<p><strong>Please enter your name!</strong></p>';
// $errors = "";
//     //if the user has filled their name in
// if(isset($_POST["submit"])){
//     if(!$name){
//         $errors .= $missingName; 
// }
// }}
if(isset($_POST["submit"])){
    // echo "<script>alert('error before')</script>";
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    //write a php function to generate link
    $link = md5($name);
    $select = "INSERT INTO olofofo (name,link) VALUES('$name' ,'$link')";
    $result = mysqli_query($conn, $select);
    $link .= "-".$name;
   if($result ==true){
   // $whatsappLink = "https://api.whatsapp.com/send?text=" . urlencode("Check out my link: guestpage.php?link=" . $link);
        header("Location: generatelink.php?link=" . $link);
        //header("Location: generatelink.php?link=".$link);
   }
}
        
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="style.css"> 
    <title>Olofofo</title>
</head>
<body>
        <div class = "container"> 
        <div class = "header">
         <h2 id = "Olofofo">Olofofo</h2>
         <ul>

            <li>
                Enter Your Name, Create Spill link and Share with your friends on Whatsapp, iMessage.
            </li>
            <li>
                Get anonymous messages from your friends
            </li>
            <li>
                Once your friends send you a message, you'll see them on your dashboard.
            </li>
            <li>
                Enjoy the guessing game you signed up for!
            </li>
        </ul>
<form action ="" method="POST">
    <?php
    if(isset($_GET['msg'])){
        echo $_GET['msg'];
    }
    ?>

    <?php  if(isset($_GET['msg_txt'])){
        echo "<p>".$_GET['msg_txt']."</p> <p> Your Message Sent Successfully</p>";
        echo "<p>".$_GET['msg_txt']."</p> <p> To generate your link, enter your username below</p>";
    } ?>
        <input type="text" class="input" placeholder=" Enter Your username" name= "name">
        <div class="remember-forget">
            <label><input type="checkbox"> I agree to the 
                <a href=" terms.html"> Terms & Conditions </a> </label>
                </div>
        <input href type="submit"  class="btn" name="submit" value="Create a Link">
    </form> 
   
        </div>
        </div>
        <?php
//    if (isset($_GET['link'])) {
//         $user_link = $_GET['link'];
//         $data = explode('-', $user_link);
//         $link = $data[0];
//         $name = $data[1];
//         $whatsappLink = $_GET['whatsapp'];
//         echo '<p>Dear ' . $name . ', Your link has been generated, now spill it: olofofo.com?link=' . $link . '</p>';
//         echo '<div>';
//         echo '<ul>';
//         echo '<li><a href="' . $whatsappLink . '" target="_blank">Share on WhatsApp</a></li>';
//         // Add more social media sharing buttons here if needed
//         echo '</ul>';
//         echo '</div>';
//     }
    ?>
</body>
</html>