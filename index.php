<?php
include 'config.php';
?>
<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<title>Example: Download to Own</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<style type="text/css">
    body {
        padding-top: 20px;
        padding-bottom: 40px;
    }

        /* Custom container */
    .container-narrow {
        margin: 0 auto;
        max-width: 700px;
    }

    .container-narrow > hr {
        margin: 30px 0;
    }

        /* Main marketing message and sign up button */
    .jumbotron {
        margin: 60px 0;
        text-align: center;
    }

    .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
    }

    .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
    }

        /* Supporting marketing content */
    .marketing {
        margin: 60px 0;
    }

    .marketing p + h4 {
        margin-top: 28px;
    }

    #cleeng_loader {
        display: none;
        float: left;
        width: 100%;
        margin-bottom: 10px;
    }

    #cleeng_purchase {
        clear: both;
    }
</style>


<body>

<div class="container-narrow">

    <div class="masthead">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">Example: Download to Own</h3>
    </div>
    <hr>

    <div class="jumbotron">

        <h1>Buy download</h1>

        <iframe src="http://player.vimeo.com/video/73228134?autoplay=false" width="540px" height="360px" frameborder="0"
                webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>


        <p class="lead"></p>
        <? if ($accessStatus && $accessStatus->accessGranted) { ?>

            <div class="alert alert-success">accou
                You bought the video for download. <a href="file.php">Download now</a>
            </div>

        <? } else { ?>

            <div id="cleeng_content">
                <div id="cleeng_loader">
                    <img src="http://play.cleeng.com/resources/img/loading.gif" alt=""/>
                </div>
                <a class="btn btn-large btn-success" id="cleeng_purchase" href="#">Own & download for €0.99</a>
            </div>

        <?php } ?>
    </div>

    <hr>
    <div class="footer">
        <p>&copy; Cleeng 2013</p>
    </div>

</div>
<!-- /container -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo $cleengApi->getJsApiUrl(); ?>"></script>

<script type="text/javascript">
    var offerId = '<?php echo $offerId; ?>';

    $('document').ready(function () {

        function loadContent(token) {
            $.post('content.php', function (result) {
                if (result) {
                    $('#cleeng_content').html(result);
                } else {
                    $('#cleeng_loader').hide();
                }
            });
        }
        $('#cleeng_purchase').click(function () {
            CleengApi.purchase(offerId, function (accessStatus) {
                if (accessStatus.accessGranted) {
                    $('#cleeng_loader').show();
                    loadContent(accessStatus.token);
                }
            });
            return false;
        });
    });
</script>
</body>
</html>
