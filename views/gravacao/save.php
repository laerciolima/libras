<?php
// Muaz Khan     - www.MuazKhan.com
// MIT License   - https://www.webrtc-experiment.com/licence/
// Documentation - https://github.com/muaz-khan/RecordRTC

header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 1);

set_error_handler("someFunction");

function someFunction($errno, $errstr) {
    echo '<h2>Upload failed.</h2><br>';
    echo '<p>'.$errstr.'</p>';
    error_log($errstr);
}

function selfInvoker()
{


    ob_start();
    var_dump($_FILES);
    $result = ob_get_clean();


    error_log($result);

    if (!isset($_POST['audio-filename']) && !isset($_POST['video-filename'])) {
        echo 'Empty file name.';
        return;
    }

    error_log("passou1");
    // do NOT allow empty file names
    if (empty($_POST['audio-filename']) && empty($_POST['video-filename'])) {
        echo 'Empty file name.';
        return;
    }
    error_log("passou2");

    // do NOT allow third party audio uploads
    if (isset($_POST['audio-filename']) && strrpos($_POST['audio-filename'], "RecordRTC-") !== 0) {
        echo 'File name must start with "RecordRTC-"';
        return;
    }
    error_log("passou3");

    // do NOT allow third party video uploads
    error_log($_POST['video-filename']);

    if (!isset($_POST['video-filename'])) {

        error_log("File name must start with RecordRTC-");
        return;
    }
    error_log("passou4");

    $fileName = '';
    $tempName = '';
    $file_idx = '';

    if (!empty($_FILES['audio-blob'])) {
        $file_idx = 'audio-blob';
        $fileName = $_POST['audio-filename'];
        $tempName = $_FILES[$file_idx]['tmp_name'];
    } else {
        error_log("alterou o nome temporariao");
        $file_idx = 'video-blob';
        $fileName = $_POST['video-filename'];
        $tempName = $_FILES[$file_idx]['tmp_name'];
    }

    if (empty($fileName) || empty($tempName)) {
        if(empty($tempName)) {
            echo 'Invalid temp_name: '.$tempName;
            return;
        }

        echo 'Invalid file name: '.$fileName;
        return;
    }

    /*
    $upload_max_filesize = return_bytes(ini_get('upload_max_filesize'));

    if ($_FILES[$file_idx]['size'] > $upload_max_filesize)
       echo 'upload_max_filesize exceeded.';
       return;
    }

    $post_max_size = return_bytes(ini_get('post_max_size'));

    if ($_FILES[$file_idx]['size'] > $post_max_size)
       echo 'post_max_size exceeded.';
       return;
    }
    */

    $filePath = 'views/gravacao/uploads/' . $fileName;
    error_log("teste");
    // make sure that one can upload only allowed audio/video files
    $allowed = array(
        'webm',
        'wav',
        'mp4',
        "mkv",
        'mp3',
        'ogg'
    );
    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
    if (!$extension || empty($extension) || !in_array($extension, $allowed)) {
        echo 'Invalid file extension: '.$extension;
        
    }
    error_log("movendo arquivo");
    if (!move_uploaded_file($tempName.".webm", $filePath)) {
        error_log("Problem saving file: ".$tempName);
        
    }

    echo 'success';
}

/*
function return_bytes($val) {
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last) {
        // The 'G' modifier is available since PHP 5.1.0
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }

    return $val;
}
*/


error_log("teste222");
selfInvoker();
?>
