<?php
require_once('vendor/cleeng/cleeng-php-sdk/cleeng_api.php');

$itemOfferId = 'A655681095_SE';

/**
 * We strongly advice to create a download link that expires automatically within certain time
 */
$file = "185933540.mp4";

/**
 *  Cleeng Api setup
 *  publisherToken  => https://dashboard.cleeng.com/api-keys
 *  enableSandbox => enable sandbox env for testing
 */
$cleengApi = new Cleeng_Api();
$cleengApi->enableSandbox();

/**
 * Get information about single offer
 */
$itemOffer = $cleengApi->getSingleOffer($itemOfferId);

/**
 * Returns information about logged in user access to offer.
 */
$accessStatus = $cleengApi->getAccessStatus($itemOfferId);