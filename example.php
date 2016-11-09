<?php

/* Param */
// url which will be seen statistics
$url = "http://whatever.com/bla/bla";
// your facebook access_token
$facebook_access_token = "12345xxxxxxxxxxxxxxx";
// user_agent
$user_agent = "#Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36";

/* Include Social Statistic Counter Class */
include_once("lib/Sostic.class.php");

/* Create object Social Statistic Counter */
$sostic = new Sostic($url, $facebook_access_token, $user_agent);

/* Get counter by social media name */
//$counter = $sostic->google_plus();
//$counter = $sostic->vk();
//$counter = $sostic->stumbleupon();
//$counter = $sostic->pocket();
//$counter = $sostic->bufferapp();
//$counter = $sostic->linkedin();
//$counter = $sostic->pinterest();
//$counter = $sostic->reddit();
$counter = $sostic->facebook();

/* Output counter */
echo 'Facebook share count: ' .$counter;
