<?php
require_once('library/cleeng-php-sdk/cleeng_api.php');

$itemOfferId = 'A655681095_SE';

/**
 * We strongly advice to create a download link that expires automatically within certain time
 */
$file = "185933540.mp4";

/**
 *  Cleeng Api setup
 *  EndPoint and jsApiUrl => depends of the environment you choose (sandbox.cleeng.com, cleeng.com)
 *  publisherToken  => https://dashboard.cleeng.com/api-keys
 *
 */
$cleengApi = new Cleeng_Api(
    array(
            'endPoint' =>  "https://sandbox.cleeng.com/api/3.0/json-rpc",
            'jsApiUrl' => "https://sandbox.cleeng.com/js-api/3.0/api.js",
            'publisherToken' => "O6aI6mPm7Ph5FNWFN9iPI1NSXA0tdoJgHKEYOjNWykZ88Z-O",
        )
);

/**
 * Get information about single offer
 */
$itemOffer = $cleengApi->getSingleOffer($itemOfferId);

/**
 * Returns information about logged in user access to offer.
 */
$accessStatus = $cleengApi->getAccessStatus($itemOfferId);