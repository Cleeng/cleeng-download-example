<?php
require_once('vendor/cleeng/cleeng-php-sdk/cleeng_api.php');

$offerId = 'A655681095_SE';

/**
 * We strongly advice to create a download link that expires automatically within certain time
 */
$file = "myvideo.mp4";

/**
 *  Cleeng Api setup
 *  publisherToken  => https://dashboard.cleeng.com/api-keys
 *  enableSandbox => enable sandbox env for testing
 */
$cleengApi = new Cleeng_Api();
$cleengApi->enableSandbox();

/**
 * Returns information about logged in user access to offer.
 */
$accessStatus = $cleengApi->getAccessStatus($offerId);