<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>
<style>
@font-face {
    font-family: 'mueso-sans';
    src: url('fonts/MuseoSans_500.otf');
    font-weight: 500;
    font-style: normal;
}

* {
    font-family: 'mueso-sans';
    margin: 0;
    padding: 0;
    font-size: 20px;
}

html, body {
    background: #fff;
    margin: 10px 9px 0 9px;
    padding: 0;
    overflow: hidden;
}

h1 {
    margin: 0 0 10px 0;
    padding: 0;
}

input[type="text"] {
    width: 280px;
    border: 1px solid #ddd;
}

input[type="submit"] {
    background: #000;
    color: #fff;
    border: 0;
    width: 280px;
    height: 30px;
}

textarea {
    height: 140px;
    border: 1px solid #ddd;
    width: 272px;
    padding: 0 4px;
}

p, input, textarea {
    margin-bottom: 10px;
}

input:focus, textarea:focus {
    outline: none;
    background: #fffec1;
    border-color: #fffec1;
}

.notification {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 304px;
    background: rgba(0,0,0,0.7);
    color: #fff;
    padding: 8px;
    font-size: 14px;
    display: none;
    line-height: 1.2;
}

.notification a {
    color: #fff;
    font-size: 14px;
}

a {
    color: #000;
}
</style>
<script src="javascripts/jquery.min.1.4.js" type="text/javascript" charset="utf-8"></script>
<script>
jQuery(function ($) {
    $('form').submit(function (e) {
        if ($('#contact').val() == '') {
            e.preventDefault();
            
            $('.notification').fadeOut();
            $('#error').fadeIn();
        }
    });
    
    $('#back').click(function (e) {
        if ($('#name').val().length || $('#message').val().length || $('#contact').val().length) {
            e.preventDefault();
            
            $('.notification').fadeOut();
            $('#warning').fadeIn();
        }
    });
});
</script>
</head>
<body>
<?php
  if(array_key_exists("submit",$_POST)) {
    $name    = $_POST['name'];
    $message = $_POST['message'];
    $contact = $_POST['contact'];
    
    $content = $name." sent you a mail via the iAd support mailer: \n\n" . $message . "\n\nContact:\n" . $contact;
    
    $receivers = "contact@9elements.com, 9elementsworlddomination@gmail.com";
    mail($receivers, "The iAd: Contact mail", $content, "From: \"iAd Support Mailer\"");
    ?>
    <meta http-equiv="refresh" content="0; url=contact.php?sent" />
    <?php
  } else if(array_key_exists("sent",$_GET)) {
    ?>
    <p>Thanks for your mail! We will answer to it as soon as possible!</p>
    <a href="iad.html">Back to iAd</a>
    <?php
  } else {
?>
  <form action="contact.php" method="POST">
    <p>Hi! My name is</p>
      <input id="name" name="name" type="text" placeholder="Potential Customer" />
      
    <p>Your <a href="iad.html" id="back">iAd</a>, I really must say</p>
      <textarea id="message" name="message" placeholder="You made me html5 curious!"></textarea>
      
    <p>You can reach me at</p>
      <p><input name="contact" id="contact" type="text" placeholder="my email, phone or an url." /></p>
      <input type="submit" name="submit" value="Send to Us" />
      
    <div class="notification" id="warning">
      You already entered text and going back will blank it!
      <a href="iad.html">Take me back anyway</a>
    </div>
    
    <div class="notification" id="error">
      No means of contact? See, unless you are Steve Jobs or the Holy Buddha,
      we might not know whom to address our answer to. No spam. Promise ☺
    </div>
  </form>
<?php
  }
?>
</body>
</html>