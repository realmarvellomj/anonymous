<?php
    require_once "config.php";
    session_start();
    // $pdo= new PDO('mysql:host=localhost;port=3306;dbname=user_me', 'root', '');
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // $statement = $pdo->prepare('SELECT * FROM message  ORDER BY id DESC');
    // $statement->execute();
    // $msg= $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $new_link = $_SESSION['link'];
    $sql = "SELECT * FROM message WHERE userid = '$new_link'";
    $result = $conn->query($sql);
    $msg = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $msg[] = $row;
        }
    }

    $conn->close();
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
            height: 100vh;
            margin: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .card{
            text-align: center;
            justify-content: center;
            padding-left: 2rem;
            box-sizing: border-box;
            margin-left: 50px;
        }
        .message-box {
            background-image: linear-gradient(rgb(243, 244, 235) 0%, rgb(115, 158, 239) 100%);
            border: 1px solid black;
            padding: 10px;
            width: 200px;
            height: 200px;
            margin: 250px;
            border-radius: 12px;
            position: relative;
        }
        .message-box::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: black;
            transform: translateY(-50%);
        }
    </style>
       
    <title>Olofofo</title>
</head>
<body>
<div class="message-box">
    <div class="card" style="width: 1rem;">
     <?php foreach ($msg as $i => $item): ?>
  <div class="card-body text-center">
    <div class= "card-title"> 
    <h4> Send me anonymous message </h4>
    
    <div class= "card-text">
        <p><?php echo $item['message']; ?></p>
    </div>
    </div>
    </div>
    
  </div>
  <?php endforeach; ?>
</div>
</body>
</html>
