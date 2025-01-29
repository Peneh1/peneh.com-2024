<?php


 $results=  "Upload File";
$preview_full_url = 'https://peneh.com/graphics/preview/';
include 'db.php';
if(isset($_POST['submit'])){
	//generate a 7 digit random string
 	$url = substr(md5(rand()), 0, 7);
	$notes = $_POST['notes'];
	$file_name = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$uploadfile = $_FILES["file"]["tmp_name"];
	$file_type = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
    $file_contant = file_get_contents($uploadfile);
    $encode_file = base64_encode($file_contant);
    
    
    //testing
 //   echo $encode_file;
  //  echo $file_contant;
 // echo $uploadfile;
    //end testing
	//$success = TRUE;
	           

		
	//check file type
	if($file_type != "pdf"){
	
		$error = "only PDF's are allowed";
		$success = FALSE;
		
	}

	//check file size
	if($file_size > 10000000){
	
		$error = "File to large";
		$success = FALSE;
	
}
	
//if success is true meaning there is no errors, then proceed with upload
  	if($success == TRUE){
		

$sql = "INSERT INTO pdf_encode_preview (url, base64, description)VALUES ('$url', '$encode_file', '$notes')";
	$file_new = TRUE;
	$val = $db->query($sql);
		if($val){	
            //echo link
     echo $preview_full_url, $url;

	$results = 'Created Preview Successfully';
					}else{						
	echo 'Server Error';

			 
		} else { 			
			$file_new = FALSE;
		$results = "File Overwrite Succesfully!";



					
	
}else{
		$results = "<span style='color:red; font-weight:bold'>✕ Error: $error , Try Again</span>";


}

}
//new
//$file_contant = file_get_contents($uploadfile);
//$encode_file = base64_encode($file_contant);
//echo $encode_file;
//$display_file = base64_decode($file23);
//echo $display_file;

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

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>



<form enctype="multipart/form-data"  action="" method="post">
	<h5>Add New Item</h5>
	<hr>
	
			<label for="file">PDF File <small>(max: 10MB)</small></label>
	    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" /> 
<input type="file" accept=".pdf" name="file" required><br>
	<label for="notes">Notes:</label>
<input type="text" name="notes"><br>
	<button type="submit" name="submit" ><?php echo $results; ?></button>
</form>





<br>
<br>
<br>

<hr>
<?php
//check if admin
if($_GET['admin'] == "jk"){

$sql3 = "select * from preview";
	
	$rows = $db->query($sql3);

echo '<table>  <tr> 
    <th>File Name</th>
	    <th>Notes</th>
    <th>URL</th>
	<th>DELETE</>
  </tr>';
	 while ($row = $rows ->fetch_assoc()):
  echo '<tr>  
    <td>'. $row['file_name'] .'</td>
	   <td>' .  $row['notes'] . '</td>
    <td>' . $preview_full_url, $row['url'] . '</td>
    <td><a href="delete.php?id=' . $row['id'] . '&file_name=' . $row['file_name'] . '">Delete</a></td>
  </tr> ';
  endwhile;
    
echo '</table>';
	
	}
?>