<?php
        // if (!$_SERVER["REQUEST_METHOD"] == "POST"){
        //     $link = $_POST["link"];
        //     echo "Your link has been generated, now spill it: <a href='" . $generatelink . "'>" .   $generatelink . "</a>";
        // }

        //To ensure a valid name is inputed
        if(isset(explode("-",$_GET['link'])[1]) && empty(explode("-",$_GET['link'])[1] )){
          $msg= '<p>Please input a valid name</p>';
           header("Location: index.php?msg=$msg");
        }else{

         if(isset($_GET['link'])){
                $user_link = $_GET['link'];
               $data =  explode('-',$user_link);             
               $link = $data[0];
               $name = $data[1];
              // var_dump($data);
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
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            var copyLinkButton = document.getElementById("copy-link-button");

            copyLinkButton.addEventListener("click", function () {
                var linkToCopy = "<?= "guestpage.php?link=" . $link ?>";

                navigator.clipboard.writeText(linkToCopy)
                    .then(function () {
                        alert("Link copied to clipboard!");
                    })
                    .catch(function (error) {
                        console.error("Failed to copy link: ", error);
                    });
            });
        });
    </script> -->
</head>

<body>
    <div class= "link">
    <p>Dear <?= $name ?>, </p>
    <p> Your link has been generated, now spill it: </p>
    <p>   <?= "guestpage.php?link=".$link ?></p>
    </div>
</body>
   
</html>