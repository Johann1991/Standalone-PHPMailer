<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/styles.css"> <!-- Adjust this path as needed -->
    <title>Contact</title>
</head>
<body>
<div class="container">
    <h1>Contact Us</h1>
    <form id="contact-form" action="../router.php/send-email" method="post">
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required autocomplete="off">
        </div>
        
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required autocomplete="off">
        </div>

        <div class="input-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required autocomplete="off">
        </div>

        <div class="input-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required autocomplete="off"></textarea>
        </div>
        <button type="submit">Send</button>
    </form>
</div>

</body>
</html>
