
<?php
$location = '../';
$page_title = 'Peneh Broadcast';
include("../includes/sections/header.php");?>

<html>
<head>
<meta charset="utf-8">

</head>

<body>
    <iframe style="margin-top: 50px;" width="100%" height="100%" src="https://screenleap.com/peneh"></iframe>
    <?php
   /* $url = 'https://screenleap.com/peneh';
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
    echo file_get_contents_ssl("https://screenleap.com/peneh");

    
    */
    ?>
<?php include("../includes/sections/footer.php");?>

</body>
</html>