<?php
$conn = mysqli_connect('localhost','root','','contact_db') or die('connection succes!');

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $subject = mysqli_real_escape_string($conn, $_POST['subject']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND subject = '$subject' AND number = '$number' AND message = '$msg'") or die('query failed');
   
   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `contact_form`(name, email, subject, number, message) VALUES('$name', '$email','$subject', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial=-scale=1.0">
    <title>Portfolio Example </title>

     <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" href="Images/Icon_navbar.png" type="image/icon type">


    <!-- css files -->
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/loader.css">

  </head>

<body>
<div class="loader">
    <div class="ring"></div>
</div>
<div id="menu-bars" class="fas fa-bars"></div>
  <header>
    <a href="#" class="logo"> <span> <img src="Images/Icon_navbar.png"> </span> <p>CP3'S Website</p></a>

    <nav class="navbar">
      <a href="http://localhost/Profile_Portfolio/About.html">Home</a>
      <a href="http://localhost/Profile_Portfolio/About.html">About</a>
      <a href="http://localhost/Profile_Portfolio/Gallery.html">Gallery</a>
      <a href="http://localhost/Profile_Portfolio/Contacts.php">Contact</a>
    </nav>


    <div class="follow">
      <a href="https://www.facebook.com/christianpaul.espares.90" target="_blank" class="fab fa-facebook" target="_blank"></a>
      <a href="http://m.me/christianpaul.espares.90" target="_blank" class="fa-solid fa-envelope"></a>
      <a href="https://github.com/ChristianPaul123" target="_blank" class="fab fa-github" target="_blank"></a>
      <a href="https://discordapp.com/users/Sympel#4725" target="_blank" class="fab fa-discord" target="_blank"></a>
      <a href="https://t.me/@Sympel1" target="_blank" class="fab fa-telegram" target="_blank"></a>
    </div>
    <div class="footer">
      <p>BSIT-2B</p>
      <p><span>christianpaulespares</span></p>
    </div>
  </header>

  <!-- contact part -->
  <section class="contact" id="contact">
 
 <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

    <h1 class="heading"> contact <span> me </span></h1>

    <div class="icons-container">

      <div class="icons">
        <i class="fas fa-envelope"></i>
        <h3>My email</h3>
        <p>christianpaulespares@1gmail.com</p>
        <p>christianpaulalmine.espares@bicol-u.edu.ph</p>
      </div>

      <div class="icons">
        <i class="fas fa-phone"></i>
        <h3>Phone Number</h3>
        <p>(+639636582528)smart</p>
        <p>(+639928962031)dito</p>
      </div>

      <div class="icons">
        <i class="fas fa-map"></i>
        <h3>my location</h3>
        <p>San Jacinto Masbate</p>
        <p>Poblacion District 3 Bartolabac Street.</p>
      </div>

    </div>

<div class="feedback-form">
  <h3>Message <span>here!</span></h3>
  <div class="content">

    <form class="texts" action="" method="post">
      <span>
      <input type="text" class="field" name="name" placeholder="Name" required>
      <input type="email" class="field" name="email" placeholder="example@nomail.com" required>
      <input type="text" class="field" name="subject" placeholder="Subject" required>
      <input type="number" class="field" min="0" name="number" placeholder="number please" required>
      </span>
      <textarea id="text-area" name="message" placeholder="Put prososal here"></textarea>
      <input type="submit" class="btn" value=" Send Message" name="send" id="btn-contact">
    </form>
  </div>

     
  
</div>  
</section>

<script src="js/loader.js"></script>
<script src="js/script.js"></script>
</body>
</html>