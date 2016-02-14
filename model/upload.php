<?php
$ds          = DIRECTORY_SEPARATOR;

$storeFolder = '../viewer/images/';

if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;

    $targetFile =  $targetPath. $_FILES['file']['name'];

    if(move_uploaded_file($tempFile,$targetFile))
    {
        echo 'ok';
    }
}
?>