<?php

include 'db.php';

$pdf_id = $_SERVER['QUERY_STRING'];

$sql = "select * FROM preview WHERE url =  '$pdf_id'";
$rows = $db->query($sql);
if(mysqli_num_rows($rows)!==0){
	
while ($row = $rows ->fetch_assoc()): 
	
		echo '<title>Peneh Preview -  '. $row['file_name'] . '</title>';
/*start file get content
    $pdf_key = $row['file_name'];
 $url = "https://peneh.com/graphics/preview/web/index.php?file=../ser45rgtfcgv/$pdf_key";
    function file_get_contents_ssl($url) {
  $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3000); // 3 sec.
    curl_setopt($ch, CURLOPT_TIMEOUT, 10000); // 10 sec.
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
    }
    echo file_get_contents_ssl("$url");

    echo $url;
  //end of get content
  */
    
    
	echo '  <iframe src="web/?file=../ser45rgtfcgv/' . $row['file_name'] . '" border="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0%;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>';
    
	echo '<script src="disable.js"></script>';
	endwhile;
}else{


http_response_code(404);
    include '../../error404.php';
	
}


?>

