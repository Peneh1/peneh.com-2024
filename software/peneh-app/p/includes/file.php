<?php
$contant = return_field_data($db, 'peneh_app_pages', 'id', $url_id);

                
            $path =  '../admin/files/uploades/';
            $file_name = $path . $contant['contant'];
          
// Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($file_name));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($file_name).';base64,'.$imageData;

// Echo out a sample image
echo '<iframe src=" '. $src . '" style="position:fixed; top:0; left:0; bottom:0; right:0; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">
    Your browser dont support iframes
</iframe>';
            ?>
      