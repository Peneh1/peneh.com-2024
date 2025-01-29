<?php include 'includes/config.php';?>
<?php $_SESSION['chat_username'] = $_SERVER['REMOTE_ADDR'];?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Peneh live Chat!!</title>
    <link rel="stylesheet" href="includes/style.css">
      

</head>

<body>
    <h1>Welcome <?Php echo $_SESSION['chat_username'];?>, to The Peneh Chat</h1>
    <div id="wrapper">
    <div class="chat_wrepper">
        <div id="chat">
        
        </div>
        <form action="" method="post" id="messageform">
        <textarea name="message" id="msg" cols="30" rows="10" class="textarea" placeholder="Type some text and hit Enter...."></textarea>
        </form>
        
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="includes/script.js"></script>
    
 
    </body>
</html>