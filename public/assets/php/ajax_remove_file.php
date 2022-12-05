<?php
if(isset($_POST['file'])){
    $file = '../../../storage/app/public/uploads/' . $_POST['file'];
    if(file_exists($file)){
        unlink($file);
    }
}
?>
