<?php
/**
 * We strongly advice to create a download link that expires automatically within certain time
 */

include 'config.php';

if ($accessStatus && $accessStatus->accessGranted) {
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=thankyoufordownloading.mp4');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
    }
}