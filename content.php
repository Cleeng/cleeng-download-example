<?php
include 'config.php';

if (!isset($_COOKIE['CleengClientAccessToken']) && isset($_REQUEST['CleengClientAccessToken'])) {
    setcookie('CleengClientAccessToken', $_REQUEST['CleengClientAccessToken'], time()+3600*24*14, '/');
}

// Check if visitor has access to protected content
if ($cleengApi->isAccessGranted($itemOfferId)) {

	echo <<<HTML
         <div class="alert alert-success">

        Download will start automatically in 5 seconds, if not please click <a href="file.php">here</a>.

         <script type="text/javascript">
             $('document').ready(function () {
                 function download() {
                     window.location = 'file.php';
                 }
                 window.setTimeout(download, 5000);
           });
         </script>
         </div>

HTML;
;
    exit;
}
echo "false";
