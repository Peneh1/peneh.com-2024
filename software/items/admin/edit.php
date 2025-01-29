<?php
 $results=  "Add Item";
include 'db.php';
if(isset($_POST['submit'])){
  	$item_id = mt_rand(10000, 99999);
	$title = $_POST['title'];
	$discriptin = $_POST['discrition'];
	$price = $_POST['price'];
	$file_name = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
  	$file_dir = 'img/';
	$uploadfile = $file_dir . basename($file_name);
	$file_type = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
	$success = TRUE;
	
	//check file
	if(getimagesize($uploadfile == FALSE)){
	
		$error = "invalid image";
		$success = FALSE;
	}
	
	//check file type
	if($file_type != "png"   && $file_type != "jpg" && $file_type != "jpeg"){
	
		$error = "only imges are alout";
		$success = FALSE;
		
	}

	//check file size
	if($file_size > 500000){
	
		$error = "File to large";
		$success = FALSE;}
	//check if file exsist already
	if(file_exists($uploadfile)){
		$error = "File already exists!";
		$success = FALSE;
	}
	
//if success is true meaning there is no errors, then proceed with upload
  	if($success == TRUE){
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
 		
				$sql = "INSERT INTO items (item_id, title, discription, price, img_url)VALUES ('$item_id', '$title', '$discriptin', '$price', '$uploadfile')";
				$val = $db->query($sql);
						if($val){
									$results=  "✓ Success! Add more";
						} else {
    					$results = "<span style='color:red; font-weight:bold'>✕ Unsuccessful</span>";
									}
					} 
	
}else{
		$results = "<span style='color:red; font-weight:bold'>✕ Error: $error </span>";


}
}


?>



<style>
	
	form {
  padding: 16px;
  background-color: white;
	max-width: 500px;
	margin: auto;
}

/* Full-width input fields */
input, textarea{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input:focus, textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
button {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.button:hover {
  opacity: 1;
}
</style>
<a href="../index.php">Home</a> <a href="add-new.php">Add New</a>
<hr>

<form enctype="multipart/form-data"  action="" method="post">
	<h5>Add New Item</h5>
	<hr>
	<label for="title">Title</label>
<input type="text" name="title" required><br>
	<label for="discription">Discription</label>
<textarea name="discrition" required></textarea><br>
	<label for="price">Price</label>
	<input type="number" step="0.01" name="price" required><br>
		<label for="file">Image <small>(max: 0.5mb)</small></label>
<input type="file" name="file" required><br>
	<button type="submit" name="submit" ><?php echo $results; ?></button>
</form>