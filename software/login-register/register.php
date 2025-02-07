<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<form action="add.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

	  <label for="email"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="firstName" id="fn" required>
	  
	  <label for="email"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastName" id="ln" required>
	  
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>
	  
	   <label for="email"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Your phone Number" name="phone" id="phone" required>
	  
	   <label for="email"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" id="address" required>
	  
	   <label for="email"><b>City</b></label>
    <input type="text" placeholder="Enter Address" name="city" id="address" required>
	  
	   <label for="email"><b>State</b></label>
    <input type="text" placeholder="Enter Address" name="state" id="address" required>
	  
	   <label for="email"><b>Zip Code</b></label>
    <input type="text" placeholder="Enter Address" name="zip" id="address" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw2"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw2" id="psw-repeat" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit"name="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
