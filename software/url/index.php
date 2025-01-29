<?php require "../db.php" ?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
$url = $_POST['url'];
$url_id = substr(md5(rand()), 0, 5);
$sql = "INSERT INTO `url_list` (`id`, `url`, `url_id`) VALUES (NULL, :value, '$url_id');
";
 //   echo new url on succes
    $stmnt = $db->prepare($sql);
    $stmnt->execute([':value' => $url]);
			if($stmnt){			
				echo 'Your URL is: <br> <a id="url" href="https://u.peneh.com/' . $url_id .'"> https://u.peneh.com/' . $url_id;
               echo '<br><button onclick="copy()">Copy text</button>';
                echo '<script>function copy() {
  
  var copyText = document.getElementById("url");


  copyText.select();
  copyText.setSelectionRange(0, 99999); 

  
  navigator.clipboard.writeText(copyText.value);
  

  alert("Copied the text: " + copyText.value);
}
</script>';
                		
            
            }else{						
				echo 'Server Error';
			}
} 

//if get 
else if (isset($_GET['id'])){
    $url_id = $_GET['id'];
    
    
    //function==================
    function return_field_data($db, $table, $field, $val){
    try{
        $sql="SELECT * FROM {$table} WHERE {$field} = :value";
        $stmnt=$db->prepare($sql);
        $stmnt->execute([':value' => $val]);
        return $stmnt->fetch();
    }catch(PDOException $e){
        return $e->getMessage();
    }
}
    //end function=======================
    
 //Getting deta==================   
    $result = return_field_data($db, 'url_list', 'url_id', $url_id);
    //Fetching deta=================
if ($result != "") {
  // output data of each row
  $url = $result['url'] . "?source=https://u.peneh.com";

     //display data==============
    header("Location: $url");
} else {
    echo 'Invalid Link';
}  
   
} else {
    echo '<title>Free URL Shortener</title>';
    echo '<h1>Free URL Shortener</h1>
    <form action="" method="POST">
<input name="url" type="url" required placeholder="Enter the URL">
    <input type="submit">
</form>';
}

//misc
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
?>

