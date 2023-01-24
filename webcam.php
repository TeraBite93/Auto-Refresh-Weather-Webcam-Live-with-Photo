<?php
    $folder = 'webcam/'; // Replace with the directory that contains one or more photos. The script will use the most recent one.
    $files = scandir($folder);
    $files = array_diff($files, array('.', '..'));
    $files = array_values($files);
    $latest_img = '';
    $latest_time = 0;
    foreach($files as $file) {
        $file_path = $folder . $file;
        $time = filemtime($file_path);
        if($time > $latest_time) {
            $latest_img = $file;
            $latest_time = $time;
        }
    }
    $newest_image = $folder . $latest_img;
    header('Content-Type: image/jpeg');
    header('Content-Length: ' . filesize($newest_image));
    readfile($newest_image);
?>
