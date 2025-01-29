<?php

require '../db.php';



$table = $_GET['table'];
$id = $_GET['id'];
$sql = "select * from $table where id = $id ";
$rows = $db->query($sql);
    $row = $rows->fetch_assoc();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];

$sql2 = "UPDATE $table 
set name = '$name', 
      phone_number = '$phone'
WHERE id = $id ";

$update = $db->query($sql2);

if ($update){
   header('location: index.php');
          }else{     echo '<p style="color: red">error updating</p>';}
    }
?>


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
input[type=text], input[type=tel], input[type=email]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=tel]:focus, input[type=email]:focus{
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
    label, h1 {
       text-align: right;
        float: right;
    }
/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="" method="post">
  <div class="container">
    <h1>   איך וועל לערנן בל"נ מסכת <?php echo $row['meschta']; ?> </h1>
   
    <hr>

	  
    <label for="name"><b>נאמען</b></label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
	

    <label for="phone"><b>טעלפאון</b></label>
    <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $row['phone_number']; ?>" required><br><small>Format: 123-456-7890</small>

   
    <hr>
    

    <button type="submit"name="submit" class="registerbtn">Save</button>
  </div>
    </form>
