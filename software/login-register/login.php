<!doctype html>
<html>
<head>
<meta charset="utf-8">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
	max-width: 500px;
	margin: auto;
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus{
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="index.php" method="post">
  <div class="container">
    <h1>Login</h1>
   
    <hr>

	  
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>
	

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"  required>

   
    <hr>
    

    <button type="submit"name="submit" class="registerbtn">Login</button>
  </div>
  
  <div class="container signin">
    <p>Dont have an account? <a href="register.php">Register</a>.</p>
  </div>
</form>

</body>
</html>